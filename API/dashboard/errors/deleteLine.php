<?php
$line = $params["line"];
try {
    if (file_exists(LOG_FILE)) {
        $errors = file(LOG_FILE, FILE_IGNORE_NEW_LINES);
        if (isset($errors[$line])) {
            unset($errors[$line]);
            $errors = array_values($errors);
            file_put_contents(LOG_FILE, implode("\n", $errors));
        }
    }
    redirectBack();
} catch (Exception $e) {
    writeLog($e->getMessage());
}
