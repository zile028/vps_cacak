<?php

namespace Core;

class Widget
{
    static function get($name, $lang)
    {
        $sql = "SELECT * FROM widgets WHERE name=:name AND lang=:lang;";
        $result = App::resolve(Database::class)->query($sql, ['name' => $name, 'lang' => $lang])->find();
        return $result;
    }
}