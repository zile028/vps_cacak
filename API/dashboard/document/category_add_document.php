<?php
$id = $params["id"];
$db = \Core\App::resolve(\Core\Database::class);

$sql = "
    INSERT INTO dokumenta 
        (title, attachment, userID, parentID, category, subcategory)
    VALUES 
        (:title, :attachment, :userID, :parentID, :category, :subcategory);
";
$data = [
    "title" => $_POST["title"],
    "attachment" => $_POST["attachment"],
    "parentID" => $_POST["povezan"],
    "category" => $params["id"],
    "subcategory" => $_POST["subcategory"],
    "userID" => getUser("id"),
];
$result = $db->query($sql, $data)->affectedRows();
redirectBack();