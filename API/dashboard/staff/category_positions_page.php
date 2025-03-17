<?php
$db = \Core\App::resolve(\Core\Database::class);
$sql = "
    SELECT * FROM odbori WHERE id = :odborID;
    SELECT op.* FROM odbor_pozicija op WHERE op.odborID = :odborID ORDER BY op.prioritet;
";

$odbor = $db->query($sql, ["odborID" => $params["id"]])->findOne();
$pozicije = $db->nextRowsetFind();
view("dashboard/osoblje/odbor_pozicije.view", ["odbor" => $odbor, "pozicije" => $pozicije]);