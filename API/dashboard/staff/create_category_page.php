<?php

$db = \Core\App::resolve(\Core\Database::class);

$sql = "
    SELECT o.lang, o.id, o.odbor, o.prioritet, o.lang, o.slug, 
           (SELECT COUNT(op.id) FROM odbor_pozicija op WHERE op.odborID = o.id ) AS pozicije
        FROM odbori o 
        ORDER BY o.prioritet;
";


$odbori = $db->query($sql)->find(PDO::FETCH_GROUP);
view("dashboard/osoblje/create_odbor.view", ["odbori" => $odbori]);