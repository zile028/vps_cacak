<?php
$id = $params["id"];
$db = \Core\App::resolve(\Core\Database::class);
$sql = "
SELECT d.* , pd.title AS parent, m.storeName, m.fileName,
       (SELECT COUNT(id) FROM dokumenta childe WHERE childe.parentID = d.id) AS haveChilde,
       IF(d.parentID = 0, d.id,d.parentID) as flag
        FROM dokumenta d
        LEFT JOIN dokumenta pd ON pd.id = d.parentID
        JOIN media m ON m.id = d.attachment
        WHERE d.category = :id
        ORDER BY d.category, flag, d.createdAt
;

SELECT id,category FROM kategorije WHERE id = :id;

SELECT m.type, m.* 
    FROM media m 
    WHERE m.type IN ('pdf', 'doc','docx') 
    ORDER BY m.fileName;

SELECT id, title, createdAt FROM dokumenta WHERE parentID = 0 AND category = :id;

SELECT k.* FROM kategorije k WHERE k.parent = :id; ;
";

$dokumenta = $db->query($sql, ["id" => $id])->find();
$kategorija = $db->nextRowsetFindOne();
$media = $db->nextRowsetFind(PDO::FETCH_GROUP);
$povezan = $db->nextRowsetFind();
$subcategory = $db->nextRowsetFind();

view("dashboard/dokumenta/kategorija_dokumenta.view",
    [
        "dokumenta" => $dokumenta,
        "kategorija" => $kategorija,
        "media" => $media,
        "povezan" => $povezan,
        "subcategory" => $subcategory

    ]);