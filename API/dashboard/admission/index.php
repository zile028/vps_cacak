<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$sql = "
SELECT lang,id, title, lang FROM nivo_studija;
SELECT u.nivoID, u.* FROM  upis u ORDER BY u.prioritet;
";

$nivoStudija = $db->query($sql)->find(PDO::FETCH_GROUP);
$uslovi = $db->nextRowsetFind(PDO::FETCH_GROUP);

view("dashboard/admission/index.view", ["nivoStudija" => $nivoStudija, "uslovi" => $uslovi]);