<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$sql = "SELECT lang, id,type,lang FROM saradnja_type ORDER BY FIELD(lang,'srb', 'en'), type ASC";
$types = $db->query($sql)->find(PDO::FETCH_GROUP);

view("dashboard/cooperation/index.view", ["types" => $types]);