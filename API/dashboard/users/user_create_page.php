<?php
$roles = \Core\Middleware\Middleware::getRoles();
view("dashboard/users/create.view", ["roles" => $roles]);