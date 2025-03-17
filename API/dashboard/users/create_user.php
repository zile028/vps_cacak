<?php

use Core\Mailer;

$db = \Core\App::resolve(\Core\Database::class);
$roles = \Core\Middleware\Middleware::getRoles();
$beURI = BE_PRODUCTION_URI;
$sql = "INSERT INTO users
            (firstName, lastName, email, password, role)
        VALUES 
            (:firstName, :lastName, :email, :password, :role)";
$password = generatePassword(8);
$hashPassword = password_hash($password, PASSWORD_BCRYPT);
$data = [
    "firstName" => $_POST["firstName"],
    "lastName" => $_POST["lastName"],
    "email" => $_POST["email"],
    "password" => $hashPassword,
    "role" => $_POST["role"]
];

try {
    $result = $db->query($sql, $data)->affectedRows();
    $mailer = new Mailer();
    $mailer->setTemplate($mailer::CREATE_USER_TEMPLATE, [...$data, "password" => $password]);

    if ($result > 0) {
        try {
            $result = $mailer->sendMail($data["email"], "Account create", $mailer->template);
            redirect("/users");
        } catch (Exception $e) {
            $error = $e->getMessage();
            view("dashboard/users/create.view", ["roles" => $roles, "data" => $data, "error" => $error]);
        }
    } else {
        view("dashboard/users/create.view", ["roles" => $roles, "data" => $data, "error" => "Došlo je do problema sa upisivanjem korisnika u bazu, obratite se adminu!"]);
    }
} catch (PDOException $e) {
    if ($e->getCode() === "23000") {
        $error = "Korisnik sa ovom email adresom već postoji!";
    } else {
        $error = $e->getMessage();
    }
    view("dashboard/users/create.view", ["roles" => $roles, "data" => $data, "error" => $error]);
}