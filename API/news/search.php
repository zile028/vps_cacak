<?php

$db = \Core\App::resolve(\Core\Database::class);

$lang = $_GET["lang"] ?? "srb";
$term = "%" . $params["term"] . "%";
$limit = isset($_GET["limit"]) && $_GET["limit"] !== "null" ? $_GET["limit"] : 5;
$offset = isset($_GET["offset"]) && $_GET["offset"] !== "null" ? $_GET["offset"] : 1;
$offset = ($offset - 1) * $limit;
$data = ["limit" => (int)$limit, "offset" => (int)$offset, "lang" => $lang, "term" => $term];

$sql = "
    SELECT v.*,m.storeName as thumbnail
        FROM vesti v
        JOIN media m ON m.id = v.featured_imageID
    WHERE v.lang = :lang AND (v.naslov LIKE :term OR v.description LIKE :term)
    ORDER BY v.createdAt DESC 
    LIMIT :limit OFFSET :offset; 
    
    SELECT COUNT(v.id) AS count
        FROM vesti v
    WHERE v.lang = :lang AND (v.naslov LIKE :term OR v.description LIKE :term)
";
try {
    $news = $db->query($sql, $data, [PDO::PARAM_INT,
        PDO::PARAM_INT, PDO::PARAM_STR, PDO::PARAM_STR])->find();
    $count = $db->nextRowsetFindOne();

    \Core\Response::send(["news" => $news, "count" => $count->count]);

} catch (\Exception $e) {
    \Core\Response::send(["error" => $e->getMessage()]);
}
