<?php
$db = \Core\App::resolve(\Core\Database::class);

$sql = "INSERT INTO kategorije 
        (category, lang, prioritet,slug) 
        VALUES (:category, :lang, :prioritet,:slug);";
$result = $db->query($sql,
    [
        "category" => $_POST["category"],
        "lang" => $_POST["lang"],
        "prioritet" => $_POST["prioritet"],
        "slug" => $_POST["slug"],
    ]);
redirectBack();