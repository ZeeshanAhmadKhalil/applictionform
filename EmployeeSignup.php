<?php
$pageTitle = 'Employee Sign Up';

include_once('include/header.php');
require_once "include/dbController.php";
$db_handle = new DBController();

?>
<div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
            <form method="POST" action="./include/signup.inc.php" method="POST" class="login100-form validate-form flex-sb flex-w">
                <span class="login100-form-title p-b-53">
                    Sign Up
                </span>
                <div class="p-t-31 p-b-9">
                    <span class="txt1">
                        Email
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Email is required">
                    <input class="input100" type="text" name="username">
                    <span class="focus-input100"></span>
                </div>
                <div class="p-t-31 p-b-9">
                    <span class="txt1">
                        Name
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Name is required">
                    <input class="input100" type="text" name="name">
                    <span class="focus-input100"></span>
                </div>
                <div class="p-t-31 p-b-9">
                    <span class="txt1">
                        UserType
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="UserType is required">
                    <Select class="input100" id="UserType" name="userType">
                        <option selected disabled value="">Choose UserType</option>
                        <?php
                            $query="SELECT * FROM employees where type='reciever'";
                            $count=$db_handle->numRows($query);
                            // echo "<script>alert('$count')</script>";
                            if($count==0){
                                echo "<option value='reciever'>Reciever</option>";
                            }
                            $query="SELECT * FROM employees where type='reviewer'";
                            $count=$db_handle->numRows($query);
                            // if($count==0){
                                echo "<option value='reviewer1'>Reviewer Type 1</option>";
                                echo "<option value='reviewer2'>Reviewer Type 2</option>";
                                echo "<option value='reviewer3'>Reviewer Type 3</option>";
                            // }
                            $query="SELECT * FROM employees where type='approver'";
                            $count=$db_handle->numRows($query);
                            // echo "<script>alert('$count')</script>";
                            if($count==0){
                                echo "<option value='approver'>Approver</option>";
                            }
                        ?>
                    </Select>
                    <span class="focus-input100"></span>
                </div>
                <div class="p-t-13 p-b-9">
                    <span class="txt1">
                        Password
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="pass">
                    <span class="focus-input100"></span>
                </div>

                <div class="p-t-13 p-b-9">
                    <span class="txt1">
                        Re-type Password
                    </span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Confirm your password">
                    <input class="input100" type="password" name="retype-password">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn m-t-17">
                    <input type='submit' value="Sign Up" name="signup_button" class="login100-form-btn" />
                </div>

                <div class="w-full text-center p-t-55">
                    <span class="txt2">
                        Already an Employee?
                    </span>

                    <a href="./EmployeeSignin.php" class="txt2 bo1">
                        Sign in
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include_once('include/footer.php');
?>