<?php

use Core\Response;

$slug = $params["slug"];
$db = \Core\App::resolve(\Core\Database::class);
$sql = "
        SELECT ns.title AS nivo,ns.id AS nivoID, r.*, gs.id AS godina , gs.godina AS godinaStudija ,m.storeName, m.fileName, sp.naziv AS studijskiProgram
            FROM raspored_kategorija rk
            JOIN raspored r ON r.kategorija = rk.id
            JOIN media m ON m.id = r.mediaID
            JOIN studijski_programi sp ON sp.id = r.spID
            JOIN nivo_studija ns ON ns.id = sp.nivoID
            JOIN godina_studija gs ON gs.id = r.godina
        WHERE rk.slug = :slug AND rk.lang = 'srb'
        ORDER BY ns.lvl, gs.id ;

        SELECT kategorija FROM raspored_kategorija WHERE slug = :slug AND lang= 'srb';";

$raspored = $db->query($sql, ["slug" => $slug])->find();
$title = $db->nextRowsetFindOne(PDO::FETCH_COLUMN);
Response::send(["schedule" => empty($raspored) ? null : $raspored, "title" => $title]);
