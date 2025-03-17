<?php

use Core\App;
use Core\Database;

$id = $params["id"];
$db = App::resolve(Database::class);

$sql = "
        DELETE FROM studijski_programi WHERE id = :id;
        DELETE FROM sp_predmet WHERE spID = :id;
";
$db->query($sql, ["id" => $id]);
redirectBack();