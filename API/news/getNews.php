<?php

$db = \Core\App::resolve(\Core\Database::class);

$lang = $_GET["lang"];

$limit = isset($_GET["limit"]) && $_GET["limit"] !== "null" ? $_GET["limit"] : 5;
$offset = isset($_GET["offset"]) && $_GET["offset"] !== "null" ? $_GET["offset"] : 1;
$offset = ($offset - 1) * $limit;

$sql = "
    SELECT v.*,m.storeName as thumbnail
        FROM vesti v
        JOIN media m ON m.id = v.featured_imageID
    WHERE v.lang = :lang
    ORDER BY v.createdAt DESC 
    LIMIT :limit OFFSET :offset; 
    SELECT COUNT(v.id) AS count
        FROM vesti v
    WHERE lang = :lang
";

$lastNews = $db->query($sql, ["limit" => $limit, "offset" => $offset, "lang" => $lang], [PDO::PARAM_INT,
    PDO::PARAM_INT, PDO::PARAM_STR])->find();
$count = $db->nextRowsetFindOne();

\Core\Response::send(["news" => $lastNews, "count" => $count->count]);