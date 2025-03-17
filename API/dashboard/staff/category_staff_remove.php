<?php
$clanID = $params["clanId"];
$db = \Core\App::resolve(\Core\Database::class);
$sql = "DELETE FROM osoblje_odbor WHERE id = :id";

$result = $db->query($sql, ["id" => $clanID]);

redirectBack();

