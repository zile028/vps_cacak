<?php

use Core\App;
use Core\Database;

try {
    $sql = "";
    $db = App::resolve(Database::class);
    if (getUser("role") === ADMIN) {
        $sql = "SELECT t.done , t.*, u.firstName, u.lastName, u.email, u.role 
                FROM tickets t 
                LEFT JOIN users u ON u.id = t.userID
                ORDER BY t.done, t.updatedAt DESC, t.createdAt DESC;";
        $tickets = $db->query($sql)->find(PDO::FETCH_GROUP);
    } else {
        $sql = "SELECT t.done , t.*, u.firstName, u.lastName, u.email, u.role 
                FROM tickets t 
                LEFT JOIN users u ON u.id = t.userID
                WHERE t.userID = :userID
                ORDER BY t.done, t.updatedAt DESC, t.createdAt DESC;";
        $tickets = $db->query($sql, ["userID" => getUser("id")])->find(PDO::FETCH_GROUP);
    }
    view("dashboard/tickets/index.view", ["tickets" => $tickets]);
} catch (Exception $e) {
    displayErrorPage($e);
}
