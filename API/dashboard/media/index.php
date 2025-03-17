<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$page = (int)($_GET["page"] ?? 1);
$limit = 16;
$offset = ($page - 1) * $limit;

$sql = "SELECT * FROM media ORDER BY createdAt DESC, type,fileName LIMIT :limit OFFSET :offset;
        SELECT COUNT(id) FROM media;";
$search = isset($_GET["search"]) ? Validator::string($_GET["search"]) : false;
if ($search) {
    $sql = "SELECT * FROM media 
                WHERE storeName LIKE '%$search%' OR fileName LIKE '%$search%'
                ORDER BY createdAt DESC, type,fileName LIMIT :limit OFFSET :offset;
                SELECT COUNT(id) FROM media
                WHERE storeName LIKE '%$search%' OR fileName LIKE '%$search%';";
}
$media = $db->query($sql, ["limit" => $limit, "offset" => $offset], [PDO::PARAM_INT, PDO::PARAM_INT])->find();
$count = $db->nextRowsetCount();
view("dashboard/media/index.view", ["media" => $media, "count" => $count, "limit" => $limit]);