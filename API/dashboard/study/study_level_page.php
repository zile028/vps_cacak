<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sql = "
    SELECT ns.lang, ns.* FROM nivo_studija ns
";
$nivoiStudija = $db->query($sql)->find(PDO::FETCH_GROUP);

view("dashboard/studije/nivo_studija.view", ["nivoiStudija" => $nivoiStudija]);