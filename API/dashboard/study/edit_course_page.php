<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$id = $params["id"];

$sql = "
    SELECT id, predmet, sifra, predavanja, vezbe, espb, lang, nastavniPlan FROM predmeti WHERE id = :id;
    SELECT * FROM media WHERE mimetype LIKE '%pdf%';
";
$predmet = $db->query($sql, ["id" => $id])->findOne();
$nastavniPlanovi = $db->nextRowsetFind();
view("dashboard/studije/predmet_edit.view", ["predmet" => $predmet, "nastavniPlanovi" => $nastavniPlanovi]);