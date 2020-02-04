<?php
session_start();
$pageTitle = 'Applications';
include_once('include/dashboard.header.php');
require_once("include/dbController.php");
$db_handle = new DBController();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Application Comments</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4 decision_comment">
        <!-- Card Header - Dropdown -->
        <div class="card-header d-flex flex-row ">
            <h6 class="m-0 font-weight-bold text-primary">Decision and Comments</h6>
        </div>
        <div class="card-body">
            <section style="color:'red'">
                <?php
                    $username=$_SESSION['username'];
                    $application_comments="SELECT * from applicationsubmitted WHERE useremail='$username' and comment!=''";
                    $result=$db_handle->runQuery($application_comments);
                    echo "<div class='tbl-header '>
                    <table cellpadding='0' cellspacing='0' border='0'>
                        <thead>
                            <tr>
                                <th >Application ID</th>
                                <th >Application Type</th>
                                <th >Application Status</th>
                                <th >Employee Name</th>
                                <th >Employee Decision</th>
                                <th colspan='2'>Employee Comment</th>
                            </tr>
                        </thead>
                    </table>
                        </div>
                    <div class='tbl-content' id='Table_data'>
                    <tbody>
                    <table cellpadding='0' cellspacing='0' border='0'>
                    ";
                    foreach($result as $row){
                        $application_ID=$row['applicationID'];
                        $application_Type=$row['ApplicationType'];
                        $status=$row['status'];
                        $comment=$row['comment'];
                        if($row['status']=='rejected'){
                            $reciever_name="SELECT Name FROM employees WHERE type='reciever'";
                            $reciever_name_result=$db_handle->runQuery($reciever_name);
                            $reciever_name=$reciever_name_result[0]['Name'];
                            echo "
                            <tr>
                                <th >$application_ID</th>
                                <th >$application_Type</th>
                                <th >$status</th>
                                <th >$reciever_name</th>
                                <th >Rejected</th>
                                <th colspan='2'>$comment</th>
                            </tr>
                            ";
                        }
                        else{
                            $comments = explode(',_.', $comment);
                            foreach($comments as $comment_){
                                if($comment_!=''){
                                    $comment_=explode(':', $comment_, 2);
                                    // echo "<script>alert('$comment_[1]')</script>";
                                    $name_decision=$comment_[0];
                                    $comment_=$comment_[1];
                                    $name_decision=explode(' ',$name_decision,2);
                                    $name=$name_decision[0];
                                    $decision=$name_decision[1];
                                    echo "
                                        <tr>
                                            <th >$application_ID</th>
                                            <th >$application_Type</th>
                                            <th >$status</th>
                                            <th >$name</th>
                                            <th >$decision</th>
                                            <th colspan='2'>$comment_</th>
                                        </tr>
                                    ";
                                }
                            }
                            // echo "<script>alert('one other')</script>";
                        }
                    }
                    echo "
                    </tbody></table>
                    </div>
                    ";
                ?>
            </section>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?php
function customPageFooter()
{
    echo '<script src="js/getApplications.js"></script>';
}
include_once('include/dashboard.footer.php');
?>