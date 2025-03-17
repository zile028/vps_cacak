<?php

namespace Core;

class Authenticator extends Session
{
    public $errors = [];

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function atempt($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :email;";
        $user = $this->db->query($sql, ["email" => $email])->findOne();
        if (!$user) {
            $this->errors["login"] = "User with this email not exist!";
        } elseif (password_verify($password, $user->password)) {
            static::put("user", [
                "fullName" => $user->firstName . " " . $user->lastName,
                "id" => $user->id,
                "role" => $user->role,
                "image" => $user->image,
                "lang" => "srb"
            ]);
            $sql = "UPDATE users SET lastAccess = CURRENT_TIMESTAMP() WHERE id = :id;";
            $this->db->query($sql, ["id" => $user->id]);
            return true;
        } else {
            $this->errors["login"] = "Invalid credentials";
        }
        Session::flash("errors", $this->errors);
        return false;
    }
}
