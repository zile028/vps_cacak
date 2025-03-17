<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$sql = "
SELECT name FROM widgets GROUP BY name ORDER BY name;
SELECT type FROM widgets GROUP BY type ORDER BY type;
";
$options = [
    "name" => $db->query($sql)->find(PDO::FETCH_COLUMN),
    "type" => $db->nextRowsetFind(PDO::FETCH_COLUMN),
];
view("dashboard/widget/create.view", ["options" => $options]);