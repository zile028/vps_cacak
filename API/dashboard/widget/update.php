<?php
$db = \Core\App::resolve(\Core\Database::class);
$sql = "UPDATE widgets SET 
            content = :content,
            isActive = :isActive,
            position = :position,
            settings = :settings,
            lang = :lang
        WHERE id = :id;";
unset($_POST["_method"]);
$data = $_POST;
$data["settings"] = trim($data["settings"]);
$data["id"] = $params["id"];
$data["isActive"] = isset($_POST["isActive"]);

$db->query($sql, $data);
redirectBack();
