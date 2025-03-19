<?php
$db = \Core\App::resolve(\Core\Database::class);

$sql = "
    SELECT k.lang, k.*,
           (SELECT COUNT(id) FROM dokumenta d WHERE d.category = k.id ) AS count
    FROM kategorije k 
    WHERE k.parent IS NULL
    ORDER BY k.prioritet;

    SElECT k.parent, k.* ,
           (SELECT COUNT(id) FROM dokumenta d WHERE d.category = k.id ) AS count
    FROM kategorije k WHERE k.parent IS NOT NULL ORDER BY k.prioritet;

    SELECT k.*
    FROM kategorije k
    WHERE k.parent IS NULL
";
try {
    $kategorije = $db->query($sql)->find(PDO::FETCH_GROUP);
    $subcategory = $db->nextRowsetFind(PDO::FETCH_GROUP);
    $parentcategory = $db->nextRowsetFind();


    view("dashboard/dokumenta/kategorija_dodavanje.view",
        [
            "kategorije" => $kategorije,
            "parentcategory" => $parentcategory,
            "subcategory" => $subcategory
        ]);

} catch (Exception $e) {
    displayErrorPage($e);
}
