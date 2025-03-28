<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sql = "
    SELECT odbor FROM odbori WHERE slug = :slug AND lang = 'srb';

    SELECT op.pozicija, os.firstName,os.lastName, m.storeName AS image,os.rank, os.title, os.email, os.id
    FROM odbori o
    JOIN odbor_pozicija op ON op.odborID = o.id
    JOIN osoblje_odbor oo ON oo.pozicija = op.id
    JOIN osoblje os ON os.id = oo.osobljeID
        JOIN media m ON m.id = os.imageID
    WHERE o.slug = :slug
    ORDER BY oo.prioritet, op.prioritet;
    ;
";

$odbor = $db->query($sql, $params)->findOne(PDO::FETCH_OBJ);
$osoblje = $db->nextRowsetFind(PDO::FETCH_OBJ | PDO::FETCH_GROUP);
view("public/odbor.view", [
    "heroImage" => "hero_odbor.jpg",
    "heroTitle" => $odbor->odbor,
    "odbor" => $osoblje
]);