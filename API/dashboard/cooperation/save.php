<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validation;

$db = App::resolve(Database::class);
$data = $_POST;
$type = $params["type"];
Session::unflash();
switch ($_POST["submit"]) {
    case "add_logo":
        Session::flash("cooperation", [...$_POST, "cb" => "/cooperation/create/$type"]);
        redirect("/media");
        break;
    case "save":
        $validate = new Validation([...$_POST, "slug" => "corporate", "lang" => Session::currentUser("lang") ?? "srb"]);
        $validate->validate("title", "string", "Naziv je obavezan!");
        $validate->validate("url", "url", "Web adresa nije validna!");
        if ($validate->hasError()) {
            Session::flash("cooperation", [...$_POST, "cb" => "/cooperation/corporate"]);
        } else {
            $sql = "INSERT INTO saradnja 
                        (title, url, color, logo, flag, slug, lang) 
                        VALUES (:title, :url, :color, :logo, :flag, :slug, :lang)";
            try {
                $result = $db->query($sql, $validate->getData())->affectedRows();
                redirect("/cooperation/corporate");
            } catch (Exception $e) {
                displayErrorPage($e);
            }
        }
        break;
    default:
        break;
}
