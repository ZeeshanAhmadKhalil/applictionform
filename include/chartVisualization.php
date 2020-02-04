<?php
session_start();
require_once "dbController.php";
$db_handle = new DBController();
$type = $_SESSION['type'];
echo "$type,";
if ($type == 'reciever') {
    $query = "SELECT * FROM applicationsubmitted WHERE status='submitted'";
    $count = $db_handle->numRows($query);
    echo "$count,";
    $query = "SELECT * FROM applicationsubmitted WHERE status='rejected'";
    $count = $db_handle->numRows($query);
    echo "$count,";
    $query = "SELECT * FROM applicationsubmitted WHERE status!='rejected' and status!='submitted' and status!='InProgress'";
    $count = $db_handle->numRows($query);
    echo "$count,";
} elseif ($type == 'reviewer') {
    $username = $_SESSION['username'];
    $query = "SELECT type,Name from employees WHERE Emp_email='$username'";
    $result = $db_handle->runQuery($query);
    $type_ = $result[0]['type'];
    $name = $result[0]['Name'];
    preg_match_all('!\d+!', $type_, $matches);
    $application_type = $matches[0][0];
    echo "$application_type,";
    $query = "SELECT * FROM applicationsubmitted WHERE status='submitted'";
    $count = $db_handle->numRows($query);
    echo "$count,";
    $query = "SELECT * FROM applicationsubmitted WHERE status='rejected'";
    $count = $db_handle->numRows($query);
    echo "$count,";
    $query = "SELECT * FROM applicationsubmitted WHERE status!='rejected' and status!='submitted' and status!='InProgress'";
    $count = $db_handle->numRows($query);
    echo "$count,";
    $query = "SELECT * FROM applicationsubmitted WHERE status!='rejected' and ApplicationType='$application_type' and status!='submitted' and status!='InProgress' and comment NOT LIKE '%$name%'";
    $count = $db_handle->numRows($query);
    echo "$count,";
    $query = "SELECT * FROM applicationsubmitted WHERE status!='rejected' and ApplicationType='$application_type' and status!='submitted' and status!='InProgress' and comment LIKE '%$name accepted%'";
    $count = $db_handle->numRows($query);
    echo "$count,";
    $query = "SELECT * FROM applicationsubmitted WHERE status!='rejected' and ApplicationType='$application_type' and status!='submitted' and status!='InProgress' and comment LIKE '%$name rejected%'";
    $count = $db_handle->numRows($query);
    echo "$count,";
} elseif ($type == 'approver') {
    $query = "SELECT * FROM applicationsubmitted WHERE status='submitted'";
    $count = $db_handle->numRows($query);
    echo "$count,";
    $query = "SELECT * FROM applicationsubmitted WHERE status='rejected'";
    $count = $db_handle->numRows($query);
    echo "$count,";
    $query = "SELECT * FROM applicationsubmitted WHERE status!='rejected' and status!='submitted' and status!='InProgress'";
    $count = $db_handle->numRows($query);
    echo "$count,";
    $query = "SELECT * FROM applicationsubmitted WHERE status='reviewed'";
    $count = $db_handle->numRows($query);
    echo "$count,";
    $query = "SELECT * FROM applicationsubmitted WHERE status='approved'";
    $count = $db_handle->numRows($query);
    echo "$count,";
    $query = "SELECT * FROM applicationsubmitted WHERE status='disapproved'";
    $count = $db_handle->numRows($query);
    echo "$count,";
    $query = "SELECT * FROM applicationsubmitted WHERE status='recieved'";
    $count = $db_handle->numRows($query);
    echo "$count,";
    $query = "SELECT * FROM applicationsubmitted WHERE status='approved' or status='disapproved' or status='reviewed'";
    $count = $db_handle->numRows($query);
    echo "$count,";
}
$query = "SELECT submission_date FROM applicationsubmitted WHERE status!='rejected' and status!='approved' and status!='disapproved' and status!='InProgress'";
$result = $db_handle->runQuery($query);
foreach ($result as $row) {
    $your_date = $row['submission_date'];
    $now = time(); // or your date as well
    $your_date = strtotime($your_date);
    $datediff = $now - $your_date;
    echo round($datediff / (60 * 60 * 24)).",";
}
