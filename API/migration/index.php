<?php
require __DIR__ . "/sql_statments.php";
$config = [
    "host" => "localhost",
    "port" => 3306,
    "dbname" => "fim_test",
    "charset" => "utf8mb4",
    "username" => "root",
    "password" => ""
];
$db = new \Core\Database($config);
$mediaMigrate = $db->query($migrate_media)->affectedRows();
$vestiMigrate = $db->query($migrate_vesti)->affectedRows();
$vestiMediaMigrate = $db->query($migrate_vest_media)->affectedRows();
$posts = $db->query($posts_translation)->find();

$transform = [];
foreach ($posts as $post) {
    $parsed = unserialize($post->description);
    if (isset($parsed["sr"])) {
        $parsed["srb"] = $parsed["sr"];
        unset($parsed["sr"]);
    } else {
        $parsed["srb"] = null;
    }
    if (!isset($parsed["en"])) {
        $parsed["en"] = null;
    }

    $transform[] = [
        "id" => $post->id,
        "translate_relation" => json_encode($parsed)
    ];
}

foreach ($transform as $post) {
    $sql = "UPDATE vesti SET translate_relation = :translate_relation WHERE id = :id";
    $db->query($sql, $post);
}
dd([
    $mediaMigrate, $vestiMigrate, $vestiMediaMigrate, count($transform)
]);
