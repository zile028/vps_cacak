<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sql = "SELECT ns.title AS nivo, r.*, m.fileName, m.storeName, sp.naziv, sp.modul,ns.title AS nivo
            FROM raspored r
            JOIN studijski_programi sp ON sp.id = r.spID
            JOIN nivo_studija ns ON ns.id = sp.nivoID
            JOIN media m ON m.id = r.mediaID
            JOIN raspored_kategorija rk ON rk.id = r.kategorija
            WHERE rk.slug = :slug;";
$raspored = $db->query($sql, ["slug" => $params["slug"]])->find(PDO::FETCH_OBJ | PDO::FETCH_GROUP);

view("public/raspored.view", [
    "heroImage" => "hero_raspored.jpg",
    "heroTitle" => "Распоред испита",
    "rasporedi" => $raspored
]);