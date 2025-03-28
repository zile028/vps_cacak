<?php
$db = \Core\App::resolve(\Core\Database::class);

$sql = "SELECT p.* , m.storeName AS plan
        FROM predmeti p
        LEFT JOIN media m ON m.id = p.nastavniPlan";

$predmeti = $db->query($sql)->find();

view("dashboard/studije/predmeti_page.view", ["predmeti" => $predmeti]);