<?php
$db = \Core\App::resolve(\Core\Database::class);
$sql = "
        SELECT o.lang, o.* , m.storeName AS image
        FROM osoblje o 
        JOIN media m ON m.id = o.imageID
        ORDER BY FIELD(o.lang, 'srb','en'), firstName, lastName
        ";

$osoblje = $db->query($sql)->find(PDO::FETCH_GROUP);
view("dashboard/osoblje/osoblje_svi.view", ["osoblje" => $osoblje]);