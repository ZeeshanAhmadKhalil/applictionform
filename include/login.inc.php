<?php
session_start();
require_once("dbController.php");
$db_handle = new DBController();
if (isset($_POST['login_button'])) {
    $username = $_POST['username'];
    $password = $_POST['pass'];
    if (isset($_POST['userType'])) {
        $userEmail = "SELECT * FROM employees WHERE Emp_email='$username'";
        $result = $db_handle->runQuery($userEmail);
        $row = $result[0];
        if ($row) {
            $passwordCheck = $password == $row['Emp_password'];
            if($_POST['userType']=='reviewer')
                $type_=	substr_replace($row['type'] ,"", -1);
            else 
                $type_=$row['type'];
            // echo "<script>alert('$type_')</script>";
            if ($passwordCheck != true || $_POST['userType'] != $type_) {
                header("Location:../employeeSignin.php?error=IvalidCredentials");
                exit();
            } else {
                $_SESSION['username'] = $row['Emp_email'];
                $_SESSION['type'] = $type_;
                header("Location:../dashboard.php?username=" . $row['useremail'] . "&userType=" . $row['type']);
            }
        }
    } else {
        // $username="SELECT * FROM users WHERE userId='$username'";
        $userEmail = "SELECT * FROM users WHERE useremail='$username'";
        $result = $db_handle->runQuery($userEmail);
        echo $result;
        $row = $result[0];
        if ($row) {
            $passwordCheck = $password == $row['password'];
            if ($passwordCheck == false) {
                header("Location:../Signin.php?error=InvalidCredentials");
                exit();
            } else if ($row['status'] == 'inactive') {
                header("Location:../Signin.php?error=activationError");
                exit();
            } else {
                $_SESSION['username'] = $row['useremail'];
                header("Location:../dashboard.php?username=" . $row['useremail']);
            }
        } else {
            header("Location:../Signin.php?error=NoAccountExists");
            exit();
        }
    }
}
