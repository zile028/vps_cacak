<?php
$db = \Core\App::resolve(\Core\Database::class);
$sql = "UPDATE osoblje_odbor SET prioritet = :prioritet
        WHERE osobljeID = :staffId AND odborID = :id;";
$result = $db->query($sql, [
    "prioritet" => $_POST["prioritet"],
    "staffId" => $params["staffId"],
    "id" => $params["id"],
])->isExecuteResult();

redirectBack($params["staffId"]);