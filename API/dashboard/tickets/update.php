<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$sql = "INSERT INTO tickets_response (response, userID, parent) 
        VALUES (:response, :userID, :parent);";
$data = [
    "response" => $_POST["response"],
    "userID" => (int)getUser("id"),
    "parent" => (int)$params["id"]
];
$result = $db->query($sql, $data)->affectedRows();
redirectBack();
try {
} catch (Exception $e) {
    writeLog($e->getMessage(), __FILE__);
    displayErrorPage($e);
}
