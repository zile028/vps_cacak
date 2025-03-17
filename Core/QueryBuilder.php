<?php

namespace Core;

class QueryBuilder
{

    public static function deleteOne($table, $id)
    {
        $db = App::resolve(Database::class);
        $sql = "DELETE FROM $table WHERE id = :id";
        return $db->query($sql, ["id" => $id]);
    }

    public static function updateOne($table, $set = [], $id)
    {
        $db = App::resolve(Database::class);
        $sql = "UPDATE $table SET ";
        foreach ($set as $field => $placeholder) {
            $sql .= "$field = :$field";
        }
        $sql .= " WHERE id = :id";
        $set["id"] = $id;
        return $db->query($sql, $set,);
    }
}