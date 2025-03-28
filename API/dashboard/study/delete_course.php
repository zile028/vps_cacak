<?php
$db = \Core\App::resolve(\Core\Database::class);

$sql = "DELETE FROM predmeti WHERE id = :id";
$result = $db->query($sql, $params)->affectedRows();
redirect("/dashboard/study/course");