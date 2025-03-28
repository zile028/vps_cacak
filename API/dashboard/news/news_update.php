<?php

use Core\Validator;

$db = \Core\App::resolve(\Core\Database::class);
$id = $params["id"];

$sql = "
    UPDATE vesti SET
            naslov=:naslov,  
            description=:description, 
            featured_imageID =:featured_imageID, 
            userID=:userID
    WHERE id=:id
";
$data = [
    "id" => $id,
    "naslov" => Validator::string($_POST["naslov"], 3),
    "description" => $_POST["description"],
    "featured_imageID" => $_POST["featured_imageID"],
    "userID" => getUser("id"),
];
$result = $db->query($sql, $data)->find();

redirect("/dashboard/news");
