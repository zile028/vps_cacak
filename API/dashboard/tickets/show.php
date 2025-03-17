<?php

use Core\App;
use Core\Database;

try {
    $id = $params["id"];
    $db = App::resolve(Database::class);
    $sql = "SELECT t.* , u.firstName, u.lastName, u.email, u.role, 
                    uc.firstName as changerFirstName, uc.lastName as changerLastName 
                FROM tickets t 
                JOIN users u ON u.id = t.userID
                LEFT JOIN users uc ON uc.id = t.changeBy
                WHERE t.id = :id;
            SELECT tr.*, u.firstName, u.lastName, u.email, u.role
                FROM tickets_response tr
                JOIN users u ON u.id = tr.userID
                WHERE tr.parent = :id
                ORDER BY tr.createdAt;
";

    $ticket = $db->query($sql, ["id" => $id])->findOne();
    $ticketResponses = $db->nextRowsetFind();
    view("dashboard/tickets/preview.view", ["ticket" => $ticket, "responses" => $ticketResponses]);
} catch (Exception $e) {
//    writeLog($e->getMessage(), __FILE__);
    displayErrorPage($e);
}
