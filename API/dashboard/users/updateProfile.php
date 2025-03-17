<?php

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);
try {
    $sql = "
            SELECT * FROM users WHERE email = :email;
            UPDATE users SET 
                 firstName = :firstName,
                 lastName = :lastName,
                 email = :email,
                 image = :image
            WHERE id = :id;
            SELECT * FROM users WHERE id = :id;";

    $db->beginTransaction();

    $checkEmail = $db->query($sql, [
        "id" => getUser("id"),
        'email' => $_POST['email'],
        "firstName" => $_POST['firstName'],
        "lastName" => $_POST['lastName'],
        "image" => $_POST['image'],
    ])->findOne();
    if ($checkEmail && $checkEmail->id !== getUser("id")) {
        Session::flash(ERRORS_FLASH,
            ["update" => "Email adresa koju ste uneli vec postoji, pokušajte sa drugom."]);
        redirectBack();
    } else {
        // UPDATE
        $db->nextRowset();
        // NOVI PODACI USER-a i osvezavanje sesije
        $user = $db->nextRowsetFindOne();
        $db->commit();
        Session::setUser($user);
        redirectBack();
    }

} catch (Exception $e) {
    $db->rollBack();
    displayErrorPage($e);
}
