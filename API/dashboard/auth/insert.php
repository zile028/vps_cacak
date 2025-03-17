<?php

use Core\App;
use Core\Validator;

$db = App::resolve(Core\Database::class);
extract($_POST);
$errors = [];

if (!Validator::string($firstName)) {
    $errors["firstName"] = "Ime je obavezno";
}

if (!Validator::string($lastName)) {
    $errors["lastName"] = "Ime je obavezno";
}

if (!Validator::email($email)) {
    $errors["email"] = "Neispravna e-mail adresa!";
}
if (!Validator::string($password, 5, 12)) {
    $errors["password"] = "Nesipravan pasvord, mora sadržati između 5 i 12 karaktera!";
}

if (!Validator::compareValue($password, $confirmPassword)) {
    $errors["confirmPassword"] = "Pasvordi se ne podudaraju!";
}

if (count($errors) === 0) {
    $db->query("INSERT INTO users (firstName, lastName, email, password) VALUES (:firstName, :lastName, :email, :password)", [
        "firstName" => $firstName,
        "lastName" => $lastName,
        "email" => $email,
        "password" => password_hash($_POST["password"], PASSWORD_BCRYPT)
    ]);
    redirect("/login");
} else {
    view("dashboard/register", ["heading" => "Register", ...$_POST, "errors" => $errors]);
}