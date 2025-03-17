<?php

use Core\App;
use Core\Database;
use Core\FileValidator;
use Core\Validator;

$db = App::resolve(Database::class);
$sql = "INSERT INTO media (fileName, storeName, type, size, mimetype) VALUES (:fileName, :storeName, :type, :size,:mimetype)";

$file = new FileValidator($_FILES["attachment"]);
$file->setValidType(["*"]);
$file->setLimit(20, "mb");
if (Validator::string($_POST["fileName"]) && $file->isValid()) {
    if ($file->upload()) {
        $bindParam = [
            "fileName" => $_POST["fileName"],
            "storeName" => $file->storeName,
            "type" => $file->extension,
            "mimetype" => $file->type,
            "size" => $file->size,
        ];
        $db->query($sql, $bindParam);

        if (file_exists(UPLOAD_DIR . $file->name.".".$file->extension) && unlink(UPLOAD_DIR . $file->name.".".$file->extension)) {
        redirect("/media");

        }
        redirect("/media");
    }
} else {
    dd($file->getError());
}