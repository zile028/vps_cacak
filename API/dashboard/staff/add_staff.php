<?php
$db = \Core\App::resolve(\Core\Database::class);
$data = [
    "firstName" => $_POST["firstName"],
    "lastName" => $_POST["lastName"],
    "title" => $_POST["title"],
    "rank" => $_POST["rank"],
    "email" => $_POST["email"],
    "imageID" => $_POST["imageID"],
    "description" => $_POST["description"],
    "lang" => $_POST["lang"],
    "sufix" => $_POST["sufix"],
];

$sql = "INSERT INTO osoblje 
    (firstName, lastName, title, `rank`, email, imageID, description, lang,sufix)
    VALUES
    (:firstName, :lastName, :title, :rank, :email, :imageID, :description, :lang,:sufix)";

$newStaffID = $db->query($sql, $data)->lastID();
$translateRelation[$data["lang"]] = $newStaffID;
$updateData[] = $newStaffID;

if (isset($_POST["rel_id"])) {
    $sql = "SELECT lang FROM osoblje WHERE id = :id";
    $prevStaffLang = $db->query($sql, ["id" => $_POST["rel_id"]])->findOne(PDO::FETCH_COLUMN);
    $translateRelation[$prevStaffLang] = $_POST["rel_id"];
    $updateData[] = $_POST["rel_id"];
}

array_unshift($updateData, json_encode($translateRelation));
$placeholders = implode(",", array_fill(0, count($translateRelation), "?"));
$sql = "UPDATE osoblje SET translate_relation = ? WHERE id IN ($placeholders)";
$result = $db->query($sql, $updateData);
redirect("/staff/all");