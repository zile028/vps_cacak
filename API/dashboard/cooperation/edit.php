<?php

use Core\App;
use Core\Database;
use Core\Router;
use Core\Session;

$id = $params["id"];
$db = App::resolve(Database::class);
$lang = Session::currentUser("lang");
$cooperation = Session::get("cooperation");
if (Router::isPost()) {
    $cooperation["logo"] = json_decode($_POST["selected"])[0] ?? $cooperation["logo"];
    Session::flash("cooperation", $cooperation);
    Router::redirect("/cooperation/edit/$id");
}


$sql = "
        SELECT * FROM saradnja WHERE id = :id;
        SELECT *, 
            CONCAT('flags/32/', code2l, '.png') AS flag32,
            CONCAT('flags/128/', code2l, '.png') AS flag128, 
            CONCAT('flags/SVG/', code2l, '.svg') AS flagSVG 
            FROM country
            ORDER BY name ASC;
        SELECT * FROM media WHERE mimetype LIKE '%image%';
        SELECT type FROM saradnja_type WHERE lang = :lang;
";

$cooperation = $db->query($sql, ["id" => $id, "lang" => $lang])->findOne();
$flags = $db->nextrowsetFind();
$media = $db->nextrowsetFind();
$types = $db->nextrowsetFind();
$title = translate($cooperation->lang, "cooperation." . $cooperation->slug);

Session::update("lang", $cooperation->lang);
view("dashboard/cooperation/edit.view", [
        "title" => $title,
        "cooperation" => Session::get("cooperation") ? (object)Session::get("cooperation") : $cooperation,
        "logos" => $media,
        "flags" => $flags,
        "types" => $types
    ]
);

Session::unflash();