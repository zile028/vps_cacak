<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve(Database::class);

$sql = "SELECT g.* 
            FROM gallery g
            WHERE g.lang = :lang;
        SELECT gm.galleryID, gm.* , m.fileName, m.storeName
            FROM gallery_media gm
            JOIN media m ON m.id = gm.mediaID
";
$gallery = $db->query($sql, ["lang" => $params["lang"]])->find();
$images = $db->nextRowsetFind(PDO::FETCH_GROUP);
$gallery = array_map(function ($item) use ($images) {
    $item->images = $images[$item->id];
    return $item;
}, $gallery);

Response::send($gallery);