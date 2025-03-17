<?php
$db = \Core\App::resolve(\Core\Database::class);
$lang = $_GET["lang"] ?? "srb";
$sql = "SELECT id, title, slug,lang FROM nivo_studija WHERE lang = :lang";

$nivoStudija = $db->query($sql, ["lang" => $lang])->find();

view("dashboard/admission/create.view", ["nivoStudija" => $nivoStudija]);