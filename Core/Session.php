<?php

namespace Core;

class Session
{
    private const FLASH = "_flash";

    public static function getAll()
    {
        return $_SESSION;
    }

    public static function currentUser($key = null)
    {
        return $key ? self::get("user")[$key] : self::get("user");
    }

    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
        session_regenerate_id(true);
    }

    public static function get($key, $default = null)
    {
        return $_SESSION[self::FLASH][$key] ?? $_SESSION[$key] ?? $default;
    }

    public static function getFlesh($key, $default = null)
    {
        return $_SESSION[self::FLASH][$key] ?? $_SESSION[self::FLASH] ?? $default;
    }

    public static function updateFlash($key, $value)
    {

        $_SESSION[self::FLASH][$key] = $value;
    }

    public static function has($key)
    {
        return (bool)static::get($key);
    }

    public static function hasFlash()
    {
        return (bool)static::has(self::FLASH);
    }

    public static function flash($key, $value)
    {
        $_SESSION[self::FLASH][$key] = $value;
    }

    public static function unflash()
    {
        unset($_SESSION[self::FLASH]);
    }

    public static function flush()
    {
        $_SESSION = [];
    }

    public static function destroy()
    {
        static::flush();
        $params = session_get_cookie_params();
        setcookie("PHPSESSID", "", time() - 42000, $params["path"], $params["domain"], $params["secure"],
            $params["httponly"]);
        session_destroy();
    }

    public static function update($key, $value)
    {
        $_SESSION["user"][$key] = $value;
    }

    public static function setUser($user)
    {
        self::put("user",
            [
                "fullName" => $user->firstName . " " . $user->lastName,
                "id" => $user->id,
                "role" => $user->role,
                "image" => $user->image,
                "lang" => "srb"
            ]);
    }
}













