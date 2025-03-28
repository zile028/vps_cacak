<?php
//STUDIJE
$router->get($prefix . "/study", "dashboard/study/index.php")->only(AUTH);
$router->get($prefix . "/study/level", "dashboard/study/study_level_page.php")->only(AUTH);
$router->get($prefix . "/study/level/:id", "dashboard/study/study_level_edit_page.php")->only(AUTH);
$router->get($prefix . "/study/course", "dashboard/study/index_course.php")->only(AUTH);
$router->get($prefix . "/study/course/add", "dashboard/study/create_course.php")->only(AUTH);
$router->get($prefix . "/study/program/add", "dashboard/study/study_program_add.php")->only(AUTH);
$router->get($prefix . "/study/course/:id", "dashboard/study/edit_course_page.php")->only(AUTH);
$router->get($prefix . "/study/program/:id", "dashboard/study/study_program_index.php")->only(AUTH);


$router->post($prefix . "/study/level/add", "dashboard/study/study_level_save.php")->only(AUTH);
$router->post($prefix . "/study/program/add", "dashboard/study/study_program_save.php")->only(AUTH);
$router->post($prefix . "/study/course/add", "dashboard/study/save_course.php")->only(AUTH);

$router->delete($prefix . "/study/course/:id", "dashboard/study/delete_course.php")->only(AUTH);
$router->delete($prefix . "/study/program/:id", "dashboard/study/delete_study.php")->only(AUTH);
$router->delete($prefix . "/study/:spID/course/remove/:id", "dashboard/study/study_course_remove.php")->only(AUTH);
$router->delete($prefix . "/study/level/:id", "dashboard/study/study_level_delete.php")->only(AUTH);

$router->put($prefix . "/study/program/:id", "dashboard/study/study_program_update.php")->only(AUTH);
$router->put($prefix . "/study/program/:id/course", "dashboard/study/study_program_course.php")->only(AUTH);
$router->put($prefix . "/study/course/:id", "dashboard/study/update_course.php")->only(AUTH);

$router->patch($prefix . "/study/active/:id", "dashboard/study/update_study_status.php")->only(AUTH);
$router->patch($prefix . "/study/level/:id", "dashboard/study/update_study_level.php")->only(AUTH);
$router->patch($prefix . "/study/:programID/:courseID/order", "dashboard/study/update_program_course.php")->only(AUTH);