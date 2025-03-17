<?php
$router->get("/migration", "/migration/index.php")->only(ADMIN);
$router->get("/error/:code", "dashboard/error/index.php");

//TICKETS
$router->get("/tickets", "dashboard/tickets/home.php")->only(AUTH);
$router->get("/tickets/create", "dashboard/tickets/create.php")->only(AUTH);
$router->get("/tickets/:id", "dashboard/tickets/show.php")->only(AUTH);
$router->post("/tickets/create", "dashboard/tickets/save.php")->only(AUTH);
$router->patch("/tickets/:id", "dashboard/tickets/update.php")->only(AUTH);
$router->patch("/tickets/:id/status", "dashboard/tickets/changeStatus.php")->only(AUTH);
$router->delete("/tickets/:id", "dashboard/tickets/delete.php")->only(AUTH);

//ERRORS
$router->get("/errors", "dashboard/errors/show.php")->only(ADMIN);
$router->delete("/errors/:line", "dashboard/errors/deleteLine.php")->only(ADMIN);
$router->delete("/errors", "dashboard/errors/clearLog.php")->only(ADMIN);

//HOME DASHBOARD
$router->get("/dashboard", "dashboard/home/show.php")->only(AUTH);

//GALLERY
$router->get("/gallery", "dashboard/gallery/show.php")->only(AUTH);
$router->get("/gallery/create", "dashboard/gallery/create.php")->only(AUTH);
$router->get("/gallery/:id", "dashboard/gallery/preview.php")->only(AUTH);
$router->put("/gallery/:id", "dashboard/gallery/updateGallery.php")->only(AUTH);
$router->patch("/gallery/:id", "dashboard/gallery/updateImage.php")->only(AUTH);
$router->post("/gallery/:id", "dashboard/gallery/addImage.php")->only(AUTH);
$router->post("/gallery/create", "dashboard/gallery/save.php")->only(AUTH);
$router->delete("/gallery/:id", "dashboard/gallery/delete.php")->only(AUTH);

// COOPERATION
$router->get("/cooperation", "dashboard/cooperation/index.php")->only(AUTH);
$router->get("/cooperation/create", "dashboard/cooperation/create.php")->only(ADMIN);
$router->get("/cooperation/:type", "dashboard/cooperation/show.php")->only(AUTH);
$router->get("/cooperation/create/:type", "dashboard/cooperation/create_type.php")->only(AUTH);
$router->get("/cooperation/edit/:id", "dashboard/cooperation/edit.php")->only(AUTH);
$router->patch("/cooperation/:id", "dashboard/cooperation/update.php")->only(AUTH);
$router->delete("/cooperation/:id", "dashboard/cooperation/delete.php")->only(AUTH);
$router->post("/cooperation/:type", "dashboard/cooperation/save.php")->only(AUTH);

//ADMISSION
$router->get("/admission", "dashboard/admission/index.php")->only(AUTH);
$router->get("/admission/create", "dashboard/admission/create.page.php")->only(AUTH);
$router->get("/admission/requirement/:id", "dashboard/admission/requirement_edit.page.php")->only(AUTH);

$router->patch("/admission/requirement/:id", "dashboard/admission/update_requirement.php")->only(AUTH);
$router->patch("/admission/requirement/priority/:id", "dashboard/admission/update_requirement_priority.php")->only(AUTH);

$router->post("/admission/create", "dashboard/admission/save_new.php")->only(AUTH);

//WIDGET
$router->get("/widget", "dashboard/widget/index.php")->only(ADMIN);
$router->get("/widget/create", "dashboard/widget/create.php")->only(ADMIN);
$router->post("/widget/create", "dashboard/widget/save.php")->only(ADMIN);
$router->put("/widget/:id", "dashboard/widget/update.php")->only(ADMIN);
$router->delete("/widget/:id", "dashboard/widget/delete.php")->only(ADMIN);


//NAVBAR
$router->get("/navbar", "dashboard/navbar/index.php")->only(ADMIN);

$router->post("/navbar", "dashboard/navbar/create.php")->only(ADMIN);
$router->post("/navbar/:itemID", "dashboard/navbar/update.php")->only(ADMIN);

$router->delete("/navbar/:itemID", "dashboard/navbar/destroy.php")->only(ADMIN);

//KORISNICI
$router->get("/users", "dashboard/users/index.php")->only(AUTH);
$router->get("/users/create", "dashboard/users/user_create_page.php")->only(AUTH);
$router->get("/users/profile", "dashboard/users/profile.php");
$router->post("/users/create", "dashboard/users/create_user.php")->only(AUTH);
$router->put("/users/profile", "dashboard/users/updateProfile.php");
$router->put("/users/password", "dashboard/users/changePassword.php");
$router->patch("/users/:id", "dashboard/users/update_user.php")->only(AUTH);
$router->delete("/users/:id", "dashboard/users/user_delete.php")->only(AUTH);

//RASPOREDI
$router->get("/schedule", "dashboard/schedule/index.php")->only(AUTH);
$router->get("/schedule/:id/:lang", "dashboard/schedule/schedule_show.php")->only(AUTH);
$router->get("/schedule/exams", "dashboard/schedule/exams_index.php")->only(AUTH);

$router->post("/schedule/:category/:lang", "dashboard/schedule/schedule_create.php")->only(AUTH);

$router->delete("/schedule/:id", "dashboard/schedule/delete_schedule.php")->only(AUTH);

//DOKUMENTA
$router->get("/document", "dashboard/document/index.php")->only(AUTH);
$router->get("/document/category", "dashboard/document/category_create_page.php")->only(AUTH);
$router->get("/document/category/:id", "dashboard/document/category_documents.php")->only(AUTH);
$router->get("/document/edit/:id", "dashboard/document/edit_document.php")->only(AUTH);

$router->post("/document/category", "dashboard/document/category_create.php")->only(AUTH);
$router->post("/document/category/:id", "dashboard/document/category_add_document.php")->only(AUTH);

$router->patch("/document/category/:id", "dashboard/document/category_update.php")->only(AUTH);
$router->patch("/document/:id", "dashboard/document/update_document.php")->only(AUTH);

$router->delete("/document/category/:id", "dashboard/document/category_delete.php")->only(AUTH);
$router->delete("/document/:id", "dashboard/document/document_delete.php")->only(AUTH);

//OSOBLJE
$router->get("/staff", "dashboard/staff/index.php")->only(ADMIN)->only(MODERATOR);
$router->get("/staff/all", "dashboard/staff/show_staffs.php")->only(AUTH);
$router->get("/staff/add", "dashboard/staff/add_staff_page.php")->only(AUTH);
$router->get("/staff/edit/:id", "dashboard/staff/edit_staff_page.php")->only(AUTH);
$router->get("/staff/category/add", "dashboard/staff/create_category_page.php")->only(ADMIN);
$router->get("/staff/category/:id", "dashboard/staff/category_show.php")->only(AUTH);
$router->get("/staff/category/:id/position", "dashboard/staff/category_positions_page.php")->only(AUTH);
$router->get("/staff/education/:id", "dashboard/staff/staff_education_page.php")->only(AUTH);

$router->post("/staff/add", "dashboard/staff/add_staff.php")->only(AUTH);
$router->post("/staff/category/add", "dashboard/staff/save_category.php")->only(AUTH);
$router->post("/staff/category/:id/position", "dashboard/staff/save_category_positions.php")->only(AUTH);
$router->post("/staff/education/:id", "dashboard/staff/staff_education_save.php")->only(AUTH);
$router->put("/staff/edit/:id", "dashboard/staff/update_staff.php")->only(AUTH);
$router->put("/staff/category/:id", "dashboard/staff/category_append_staff.php")->only(AUTH);
$router->put("/staff/relation", "dashboard/staff/relate_staff.php")->only(AUTH);

$router->patch("/staff/category/position/priority/:id", "dashboard/staff/category_positions_priority.php")->only(AUTH);
$router->patch("/staff/category/priority/:id", "dashboard/staff/category_update_priority.php")->only(AUTH);
$router->patch("/staff/category/:id/:staffId", "dashboard/staff/category_staff_priority.php")->only(AUTH);

$router->delete("/staff/category/member/:clanId", "dashboard/staff/category_staff_remove.php")->only(AUTH);
$router->delete("/staff/category/position/:id", "dashboard/staff/category_positions_remove.php")->only(AUTH);
$router->delete("/staff/category/:id", "dashboard/staff/category_remove.php")->only(AUTH);
$router->delete("/staff/education/:id", "dashboard/staff/staff_education_delete.php")->only(AUTH);
$router->delete("/staff/:id", "dashboard/staff/staff_delete.php")->only(AUTH);

//AUTH
$router->get("/login", "dashboard/auth/show.php");
$router->get("/logout", "dashboard/auth/logout.php")->only(AUTH);
$router->get("/register", "dashboard/auth/show.php");

$router->post("/register", "dashboard/auth/register_insert.php");
$router->post("/login", "dashboard/auth/login.php");

//CONFIG
$router->get("/config/lang/:lang", "dashboard/config/change_language.php")->only(AUTH);

//VESTI
$router->get("/news", "dashboard/news/show.php")->only(AUTH);
$router->get("/news/add", "dashboard/news/news_add_page.php")->only(AUTH);
$router->get("/news/edit/:id", "dashboard/news/news_edit_page.php")->only(AUTH);

$router->patch("/news/edit/:id", "dashboard/news/news_update.php")->only(AUTH);
$router->patch("/news/publish/:id", "dashboard/news/news_publish_update.php")->only(ADMIN);

$router->post("/news/add", "dashboard/news/news_save.php")->only(AUTH);

$router->delete("/news/:id", "dashboard/news/news_delete.php")->only(AUTH);

//MEDIA
$router->get("/media", "dashboard/media/index.php")->only(AUTH);
$router->get("/media/edit/:id", "dashboard/media/edit.php")->only(AUTH);

$router->patch("/media/edit/:id", "dashboard/media/update.php")->only(AUTH);

$router->delete("/media/:id", "dashboard/media/delete.php")->only(AUTH);

$router->post("/media", "dashboard/media/create.php")->only(AUTH);

//STUDIJE
$router->get("/study", "dashboard/study/index.php")->only(AUTH);
$router->get("/study/level", "dashboard/study/study_level_page.php")->only(AUTH);
$router->get("/study/level/:id", "dashboard/study/study_level_edit_page.php")->only(AUTH);
$router->get("/study/course", "dashboard/study/index_course.php")->only(AUTH);
$router->get("/study/course/add", "dashboard/study/create_course.php")->only(AUTH);
$router->get("/study/program/add", "dashboard/study/study_program_add.php")->only(AUTH);
$router->get("/study/course/:id", "dashboard/study/edit_course_page.php")->only(AUTH);
$router->get("/study/program/:id", "dashboard/study/study_program_index.php")->only(AUTH);

$router->post("/study/program/add", "dashboard/study/study_program_save.php")->only(AUTH);
$router->post("/study/course/add", "dashboard/study/save_course.php")->only(AUTH);

$router->delete("/study/course/:id", "dashboard/study/delete_course.php")->only(AUTH);
$router->delete("/study/program/:id", "dashboard/study/delete_study.php")->only(AUTH);
$router->delete("/study/:spID/course/remove/:id", "dashboard/study/study_course_remove.php")->only(AUTH);

$router->put("/study/program/:id", "dashboard/study/study_program_update.php")->only(AUTH);
$router->put("/study/program/:id/course", "dashboard/study/study_program_course.php")->only(AUTH);
$router->put("/study/course/:id", "dashboard/study/update_course.php")->only(AUTH);

$router->patch("/study/active/:id", "dashboard/study/update_study_status.php")->only(AUTH);
$router->patch("/study/level/:id", "dashboard/study/update_study_level.php")->only(AUTH);
$router->patch("/study/:programID/:courseID/order", "dashboard/study/update_program_course.php")->only(AUTH);