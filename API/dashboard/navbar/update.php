<?php

use Core\App;
use Core\Database;

$data = $_POST;
$db = App::resolve(Database::class);
$data["drop"] = isset($data["drop"]);
$data["to"] = $data["to"] === "" || empty($data["to"]) ? null : $data["to"];
$data["id"] = $params["itemID"];
$data["parent"] = $data["parent"] === "null" ? null : $data["parent"];

$sql = "UPDATE navmenu SET 
                   caption=:caption, `drop`=:drop, `to`=:to, parent=:parent, level=:level, position=:position
                   WHERE id = :id;
                   ";
$db->query($sql, $data);

redirectBack();
