<?php

use Core\Validator;

$db = \Core\App::resolve(\Core\Database::class);
$sql = "
    INSERT INTO vesti (naslov, description, featured_imageID, lang, userID)
        VALUES (:naslov, :description, :featured_imageID, :lang, :userID);
";
$lastId = [];
if (isset($_GET["id"], $_GET["lang"])) {
    $sql .= "SELECT id,lang FROM vesti WHERE id=:id";
    $lang = $_GET["lang"];
    $id = $_GET["id"];
    $data = [
        "naslov" => Validator::string($_POST["naslov"], 3),
        "description" => $_POST["description"],
        "featured_imageID" => $_POST["featured_imageID"],
        "userID" => getUser("id"),
        "lang" => $lang,
        "id" => $id,
    ];
    $lastId[$lang] = $db->query($sql, $data)->lastId();
    $relatedNews = $db->nextRowsetFindOne();
    $lastId[$relatedNews->lang] = $relatedNews->id;
} else {
    $data = [
        "srb" => [
            "naslov" => Validator::string($_POST["srb"]["naslov"], 3),
            "description" => $_POST["srb"]["description"],
            "featured_imageID" => $_POST["featured_imageID"],
            "userID" => getUser("id"),
            "lang" => "srb"
        ],
        "en" => [
            "naslov" => Validator::string($_POST["en"]["naslov"], 3),
            "description" => $_POST["en"]["description"],
            "featured_imageID" => $_POST["featured_imageID"],
            "userID" => getUser("id"),
            "lang" => "en"
        ],
    ];
    foreach ($data as $key => $value) {
        if (isset($value["naslov"]) && $value["naslov"]) {
            $lastId[$key] = $db->query($sql, $value)->lastId();
        }
    }
}
$inClause = implode(", ", array_fill(0, count($lastId), "?"));
$relation = json_encode($lastId);
$sql = "UPDATE vesti SET translate_relation = ? WHERE id IN ($inClause)";
$data = array_values($lastId);
array_unshift($data, $relation);
$result = $db->query($sql, $data)->find();

redirect("/news");
