<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\FileValidator;

$data = $_POST;
$error = [];
$data["imageID"] = $_POST["mediaID"];
unset($data["mediaID"]);
if (!Validator::string($data["firstName"])) {
    $error["firstName"] = "Обавезно";
}
if (!Validator::string($data["lastName"])) {
    $error["lastName"] = "Обавезно";
}
if (!Validator::number($data["diplomirao"], 1900, (int)date("Y"))) {
    $error["diplomirao"] = "Неисправна година дипломирања";
}
if (!Validator::string($data["tema"])) {
    $error["tema"] = "Обавезно";
}
if (!Validator::string($data["poslodavac"])) {
    $error["poslodavac"] = "Обавезно";
}
if (!Validator::string($data["posao"])) {
    $error["posao"] = "Обавезно";
}

if ($_FILES["image"]["size"] > 0) {
    $image = new FileValidator($_FILES["image"]);
    $image->setLimit(2, "mb");
    $image->setValidType(FileValidator::ALLOW_IMAGE);
    if ($image->isValid() && $image->upload()) {

        $media = new \Core\Media($image->forMedia($data["firstName"] . " " . $data["lastName"]));
        $media->save();
        $data["imageID"] = $media->getLastId();
    }
}
$db = App::resolve(Database::class);
$sql = "INSERT INTO alumni (firstName, lastName, spID, diplomirao, tema, poslodavac, posao, social, imageID, lang)
                    VALUES (:firstName, :lastName, :spID, :diplomirao, :tema, :poslodavac, :posao, :social, :imageID, :lang)";
$data["lang"] = "srb";
//dd($data);
$db->query($sql, $data);
redirectBack();