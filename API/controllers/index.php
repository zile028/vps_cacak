<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$courseLevels = $db->query("SELECT * FROM nivo_studija")->find();

try {
    echo json_encode($courseLevels, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    echo \Core\Response::SERVER_ERROR;
}