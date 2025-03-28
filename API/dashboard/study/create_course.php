<?php


$db = \Core\App::resolve(\Core\Database::class);
$sql = "SELECT * FROM media WHERE mimetype LIKE '%pdf%';";
$nastavniPlanovi = $db->query($sql)->find();
view("dashboard/studije/predmet_create.view", ["nastavniPlanovi" => $nastavniPlanovi]);