<?php
$db = \Core\App::resolve(\Core\Database::class);
$sql = "SELECT v.*,m.storeName, CONCAT(u.firstName,' ', u.lastName) AS autor 
            FROM vesti v
            LEFT JOIN media m ON m.id = v.featured_imageID
            JOIN users u ON u.id = v.userID
            WHERE v.id = :id;
        SELECT  CASE
                    WHEN m.mimetype LIKE 'image/%' THEN 'image'
                    ELSE 'document'
                END AS fileType, m.*
            FROM media m
            JOIN vest_media vm ON vm.mediaID = m.id
            WHERE vm.vestID = :id
            ORDER BY FIELD(fileType,'document','image')
        ;
";
$vest = $db->query($sql, ["id" => $params["id"]])->findOne(PDO::FETCH_OBJ);
$media = $db->nextRowsetFind(PDO::FETCH_OBJ | PDO::FETCH_GROUP);
$heroImage = "vest_avatar.png";
if (isset($vest->storeName) && !empty($vest->storeName)) {
    $heroImage = $vest->storeName;
}
view("public/vest_single.view", [
    "heroImage" => $heroImage,
    "heroTitle" => $vest->naslov,
    "vest" => $vest,
    "media" => $media
]);