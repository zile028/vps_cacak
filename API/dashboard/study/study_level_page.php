<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sql = "
    SELECT ns.lang, ns.* , m.storeName AS thumbnail
    FROM nivo_studija ns
    LEFT JOIN media m ON m.id = ns.image;
SELECT * FROM media m WHERE m.mimetype LIKE '%image%';
    
    ;
";
$nivoiStudija = $db->query($sql)->find(PDO::FETCH_GROUP);
$images = $db->nextRowsetFind();
view("dashboard/studije/nivo_studija.view", ["nivoiStudija" => $nivoiStudija, "images" => $images]);