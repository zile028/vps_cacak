<?php
$db = \Core\App::resolve(\Core\Database::class);

$sql = "SELECT u.kategorija, u.* FROM udzbenici u ORDER BY FIELD (kategorija, 'udzbenik', 'monografija','katalozi')";
$result = $db->query($sql)->find(PDO::FETCH_GROUP);
\Core\Response::send($result);