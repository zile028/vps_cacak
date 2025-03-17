<?php
$db = \Core\App::resolve(\Core\Database::class);
$sql = "UPDATE odbori SET prioritet = :prioritet
        WHERE id = :id;";
$result = $db->query($sql, [
    "prioritet" => $_POST["prioritet"],
    "id" => $params["id"],
])->isExecuteResult();

redirectBack($params["id"]);