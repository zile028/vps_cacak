<?php

use Core\App;
use Core\Database;
use Core\Router;
use Core\Session;

$id = $params["id"];
$db = App::resolve(Database::class);
$sql = "
        SELECT * FROM gallery WHERE id = :id;
        SELECT gm.*, m.fileName, m.storeName
            FROM gallery_media gm
            JOIN media m ON gm.mediaID = m.id
            WHERE gm.galleryID = :id
            ORDER BY gm.position;

";
if (isset($_POST["selected"]) || Session::has("selected")) {
    $selected = $_POST["selected"] ?? Session::get("selected");
    $selectedImage = implode(",", json_decode($selected, true));
    $sql .= "SELECT * FROM media WHERE id IN ({$selectedImage});";
}

if (Router::isMethod("post")) {
    Session::flash(MEDIA_FLASH, [...$_POST, "cb" => "/gallery/$id"]);
    redirect("/media");
}

$gallery = $db->query($sql, ["id" => $id])->findOne();
$galleryMedia = $db->nextRowsetFind();
$media = $db->nextRowsetFind();
view("dashboard/gallery/preview.view", [
    "lang" => ["srb", "en"],
    "galleryMedia" => $galleryMedia,
    "gallery" => $gallery,
    "media" => $media
]);
Session::unflash();