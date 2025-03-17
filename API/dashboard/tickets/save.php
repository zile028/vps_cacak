<?php

use Core\App;
use Core\Database;
use Core\Validation;

try {
    $db = App::resolve(Database::class);
    $validate = new Validation($_POST);
    $validate->validate("title", "string", "Naslov je obavezan!");
    $validate->validate("description", "html", "Opis je obavezan!");
    $validate->appendData("userID", getUser("id"));
    $sql = "INSERT INTO tickets (title, description, userID) VALUES (:title, :description, :userID)";
    $db->query($sql, $validate->getData());
    redirect("/tickets");
} catch (Exception $e) {
    displayErrorPage($e);
}

