<?php
$db = \Core\App::resolve(\Core\Database::class);
$error = [];
$media = [];
$previous = null;
$isCopy = $_GET["id"] ?? null;
if ($isCopy) {
    $sql = "SELECT * FROM media WHERE mimetype LIKE '%image%' AND fileName != '' ORDER BY fileName;
            SELECT v.id, v.description, v.featured_imageID, v.naslov, m.storeName 
            FROM vesti v 
            JOIN media m ON m.id = v.featured_imageID
            WHERE v.id=:id;
            ";
    $media = $db->query($sql, ["id" => $isCopy])->find();
    $previous = $db->nextRowsetFindOne();
} else {
    $sql = "SELECT * FROM media WHERE mimetype LIKE '%image%' AND fileName != '' ORDER BY fileName;";
    $media = $db->query($sql)->find();
}

if (isset($_GET["lang"])) {
    view("dashboard/vesti/create_single_lang_page.view", [
        "error" => $error,
        "media" => $media,
        "lang" => $_GET["lang"],
        "id" => $_GET["id"],
        "previous" => $previous,
        "canAtachFile" => false
    ]);
} else {
    view("dashboard/vesti/create_page.view", ["error" => $error, "media" => $media, "canAtachFile" => false]);
}

