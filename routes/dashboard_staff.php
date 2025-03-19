<?php
//OSOBLJE
$router->get($prefix . "/staff", "dashboard/staff/index.php")->only(AUTH);
$router->get($prefix . "/staff/all", "dashboard/staff/show_staffs.php")->only(AUTH);
$router->get($prefix . "/staff/add", "dashboard/staff/add_staff_page.php")->only(AUTH);
$router->get($prefix . "/staff/edit/:id", "dashboard/staff/edit_staff_page.php")->only(AUTH);
$router->get($prefix . "/staff/category/add", "dashboard/staff/create_category_page.php")->only(ADMIN);
$router->get($prefix . "/staff/category/:id", "dashboard/staff/category_show.php")->only(AUTH);
$router->get($prefix . "/staff/category/:id/position", "dashboard/staff/category_positions_page.php")->only(AUTH);
$router->get($prefix . "/staff/education/:id", "dashboard/staff/staff_education_page.php")->only(AUTH);

$router->post($prefix . "/staff/add", "dashboard/staff/add_staff.php")->only(AUTH);
$router->post($prefix . "/staff/category/add", "dashboard/staff/save_category.php")->only(AUTH);
$router->post($prefix . "/staff/category/:id/position", "dashboard/staff/save_category_positions.php")->only(AUTH);
$router->post($prefix . "/staff/education/:id", "dashboard/staff/staff_education_save.php")->only(AUTH);

$router->put($prefix . "/staff/edit/:id", "dashboard/staff/update_staff.php")->only(AUTH);
$router->put($prefix . "/staff/category/:id", "dashboard/staff/category_append_staff.php")->only(AUTH);
$router->put($prefix . "/staff/relation", "dashboard/staff/relate_staff.php")->only(AUTH);

$router->patch($prefix . "/staff/category/position/priority/:id", "dashboard/staff/category_positions_priority.php")->only(AUTH);
$router->patch($prefix . "/staff/category/priority/:id", "dashboard/staff/category_update_priority.php")->only(AUTH);
$router->patch($prefix . "/staff/category/:id/:staffId", "dashboard/staff/category_staff_priority.php")->only(AUTH);

$router->delete($prefix . "/staff/category/member/:clanId", "dashboard/staff/category_staff_remove.php")->only(AUTH);
$router->delete($prefix . "/staff/category/position/:id", "dashboard/staff/category_positions_remove.php")->only(AUTH);
$router->delete($prefix . "/staff/category/:id", "dashboard/staff/category_remove.php")->only(AUTH);
$router->delete($prefix . "/staff/education/:id", "dashboard/staff/staff_education_delete.php")->only(AUTH);
$router->delete($prefix . "/staff/:id", "dashboard/staff/staff_delete.php")->only(AUTH);