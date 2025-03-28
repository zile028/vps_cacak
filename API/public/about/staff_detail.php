<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$nastavnik = $db->query("
        SELECT o.*, m.storeName AS image
        FROM osoblje o
            JOIN media m ON m.id = o.imageID
        WHERE o.lang = :lang AND o.id = :id",
    ["lang" => "srb", "id" => $params["id"]])->findOne();
view("public/employer", ["heroTitle" => "Zaposleni", "heroImage" => "hero_employer.jpg", "nastavnik" =>
    $nastavnik]);