<?php
$db = \Core\App::resolve(\Core\Database::class);
$sql = "UPDATE odbor_pozicija SET prioritet = :prioritet
        WHERE id = :id;";
$result = $db->query($sql, [
    "prioritet" => $_POST["prioritet"],
    "id" => $params["id"],
])->isExecuteResult();

redirectBack($params["id"]);