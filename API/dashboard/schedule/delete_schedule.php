<?php

$result = \Core\QueryBuilder::deleteOne("raspored", $params["id"]);
redirectBack();