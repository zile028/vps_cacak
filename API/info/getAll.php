<?php
$db = \Core\App::resolve(\Core\Database::class);
$sql = "SELECT * FROM onama WHERE lang = :lang ORDER BY rb, id";
$lang = $_GET["lang"] ?? "srb";

$info = $db->query($sql, ["lang" => $lang])->find();

\Core\Response::send($info);