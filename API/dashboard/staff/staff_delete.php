<?php
$db = \Core\App::resolve(\Core\Database::class);
$staffID = $params["id"];

$sql = "SELECT translate_relation,lang FROM osoblje WHERE id = :staffID;";
$sql .= "DELETE FROM osoblje WHERE id = :staffID;";
$sql .= "DELETE FROM osoblje_odbor WHERE osobljeID = :staffID;";
$sql .= "DELETE FROM obrazovanje_osoblje WHERE osobljeID = :staffID;";
$staff = $db->query($sql, ["staffID" => $staffID])->findOne();
$translateRelation = json_decode($staff->translate_relation, true);
unset($translateRelation[$staff->lang]);
if (!is_null($translateRelation)) {
    $sql = "UPDATE osoblje SET translate_relation = :translateRelation WHERE id = :id";
    $result = $db->query($sql, [
        "translateRelation" => json_encode($translateRelation),
        "id" => $translateRelation[array_key_last($translateRelation)]
    ]);
}

redirectBack();