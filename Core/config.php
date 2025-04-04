<?php
require_once "constants.php";
return $_SERVER["SERVER_NAME"] === "localhost" ?
    [
        "database" => [
            "host" => "localhost",
            "port" => 3306,
            "dbname" => "vps_sajt",
            "charset" => "utf8mb4",
            "username" => "root",
            "password" => ""
        ],
        "fe_url" => "http://localhost:3000",
        "be_url" => "http://localhost:4000"
    ] : [
        "database" => [
            "host" => "localhost",
            "port" => 3306,
            "dbname" => "vpscacak_website",
            "charset" => "utf8mb4",
            "username" => "vpscacak_vps_admin",
            "password" => "R!1kQaJUi%U;"
        ],
        "fe_url" => FE_PRODUCTION_URI,
        "be_url" => BE_PRODUCTION_URI
    ];
