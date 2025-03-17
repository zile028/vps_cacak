<?php
$db = \Core\App::resolve(\Core\Database::class);

$sql = "
    DELETE d 
        FROM dokumenta d
        LEFT JOIN dokumenta child ON child.parentID = d.id
    WHERE d.id = :id AND child.id IS NULL;
";
try {
    $result = $db->query($sql, ["id" => $params["id"]])->affectedRows();
    redirectBack();
} catch (Exception $e) {
    dd($e);
}

