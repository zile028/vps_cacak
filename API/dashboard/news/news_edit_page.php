<?php
$db = \Core\App::resolve(\Core\Database::class);
$id = $params["id"];
$error = [];
$media = [];

$sql = "
        SELECT v.* ,m.storeName AS featuredImage
        FROM vesti v
        JOIN media m ON m.id = v.featured_imageID 
        WHERE v.id = :id;
        SELECT * FROM media WHERE mimetype LIKE '%image%' AND fileName != '' ORDER BY fileName;
";
$search = "%" . $id . "%";
$vest = $db->query($sql, ["id" => $id])->findOne();
$media = $db->nextRowsetFind();
//$vestSrb = $vest["srb"][0] ?? false;
//$vestEn = $vest["en"][0] ?? false;
$featured_image["id"] = $vest->featured_imageID;
$featured_image["storeName"] = $vest->featuredImage;
view("dashboard/vesti/edit_page.view",
    ["error" => $error, "media" => $media, "canAtachFile" => false, "vest" => $vest, "featured_image" => $featured_image]);