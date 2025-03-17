<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$id = $params["id"];

$sql = "SELECT id, predmet, sifra, predavanja, vezbe, espb, lang, nastavniPlan FROM predmeti WHERE id = :id";
$predmet = $db->query($sql, ["id" => $id])->findOne();
view("dashboard/studije/predmet_edit.view", ["predmet" => $predmet]);