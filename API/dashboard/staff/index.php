<?php
$db = \Core\App::resolve(\Core\Database::class);

$sql = "
    SELECT o.lang, o.* FROM odbori o ORDER BY o.prioritet
";


$odbori = $db->query($sql)->find(PDO::FETCH_GROUP);
view("dashboard//osoblje/index.view", ["odbori" => $odbori]);