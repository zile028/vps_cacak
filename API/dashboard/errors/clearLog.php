<?php

try {
    if (file_exists(LOG_FILE)) {
        $file = fopen(LOG_FILE, "w");
        fclose($file);
        redirectBack();
    }
} catch (Exception $e) {
    writeLog($e->getMessage());
}
