<?php
$db = \Core\App::resolve(\Core\Database::class);
$page = (int)($_GET["page"] ?? 1);
$search = $_GET["search"] ?? "";
$limit = 10;
$offset = ($page - 1) * $limit;
$sql = "
    SELECT v.id,m.storeName as storeName,m.fileName as fileName, v.description, v.createdAt,v.naslov,v.lang, v.translate_relation
        FROM vesti v
        LEFT JOIN media m ON m.id = v.featured_imageID
        WHERE v.naslov LIKE '%$search%' OR v.description LIKE '%$search%'
        ORDER BY v.createdAt DESC
        LIMIT :limit OFFSET :offset;
    SELECT COUNT(id) FROM vesti v WHERE v.naslov LIKE '%$search%' OR v.description LIKE '%$search%';
";
$lastNews = $db->query($sql, ["limit" => $limit, "offset" => $offset], [PDO::PARAM_INT, PDO::PARAM_INT])->find();
$count = $db->nextRowsetCount();

view("dashboard/vesti/index.view", ["vesti" => $lastNews, "count" => $count, "cbUrl" => "/news"]);