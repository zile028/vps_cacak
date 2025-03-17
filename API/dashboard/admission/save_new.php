<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$sql = "
INSERT INTO upis (title, content, nivoID, lang, prioritet) 
            VALUES (:title, :content, :nivoID, :lang, 
                    (SELECT IFNULL(MAX(u.prioritet),0)+1 FROM upis u WHERE u.nivoID = :nivoID)
                    )";
try {
    $data = $_POST;
    $result = $db->query($sql, $data)->findOne();
    redirect("/admission");
} catch (Exception $e) {
    displayErrorPage($e);
}
