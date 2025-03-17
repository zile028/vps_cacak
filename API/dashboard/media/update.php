<?php
$id = $params["id"];

$db = \Core\App::resolve(\Core\Database::class);
$sql = "UPDATE media SET fileName = :fileName WHERE id = :id";

$result = $db->query($sql, [
    "id" => $params["id"],
    "fileName" => $_POST["fileName"]
])->affectedRows();

if ($result > 0) {
    redirect("/media");
}