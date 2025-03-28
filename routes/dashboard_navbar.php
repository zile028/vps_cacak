<?php
//NAVBAR
$router->get($prefix . "/navbar", "dashboard/navbar/index.php")->only(ADMIN);

$router->post($prefix . "/navbar", "dashboard/navbar/create.php")->only(ADMIN);
$router->post($prefix . "/navbar/:itemID", "dashboard/navbar/update.php")->only(ADMIN);

$router->delete($prefix . "/navbar/:itemID", "dashboard/navbar/destroy.php")->only(ADMIN);