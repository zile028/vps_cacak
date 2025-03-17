<?php

$db = \Core\App::resolve(\Core\Database::class);
$id = $params["id"];
if ($id) {
    $sql = "SELECT v.*, m.storeName AS thumbnail
                FROM vesti v
                LEFT JOIN media m ON m.id = v.featured_imageID
                WHERE v.id = :id;
            SELECT m.*
                FROM media m 
                JOIN vest_media vm ON vm.mediaID = m.id
                WHERE vm.vestID = :id AND m.id != (SELECT featured_imageID FROM vesti WHERE id = :id )
";

    $lastNews = $db->query($sql, ["id" => $id], [PDO::PARAM_INT, PDO::PARAM_INT])->findOne();
    $attachment = $db->nextRowsetFind();
    \Core\Response::send(["vest" => $lastNews, "attachment" => $attachment]);
} else {
    \Core\Response::send(\Core\Response::NOT_FOUND);
}