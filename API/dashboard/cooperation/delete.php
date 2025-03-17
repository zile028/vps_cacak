<?php


use Core\App;
use Core\Database;
use Core\Router;

$db = App::resolve(Database::class);

$sql = "DELETE FROM saradnja WHERE id = :id";
try {
    $db->query($sql, ["id" => $params["id"]])->affectedRows();
    Router::redirectBack();
} catch (Exception $e) {
    displayErrorPage($e);
}