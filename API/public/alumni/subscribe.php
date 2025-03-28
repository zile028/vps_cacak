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

try {

    if ($validator->hasError()) {
        Session::flash(ERRORS_FLASH, $validator->getErrors());
        Session::flash("inputs", $validator->getData());
    } else {
        $sql = "INSERT INTO alumni 
                    (firstName, lastName, nivoID, diplomirao, poslodavac, radnoMesto, email,jmbg)
                VALUES (:firstName, :lastName, :studyLevel, :diplomirao, :poslodavac, :radnoMesto, :email, :jmbg);";
        $db->query($sql, $validator->getData());
    }
    Session::flash(RESPONSE_FLASH, "Ваша пријава је успешна. Биће видљива након што је студентска служба верификује!");
    redirectBack();
} catch (Exception $e) {
    Session::flash(INPUTS_FLASH, $validator->getData());
    if ($e->getCode() == 23000) {
        Session::flash(ERROR_RESPONSE_FLASH, "Ваша пријава није успела, већ постоји кандидат са овим ЈМБГ-ом или E-mail-om!");
    } else {
        Session::flash(ERROR_RESPONSE_FLASH, $e->getMessage());
    }
    redirectBack();
}
