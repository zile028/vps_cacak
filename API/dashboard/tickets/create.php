<?php

try {
    view("dashboard/tickets/create.view");
} catch (Exception $e) {
    writeLog($e->getMessage(), basename(__FILE__));
    displayErrorPage($e);
}

