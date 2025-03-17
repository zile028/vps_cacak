<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = $params["id"];

$sql = "UPDATE studijski_programi SET aktivan = NOT aktivan WHERE id = :id;";

$db->query($sql, ["id" => $id]);
redirectBack($id);