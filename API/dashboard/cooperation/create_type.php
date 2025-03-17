<?php

use Core\App;
use Core\Database;
use Core\Router;
use Core\Session;


$lang = Session::currentUser("lang") ?? "srb";
$type = $params["type"];
$title = translate($lang, "cooperation.$type");
$db = App::resolve(Database::class);
$cooperation = Session::get("cooperation");

if (Router::isPost()) {
    $cooperation["logo"] = json_decode($_POST["selected"])[0] ?? $cooperation["logo"];
    Session::flash("cooperation", $cooperation);
    Router::redirect("/cooperation/create/$type?lang=$lang");
}

$sql = "SELECT *, 
            CONCAT('flags/32/', code2l, '.png') AS flag32,
            CONCAT('flags/128/', code2l, '.png') AS flag128, 
            CONCAT('flags/SVG/', code2l, '.svg') AS flagSVG 
            FROM country
            ORDER BY name ASC;
        SELECT * FROM media WHERE mimetype LIKE '%image%';
";
$flags = $db->query($sql)->find();
$logos = $db->nextRowsetFind();

view("dashboard/cooperation/create.view", [
    "title" => $title,
    "flags" => $flags,
    "logos" => $logos,
    "type" => $type,
    "lang" => $lang,
    "inputs" => $cooperation ?? []]);

Session::unflash();
