<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$id = $params["id"];
$sql = "
    SELECT * FROM upis WHERE id = :id;
    SELECT ns.lang, ns.id, ns.title,ns.lang
    FROM nivo_studija ns;
";
$uslov = $db->query($sql, ["id" => $id])->findOne();
$nivoStudija = $db->nextRowsetFind(PDO::FETCH_GROUP);

view("dashboard/admission/requirementEdit.view", ["uslov" => $uslov, "nivoStudija" => $nivoStudija]);
