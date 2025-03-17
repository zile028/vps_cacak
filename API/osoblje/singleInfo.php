<?php
$db = \Core\App::resolve(\Core\Database::class);
$sql = "SELECT o.* , m.storeName AS image
            FROM osoblje o 
            JOIN media m ON m.id = o.imageID
            WHERE o.id = :id;
        SELECT * FROM obrazovanje_osoblje WHERE osobljeID = :id ORDER BY godina DESC;";
$osoblje = $db->query($sql, $params)->findOne();
$osoblje->obrazovanje = $db->nextRowsetFind();
\Core\Response::send($osoblje);
