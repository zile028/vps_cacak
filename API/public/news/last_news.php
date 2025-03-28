<?php
$db = \Core\App::resolve(\Core\Database::class);

$sql = "SELECT v.id,v.naslov,v.createdAt, v.description, m.fileName,m.storeName 
            FROM vesti v
            LEFT JOIN media m ON m.id = v.featured_imageID
            WHERE v.active= true AND v.lang='srb'
            ORDER BY v.createdAt DESC
            LIMIT 4";
$najnovije = $db->query($sql)->find(PDO::FETCH_OBJ);