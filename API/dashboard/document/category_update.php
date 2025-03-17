<?php
$db = \Core\App::resolve(\Core\Database::class);
$key = array_key_last($_POST);
$value = $_POST[$key];

$sql = "
    UPDATE kategorije SET $key = :value WHERE id = :id
";
$result = $db->query($sql, [
    "id" => $params["id"],
    "value" => $value
])->affectedRows();

redirectBack();