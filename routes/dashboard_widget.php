<?php
//WIDGET
$router->get($prefix . "/widget", "dashboard/widget/index.php")->only(ADMIN);
$router->get($prefix . "/widget/create", "dashboard/widget/create.php")->only(ADMIN);
$router->post($prefix . "/widget/create", "dashboard/widget/save.php")->only(ADMIN);
$router->put($prefix . "/widget/:id", "dashboard/widget/update.php")->only(ADMIN);
$router->delete($prefix . "/widget/:id", "dashboard/widget/delete.php")->only(ADMIN);