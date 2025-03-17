<?php

$db = \Core\App::resolve(\Core\Database::class);

$sql = "
        SELECT * 
            FROM nivo_studija
            WHERE slug=:level AND lang=:lang;
        SELECT sp.*
            FROM studijski_programi sp
            JOIN nivo_studija ns ON ns.id = sp.nivoID
            WHERE  ns.slug = :level AND ns.lang=:lang;
        ";

$nivoStudija = $db->query($sql, $params)->findOne();
$nivoStudija->sp = $db->nextRowsetFind();
\Core\Response::send($nivoStudija);

