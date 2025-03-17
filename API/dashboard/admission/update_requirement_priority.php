<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$sql = "
        UPDATE upis SET prioritet = :prioritet WHERE id = :id;
";
$data["id"] = $params["id"];
$data["prioritet"] = $_POST["prioritet"];

try {
    $db->beginTransaction();
    $result = $db->query($sql, $data)->affectedRows();
    $db->commit();
    redirectBack($data["id"]);
} catch (Exception $e) {
    displayErrorPage($e);
    $db->rollBack();
}


