<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$sql = "INSERT INTO widgets ( name, type, content, settings, position, isActive, lang)
            VALUES (:name, :type, :content, :settings, :position, :isActive, :lang);";
$data = $_POST;
$data["content"] = $data["content"][$data["type"]];
$data["isActive"] = isset($_POST["isActive"]);
$result = $db->query($sql, $data);
redirect("/dashboard/widget");

