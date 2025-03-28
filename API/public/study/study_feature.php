<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$sql = "SELECT sp.naziv, sp.id,naziv,ns.title AS nivo,sp.modul,sp.espb, sp.zvanje FROM studijski_programi sp
JOIN nivo_studija ns ON ns.id =  sp.nivoID
        WHERE sp.lang = 'srb' AND sp.aktivan = 1
        ORDER BY FIELD(espb, 180,60,120)";

$studije = $db->query($sql)->find(PDO::FETCH_OBJ | PDO::FETCH_GROUP);