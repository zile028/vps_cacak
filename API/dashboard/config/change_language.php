<?php

use Core\Router;
use Core\Session;

Session::update("lang", $params["lang"]);
Router::redirectBack(null, ["lang" => $params["lang"]]);
