<?php
$config = require("config.php");

use Core\Response;
use Core\Session;

function dd($arg): void
{
    echo "<pre>";
    var_dump($arg);
    echo "</pre>";
    die();
}

function vd($arg): void
{
    echo "<pre>";
    var_dump($arg);
    echo "</pre>";
}

function writeLog($value, $controller = null): void
{
    $timestamp = date("d-m-Y H:i:s");
    if (!file_exists(LOG_FILE)) {
        $handle = fopen(LOG_FILE, "w");
    } else {
        $handle = fopen(LOG_FILE, "a");
    }
    if ($controller == null) {
        $data = $timestamp . "##" . $value . "##" . getUser("fullName") . "\n";
    } else {
        $data = $timestamp . "##" . basename($controller) . "##" . $value . "##" . getUser("fullName") . "\n";
    }
    fwrite($handle, $data);
    fclose($handle);
}

function authorize($condition, $status = Response::FORBIDDEN): void
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path): string
{
    return BASE_PATH . $path;
}

function phpSelf(): void
{
    echo $_SERVER['PHP_SELF'];
}

function realUploadPath($path)
{
    return realpath(BASE_PATH . "uploads/" . $path);
}

function staticFile($path)
{
    return UPLOAD_DIR_NAME . $path;
}

function assetImage($path)
{
    return ASSET_IMAGE . $path;
}

function uploadPath($src)
{
    global $config;
    if (str_contains($src, "http")) {
        echo $src;
    } else {
        echo $config["be_url"] . UPLOAD_DIR_NAME . $src;
    }

}

function view($view, $params = []): void
{
    extract($params);
    require base_path("views/$view" . ".php");
}

function getParams($key = null)
{
    if ($key === null) {
        return $params;
    }
    return $params[$key];
}

function abort($statusCode = Response::NOT_FOUND): void
{
    view("$statusCode.php", ["heading" => "Error"]);
    die();
}

function redirect($path)
{
    header("Location: $path");
    exit();
}

function redirectBack($anchor = null)
{
    if (is_null($anchor)) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else {
        header("Location: " . $_SERVER["HTTP_REFERER"] . "#" . $anchor);
    }

    exit();
}

function getProtocol()
{
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
}

function referer($query = true)
{
    $queryString = isset($_SERVER['QUERY_STRING']) ? "?" . $_SERVER['QUERY_STRING'] : "";
    $urlString = $_SERVER['HTTP_REFERER'] ?? $_SERVER['PHP_SELF'];

//    $urlComponents = parse_url($_SERVER["HTTP_REFERER"]);
    $urlComponents = parse_url($urlString . $queryString);
//    $url = $urlComponents['scheme'] . '://' . $urlComponents['host'];
    $url = "";
    if (isset($urlComponents['scheme'])) {
        $url .= $urlComponents['scheme'] . '://';
    }
    if (isset($urlComponents['host'])) {
        $url .= $urlComponents['host'];
    }
    if (isset($urlComponents['port'])) {
        $url .= ':' . $urlComponents['port'];
    }
    if (isset($urlComponents['path'])) {
        $url .= $urlComponents['path'];
    }

    if (isset($urlComponents["query"]) && $query) {
        $url .= "?" . $urlComponents['query'];
    }

    return $url;
}

function getPrevInput($key, $default = null)
{
    return Session::get(INPUTS_FLASH)[$key] ?? $default;
}

function getOld($key, $default = "")
{
    return Session::get("old")[$key] ?? $default;
}

function getFlash($flashKey, $key = null)
{
    if (is_null($key)) {
        return Session::get($flashKey);
    } else {
        return Session::get($flashKey)[$key] ?? null;
    }
}

function getFlashErrors($key = null)
{
    if ($key) {
        return Session::get(ERRORS_FLASH)[$key];
    } else {
        return Session::get(ERRORS_FLASH);
    }
}

function isError($key)
{
    if (Session::has($key)) {
        return Session::get($key);
    } else {
        return false;
    };
}

function hasErrors($key = "error")
{
    return Session::has($key);
}

function sessionHas($key)
{
    Session::has($key);
}

function isLogged()
{
    return Session::has("user");
}

function getUser($key)
{
    return Session::get("user")[$key] ?? false;
}

function haveRole($role): bool
{
    return Session::get("user")["role"] === $role;
}

function base_uri($path = "/")
{
    echo $path;
}

function dateForInput($date, $format = "d.m.Y")
{
    $date = new DateTime($date);
    return date_format($date, $format);
}

function fullDateTime($date = null)
{
    if ($date) {
        $date = new DateTime($date);
        echo date_format($date, "d.m.Y. H:i");
    } else {
        echo date("d.m.Y. H:i");
    }
}

function dateDDMMYYY($date): void
{
    $date = new DateTime($date);
    echo date_format($date, "d.m.Y.");
}

function dateDDMM($date): void
{
    $date = new DateTime($date);
    echo date_format($date, "d.m.");
}

function dateYYYY($date): void
{
    $date = new DateTime($date);
    echo date_format($date, "Y.");
}

function getExcerpt($content, $word_limit = 20, $ellipsis = "...")
{
    // Uklanja HTML tagove iz sadržaja
    $content = strip_tags($content);

    // Razdvaja sadržaj na reči
    $words = explode(' ', $content);

    // Ako sadržaj ima manje reči od ograničenja, vraća ceo sadržaj
    if (count($words) <= $word_limit) {
        return $content;
    } else {
        // Uzima samo prvi deo niza reči, do ograničenja reči
        $excerpt_words = array_slice($words, 0, $word_limit);
        // Spaja reči nazad u string
        $excerpt = implode(' ', $excerpt_words);
        // Dodaje "..." na kraju izvoda
        $excerpt .= $ellipsis;
        return $excerpt;
    }
}

function sizeInMB($size)
{
    $mb = \Core\FileValidator::MB;
    echo round($size / $mb, 2) . "MB";
}


function quillEditor($dataContent = null, $inputName, $isHtml = false, $tabindex = 0)
{
    $display = $isHtml ? "block" : "none";
    echo "<div class='d-flex mb-3 flex-column' data-editor='quillEditor'>
            <div class='col-12'>
                <!-- Create the editor container -->
                <div tabindex='$tabindex' data-editor='container' style='height: 300px'>$dataContent</div>
            </div>
            <textarea name='$inputName' style='display: {$display}; width: 100%; min-height: 300px; resize: none; padding: 12px 15px' class='flex-grow-1' data-editor='content'>$dataContent</textarea>
        </div>";
}

function isSets($arg)
{
    return $arg ?? null;
}

function generatePassword($length = 12)
{
    // Define the possible characters for the password
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+<>?';
    $numbers = '0123456789';
    $symbols = '!@#$%^&*()-_=+<>?';
    $charactersLength = strlen($characters);
    $randomPassword = '';

    // Loop to generate each character of the password
    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomPassword;
}

function buildMenu(array $elements, $parentId = null)
{
    $branch = [];

    foreach ($elements as $element) {
        if ($element['parent'] === $parentId) {
            $children = buildMenu($elements, $element['id']);
            if ($children) {
                $element['submenu'] = $children; // Dodaj podmenije
            }
            $branch[] = $element;
        }
    }

    return $branch;
}

function displayErrorPage($e, $query = true): void
{
    view("errors/error_page_message.view", ["error" => $e, "cbUrl" => referer($query)]);
}

function translate($lang, $word)
{
    $dictionary = require __DIR__ . "/translate.php";
    $keys = explode(".", $word);
    $result = array_reduce($keys, function ($carry, $key) {
        if ($carry) {
            return $carry[$key];
        }
        return null;
    }, $dictionary[$lang]);


    return is_array($result) ? "Error translate" : $result;
}