<?php
$db = \Core\App::resolve(\Core\Database::class);

$data = [
    "firstName" => $_POST["firstName"],
    "lastName" => $_POST["lastName"],
    "email" => $_POST["email"],
    "title" => $_POST["title"],
    "rank" => $_POST["rank"],
    "imageID" => $_POST["imageID"],
    "id" => $params["id"],
    "sufix" => $_POST["sufix"]
];
$sql = "
        UPDATE osoblje o SET 
            o.firstName = :firstName,
            o.lastName = :lastName,
            o.email = :email,
            o.title = :title,
            o.rank = :rank,
            o.imageID = :imageID,
            o.sufix = :sufix
        WHERE o.id = :id;
";
try {
    $result = $db->query($sql, $data);
    redirect("/staff/all");
} catch (Exception $e) {
    view("dashboard//errors/error_page_message.view", ["error" => $e, "cbUrl" => referer()]);
}
