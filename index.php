<?php
// 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
// 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
// gh repo edit zile028/vps_cacak --visibility private --accept-visibility-change-consequences
use Core\Router;
use Core\Session;
use Core\ValidationException;

const BASE_PATH = __DIR__ . "/";
require_once(BASE_PATH . "Core/constants.php");

require_once(BASE_PATH . "Core/functions.php");
require_once(BASE_PATH . "Core/ui_functions.php");
$allowedOrigins = [
    "http://192.168.43.30:8081",
    "http://localhost:3000",
    "http://localhost:4000",
    "https://fim.zile028.com",
    "https://zile028.com",
    "https://test.fim.edu.rs",
    "https://fim.edu.rs",
    "https://admin.fim.edu.rs",
];

if (isset($_SERVER['HTTP_ORIGIN']) && in_array($_SERVER['HTTP_ORIGIN'], $allowedOrigins)) {
    header("Access-Control-Allow-Origin: " . $_SERVER['HTTP_ORIGIN']);
}

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    if (isset($_SERVER['HTTP_ORIGIN']) && in_array($_SERVER['HTTP_ORIGIN'], $allowedOrigins)) {
        header("Access-Control-Allow-Origin: " . $_SERVER['HTTP_ORIGIN']);
        exit(0);
    }
}

if (in_array("*", $allowedOrigins)) {
    header("Access-Control-Allow-Origin: *");
}

header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
if (session_status()) {
    session_start();
}
$config = require base_path("/Core/config.php");
spl_autoload_register(static function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require base_path("$class.php");
});
require_once base_path("bootstrap.php");
$router = new Router();
//$router::$fe_url = $config["fe_url"];
require_once base_path("dashboard_routes.php");
require_once base_path("Core/routes.php");
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];
try {
    $router->route(parse_url($_SERVER["REQUEST_URI"]), $method);
} catch (ValidationException $exception) {
    Session::flash("errors", $exception->errors);
    Session::flash("old", $exception->old);
    redirect($router->previusUrl());
}
