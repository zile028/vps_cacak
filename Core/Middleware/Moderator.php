<?php

namespace Core\Middleware;

use Core\Response;
use Core\Router;

class Moderator
{
    public function handle()
    {
        if (!isset($_SESSION["user"]) || $_SESSION["user"]["role"] !== "moderator") {
            Router::redirect("/error/403");
        }
    }
}