<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$data = $_POST;
[$data["nivoID"], $data["lang"]] = json_decode($_POST["nivoLang"], true);
unset($data["nivoLang"], $data["_method"]);
$data["id"] = $params["id"];
$sql = "
    UPDATE upis SET
        title = :title,
        nivoID = :nivoID,
        content = :content,
        lang = :lang
    WHERE id = :id;
";

try {
    $result = $db->query($sql, $data)->affectedRows();
    redirect("/admission#" . $data["id"]);
} catch (Exception $e) {
    displayErrorPage($e);
}

