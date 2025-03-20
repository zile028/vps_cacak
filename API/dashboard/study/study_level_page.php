<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sql = "
    SELECT ns.lang, ns.* , m.storeName AS thumbnail
    FROM nivo_studija ns
    LEFT JOIN media m ON m.id = ns.image
    ;
";
$nivoiStudija = $db->query($sql)->find(PDO::FETCH_GROUP);

view("dashboard/studije/nivo_studija.view", ["nivoiStudija" => $nivoiStudija]);