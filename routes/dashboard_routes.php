<?php
$prefix = "/dashboard";
require_once "dashboard_staff.php";
require_once "dashboard_documents.php";
require_once "dashboard_study.php";
require_once "dashboard_admission.php";
require_once "dashboard_widget.php";
require_once "dashboard_navbar.php";
require_once "dashboard_schedule.php";
require_once "dashboard_news.php";
require_once "dashboard_alumni.php";

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

//KORISNICI
$router->get($prefix . "/users", "dashboard/users/index.php")->only(AUTH);
$router->get($prefix . "/users/create", "dashboard/users/user_create_page.php")->only(AUTH);
$router->get($prefix . "/users/profile", "dashboard/users/profile.php");
$router->post($prefix . "/users/create", "dashboard/users/create_user.php")->only(AUTH);
$router->put($prefix . "/users/profile", "dashboard/users/updateProfile.php");
$router->put($prefix . "/users/password", "dashboard/users/changePassword.php");
$router->patch($prefix . "/users/:id", "dashboard/users/update_user.php")->only(AUTH);
$router->delete($prefix . "/users/:id", "dashboard/users/user_delete.php")->only(AUTH);

//AUTH
$router->get($prefix . "/login", "dashboard/auth/show.php");
$router->get($prefix . "/logout", "dashboard/auth/logout.php")->only(AUTH);
$router->get($prefix . "/register", "dashboard/auth/show.php");

$router->post($prefix . "/register", "dashboard/auth/register_insert.php");
$router->post($prefix . "/login", "dashboard/auth/login.php");

//CONFIG
$router->get($prefix . "/config/lang/:lang", "dashboard/config/change_language.php")->only(AUTH);


//MEDIA
$router->get($prefix . "/media", "dashboard/media/index.php")->only(AUTH);
$router->get($prefix . "/media/edit/:id", "dashboard/media/edit.php")->only(AUTH);

$router->patch($prefix . "/media/edit/:id", "dashboard/media/update.php")->only(AUTH);

$router->delete($prefix . "/media/:id", "dashboard/media/delete.php")->only(AUTH);

$router->post($prefix . "/media", "dashboard/media/create.php")->only(AUTH);