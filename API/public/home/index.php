<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$sql = "SELECT sp.id,sp.naziv,ns.title AS nivo ,sp.opis FROM studijski_programi sp
JOIN nivo_studija ns ON ns.id = sp.nivoID
        WHERE sp.lang = 'srb' AND sp.aktivan = 1
        GROUP BY sp.naziv, nivo,sp.espb
        ORDER BY FIELD(sp.espb, 180,60,120)";
$studije = $db->query($sql)->find(PDO::FETCH_OBJ);

view("public/home", [
    "studije" => $studije,
    "heroTitle" => "Висока пословна школа<br>струковних студија",
    "heroAction" => [
        ["caption" => "Упис", "link" => "/upis"],
        ["caption" => "Студије", "link" => "/studije"]
    ],
    "heroImage" => "hero_home.jpg",
]);


