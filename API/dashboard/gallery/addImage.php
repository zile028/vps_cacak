<?php

use Core\App;
use Core\Database;
use Core\Session;

$id = $params["id"];
$submit = $_POST["submit"];
$db = App::resolve(Database::class);
switch (true) {
    case $submit === "mediaSelect":
        Session::flash(MEDIA_FLASH, [...$_POST, "cb" => "/gallery/$id"]);
        redirect("/media");
        break;
    case str_contains($submit, "remove"):
        $id = explode("_", $submit)[1];
        $index = array_search($id, $_POST["images"]);
        $data = $_POST;
        array_splice($data["images"], $index, 1);
        array_splice($data["caption"], $index, 1);
        Session::flash("selected", json_encode($data["images"]));
        Session::flash(INPUTS_FLASH, $data);
        redirect("/gallery/$id");
        break;
    case $submit === "save":
        [$insertData, $insertPlaceholders] = prepareData($_POST, $id);
        $sql = "";
        if (count($insertData) > 0) {
            $sql = "INSERT INTO gallery_media (mediaID, galleryID, caption, position) VALUES $insertPlaceholders;";
        }
        $result = $db->query($sql, $insertData)->affectedRows();
        if ($result <= 0) {
            Session::flash("error", ["Slike nisu uspešno dodate!"]);
        }
        redirect("/gallery/$id");
        break;
    default:
        dd("DEFAULT");
        break;
}

function prepareData($data, $galleryID)
{

    $placeholders = [];
    $insertData = array_map(function ($img, $caption, $position, $index) use (&$placeholders, $galleryID) {
        $placeholders[] = "(:mediaID{$index}, :galleryID{$index}, :caption{$index}, :position{$index})";
        return [
            "galleryID{$index}" => $galleryID,
            "caption{$index}" => $caption,
            "position{$index}" => $position,
            "mediaID{$index}" => $img
        ];
    }, $data["images"] ?? [], $data["caption"] ?? [], $data["position"] ?? [], array_keys($data["images"] ?? []));

    $insertData = array_merge(...$insertData);
    $placeholders = implode(", ", $placeholders);

    return [$insertData, $placeholders];
}
