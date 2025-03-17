<?php
$db = \Core\App::resolve(\Core\Database::class);
$sql = "
        SELECT u.*,u.content AS opis, u.title AS uslov
        FROM nivo_studija ns
        JOIN  upis u ON u.nivoID = ns.id
        WHERE ns.slug = :slug AND ns.lang = :lang
";
$admissionRule = $db->query($sql, $params)->find();
if ($db->affectedRows() === 0) {
    \Core\Response::status(\Core\Response::NO_CONTENT);
} else {
    \Core\Response::send($admissionRule);
}
