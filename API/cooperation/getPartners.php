<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve(Database::class);

$sql = "SELECT s.id, s.title, s.url, s.color, s.slug, s.lang,
                m.storeName AS logo,
                c.code2l AS state, CONCAT('flags/','32/', c.code2l,'.png') AS flag
            FROM saradnja s
            JOIN media m ON m.id = s.logo
            JOIN country c ON c.id = s.flag
            WHERE s.slug = :slug AND s.lang = :lang";

try {
    $partners = $db
        ->query($sql, ["slug" => $params["slug"], "lang" => $params["lang"] ?? "srb"])
        ->find();
    if ($db->affectedRows() === 0) {
        Response::status(Response::NO_CONTENT)::send($partners);

    } else {
        Response::send($partners);
    }
} catch (Exception $e) {
    Response::send($e, 403);
}
