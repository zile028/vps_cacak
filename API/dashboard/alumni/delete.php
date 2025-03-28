<?php

$db = \Core\App::resolve(\Core\Database::class);
$sql = "
        DELETE FROM alumni WHERE id = :id;
";

$db->query($sql, [
    "id" => $params["id"]
]);

redirectBack();