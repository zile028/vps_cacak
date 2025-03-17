<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$id = $params["id"];

$sql = "UPDATE predmeti SET 
        predmet = :predmet,
        predavanja = :predavanja,
        sifra = :sifra,
        espb = :espb,
        vezbe = :vezbe,
        lang = :lang
        WHERE id = :id;";
$data = $_POST;
unset($data["_method"]);
$data["id"] = $id;
try {
    $db->query($sql, $data);
    redirect("/study/course");
} catch (Exception $e) {
    displayErrorPage($e);
}
