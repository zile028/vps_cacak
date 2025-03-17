<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$id = $params["id"];
$sql = "
    SELECT ns.* 
    FROM nivo_studija ns 
    WHERE id = :id;
";
$nivoStudija = $db->query($sql, ["id" => $id])->findOne();
view("dashboard//studije/nivo_studija_edit.view", ["nivo" => $nivoStudija]);