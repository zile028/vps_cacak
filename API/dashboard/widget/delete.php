<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sql = "DELETE FROM widgets WHERE id = :id";
try {
    $db->query($sql, ["id" => $params["id"]]);
    redirectBack();
} catch (Exception $e) {
    displayErrorPage($e);
}
