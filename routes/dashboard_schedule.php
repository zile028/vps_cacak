<?php
//RASPOREDI
$router->get($prefix . "/schedule", "dashboard/schedule/index.php")->only(AUTH);
$router->get($prefix . "/schedule/:id/:lang", "dashboard/schedule/schedule_show.php")->only(AUTH);
$router->get($prefix . "/schedule/exams", "dashboard/schedule/exams_index.php")->only(AUTH);

$router->post($prefix . "/schedule/:category/:lang", "dashboard/schedule/schedule_create.php")->only(AUTH);

$router->patch($prefix . "/schedule/status/:id", "dashboard/schedule/update_active_status.php")->only(AUTH);

$router->delete($prefix . "/schedule/:id", "dashboard/schedule/delete_schedule.php")->only(AUTH);
