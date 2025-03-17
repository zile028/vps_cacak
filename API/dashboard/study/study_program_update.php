<?php

$db = \Core\App::resolve(\Core\Database::class);
$data = $_POST;
unset($data["_method"]);
$data["id"] = $params["id"];
$sql = "
    UPDATE studijski_programi SET 
    naziv = :naziv,
    modul = :modul,
    zvanje = :zvanje,
    nivoID = :nivoID,
    akreditovan = :akreditovan,
    opis = :opis,
    trajanje = :trajanje,
    espb = :espb,
    polje = :polje,
    cilj = :cilj,
    ishod = :ishod
    WHERE id = :id;";
$result = $db->query($sql, $data)->affectedRows();
redirectBack();
