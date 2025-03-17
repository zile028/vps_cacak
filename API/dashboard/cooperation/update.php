<?php

use Core\App;
use Core\Database;
use Core\Session;
use Core\Validation;

$db = App::resolve(Database::class);
$data = $_POST;
$id = $params["id"];
Session::unflash();
switch ($_POST["submit"]) {
    case "add_logo":
        Session::flash("cooperation", [...$_POST, "id" => $id, "cb" => "/cooperation/edit/$id"]);
        redirect("/media");
        break;
    case "save":
        $validate = new Validation([...$_POST, "id" => $id]);
        $validate->validate("title", "string", "Naziv je obavezan!");
        $validate->validate("url", "url", "Web adresa nije validna!");
        if ($validate->hasError()) {
            Session::flash("cooperation", [...$_POST, "cb" => "/cooperation/edit/$id"]);
            dd($validate->getErrors());
        } else {
            $sql = "UPDATE saradnja SET 
                    title = :title, url = :url, slug=:slug,
                    flag = :flag, color=:color, logo = :logo
                WHERE id = :id";
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
