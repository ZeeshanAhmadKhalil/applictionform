<?php
    session_start();
    require_once "dbController.php";
    $db_handle=new DBController();
    if($_SESSION['type']=='reciever'){
        $application_id=$_POST['applicationID'];
        $change_status="UPDATE applicationsubmitted SET status='recieved' WHERE applicationID='$application_id'";
        $db_handle->runQuery($change_status);
    } elseif($_SESSION['type']=='reviewer'){
        $application_id=$_POST['applicationID'];
        $comment=$_POST['comment'];
        $username=$_SESSION['username'];
        $reviewers="SELECT Name FROM employees WHERE Emp_email='$username'";
        $result=$db_handle->runQuery($reviewers);
        $name=$result[0]['Name'];
        $check="SELECT comment FROM applicationsubmitted WHERE applicationID='$application_id'";
        $result=$db_handle->runQuery($check);
        $comment_=$result[0]['comment'];
        $count= substr_count($comment_, ',_.');
        if($count==2){
            $review_appication="UPDATE applicationsubmitted SET status='reviewed' WHERE applicationID='$application_id'";
            $db_handle->runQuery($review_appication);
        }
        $comment=$comment_.$name." accepted:".$comment.",_.";
        $review_appication="UPDATE applicationsubmitted SET comment='$comment' WHERE applicationID='$application_id'";
        $db_handle->runQuery($review_appication);
    } elseif($_SESSION['type']=='approver'){
        $application_id=$_POST['applicationID'];
        $change_status="UPDATE applicationsubmitted SET status='approved' WHERE applicationID='$application_id'";
        $db_handle->runQuery($change_status);
    }
?>