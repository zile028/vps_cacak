<?php
$db = \Core\App::resolve(\Core\Database::class);
$data = [
    "lang" => $params["lang"],
    "kategorijaID" => (int)$params["id"]
];
$sql = "
    SELECT ns.title, sp.id, ns.title as  nivo, naziv, modul
    FROM studijski_programi sp
    JOIN nivo_studija ns ON ns.id = sp.nivoID
    WHERE sp.lang = :lang;

    SELECT type, media.* FROM media WHERE type IN ('pdf', 'doc','docx') ORDER BY fileName;

    SELECT r.active, r.*, m.id AS mediaID, m.fileName, m.storeName,
           m.type, m.createdAt, sp.naziv,ns.title AS nivo, sp.modul,
            gs.godina AS godina
        FROM raspored r
        JOIN media m ON m.id = r.mediaID
        JOIN studijski_programi sp ON sp.id = r.spID 
        JOIN nivo_studija ns ON ns.id = sp.nivoID
        JOIN godina_studija gs ON gs.id = r.godina
        WHERE r.kategorija = :kategorijaID
        ORDER BY r.active DESC;

    SELECT * FROM godina_studija WHERE lang = :lang;
    
    SELECT * FROM raspored_kategorija WHERE id =:kategorijaID;
";

$studije = $db->query($sql, $data)->find(PDO::FETCH_GROUP);
$media = $db->nextRowsetFind(PDO::FETCH_GROUP);
$rasporedi = $db->nextRowsetFind(PDO::FETCH_GROUP);
$godine = $db->nextRowsetFind();
$kategorija = $db->nextRowsetFindOne();
//dd($rasporedi);
if ($kategorija->slug === "work") {
    view("dashboard/raspored/plan_rada.view", ["media" => $media, "kategorija" => $kategorija]);
} else {
    view("dashboard/raspored/predavanja.view", ["studije" => $studije, "media" => $media, "rasporedi" => $rasporedi, "lang" => $data["lang"], "godine" => $godine, "kategorija" => $kategorija]);
}
