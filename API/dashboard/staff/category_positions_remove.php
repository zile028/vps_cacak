<?php
$id = $params["id"];
$db = \Core\App::resolve(\Core\Database::class);
$sql = "DELETE FROM odbor_pozicija WHERE id = :id";

$result = $db->query($sql, ["id" => $id]);

redirectBack();

