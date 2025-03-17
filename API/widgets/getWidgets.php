<?php

use Core\App;
use Core\Database;
use Core\Response;


$db = App::resolve(Database::class);
$sql = "SELECT * FROM widgets WHERE name = :name AND lang = :lang AND isActive = true ORDER BY position ";
$widgtes = $db->query($sql, [
    "name" => $params["name"],
    "lang" => $params["lang"] === "null" ? "*" : $params["lang"]])->find();

try {
    if (count($widgtes) > 0) {
        Response::send($widgtes);
    } else {
        Response::status(Response::NO_CONTENT)::send($widgtes);
    }
} catch (\Exception $e) {
    Response::status(Response::SERVER_ERROR)::send($e->getMessage());
}
