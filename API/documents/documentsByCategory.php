<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve(Database::class);
$sql = "
        SELECT category AS caption, description FROM kategorije WHERE slug=:category AND lang = :lang;
        SELECT k.*, d.title AS title, m.storeName AS file
            FROM kategorije k
            JOIN dokumenta d ON d.category = k.id
            JOIN media m ON m.id = d.attachment
            WHERE k.slug=:category AND k.lang = :lang
        ";
$category = $db->query($sql, ["category" => $params["category"], "lang" => "srb"])
    ->findOne();
$dokumenta = $db->nextRowsetFind();
Response::send(["category" => $category, "docs" => $dokumenta]);
