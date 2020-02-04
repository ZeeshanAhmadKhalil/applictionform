<?php
session_start();
require_once "dbController.php";
$db_handle = new DBController();
$username = $_SESSION['username'];
if (isset($_SESSION['type'])) {
    $type = $_SESSION['type'];
    if ($type == 'reciever') {
        $Applications = "SELECT applicationID,applicantName FROM applicationsubmitted WHERE status='submitted'";
        $result = $db_handle->numRows($Applications);
        if ($result > 0) {
            $result = $db_handle->runQuery($Applications);
            $application = '';
            foreach ($result as $ApplicationData) {
                $application .= ' <li class="list-group-item d-flex justify-content-between align-items-center">';
                $application .= $ApplicationData['applicantName'] . ' ' . $ApplicationData['applicationID'];
                $application .= '<span class="badge badge-primary badge-pill"><a class="btn btn-primary" role="button" href="./ApplicationDetails.php?applicationID=' . $ApplicationData['applicationID'] . '">Recieve/Reject</a></span></li>';
            }
            echo $application;
        }
    } else if ($type == 'reviewer') {
        $username=$_SESSION['username'];
        $reviewers="SELECT type,Name FROM employees WHERE Emp_email='$username'";
        $result=$db_handle->runQuery($reviewers);
        $type_=$result[0]['type'];
        $name=$result[0]['Name'];
        preg_match_all('!\d+!', $type_, $matches);
        $application_type=$matches[0][0];
        // echo "<script>alert('$name')</script>";
        // echo "<script>alert('$type_')</script>";
        $Applications = "SELECT applicationID,applicantName,comment FROM applicationsubmitted WHERE status='recieved' and ApplicationType='$application_type'";
        $result = $db_handle->numRows($Applications);
        if ($result > 0) {
            $result = $db_handle->runQuery($Applications);
            $application = '';
            foreach ($result as $ApplicationData) {
                $comment=$ApplicationData['comment'];
                $already_reviewed=strpos($comment,$name);
                // echo "<script>alert('$comment')</script>";
                // echo "<script>alert('$already_reviewed')</script>";
                if($already_reviewed===false){
                    $application .= ' <li class="list-group-item d-flex justify-content-between align-items-center">';
                    $application .= $ApplicationData['applicantName'] . ' ' . $ApplicationData['applicationID'];
                    $application .= '<span class="badge badge-primary badge-pill"><a class="btn btn-primary" role="button" href="./ApplicationDetails.php?applicationID=' . $ApplicationData['applicationID'] . '">Review Application</a></span></li>';
                }
            }
            echo $application;
        }
    }
    else if($type='approver'){
        $Applications = "SELECT applicationID,applicantName FROM applicationsubmitted WHERE status='reviewed'";
        $result = $db_handle->numRows($Applications);
        if ($result > 0) {
            $result = $db_handle->runQuery($Applications);
            $application = '';
            foreach ($result as $ApplicationData) {
                $application .= ' <li class="list-group-item d-flex justify-content-between align-items-center">';
                $application .= $ApplicationData['applicantName'] . ' ' . $ApplicationData['applicationID'];
                $application .= '<span class="badge badge-primary badge-pill"><a class="btn btn-primary" role="button" href="./ApplicationDetails.php?applicationID=' . $ApplicationData['applicationID'] . '">Approve/Disapprove </a></span></li>';
            }
            echo $application;
        }
    }

} else {
    $Applications = "SELECT applicationID,applicantName FROM applicationsubmitted WHERE useremail='$username' and status!='InProgress'";
    $result = $db_handle->numRows($Applications);
    if ($result > 0) {
        $result = $db_handle->runQuery($Applications);
        $application = '';
        foreach ($result as $ApplicationData) {
            $application .= ' <li class="list-group-item d-flex justify-content-between align-items-center">';
            $application .= $ApplicationData['applicantName'] . ' ' . $ApplicationData['applicationID'];
            $application .= '<span class="badge badge-primary badge-pill"><a class="btn btn-primary" role="button" href="./ApplicationDetails.php?applicationID=' . $ApplicationData['applicationID'] . '">View Application</a></span></li>';
        }
        echo $application;
    }
}
