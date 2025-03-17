<?php
$db = \Core\App::resolve(\Core\Database::class);
$lang = $_GET["lang"];

$sql = "SELECT op.pozicija AS pozicija, o.*,op.pozicija, m.storeName AS image
        FROM odbori od
            JOIN osoblje_odbor oo ON oo.odborID = od.id
        JOIN osoblje o ON o.id = oo.osobljeID
        JOIN media m ON m.id = o.imageID
        JOIN odbor_pozicija op ON op.id = oo.pozicija
        WHERE od.slug = :odbor AND od.lang = :lang
        ORDER BY oo.prioritet;

SELECT op.pozicija, MAX(op.prioritet) AS maksimalni_prioritet
FROM odbori o
    JOIN osoblje_odbor oo ON oo.odborID = o.id
    JOIN odbor_pozicija op ON op.id = oo.pozicija
WHERE o.slug = :odbor AND o.lang = :lang    
GROUP BY op.pozicija
ORDER BY maksimalni_prioritet;


        ";

$osoblje = $db->query($sql, ["odbor" => $params["slug"], "lang" => $lang])->find(PDO::FETCH_GROUP);
$kategorije = $db->nextRowsetFind(PDO::FETCH_COLUMN);

\Core\Response::send(["osoblje" => $osoblje, "kategorije" => $kategorije]);