<?php
$id = $params["id"];
$db = \Core\App::resolve(\Core\Database::class);
$sql = "
    INSERT INTO dokumenta 
        (title, attachment, userID, parentID, category)
    VALUES 
        (:title, :attachment, :userID, :parentID, :category)
";
$data = [
    "title" => $_POST["title"],
    "attachment" => $_POST["attachment"],
    "parentID" => $_POST["povezan"],
    "category" => $params["id"],
    "userID" => getUser("id"),
];
$result = $db->query($sql, $data)->affectedRows();
redirectBack();