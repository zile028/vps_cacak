<?php

$db = \Core\App::resolve(\Core\Database::class);
$izborni = isset($_POST["izborni"]) ? 1 : 0;

$sql = "
        INSERT INTO sp_predmet (spID, predmetID,redniBroj,izborni,semestar, godina) 
        VALUES (:spID,:predmetID, :redniBroj,:izborni,:semestar, :godina)";

try {
    $result = $db->query($sql,
        ["spID" => $params["id"],
            "predmetID" => $_POST["predmetID"],
            "redniBroj" => $_POST["redniBroj"],
            "izborni" => $izborni,
            "semestar" => $_POST["semestar"],
            "godina" => $_POST["godina"]
        ])
        ->isExecuteResult();
    redirectBack("addForm");
} catch (Exception $e) {
    displayErrorPage($e);
}
