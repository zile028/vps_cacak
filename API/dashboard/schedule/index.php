<?php

$db = \Core\App::resolve(\Core\Database::class);

$sql = "SELECT rk.lang, rk.* FROM raspored_kategorija rk";
$kategorije = $db->query($sql)->find(PDO::FETCH_GROUP);

view("dashboard/raspored/index.view", ["kategorije" => $kategorije]);