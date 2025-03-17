<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);
$sqlMedia = "SELECT * FROM media WHERE id = :id;";
$image = "";
switch (true) {
    case isset($_POST['submit']) && $_POST['submit'] === 'image':
        Session::flash(MEDIA_FLASH, ["cb" => "/users/profile"]);
        redirect('/media');
        break;
    case isset($_POST['selected']):
        $selected = json_decode($_POST['selected'], true);
        if (is_array($selected)) {
            $id = $selected[0] ?? null;
            $image = $db->query($sqlMedia, ["id" => $id])->findOne();
        }
        break;
    default:
        break;
}

try {
    $sql = "SELECT * FROM users WHERE id = :id";
    $user = $db->query($sql, ["id" => getUser("id")])->findOne();
    view("dashboard/users\profile.view", ["user" => $user, "image" => $image->storeName ?? null]);
} catch (Exception $e) {
    displayErrorPage($e);
}
Session::unflash();


