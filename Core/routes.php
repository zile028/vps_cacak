<?php

//KONTAKT
$router->post("/fe/contact", "contact/send_mail.php");
$router->get("/fe/contact/:lang", "contact/get_contacts.php");

$router->get("/fe/nav_item/:lang", "/config/navitem.php");
$router->get("/fe/widgets/:name/:lang", "/widgets/getWidgets.php");

//GALERIJA
$router->get("/fe/gallery/:lang", "gallery/index.php");

//AKREDITOVANI CENTRI
$router->get("/fe/documents/:category", "documents/documentsByCategory.php");

//AKREDITOVANI CENTRI
$router->get("/fe/accredited_center/:slug", "accreditedCenter/show.php");

//STUDY
$router->get("/fe/course_level", "course/show.php");
$router->get("/fe/study/program/:id", "course/studyProgram.php");
$router->get("/fe/study/program/:id/predmeti", "course/studyProgramPredmeti.php");
$router->get("/fe/course_level/:level/:lang", "course/details.php");

//NEWS
$router->get("/fe/news", "news/getNews.php");
$router->get("/fe/news/getSingle/:id", "news/getSingleNews.php");
$router->get("/fe/news/search/:term", "news/search.php");

//INFO
$router->get("/fe/info", "info/getAll.php");

//OSOBLJE
$router->get("/fe/osoblje/nastava", "osoblje/nastava.php");
$router->get("/fe/osoblje/odbor/:slug", "osoblje/clanoviOdbora.php");
$router->get("/fe/osoblje/info/:id", "osoblje/singleInfo.php");

//RASPOREDI
$router->get("/fe/raspored/:slug", "raspored/show.php");

//UDZBENICI
$router->get("/fe/izdavac/udzbenici", "izdavac/getAllUdzbenici.php");
//ADMISSIONS
$router->get("/fe/admission/study/:slug/:lang", "admission/getAdmissionRules.php");

//SARADNJA
$router->get("/fe/cooperation/:slug/:lang", "cooperation/getPartners.php");

//CONFIG
$router->get("/fe/translate", "translate_relation.php");

require_once("dashboard_routes.php");