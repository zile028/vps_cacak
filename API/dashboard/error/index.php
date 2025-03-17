<?php
switch ($params["code"]) {
    case "403":
        echo "ERROR YOU DONT HAVE PERMISSION";
        echo "<a href='/'>Go Back</a>";
        break;
    case "404":
        echo "PAGE NOT FOUND";
        echo "<a href='/'>Go Back</a>";
        break;
    default:
        break;
}
