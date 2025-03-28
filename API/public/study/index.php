<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sql = "SELECT sp.naziv,sp.id, ns.title AS nivo,sp.opis,sp.espb,sp.polje,sp.akreditovan,sp.zvanje,sp.trajanje, sp.modul
        FROM studijski_programi sp
        JOIN nivo_studija ns ON ns.id = sp.nivoID
        WHERE sp.aktivan = 1
        ORDER BY FIELD(sp.espb, 180,60,120)";
$studije = $db->query($sql)->find(PDO::FETCH_OBJ | PDO::FETCH_GROUP);

view("public/studije.view", [
    "heroImage" => "hero_studije.jpg",
    "heroTitle" => "Студијски програми",
    "studije" => $studije
]);