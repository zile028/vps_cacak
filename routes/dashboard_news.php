<?php
//VESTI
$router->get($prefix . "/news", "dashboard/news/show.php")->only(AUTH);
$router->get($prefix . "/news/add", "dashboard/news/news_add_page.php")->only(AUTH);
$router->get($prefix . "/news/edit/:id", "dashboard/news/news_edit_page.php")->only(AUTH);

$router->patch($prefix . "/news/edit/:id", "dashboard/news/news_update.php")->only(AUTH);
$router->patch($prefix . "/news/publish/:id", "dashboard/news/news_publish_update.php")->only(ADMIN);

$router->post($prefix . "/news/add", "dashboard/news/news_save.php")->only(AUTH);

$router->delete($prefix . "/news/:id", "dashboard/news/news_delete.php")->only(AUTH);