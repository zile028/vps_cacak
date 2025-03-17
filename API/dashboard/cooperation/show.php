<?php

use Core\App;
use Core\Database;
use Core\Session;

$type = $params["type"];
Session::update("lang", $_GET["lang"] ?? "srb");
$lang = Session::currentUser("lang") ?? "srb";

$db = App::resolve(Database::class);
$sql = "
    SELECT s.*, 
           CONCAT('flags/32/',c.code2l,'.png') AS flagSM, 
           CONCAT('flags/128/',c.code2l,'.png') AS flagLG, 
           m.fileName, m.storeName, c.name AS state
        FROM saradnja s
        JOIN country c ON c.id = s.flag
        JOIN media m ON m.id = s.logo
        WHERE s.lang = :lang AND s.slug = :type;
";
$cooperations = $db->query($sql, ["lang" => $lang, "type" => $type])->find();

//vd($lang);
//vd($type);
//dd($cooperations);

view("dashboard/cooperation/show.view", ["lang" => $lang, "type" => $type, "cooperations" => $cooperations]);