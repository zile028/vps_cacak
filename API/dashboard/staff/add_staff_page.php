<?php
$db = \Core\App::resolve(\Core\Database::class);
$sql = "
    SELECT * FROM media WHERE mimetype LIKE '%image%' ORDER BY fileName;
";
if (isset($_GET["id"])) {
    $sql .= "SELECT o.* , m.storeName AS image FROM osoblje o
         JOIN media m ON m.id = o.imageID
         WHERE o.id = :id";
    $media = $db->query($sql, ["id" => $_GET["id"]])->find();
    $staff = $db->nextRowsetFindOne();
    view("dashboard/osoblje/osoblje_dodaj.view", ["media" => $media, "staff" => $staff, "lang" => $_GET["lang"]]);
} else {
    $media = $db->query($sql)->find();
    view("dashboard/osoblje/osoblje_dodaj.view", ["media" => $media]);
}

