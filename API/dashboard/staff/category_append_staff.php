<?php
$db = \Core\App::resolve(\Core\Database::class);
$sql = "INSERT INTO osoblje_odbor 
    (osobljeID, odborID, pozicija, lang) 
    VALUES 
        (:osobljeID, :odborID, :pozicija, (SELECT lang FROM odbori WHERE id = :odborID))
        ";
$result = $db->query($sql, [
    "osobljeID" => $_POST["osobljeID"],
    "odborID" => $params["id"],
    "pozicija" => $_POST["pozicija"]
]);
redirectBack();