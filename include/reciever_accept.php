<?php
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    require '../vendor/autoload.php';
    require 'credentials.php';
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
        $reviewers="SELECT Name,type FROM employees WHERE Emp_email='$username'";
        $result=$db_handle->runQuery($reviewers);
        $name=$result[0]['Name'];
        $exact_type=$result[0]['type'];
        $check="SELECT comment FROM applicationsubmitted WHERE applicationID='$application_id'";
        $result=$db_handle->runQuery($check);
        $comment_=$result[0]['comment'];
        $count= substr_count($comment_, ',_.');

        $count_reviewers="SELECT * FROM employees WHERE type='$exact_type'";
        $count_reviewers=$db_handle->numRows($count_reviewers);
        $a=$count_reviewers-1;
        echo "$a \n";
        echo "$count";
        $comment=$comment_.$name." accepted:".$comment.",_.";
        if($count==$a){
            // echo "here";
            $review_appication="UPDATE applicationsubmitted SET comment='$comment',status='reviewed' WHERE applicationID='$application_id'";
            $db_handle->runQuery($review_appication);
        } else {
            $review_appication="UPDATE applicationsubmitted SET comment='$comment' WHERE applicationID='$application_id'";
            $db_handle->runQuery($review_appication);
        }
    } elseif($_SESSION['type']=='approver'){
        $application_id=$_POST['applicationID'];
        $comment=$_POST['comment'];
        $change_status="UPDATE applicationsubmitted SET status='approved',comment='$comment' WHERE applicationID='$application_id'";
        $db_handle->runQuery($change_status);
        $query="SELECT useremail FROM applicationsubmitted WHERE applicationID='$application_id'";
        $result=$db_handle->runQuery($query);
        $useremail=$result['0']['useremail'];
        $mail = new PHPMailer(true);
        try {
            echo "working1.";
            // $mail->SMTPDebug = 1;
            /* Set the mail sender. */
            require('mail.sender.php');
            $mail->IsHTML(true);
            echo "working2";
            /* Add a recipient. */

            echo "[$useremail]";
            $mail->addAddress($useremail);

            /* Set the subject. */
            $mail->Subject = 'Application Submission';
            echo "working3";

            $actual_link = "http://$_SERVER[HTTP_HOST]/ApplicationSubmission_Project-master/include/" . "activation.php?username=" . $useremail;

            /* Set the mail message body. */
            $mail->Body = "Your Application has been APPROVED, please visit our website to check comments.";

            /* Tells PHPMailer to use SMTP. */
            $mail->isSMTP();
            echo "working4";
            /* SMTP server address. */
            $mail->Host = 'smtp.gmail.com';

            /* Use SMTP authentication. */
            $mail->SMTPAuth = true;

            /* Set the encryption system. */
            $mail->SMTPSecure = 'tls';

            /* SMTP authentication username. */
            $mail->Username = $email;
            echo "working5";
            /* SMTP authentication password. */
            $mail->Password = $password;

            /* Set the SMTP port. */
            $mail->Port = 587;
            echo "working6";
            /* Finally send the mail. */
            
            echo "working7";
            if($mail->send()){
                echo "sended";
            } else {
                echo "not sended";
            }
        } catch (Exception $e) {
            /* PHPMailer exception. */
            echo $e->errorMessage();
            echo "working8";
            
        } catch (\Exception $e) {
            /* PHP exception (note the backslash to select the global namespace Exception class). */
            echo $e->getMessage();
            echo "working9";

        }
    }
?>