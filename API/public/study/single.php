<?php
$db = \Core\App::resolve(\Core\Database::class);

$sql = "SELECT sp.naziv,sp.id, ns.title AS nivo,sp.opis,sp.espb,sp.polje,sp.akreditovan,sp.zvanje,sp.trajanje,sp. modul,sp.cilj,sp.ishod
        FROM studijski_programi sp
        JOIN nivo_studija ns ON ns.id = sp.nivoID
        WHERE sp.id = :id;
        ##SELECT PREDMETI
        SELECT p.*, m.storeName AS nastavniPlan, sp.semestar,sp.izborni AS obavezan_izborni
        FROM predmeti p
        JOIN sp_predmet sp ON sp.predmetID = p.id
        LEFT JOIN media m ON m.id = p.nastavniPlan
        WHERE sp.spID = :id AND p.lang = 'srb';";
$studije = $db->query($sql, $params)->findOne(PDO::FETCH_OBJ);
$predmeti = $db->nextRowsetFind(PDO::FETCH_OBJ);
view("public/studije_single.view", [
    "heroTitle" => $studije->naziv,
    "heroSubtitle" => $studije->modul,
    "heroImage" => $studije->espb . "_thumbnail.jpg",
    "studije" => $studije,
    "predmeti" => $predmeti
]);