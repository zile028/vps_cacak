<?php

use Core\Session;

$db = \Core\App::resolve(\Core\Database::class);
$sql = "SELECT ns.title, ns.title AS nivo, sp.id,
            IF(modul IS NOT NULL , CONCAT(naziv, ' - ', modul), naziv) AS spNaziv
            FROM studijski_programi sp
            JOIN nivo_studija ns ON ns.id =sp.nivoID 
            WHERE sp.lang=:lang
            ORDER BY FIELD(sp.espb, 180,60,120);

        SELECT DISTINCT poslodavac FROM alumni ORDER BY poslodavac;
        SELECT id,fileName, storeName FROM media WHERE mimetype LIKE 'image/%';

        SELECT a.*, m.storeName, 
               ns.title AS nivo
            FROM alumni a
            LEFT JOIN media m ON m.id = a.imageID
            JOIN nivo_studija ns ON ns.id =a.nivoID 
            WHERE a.lang = :lang;
";
$studije = $db->query($sql, ["lang" => "srb"])->find(PDO::FETCH_OBJ | PDO::FETCH_GROUP);
$poslodavci = $db->nextRowsetFind();
$media = $db->nextRowsetFind(PDO::FETCH_OBJ);
$alumnisti = $db->nextRowsetFind(PDO::FETCH_OBJ);
view("/dashboard/alumni/index.view", [
    "studije" => $studije,
    "poslodavci" => $poslodavci,
    "media" => $media,
    "alumnisti" => $alumnisti

]);