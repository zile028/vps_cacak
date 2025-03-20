<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sql = "UPDATE dokumenta SET 
            title = :title,
            attachment = :attachment,
            parentID = :parentID
        WHERE id = :id;
        SELECT category FROM dokumenta WHERE id = :id";

try {
    $data = [...$_POST, ...$params];
    $result = $db->query($sql, $data)->affectedRows();
    $category = $db->nextRowsetFindOne(PDO::FETCH_COLUMN);
    redirect("/dashboard/document/category/" . $category);
} catch (Exception $e) {
    displayErrorPage($e);
}


