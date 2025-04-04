<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validation;

$db = App::resolve(Database::class);
$validator = new Validation($_POST);

$validator->validate("firstName", "string", "Име је обавезно, мора садржати најмање 3 слова!", 3);
$validator->validate("lastName", "string", "Презиме је обавезно, мора садржати најмање 3 слова!", 3);
$validator->validate("poslodavac", "string", "Нзив послодавца је обавезан!");
$validator->validate("radnoMesto", "string", "Радно место је обавезно, мора садржати најмање 3 слова!", 3);
$validator->validate("email", "string", "Email је обавезан!");
$validator->validate("email", "email", "Email није исправан.");
$validator->validate("jmbg", "string", "ЈМБГ мора садржати 13 цифара.", 13, 13);
$validator->validate("jmbg", "jmbg", "ЈМБГ није валидан.");
$validator->validate("diplomirao", "number", "Година дипломирања је обавезна или није валидна.", 1999, 9999);
$validator->appendData("active", isset($_POST["active"]) ? 1 : 0);
$validator->appendData("id", $params["id"]);
try {
    if ($validator->hasError()) {
        Session::flash(ERRORS_FLASH, $validator->getErrors());
        Session::flash(INPUTS_FLASH, $validator->getData());
    } else {
        $sql = "UPDATE alumni SET 
                  firstName = :firstName,
                  lastName = :lastName,
                  poslodavac = :poslodavac,
                  radnoMesto = :radnoMesto,
                  email = :email,
                  jmbg = :jmbg,
                  diplomirao = :diplomirao,
                  active = :active,
                  nivoID=:studyLevel
              WHERE id = :id; 
        ";
        $db->query($sql, $validator->getData());
    }
    redirectBack();
} catch (Exception $e) {
    displayErrorPage($e);
}