<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

try {
    $sql = "UPDATE alumni SET active = IF(active = 0, 1, 0)  WHERE id = :id";
    $db->query($sql, ["id" => $params["id"]]);
    redirectBack($params["id"]);
} catch (Exception $e) {
    displayErrorPage($e);
}