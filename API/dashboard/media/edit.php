<?php
$id = $params["id"];
$db = \Core\App::resolve(\Core\Database::class);

$sql = "SELECT * FROM media WHERE id = :id";

$media = $db->query($sql, ["id" => $id])->findOne();

view("dashboard/media/edit.view", ["file" => $media]);