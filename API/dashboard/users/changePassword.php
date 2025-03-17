<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validation;


$db = App::resolve(Database::class);
$validation = new Validation($_POST);

$validation->validate("oldPassword", "string", "Stara lozinka je obavezna!");
$validation->validate("newPassword", "string", "Nova lozinka je obavezna!");
$validation->validate("newPassword", "password", null,
    [
        "special" => false,
        "lowercase" => false,
        "uppercase" => false
    ]);
$validation->validate("newPassword", "compare", "Nova lozinka se ne poklapa sa ponovljenom!",
    $_POST["repeatPassword"]);

if (!$validation->hasError()) {

    $sql = "SELECT password FROM users WHERE id = :id";
    $oldPassword = $db->query($sql, ["id" => getUser("id")])->findOne(PDO::FETCH_COLUMN);
    if (password_verify($_POST["oldPassword"], $oldPassword)) {
        $sql = "UPDATE users SET password = :password WHERE id = :id";
        $result = $db->query($sql, [
            "password" => password_hash($_POST["newPassword"], PASSWORD_BCRYPT),
            "id" => getUser("id")
        ])->affectedRows();
        if ($result === 0) {
            Session::flash(ERRORS_FLASH, ["password" => ["Lozinka nije promenjena!"]]);
        }
    } else {
        Session::flash(ERRORS_FLASH, ["password" => ["Netačna stara lozinka!"]]);
    };

} else {
    Session::flash(ERRORS_FLASH, ["password" => $validation->getErrors(true)]);
}
redirectBack();
