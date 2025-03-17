<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sql = "
        DELETE tr 
            FROM tickets_response tr
            JOIN tickets t ON t.id = tr.parent
            WHERE t.id = :id 
            AND (t.userID = :userID OR (SELECT role FROM users WHERE id = :userID LIMIT 1 ) = :role);
        DELETE FROM tickets
            WHERE id = :id 
            AND (userID = :userID OR (SELECT role FROM users WHERE id = :userID LIMIT 1 ) = :role);
        ";
$data = [
    "id" => $params["id"],
    "userID" => getUser("id"),
    "role" => ADMIN
];
try {
    $db->beginTransaction();
    $db->query($sql, $data);
    $db->nextRowset();
    $db->commit();
    redirectBack();
} catch (Exception $e) {
    $db->rollBack();
    writeLog($e->getMessage(), __FILE__);
    displayErrorPage($e);
}
