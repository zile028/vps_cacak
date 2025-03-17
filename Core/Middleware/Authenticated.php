<?php

namespace Core\Middleware;

class Authenticated
{
    public function handle()
    {

        if (!isset($_SESSION["user"]) || !in_array($_SESSION["user"]["role"], [AUTH, ADMIN, MODERATOR, GUEST])) {
//            view("403", ["heading" => "Error"]);
            redirect("/dashboard/login");
            exit();

        }
    }
}