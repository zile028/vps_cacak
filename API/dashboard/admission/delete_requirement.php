<?php

use Core\Database;

$db = \Core\App::resolve(Database::class);
$id = $params["id"];

try {
    $sql = "DELETE FROM upis WHERE id = :id ";
    $db->query($sql, ["id" => $id]);
    redirectBack();
} catch (Exception $e) {
    displayErrorPage($e);
}

