<?php


use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$data = [
    "id" => $params["id"],
    "createdAt" => $_POST["createdAt"]
];
$sql = "UPDATE vesti SET createdAt = :createdAt WHERE id = :id";
try {
    $result = $db->query($sql, $data)->affectedRows();
    if ($result < 1) {
        throw new Error("Nije pronadjena vest!");
    }
    redirectBack();
} catch (Exception $e) {
    displayErrorPage($e);
}
