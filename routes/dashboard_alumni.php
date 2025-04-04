<?php
$router->get($prefix . "/alumni", "dashboard/alumni/index.php");
$router->get($prefix . "/alumni/:id", "dashboard/alumni/edit_page.php");
$router->post($prefix . "/alumni", "dashboard/alumni/create.php");
$router->delete($prefix . "/alumni/:id", "dashboard/alumni/delete.php");
$router->patch($prefix . "/alumni/status/:id", "dashboard/alumni/update_status.php");
$router->put($prefix . "/alumni/:id", "dashboard/alumni/update.php");
