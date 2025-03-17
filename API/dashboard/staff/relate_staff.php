<?php
$db = \Core\App::resolve(\Core\Database::class);
$input = file_get_contents('php://input');
$inputParsed = json_decode($input);
$userID = [];

foreach ($inputParsed as $key => $value) {
    $userID[] = $value;
}
$placeholders = implode(",", array_fill(0, count($userID), "?"));

$sql = "
    UPDATE osoblje SET translate_relation = ? WHERE id IN ($placeholders);
";
array_unshift($userID, $input);
$result = $db->query($sql, $userID);

\Core\Response::send($result);

