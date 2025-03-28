<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$lang = $_GET["lang"] ?? "srb";
$sql = "
        SELECT main.*,  (SELECT caption FROM navmenu n WHERE n.id = main.parent) AS parentCaption
        FROM navmenu main WHERE main.lang = :lang ORDER BY parent, position;
";

$fullMenu = $db->query($sql, ["lang" => $lang])->find(PDO::FETCH_ASSOC);

$menu = buildMenu($fullMenu);
//$menu["en"] = buildMenu($fullMenu["en"]);
//dd(buildMenuTable($menu));
//\Core\Response::send($menu);
//\Core\Response::send($fullMenu);
view("dashboard/navbar/index.view", ["menu" => $menu, "parents" => $fullMenu]);