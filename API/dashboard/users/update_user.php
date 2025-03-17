<?php


$result = \Core\QueryBuilder::updateOne("users", [
    "role" => $_POST["role"]
], $params["id"]);
redirectBack();