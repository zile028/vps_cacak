<?php

$db = \Core\App::resolve(\Core\Database::class);
$lang = $_GET["lang"];
$courseLevels = $db->query("SELECT id, title, description,image,slug FROM nivo_studija WHERE lang = :lang", ["lang" => $lang])->find();

\Core\Response::send($courseLevels);