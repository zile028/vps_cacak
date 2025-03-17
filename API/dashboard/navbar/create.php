<?php

use Core\App;
use Core\Database;

$data = $_POST;
$db = App::resolve(Database::class);
$data["drop"] = isset($data["drop"]) ? 1 : 0;
$data["to"] = $data["to"] === "" || empty($data["to"]) ? null : $data["to"];
$data["parent"] = $data["parent"] === "null" ? null : $data["parent"];
try {

    $sql = "INSERT INTO navmenu (caption, `drop`, `to`, parent, level, position, lang)
                VALUES (:caption, :drop, :to, :parent, :level, :position, :lang)";
    $result = $db->query($sql, $data)->affectedRows();
    redirectBack();

} catch (Exception $e) {
    writeLog("CREATE NAVBAR ERROR " . $e->getMessage());
    displayErrorPage($e);
}
