<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sql = "
    SELECT w.name, w.* FROM widgets w;
    SELECT name FROM widgets GROUP BY name ORDER BY name;
    SELECT type FROM widgets GROUP BY type ORDER BY type;
";


$widgets = $db->query($sql)->find(PDO::FETCH_GROUP);
$options = [
    "name" => $db->nextRowsetFind(PDO::FETCH_COLUMN),
    "type" => $db->nextRowsetFind(PDO::FETCH_COLUMN),
];
//dd($widgets);
view("dashboard/widget/index.view", ["widgets" => $widgets, "options" => $options]);