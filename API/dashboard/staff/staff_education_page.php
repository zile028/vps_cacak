<?php
$db = \Core\App::resolve(\Core\Database::class);

$sql = "
    SELECT o.* FROM osoblje o WHERE o.id = :id;
    SELECT * FROM obrazovanje_osoblje oo WHERE oo.osobljeID = :id ORDER BY godina DESC ;
";

$zaposleni = $db->query($sql, ["id" => $params["id"]])->findOne();
$obrazovanje = $db->nextRowsetFind();
view("dashboard/osoblje/osoblje_obrazovanje.view", ["zaposleni" => $zaposleni, "obrazovanje" => $obrazovanje]);