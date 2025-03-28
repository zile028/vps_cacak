<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$sql = "SELECT k.category, d.* ,k.category,
        CASE
            WHEN d.parentID = 0 THEN d.id
            ELSE d.parentID 
        END AS parentID
        FROM dokumenta d
        JOIN kategorije k ON k.id = d.category
        WHERE d.lang = :lang AND k.slug = :slug
        ORDER BY k.category, d.parentID ASC;

        SELECT category FROM kategorije WHERE slug = :slug;
        ";
$params["lang"] = "srb";

$dokumenta = $db->query($sql, $params)->find(PDO::FETCH_OBJ);
$kategorija = $db->nextRowsetFindOne(PDO::FETCH_OBJ);

view("public/dokumenta.view", [
    "heroImage" => "hero_documents.jpg",
    "heroTitle" => $kategorija->category,
    "dokumenta" => $dokumenta
]);