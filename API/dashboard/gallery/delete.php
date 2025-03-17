<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$id = $params["id"];
$sql = "DELETE FROM gallery WHERE id = :id;
        DELETE FROM gallery_media WHERE galleryID = :id;";
try {
    $result = $db->query($sql, ["id" => $id]);
    redirect("/gallery");
} catch (Exception $e) {
    displayErrorPage($e);
}