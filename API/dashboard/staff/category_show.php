<?php
$db = \Core\App::resolve(\Core\Database::class);
$sql = "
    SELECT * FROM odbori WHERE id = :id;

    SELECT op.pozicija, os.id,oo.id,
           oo.osobljeID, oo.pozicija, oo.prioritet, os.rank,
           CONCAT(os.firstName, ' ' ,os.lastName) AS fullName , os.title, os.imageID, m.storeName AS image
        FROM odbori o
        JOIN osoblje_odbor oo ON oo.odborID = o.id
        JOIN odbor_pozicija op ON op.id = oo.pozicija
        JOIN osoblje os ON os.id = oo.osobljeID
        JOIN media m ON m.id = os.imageID
        WHERE o.id = :id
        ORDER BY oo.prioritet;

    SELECT o.* 
        FROM osoblje o
        WHERE 
            o.id NOT IN (SELECT oo.osobljeID FROM osoblje_odbor oo WHERE oo.odborID = :id ) 
        AND
            o.lang = (SELECT o.lang FROM odbori o WHERE o.id = :id);

    SELECT id,pozicija FROM odbor_pozicija WHERE odborID = :id ORDER BY prioritet
";

$odbor = $db->query($sql, ["id" => $params["id"]])->findOne();
$clanovi = $db->nextRowsetFind(PDO::FETCH_GROUP);
$osoblje = $db->nextRowsetFind();
$pozicije = $db->nextRowsetFind();

view("dashboard/osoblje/osoblje_odbor.view", ["odbor" => $odbor, "clanovi" => $clanovi, "osoblje" => $osoblje, "pozicije" => $pozicije]);