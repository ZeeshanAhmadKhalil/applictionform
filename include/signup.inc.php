<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require '../vendor/autoload.php';
require 'credentials.php';
if (isset($_POST['signup_button'])) {
    require_once "dbController.php";
    $db_handle = new DBController();
    $useremail = $_POST["username"];
    $userpassword = $_POST["pass"];
    if (!isset($_POST['userType'])) {
        $query = "SELECT * FROM users where useremail = '$useremail'";
        $count = $db_handle->numRows($query);
        if ($count == 0) {
            $anotherquery = "INSERT INTO users (useremail,password) VALUES('$useremail','$userpassword')";
            $current_id = $db_handle->insertQuery($anotherquery);
            if ($current_id == "success") {
                $mail = new PHPMailer(true);
                /* Open the try/catch block. */
                try {
                    /* Set the mail sender. */
                    $mail->setFrom('faizank575@gmail.com', 'Faizan Khan');
                    $mail->IsHTML(true);

                    /* Add a recipient. */
                    $mail->addAddress($useremail);

                    /* Set the subject. */
                    $mail->Subject = 'Test Email';

                    $actual_link = "http://$_SERVER[HTTP_HOST]/WebProject/include/" . "activation.php?username=" . $useremail;

                    /* Set the mail message body. */
                    $mail->Body = "Click this link to activate your account. <a href='" . $actual_link . "'>" . $actual_link . "</a>";

                    /* Tells PHPMailer to use SMTP. */
                    $mail->isSMTP();

                    /* SMTP server address. */
                    $mail->Host = 'smtp.gmail.com';

                    /* Use SMTP authentication. */
                    $mail->SMTPAuth = true;

                    /* Set the encryption system. */
                    $mail->SMTPSecure = 'tls';

                    /* SMTP authentication username. */
                    $mail->Username = $email;

                    /* SMTP authentication password. */
                    $mail->Password = $password;

                    /* Set the SMTP port. */
                    $mail->Port = 587;

                    /* Finally send the mail. */
                    $mail->send();
                } catch (Exception $e) {
                    /* PHPMailer exception. */
                    echo $e->errorMessage();
                } catch (\Exception $e) {
                    /* PHP exception (note the backslash to select the global namespace Exception class). */
                    echo $e->getMessage();
                }
                unset($_POST);
                header("Location:../Signin.php?activation=emailhasbeensent");
            } else {
                $message = "Problem in registration. Try Again!";
            }
        } else {
            $message = "User Email is already in use.";
            $type = "error";
            echo $message;
        }
    } else {
        $query = "SELECT * FROM employees where Emp_email = '$useremail'";
        $count = $db_handle->numRows($query);
        if ($count == 0) {
            $name=$_POST['name'];
            $type=$_POST['userType'];   
            if($type=='reviewer'){
                // SELECT fields FROM table ORDER BY id DESC LIMIT 1
                $previous_reviewer_number="SELECT * from employees WHERE type LIKE '%reviewer%' ORDER BY Emp_id DESC LIMIT 1";
                $count=$db_handle->numRows($previous_reviewer_number);
                // echo "<script>alert('$count')</script>";
                echo "<script>console.log($count)</script>";
                if($count==0){
                    $previous_reviewer_number=1;
                } else{
                    $result=$db_handle->runQuery($previous_reviewer_number);
                    $type_=$result[0]['type'];
                    preg_match_all('!\d+!', $type_, $matches);
                    $number=$matches[0];
                    if($number[0]==3){
                        $new_number=1;
                        // echo "<script>alert('if')</script>";
                echo "<script>console.log(if)</script>";
                    } else{
                        $new_number=intval($number[0])+1;
                        // echo "<script>alert('$type_')</script>";
                        // echo "<script>alert('$number[0]')</script>";
                        // echo "<script>alert('$new_number')</script>";
                echo "<script>console.log(else)</script>";
                    }
                }
                $type=$type.$new_number;
            }         
            $anotherquery = "INSERT INTO employees (Emp_email,Emp_password,type,name) VALUES('$useremail','$userpassword','$type','$name')";
            $current_id = $db_handle->insertQuery($anotherquery);
            if ($current_id == "success") {
                $mail = new PHPMailer(true);
                /* Open the try/catch block. */
                try {
                    // echo "<script>alert('working')</script>";
                    /* Set the mail sender. */
                    $mail->setFrom('faizank575@gmail.com', 'Faizan Khan');
                    $mail->IsHTML(true);

                    /* Add a recipient. */
                    $mail->addAddress($useremail);

                    /* Set the subject. */
                    $mail->Subject = 'Test Email';

                    $actual_link = "http://$_SERVER[HTTP_HOST]/WebProject/include/" . "activation.php?username=" . $useremail;

                    /* Set the mail message body. */
                    $mail->Body = "Click this link to activate your account. <a href='" . $actual_link . "'>" . $actual_link . "</a>";

                    /* Tells PHPMailer to use SMTP. */
                    $mail->isSMTP();

                    /* SMTP server address. */
                    $mail->Host = 'smtp.gmail.com';

                    /* Use SMTP authentication. */
                    $mail->SMTPAuth = true;

                    /* Set the encryption system. */
                    $mail->SMTPSecure = 'tls';

                    /* SMTP authentication username. */
                    $mail->Username = $email;

                    /* SMTP authentication password. */
                    $mail->Password = $password;

                    /* Set the SMTP port. */
                    $mail->Port = 587;

                    /* Finally send the mail. */
                    $mail->send();
                } catch (Exception $e) {
                    /* PHPMailer exception. */
                    echo $e->errorMessage();
                } catch (\Exception $e) {
                    /* PHP exception (note the backslash to select the global namespace Exception class). */
                    echo $e->getMessage();
                }
                unset($_POST);
                header("Location:../EmployeeSignin.php?activation=emailhasbeensent");
            } else {
                $message = "Problem in registration. Try Again!";
            }
        } else {
            $message = "User Email is already in use.";
            $type = "error";
            echo $message;
        }
    }

} else {
    // echo "<script>alert('submit button not set')</script>";
}
