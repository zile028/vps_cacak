<?php

use Core\App;
use Core\Authenticator;
use Core\Validator;

$db = App::resolve(Core\Database::class);
extract($_POST);
$errors = [];
if (!Validator::email($email)) {
    $errors["email"] = "Neispravna e-mail adresa!";
}
if (!Validator::string($password, 5, 12)) {
    $errors["password"] = "Nesipravan pasvord, mora sadržati između 5 i 12 karaktera!";
}

if (count($errors) === 0) {
    $authenticator = new Authenticator();
    if ($authenticator->atempt($email, $password)) {
        redirect("/dashboard");
        return;
    }
    redirect("/dashboard/login");
} else {
    view("/dashboard/register", ["heading" => "Register", ...$_POST, "errors" => $errors]);
}