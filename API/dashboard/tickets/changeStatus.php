<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sql = "UPDATE tickets SET 
            status = :status,
            changeBy = :changedBy,
            done = :done
        WHERE id = :id 
          AND (userID = :changedBy OR (SELECT role FROM users WHERE id = :changedBy LIMIT 1 ) = :role)
          AND status != :status AND done = FALSE;";

$data = [
    "id" => $params["id"],
    "status" => $_POST["status"],
    "changedBy" => getUser("id"),
    "role" => ADMIN,
    "done" => $_POST["status"] === "zatvoren"
];
$result = $db->query($sql, $data)->affectedRows();
redirectBack();