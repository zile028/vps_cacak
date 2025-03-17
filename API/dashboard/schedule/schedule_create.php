<?php

$db = \Core\App::resolve(\Core\Database::class);

$sql = "INSERT INTO raspored 
    (spID, mediaID, kategorija, lang, godina) 
    VALUES 
    (:spID, :mediaID, :kategorija, :lang, :godina);
";

$data = [
    "spID" => $_POST["spID"],
    "mediaID" => $_POST["mediaID"],
    "godina" => $_POST["godina"],
    "kategorija" => $params["category"],
    "lang" => $params["lang"]
];
try {
    $result = $db->query($sql, $data);
    redirectBack();
} catch (Exception $e) {
    dd($e->getMessage());
}
