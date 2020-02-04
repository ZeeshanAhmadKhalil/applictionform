<?php
session_start();
include_once 'dbController.php';
$db_handle = new DBController();
$applicantUsername = $_SESSION['username'];
$query = "SELECT applicationID FROM applicationsubmitted WHERE status='InProgress' and useremail='$applicantUsername'";
$count = $db_handle->numRows($query);
if ($count == 0) {
    $applicationId = $_POST['applicationId'];
    // echo "used new,";
} else {
    $result = $db_handle->runQuery($query);
    $applicationId = $result[0]['applicationID'];
    // echo "used exised,";
}
echo "$applicationId,_.";
mkdir('../data/applications/' . $applicationId);
$query = "SELECT * FROM applicationsubmitted where applicationID = '$applicationId'";
$count = $db_handle->numRows($query);
if ($count == 0) {
    $anotherquery = "INSERT INTO applicationsubmitted (applicationID,useremail) VALUES ('$applicationId','$applicantUsername')";
    $current_id = $db_handle->insertQuery($anotherquery);
    if ($current_id == "success") {
        echo "success";
    }
}
