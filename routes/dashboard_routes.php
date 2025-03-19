<?php
$prefix = "/dashboard";
require_once "dashboard_staff.php";
require_once "dashboard_documents.php";

$router->get($prefix . "/migration", "/migration/index.php")->only(ADMIN);
$router->get($prefix . "/error/:code", "dashboard/error/index.php");

//CONTACT INFO
$router->get($prefix . "/contact", "dashboard/contact/home.php")->only(AUTH);
$router->post($prefix . "/contact", "dashboard/contact/store.php")->only(AUTH);
$router->patch($prefix . "/contact/:id", "dashboard/contact/update.php")->only(AUTH);
$router->delete($prefix . "/contact/:id", "dashboard/contact/delete.php")->only(AUTH);

//TICKETS
$router->get($prefix . "/tickets", "dashboard/tickets/home.php")->only(AUTH);
$router->get($prefix . "/tickets/create", "dashboard/tickets/create.php")->only(AUTH);
$router->get($prefix . "/tickets/:id", "dashboard/tickets/show.php")->only(AUTH);
$router->post($prefix . "/tickets/create", "dashboard/tickets/save.php")->only(AUTH);
$router->patch($prefix . "/tickets/:id", "dashboard/tickets/update.php")->only(AUTH);
$router->patch($prefix . "/tickets/:id/status", "dashboard/tickets/changeStatus.php")->only(AUTH);
$router->delete($prefix . "/tickets/:id", "dashboard/tickets/delete.php")->only(AUTH);

//ERRORS
$router->get($prefix . "/errors", "dashboard/errors/show.php")->only(ADMIN);
$router->delete($prefix . "/errors/:line", "dashboard/errors/deleteLine.php")->only(ADMIN);
$router->delete($prefix . "/errors", "dashboard/errors/clearLog.php")->only(ADMIN);

//HOME DASHBOARD
$router->get($prefix, "dashboard/home/show.php")->only(AUTH);

//GALLERY
$router->get($prefix . "/gallery", "dashboard/gallery/show.php")->only(AUTH);
$router->get($prefix . "/gallery/create", "dashboard/gallery/create.php")->only(AUTH);
$router->get($prefix . "/gallery/:id", "dashboard/gallery/preview.php")->only(AUTH);
$router->put($prefix . "/gallery/:id", "dashboard/gallery/updateGallery.php")->only(AUTH);
$router->patch($prefix . "/gallery/:id", "dashboard/gallery/updateImage.php")->only(AUTH);
$router->post($prefix . "/gallery/:id", "dashboard/gallery/addImage.php")->only(AUTH);
$router->post($prefix . "/gallery/create", "dashboard/gallery/save.php")->only(AUTH);
$router->delete($prefix . "/gallery/:id", "dashboard/gallery/delete.php")->only(AUTH);

// COOPERATION
$router->get($prefix . "/cooperation", "dashboard/cooperation/index.php")->only(AUTH);
$router->get($prefix . "/cooperation/create", "dashboard/cooperation/create.php")->only(ADMIN);
$router->get($prefix . "/cooperation/:type", "dashboard/cooperation/show.php")->only(AUTH);
$router->get($prefix . "/cooperation/create/:type", "dashboard/cooperation/create_type.php")->only(AUTH);
$router->get($prefix . "/cooperation/edit/:id", "dashboard/cooperation/edit.php")->only(AUTH);
$router->patch($prefix . "/cooperation/:id", "dashboard/cooperation/update.php")->only(AUTH);
$router->delete($prefix . "/cooperation/:id", "dashboard/cooperation/delete.php")->only(AUTH);
$router->post($prefix . "/cooperation/:type", "dashboard/cooperation/save.php")->only(AUTH);

//ADMISSION
$router->get($prefix . "/admission", "dashboard/admission/index.php")->only(AUTH);
$router->get($prefix . "/admission/create", "dashboard/admission/create.page.php")->only(AUTH);
$router->get($prefix . "/admission/requirement/:id", "dashboard/admission/requirement_edit.page.php")->only(AUTH);

$router->patch($prefix . "/admission/requirement/:id", "dashboard/admission/update_requirement.php")->only(AUTH);
$router->patch($prefix . "/admission/requirement/priority/:id", "dashboard/admission/update_requirement_priority.php")->only(AUTH);

$router->post($prefix . "/admission/create", "dashboard/admission/save_new.php")->only(AUTH);

//WIDGET
$router->get($prefix . "/widget", "dashboard/widget/index.php")->only(ADMIN);
$router->get($prefix . "/widget/create", "dashboard/widget/create.php")->only(ADMIN);
$router->post($prefix . "/widget/create", "dashboard/widget/save.php")->only(ADMIN);
$router->put($prefix . "/widget/:id", "dashboard/widget/update.php")->only(ADMIN);
$router->delete($prefix . "/widget/:id", "dashboard/widget/delete.php")->only(ADMIN);

//NAVBAR
$router->get($prefix . "/navbar", "dashboard/navbar/index.php")->only(ADMIN);

$router->post($prefix . "/navbar", "dashboard/navbar/create.php")->only(ADMIN);
$router->post($prefix . "/navbar/:itemID", "dashboard/navbar/update.php")->only(ADMIN);

$router->delete($prefix . "/navbar/:itemID", "dashboard/navbar/destroy.php")->only(ADMIN);

//KORISNICI
$router->get($prefix . "/users", "dashboard/users/index.php")->only(AUTH);
$router->get($prefix . "/users/create", "dashboard/users/user_create_page.php")->only(AUTH);
$router->get($prefix . "/users/profile", "dashboard/users/profile.php");
$router->post($prefix . "/users/create", "dashboard/users/create_user.php")->only(AUTH);
$router->put($prefix . "/users/profile", "dashboard/users/updateProfile.php");
$router->put($prefix . "/users/password", "dashboard/users/changePassword.php");
$router->patch($prefix . "/users/:id", "dashboard/users/update_user.php")->only(AUTH);
$router->delete($prefix . "/users/:id", "dashboard/users/user_delete.php")->only(AUTH);

//RASPOREDI
$router->get($prefix . "/schedule", "dashboard/schedule/index.php")->only(AUTH);
$router->get($prefix . "/schedule/:id/:lang", "dashboard/schedule/schedule_show.php")->only(AUTH);
$router->get($prefix . "/schedule/exams", "dashboard/schedule/exams_index.php")->only(AUTH);

$router->post($prefix . "/schedule/:category/:lang", "dashboard/schedule/schedule_create.php")->only(AUTH);

$router->delete($prefix . "/schedule/:id", "dashboard/schedule/delete_schedule.php")->only(AUTH);


//AUTH
$router->get($prefix . "/login", "dashboard/auth/show.php");
$router->get($prefix . "/logout", "dashboard/auth/logout.php")->only(AUTH);
$router->get($prefix . "/register", "dashboard/auth/show.php");

$router->post($prefix . "/register", "dashboard/auth/register_insert.php");
$router->post($prefix . "/login", "dashboard/auth/login.php");

//CONFIG
$router->get($prefix . "/config/lang/:lang", "dashboard/config/change_language.php")->only(AUTH);

//VESTI
$router->get($prefix . "/news", "dashboard/news/show.php")->only(AUTH);
$router->get($prefix . "/news/add", "dashboard/news/news_add_page.php")->only(AUTH);
$router->get($prefix . "/news/edit/:id", "dashboard/news/news_edit_page.php")->only(AUTH);

$router->patch($prefix . "/news/edit/:id", "dashboard/news/news_update.php")->only(AUTH);
$router->patch($prefix . "/news/publish/:id", "dashboard/news/news_publish_update.php")->only(ADMIN);

$router->post($prefix . "/news/add", "dashboard/news/news_save.php")->only(AUTH);

$router->delete($prefix . "/news/:id", "dashboard/news/news_delete.php")->only(AUTH);

//MEDIA
$router->get($prefix . "/media", "dashboard/media/index.php")->only(AUTH);
$router->get($prefix . "/media/edit/:id", "dashboard/media/edit.php")->only(AUTH);

$router->patch($prefix . "/media/edit/:id", "dashboard/media/update.php")->only(AUTH);

$router->delete($prefix . "/media/:id", "dashboard/media/delete.php")->only(AUTH);

$router->post($prefix . "/media", "dashboard/media/create.php")->only(AUTH);

//STUDIJE
$router->get($prefix . "/study", "dashboard/study/index.php")->only(AUTH);
$router->get($prefix . "/study/level", "dashboard/study/study_level_page.php")->only(AUTH);
$router->get($prefix . "/study/level/:id", "dashboard/study/study_level_edit_page.php")->only(AUTH);
$router->get($prefix . "/study/course", "dashboard/study/index_course.php")->only(AUTH);
$router->get($prefix . "/study/course/add", "dashboard/study/create_course.php")->only(AUTH);
$router->get($prefix . "/study/program/add", "dashboard/study/study_program_add.php")->only(AUTH);
$router->get($prefix . "/study/course/:id", "dashboard/study/edit_course_page.php")->only(AUTH);
$router->get($prefix . "/study/program/:id", "dashboard/study/study_program_index.php")->only(AUTH);

$router->post($prefix . "/study/program/add", "dashboard/study/study_program_save.php")->only(AUTH);
$router->post($prefix . "/study/course/add", "dashboard/study/save_course.php")->only(AUTH);

$router->delete($prefix . "/study/course/:id", "dashboard/study/delete_course.php")->only(AUTH);
$router->delete($prefix . "/study/program/:id", "dashboard/study/delete_study.php")->only(AUTH);
$router->delete($prefix . "/study/:spID/course/remove/:id", "dashboard/study/study_course_remove.php")->only(AUTH);

$router->put($prefix . "/study/program/:id", "dashboard/study/study_program_update.php")->only(AUTH);
$router->put($prefix . "/study/program/:id/course", "dashboard/study/study_program_course.php")->only(AUTH);
$router->put($prefix . "/study/course/:id", "dashboard/study/update_course.php")->only(AUTH);

$router->patch($prefix . "/study/active/:id", "dashboard/study/update_study_status.php")->only(AUTH);
$router->patch($prefix . "/study/level/:id", "dashboard/study/update_study_level.php")->only(AUTH);
$router->patch($prefix . "/study/:programID/:courseID/order", "dashboard/study/update_program_course.php")->only(AUTH);