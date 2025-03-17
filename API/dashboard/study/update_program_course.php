<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$data = [
    "redniBroj" => $_POST["order"],
    "spID" => $params["programID"],
    "predmetID" => $params["courseID"]
];
$sql = "UPDATE sp_predmet SET redniBroj = :redniBroj WHERE spID = :spID AND predmetID = :predmetID";
try {
    $result = $db->query($sql, $data)->affectedRows();
    redirectBack();
} catch (Exception $e) {
    displayErrorPage($e);
}

