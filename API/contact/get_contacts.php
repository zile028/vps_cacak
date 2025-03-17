<?php

use Core\App;
use Core\Database;
use Core\Response;

try {
    $db = App::resolve(Database::class);
    $lang = $params["lang"] ?? "srb";
    $sql = "SELECT * FROM kontakt WHERE lang = :lang ORDER BY position";
    $emails = $db->query($sql, ["lang" => $lang])->find();
    Response::send($emails);
} catch (Exception $e) {
    Response::status(Response::SERVER_ERROR)::send($e->getMessage());
}
