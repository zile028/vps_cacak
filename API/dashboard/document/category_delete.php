<?php
$db = \Core\App::resolve(\Core\Database::class);
$sql = "
    DELETE FROM kategorije
           WHERE id = :id AND (SELECT COUNT(id) FROM dokumenta WHERE dokumenta.category = :id) = 0;   
";

$result = $db->query($sql, ["id" => $params["id"]])->affectedRows();
redirectBack();