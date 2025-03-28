<?php
$router->get($prefix . "/alumni", "dashboard/alumni/index.php");
$router->post($prefix . "/alumni", "dashboard/alumni/create.php");
$router->delete($prefix . "/alumni/:id", "dashboard/alumni/delete.php");
$router->patch($prefix . "/alumni/:id", "dashboard/alumni/update.php");