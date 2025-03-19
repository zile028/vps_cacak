<?php
$db = \Core\App::resolve(\Core\Database::class);
$sql = "
    SELECT k.lang, k.*,
    (SELECT COUNT(id) FROM dokumenta d WHERE d.category = k.id) AS docCount
    FROM kategorije k 
    WHERE k.parent IS NULL
    ORDER BY k.prioritet;
SELECT d.attachment FROM dokumenta d;
";

$kategorije = $db->query($sql)->find(PDO::FETCH_GROUP);
$dokumenta = $db->nextRowsetFind(PDO::FETCH_COLUMN);

view("dashboard/dokumenta/index.view", ["kategorije" => $kategorije]);