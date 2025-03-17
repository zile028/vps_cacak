<?php
$id = $params["id"];
$oldImage = $_POST["storeName"];
$db = \Core\App::resolve(\Core\Database::class);
$sql = "DELETE FROM media WHERE id = :id";
//TODO provera da li se negde vec koristi, napraviti posebnu stranicu za delete ili mozda iskoristiti edit.view
if (file_exists(UPLOAD_DIR . $oldImage) && unlink(UPLOAD_DIR . $oldImage)) {
    $db->query($sql, ["id" => $id]);
}
redirect(referer());