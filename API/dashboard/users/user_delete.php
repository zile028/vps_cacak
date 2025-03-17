<?php

$result = \Core\QueryBuilder::deleteOne("users", $params["id"]);
redirectBack();