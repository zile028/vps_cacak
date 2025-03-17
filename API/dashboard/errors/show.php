<?php

try {
    if (file_exists(LOG_FILE)) {
        $errors = file(LOG_FILE, FILE_IGNORE_NEW_LINES);
    }
    view("dashboard/errors/show_error_log.view", ["errors" => $errors]);
} catch (Exception $e) {
    writeLog($e->getMessage());
}

