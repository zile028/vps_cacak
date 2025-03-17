<?php

$db = \Core\App::resolve(\Core\Database::class);
$sql = "
        SELECT ns.lang, ns.id, ns.title
            FROM nivo_studija ns 
";
$nivoStudija = $db->query($sql)->find(PDO::FETCH_GROUP);

view("dashboard/studije/sp_create.view", ["nivoStudija" => $nivoStudija]);