<?php

$db = \Core\App::resolve(\Core\Database::class);
$sql = "SELECT *
            FROM studijski_programi sp 
            WHERE sp.id = :id";
$studijskiProgram = $db->query($sql, ["id" => $params["id"]])->findOne();
\Core\Response::send($studijskiProgram);
