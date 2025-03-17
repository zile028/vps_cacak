<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = $params["id"];
$sql = "
        SELECT * FROM dokumenta WHERE id = :id;
        SELECT * FROM kategorije;
        SELECT m.type, m.* FROM media m WHERE m.type IN ('pdf', 'doc','docx');
        SELECT * FROM dokumenta
            WHERE category = (SELECT category FROM dokumenta WHERE id = :id)
              AND id != :id AND id NOT IN (SELECT id FROM dokumenta WHERE parentID = :id);
";

try {
    $document = $db->query($sql, ["id" => $id])->findOne();
    $categories = $db->nextRowsetFind();
    $media = $db->nextRowsetFind(PDO::FETCH_GROUP);
    $child = $db->nextRowsetFind();
    $data = ["kategorije" => $categories, "dokument" => $document, "media" => $media, "povezan" => $child];
    view("dashboard/dokumenta/dokument_edit.view", $data);
} catch (Exception $e) {
    displayErrorPage($e);
}

