<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sql = "
    SELECT g.lang, g.* , (SELECT COUNT(*) FROM gallery_media gm WHERE gm.galleryID = g.id) AS count
        FROM gallery g
";
$galleries = $db->query($sql)->find(PDO::FETCH_GROUP);

view("dashboard/gallery/index.view", ["galleries" => $galleries]);