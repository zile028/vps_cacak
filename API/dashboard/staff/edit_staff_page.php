<?php
$db = \Core\App::resolve(\Core\Database::class);
$id = $params["id"];
$sql = "
        SELECT o.* , m.storeName AS image
            FROM osoblje o
            JOIN media m ON m.id = o.imageID
            WHERE o.id=:id;
        SELECT * FROM media WHERE mimetype LIKE '%image%' ORDER BY fileName;
        SELECT * FROM media WHERE mimetype LIKE '%pdf%' ORDER BY fileName;

";
$osoba = $db->query($sql, ["id" => $id])->findOne();
$media = $db->nextRowsetFind();
$curriculum = $db->nextRowsetFind();

view("dashboard/osoblje/osoblje_single.view", ["osoba" => $osoba, "media" => $media, "curriculum" => $curriculum]);