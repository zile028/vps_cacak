<?php
$db = \Core\App::resolve(\Core\Database::class);
$id = $params["id"];//OVAJ BRISEM
$translate_relation = json_decode($_POST["translate_relation"], true);
$cbc = static function ($el) use ($id) {
    return (string)$el !== $id;
};

if ($translate_relation !== null) {
    $toUpdate = array_filter($translate_relation, $cbc);
    $relation = json_encode($toUpdate);
    $updateId = array_shift($toUpdate);
} else {
    $relation = null;
    $updateId = null;
}

$sql = "
    DELETE FROM vesti WHERE id = :id;
    DELETE FROM vest_media WHERE vestID = :id;
    UPDATE vesti SET translate_relation = :relation WHERE id = :updateId
";

$db->query($sql, ["id" => $id, "relation" => $relation, "updateId" => $updateId]);
redirectBack();