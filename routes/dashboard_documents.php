<?php
//DOKUMENTA
$router->get($prefix . "/document", "dashboard/document/index.php")->only(AUTH);
$router->get($prefix . "/document/category", "dashboard/document/category_create_page.php")->only(AUTH);
$router->get($prefix . "/document/category/:id", "dashboard/document/category_documents.php")->only(AUTH);
$router->get($prefix . "/document/edit/:id", "dashboard/document/edit_document.php")->only(AUTH);

$router->post($prefix . "/document/category", "dashboard/document/category_create.php")->only(AUTH);
$router->post($prefix . "/document/category/:id", "dashboard/document/category_add_document.php")->only(AUTH);

$router->patch($prefix . "/document/category/:id", "dashboard/document/category_update.php")->only(AUTH);
$router->patch($prefix . "/document/:id", "dashboard/document/update_document.php")->only(AUTH);

$router->delete($prefix . "/document/category/:id", "dashboard/document/category_delete.php")->only(AUTH);
$router->delete($prefix . "/document/:id", "dashboard/document/document_delete.php")->only(AUTH);