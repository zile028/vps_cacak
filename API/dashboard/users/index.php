<?php
$db = \Core\App::resolve(\Core\Database::class);
$sql = "SELECT * FROM users";
$users = $db->query($sql)->find();
$allRoles = \Core\Middleware\Middleware::getRoles();
$roles = [];
foreach ($allRoles as $role) {
    $roles[$role] = $role;
}
view("dashboard/users/index.view", ["users" => $users, "roles" => $roles]);