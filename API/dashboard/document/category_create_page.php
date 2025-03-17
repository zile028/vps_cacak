<?php
$db = \Core\App::resolve(\Core\Database::class);

$sql = "
    SELECT k.lang, k.*,
           (SELECT COUNT(id) FROM dokumenta d WHERE d.category = k.id ) AS count
    FROM kategorije k 
    ORDER BY k.prioritet;
";

$kategorije = $db->query($sql)->find(PDO::FETCH_GROUP);
view("dashboard/dokumenta/kategorija_dodavanje.view", ["kategorije" => $kategorije]);