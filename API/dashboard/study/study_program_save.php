<?php
$db = \Core\App::resolve(\Core\Database::class);
$sql = "
    INSERT INTO studijski_programi (nivoID, naziv, modul, trajanje, espb, zvanje, polje, akreditovan, cilj, opis, ishod, lang)
    VALUES (:nivoID, :naziv, :modul, :trajanje, :espb, :zvanje, :polje, :akreditovan, :cilj, :opis, :ishod, :lang)
";
$lastId = [];
try {
    foreach ($_POST as $key => $value) {
        $value["lang"] = $key;
        $value["espb"] = (int)$value["espb"];
        $lastId[$key] = $db->query($sql, $value)->lastId();
    }
    $inClause = implode(", ", array_fill(0, count($lastId), "?"));
    $relation = json_encode($lastId);
    $sql = "UPDATE studijski_programi SET translate_relation = ? WHERE id IN ($inClause)";
    $data = array_values($lastId);
    array_unshift($data, $relation);
    $result = $db->query($sql, $data)->find();
    redirect("/study");
} catch (Exception $e) {
    displayErrorPage($e);
}