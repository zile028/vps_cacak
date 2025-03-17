<?php

use Core\App;
use Core\Database;
use Core\FileValidator;
use Core\Validator;

extract($_POST);
$data = $_POST;
unset($data["spID"]);
$error = [];
if (!Validator::string($predmet)) {
    $error["predmet"] = "Назив предмете је обавезан!";
}
if (!Validator::string($sifra)) {
    $error["sifra"] = "Шифра предмета је обавезна!";
}

if (!Validator::string($espb)) {
    $error["espb"] = "Број ЕСПБ је обавезан!";
}
if ($_FILES["nastavniPlan"]["size"] > 0) {
    $file = new FileValidator($_FILES["nastavniPlan"]);
    $file->setValidType(["pdf"]);
    $file->setLimit(20, "mb");
    if ($file->isValid() && $file->upload()) {
        $data["nastavniPlan"] = $file->storeName;
    } else {
        $data["nastavniPlan"] = null;
    }
} else {
    $data["nastavniPlan"] = null;
}

if (count($error) === 0) {

    $db = App::resolve(Database::class);
    $sqlPredmet = "INSERT INTO predmeti (predmet, sifra, predavanja, vezbe, espb, nastavniPlan, lang) 
                VALUES (:predmet, :sifra, :predavanje, :vezbe, :espb, :nastavniPlan,:lang)";
    $predmetID = $db->query($sqlPredmet, $data)->lastID();
//    $sqlPredmetSP = "INSERT INTO sp_predmet (spID, predmetID) VALUES (:spID, :predmetID)";

    redirect("/study/course/add");
} else {
    view("dashboard/studije/predmet_create.view");
}