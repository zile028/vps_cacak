<?php

use Core\App;
use Core\Database;
use Core\Validation;

try {
    $db = App::resolve(Database::class);
    $validate = new Validation($_POST);
    $validate->appendData("id", $params["id"]);
    $validate->validate("lang", "contine", ["srb", "en"]);
    $validate->validate("title", "string", "Naziv galerije je obavezan", 1, 255);
    $validate->validate("slug", "nospace", "Slug nije validan, ne sme imati razmak.", 0, 255);
    if ($validate->hasError()) {
        Session::flash("error", $validate->getListErrors());
    } else {
        $sql = "UPDATE gallery SET 
            lang=:lang,
            slug=:slug,
            title=:title
        WHERE id=:id";

        $result = $db->query($sql, $validate->getData())->affectedRows();
    }
    redirectBack();
} catch (Exception $e) {
    displayErrorPage($e);
}