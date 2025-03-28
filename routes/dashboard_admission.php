<?php //ADMISSION
$router->get($prefix . "/admission", "dashboard/admission/index.php")->only(AUTH);
$router->get($prefix . "/admission/create", "dashboard/admission/create.page.php")->only(AUTH);
$router->get($prefix . "/admission/requirement/:id", "dashboard/admission/requirement_edit.page.php")->only(AUTH);

$router->patch($prefix . "/admission/requirement/:id", "dashboard/admission/update_requirement.php")->only(AUTH);
$router->patch($prefix . "/admission/requirement/priority/:id", "dashboard/admission/update_requirement_priority.php")->only(AUTH);

$router->post($prefix . "/admission/create", "dashboard/admission/save_new.php")->only(AUTH);

$router->delete($prefix . "/admission/requirement/:id", "dashboard/admission/delete_requirement.php")->only(AUTH);
