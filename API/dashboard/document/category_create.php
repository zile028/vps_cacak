<?php
$db = \Core\App::resolve(\Core\Database::class);

$sql = "INSERT INTO kategorije 
        (category, lang, prioritet,slug, parent) 
        VALUES (:category, :lang, :prioritet,:slug, :parent);";
$result = $db->query($sql,
    [
        "category" => $_POST["category"],
        "lang" => $_POST["lang"],
        "prioritet" => $_POST["prioritet"],
        "slug" => $_POST["slug"],
        "parent" => $_POST["parent"],
    ]);
redirectBack();