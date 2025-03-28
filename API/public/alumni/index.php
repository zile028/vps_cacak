<?php

use Core\Session;

$statusCode = \Core\Response::UNDER_CONSTRUCTION;
$bindParams = [];

$db = \Core\App::resolve(\Core\Database::class);
$sql = "SELECT a.*, m.storeName, sp.naziv AS spNaziv,sp.modul,ns.title AS nivo, sp.nivoID
            FROM alumni a
            LEFT JOIN media m ON m.id = a.imageID
            JOIN studijski_programi sp ON sp.id = a.nivoID
            JOIN nivo_studija ns ON ns.id = sp.nivoID
        WHERE a.active = 1;
        SELECT * FROM nivo_studija WHERE lang = :lang ORDER BY lvl 
";
if (isset($_GET["poslodavac"])) {
    $sql .= " WHERE poslodavac = :poslodavac";
    $bindParams = ["poslodavac" => $_GET["poslodavac"]];
}
$bindParams["lang"] = "srb";

$alumnisti = $db->query($sql, $bindParams)->find(PDO::FETCH_OBJ);
$studyLevel = $db->nextRowsetFind();
view("public/alumni.view", ["heading" => "Error",
    "heroImage" => "hero_alumni.jpg",
    "heroTitle" => "Алумни клуб",
    "alumnisti" => $alumnisti,
    "studyLevel" => $studyLevel,
]);
Session::unflash();