<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validation;

$db = App::resolve(Database::class);
$validator = new Validation($_POST);

$validator->validate("title", "string", "Naziv nivoa je obavezan!");
$validator->validate("slug", "string", "Slug je obavezan!");
$validator->validate("slug", "nospace", "Slug nesme sadržati razmake!");
$validator->validate("lvl", "number", "Nivo je obavezan i mora biti ceo broj!", 1);
try {
    $sql = "INSERT INTO nivo_studija (title, description, image, slug, lang, lvl)
            VALUES (:title, :description, :image, :slug,:lang, :lvl);";
    if ($validator->hasError()) {
        Session::flash(ERRORS_FLASH, $validator->getListErrors());
    } else {
        $db->query($sql, $validator->getData());
    }
    redirectBack();
} catch (Exception $e) {
    displayErrorPage($e);
}

redirectBack();