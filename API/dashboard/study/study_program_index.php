<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$sql = "
        SELECT sp.* ,ns.title AS nivo
            FROM studijski_programi sp 
            JOIN nivo_studija ns ON ns.id = sp.nivoID
            WHERE sp.id = :id;
        SELECT p.*, spp.redniBroj AS redniBroj, spp.izborni, spp.semestar
            FROM sp_predmet spp
            JOIN predmeti p ON p.id = spp.predmetID 
            WHERE spp.spID= :id
            ORDER BY spp.redniBroj, p.id;
        SELECT p.* 
            FROM predmeti p
            WHERE p.id NOT IN (SELECT predmetID FROM sp_predmet WHERE spID = :id) AND p.lang = (SELECT sp.lang FROM studijski_programi sp WHERE sp.id = :id);
        SELECT ns.id, ns.title
            FROM nivo_studija ns 
            WHERE ns.lang = (SELECT sp.lang FROM studijski_programi sp WHERE sp.id = :id)
      ";

$studijskiProgram = $db->query($sql, $params)->findOne();
$predmeti = $db->nextRowsetFind();
$slobodniPredmeti = $db->nextRowsetFind();
$nivoStudija = $db->nextRowsetFind();

view("dashboard/studije/studijski_program_page.view",
    ["sp" => $studijskiProgram,
        "predmeti" => $predmeti,
        "slobodniPredmeti" => $slobodniPredmeti,
        "nivoStudija" => $nivoStudija,
        "flag" => "remove"]);