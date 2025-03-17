<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$sql = "UPDATE nivo_studija SET 
            title=:title,
            lang=:lang,
            slug=:slug,
            lvl=:lvl,
            description=:description,
            image = :image
        WHERE id = :id;
        ";
$data = $_POST;
unset($data["_method"]);
$data["id"] = $params["id"];
$result = $db->query($sql, $data)->affectedRows();
redirectBack();