<?php
$db = \Core\App::resolve(\Core\Database::class);
$sql = "SELECT * FROM predmeti";
$predmeti = $db->query($sql)->find();
view("dashboard/studije/predmeti_page.view", ["predmeti" => $predmeti]);