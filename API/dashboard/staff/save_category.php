<?php

$db = \Core\App::resolve(\Core\Database::class);

$sql = "INSERT INTO odbori (odbor, prioritet, lang, slug) VALUES (?,?,?,?)";
$result = $db->query($sql, [
    $_POST["odbor"],
    $_POST["prioritet"],
    $_POST["lang"],
    $_POST["slug"],
]);
redirectBack();