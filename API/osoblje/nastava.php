<?php
$db = \Core\App::resolve(\Core\Database::class);

$sql = "SELECT oo.pozicija, o.*, m.storeName AS image
        FROM odbori od
            JOIN osoblje_odbor oo ON oo.odborID = od.id
        JOIN osoblje o ON o.id = oo.osobljeID
        JOIN media m ON m.id = o.imageID
        WHERE od.slug =:odbor;

        SELECT oo.pozicija
        FROM odbori o
        JOIN osoblje_odbor oo ON oo.odborID = o.id
        WHERE o.slug = :odbor
        GROUP BY oo.pozicija, o.prioritet
        ORDER BY o.prioritet
        
        ;
        ";
$osoblje = $db->query($sql, ["odbor" => "nastavno_osoblje"])->find(PDO::FETCH_GROUP);
$kategorije = $db->nextRowsetFind(PDO::FETCH_COLUMN);

\Core\Response::send(["osoblje" => $osoblje, "kategorije" => $kategorije]);