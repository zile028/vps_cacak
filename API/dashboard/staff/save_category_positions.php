<?php
$odborID = $params["id"];
$db = \Core\App::resolve(\Core\Database::class);
$sql = "INSERT INTO odbor_pozicija (pozicija, odborID, lang, prioritet) 
        VALUES (:pozicija, :odborID, (SELECT lang FROM odbori WHERE id = :odborID), :prioritet )";
$result = $db->query($sql, [
    "odborID" => $odborID,
    "pozicija" => $_POST["pozicija"],
    "prioritet" => $_POST["prioritet"],
]);
redirectBack();
