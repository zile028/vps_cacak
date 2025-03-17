<?php


use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container->bind("Core\Database", function () {
    $config = require base_path("Core/config.php");
    return new Database($config["database"]);
});

//$container->bind("Core\Resolve", function () {
//    return Reslove();
//});
App::setContainer($container);