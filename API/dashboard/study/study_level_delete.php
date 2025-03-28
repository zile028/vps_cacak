<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validation;

$db = App::resolve(Database::class);
$id = $params["id"];
try {
    $sql = "SELECT COUNT(sp.id) FROM studijski_programi sp WHERE sp.nivoID = :id;";
    $count = $db->query($sql, ["id" => $id])->findOne(PDO::FETCH_COLUMN);
    if ($count > 0) {
        Session::flash(ERRORS_FLASH, ["Nije moguće obrisati nivo studija jer mu je dodeljen studijski program."]);
    } else {
        $sql = "DELETE FROM nivo_studija WHERE id = :id;";
        $db->query($sql, ["id" => $id]);
    }
    redirectBack();
} catch (Exception $e) {
    displayErrorPage($e);
}