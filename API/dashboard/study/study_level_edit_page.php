<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$id = $params["id"];
$sql = "
    SELECT ns.* 
    FROM nivo_studija ns 
    WHERE id = :id;
    SELECT * FROM media m WHERE m.mimetype LIKE '%image%';

";
$nivoStudija = $db->query($sql, ["id" => $id])->findOne();
$images = $db->nextRowsetFind();
view("dashboard//studije/nivo_studija_edit.view", ["nivo" => $nivoStudija, "images" => $images]);