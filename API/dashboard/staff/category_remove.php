<?php
$db = \Core\App::resolve(\Core\Database::class);

$sql = "
    DELETE FROM odbori WHERE id = :id;
    DELETE FROM odbor_pozicija WHERE odborID = :id
";

$result = $db->query($sql, ["id" => $params["id"]]);
redirectBack();