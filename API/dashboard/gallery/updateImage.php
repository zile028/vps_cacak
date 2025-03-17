<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);
[$action, $mediaID, $index] = explode("_", $_POST["submit"]);

function deleteImage($db, $galleryID, $mediaID)
{
    $sql = "DELETE FROM gallery_media WHERE mediaID = :mediaID AND galleryID = :galleryID;";
    $result = $db->query($sql, ["mediaID" => $mediaID, "galleryID" => $galleryID])->affectedRows();
    if ($result < 1) {
        Session::flash("error", ["Slika nije uspešno obrisana!"]);
    }
    redirectBack();
}

function updateImage($db, $galleryID, $index, $mediaID): void
{
    $sql = "UPDATE gallery_media 
            SET caption = :caption, position = :position 
            WHERE mediaID = :mediaID AND galleryID = :galleryID;";
    $result = $db->query($sql, [
        "caption" => $_POST["caption"][$index],
        "position" => $_POST["position"][$index],
        "mediaID" => $_POST["images"][$index],
        "galleryID" => $galleryID
    ])->affectedRows();
    if ($result > 0) {
        redirectBack("image" . $mediaID);
    } else {
        Session::flash("error", ["Promena nije informacija slike nije uspešna!"]);
        redirectBack();
    }
}

switch ($action) {
    case "update":
        updateImage($db, $params["id"], $index, $mediaID);
        break;
    case "remove":
        deleteImage($db, $params["id"], $mediaID);
        break;
    default:
        redirectBack();
}