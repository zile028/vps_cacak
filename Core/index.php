<?php
require_once(__DIR__ . "/functions.php");
$config = require(__DIR__ . "/config.php");
redirect($config["fe_url"]);