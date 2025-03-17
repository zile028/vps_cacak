<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sql = "
        SELECT ns.title, sp.id, sp.*, ns.title AS nivo, ns.lang AS lang,
            (SELECT COUNT(spp.predmetID) FROM sp_predmet spp WHERE spp.spID = sp.id) AS predmetCount
            FROM studijski_programi sp
            JOIN nivo_studija ns ON ns.id = sp.nivoID
            ORDER BY FIELD(ns.lang,'srb') DESC, FIELD(ns.slug, 'undergraduate','graduate','phd'), sp.akreditovan DESC;
        
        ";
$studije = $db->query($sql)->find(PDO::FETCH_GROUP);
view("dashboard/studije/index.view", ["studije" => $studije]);