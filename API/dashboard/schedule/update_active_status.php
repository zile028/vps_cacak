<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$id = $params["id"];
try {
    $sql = "
        UPDATE raspored SET
        active = CASE WHEN active = 1 THEN 0 ELSE 1 END                    
        WHERE id = :id
    ";
    $db->query($sql, ["id" => $id]);
    redirectBack();
} catch (Exception $e) {
    displayErrorPage($e);
}