<?php
$router->get("/", "public/home/index.php");
$router->get("/onama/:slug", "public/about/index.php");
$router->get("/osoblje/:id", "public/about/staff_detail.php");
$router->get("/cenovnik", "public/about/price_list.php");
$router->get("/studije", "public/study/index.php");
$router->get("/studije/:id", "public/study/single.php");
$router->get("/dokumenta/:slug", "public/documents/index.php");
$router->get("/raspored/:slug", "public/schedule/index.php");
$router->get("/preuzimanje", "public/downloads/index.php");
$router->get("/vesti", "public/news/index.php");
$router->get("/vesti/:id", "public/news/single_news.php");
$router->get("/upis", "public/admission/index.php");
$router->get("/alumni", "public/alumni/index.php");
$router->post("/alumni/subscribe", "public/alumni/subscribe.php");
$router->get("/kontakt", "public/contact/index.php");
