<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sql = "
        SELECT o.lang, o.* , m.storeName AS image, mcv.storeName AS cv
        FROM osoblje o 
        JOIN media m ON m.id = o.imageID
        LEFT JOIN media mcv on mcv.id = o.cv
        ORDER BY FIELD(o.lang, 'srb','en'), firstName, lastName;
        ";

$osoblje = $db->query($sql)->find(PDO::FETCH_GROUP);
view("dashboard/osoblje/osoblje_svi.view", ["osoblje" => $osoblje]);