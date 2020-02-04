<?php
require_once("dbController.php");
$db_handle = new DBController();
if (!empty($_GET["username"])) {
    $query = "UPDATE users set status = 'active' WHERE useremail='" . $_GET["username"] . "'";
    $result = $db_handle->updateQuery($query);
    if (!empty($result)) {
        $message = "Your account is activated.";
        header("Location:../Signin.php?verification=YourAccounthasbeenactivated");
    } else {
        $message = "Problem in account activation.";
    }
}
