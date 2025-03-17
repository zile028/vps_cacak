<?php

$db = \Core\App::resolve(\Core\Database::class);

$sql = "
    DELETE FROM obrazovanje_osoblje WHERE id = :id;
";

$result = $db->query($sql, [
    "id" => $params["id"]
]);
redirectBack();