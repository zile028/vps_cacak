<?php
$db = \Core\App::resolve(\Core\Database::class);

$sql = "
    DELETE FROM navmenu
    WHERE id = :id;
";

$result = $db->query($sql, ["id" => $params["itemID"]])->affectedRows();
redirectBack();
