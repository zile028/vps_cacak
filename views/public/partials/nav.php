<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

try {
    $lang = $_GET["lang"] ?? "srb";
    $sql = "
        SELECT main.*,  (SELECT caption FROM navmenu n WHERE n.id = main.parent) AS parentCaption
        FROM navmenu main WHERE main.lang = :lang ORDER BY parent, position;
";

    $fullMenu = $db->query($sql, ["lang" => $lang])->find(PDO::FETCH_ASSOC);
    $menu = buildMenu($fullMenu);
} catch (Exception $e) {
    dd($e->getMessage());
}
