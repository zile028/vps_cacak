<?php
$db = \Core\App::resolve(\Core\Database::class);
$sql = "SELECT spp.godina , p.*, spp.izborni,spp.semestar,spp.redniBroj
        FROM sp_predmet spp
        JOIN predmeti p ON p.id = spp.predmetID
        WHERE spp.spID = :id
        
        ";

$predmeti = $db->query($sql, ["id" => $params["id"]])->find(PDO::FETCH_GROUP);
\Core\Response::send($db->affectedRows() > 0 ? $predmeti : false);