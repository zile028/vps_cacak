<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sql = "SELECT v.* ,m.fileName,m.storeName, m.id AS mediaID, u.role AS autor
        FROM vesti v 
        JOIN users u ON u.id = v.userID
        LEFT JOIN media m ON m.id = v.featured_imageID
        ORDER BY v.createdAt DESC;";
$vesti = $db->query($sql)->find(PDO::FETCH_OBJ);

view("public/vesti.view", [
    "heroImage" => "hero_news.jpg",
    "heroTitle" => "Вести",
    "vesti" => $vesti
]);