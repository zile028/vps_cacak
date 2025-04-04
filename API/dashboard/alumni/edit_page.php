<?php

use Core\Session;

$db = \Core\App::resolve(\Core\Database::class);

$sql = "SELECT * FROM nivo_studija 
         WHERE lang = :lang ORDER BY lvl;

        SELECT a.*, m.storeName, 
               ns.title AS nivo
            FROM alumni a
            LEFT JOIN media m ON m.id = a.imageID
            JOIN nivo_studija ns ON ns.id =a.nivoID 
            WHERE a.id = :id;
";
$studije = $db->query($sql, ["id" => $params["id"], "lang" => "srb"])->find(PDO::FETCH_OBJ);

$alumnista = $db->nextRowsetFindOne(PDO::FETCH_OBJ);
view("dashboard\alumni\/edit.view", ["alumnista" => $alumnista, "studyLevel" => $studije]);
Session::unflash();