<?php
$db = \Core\App::resolve(\Core\Database::class);

$sql = "
    INSERT INTO obrazovanje_osoblje 
        (osobljeID, tema, ustanova, godina) 
    VALUES 
        (:osobljeID, :tema, :ustanova, :godina);
";

$result = $db->query($sql, [
    "osobljeID" => $params["id"],
    "tema" => $_POST["tema"],
    "ustanova" => $_POST["ustanova"],
    "godina" => $_POST["godina"],
]);
redirectBack();