<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validation;

Session::unflash();
$db = App::resolve(Database::class);

$sql = "INSERT INTO gallery (title, slug, lang) VALUES (:title, :slug, :lang);";

try {
    $validate = new Validation($_POST);
    $validate->validate("title", "string", "Naziv galerije je obavezan", 1, 255);
    $validate->validate("slug", "nospace", "Slug nije validan, ne sme imati razmak.", 0, 255);
    if ($validate->hasError()) {
        Session::flash(ERRORS_FLASH, $validate->getListErrors());
    } else {
        $db->query($sql, $validate->getData());
    }
    redirectBack();
} catch (Exception $e) {
    displayErrorPage($e);
}
