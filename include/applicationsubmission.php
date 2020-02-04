<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../vendor/autoload.php';
require 'credentials.php';
session_start();
include_once('dbController.php');
$db_handle = new DBController();
$username;
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

$allowed = array("image/jpeg", "image/gif", "image/png", "application/pdf");
$applicationId = $_POST['applicationId'];
$basePath = 'data/applications/' . $applicationId . '/';
if ($_POST['form'] == 'form1') {
    $applicantName = $_POST['Applicantname'];
    $applicantId = $_POST['idofapplicant'];
    $applicantidType = $_POST['ApplicantIdType'];
    $applicantAddress = $_POST['ApplicantAddress'];
    $applicantCountry = $_POST['ApplicantCountry'];
    $applicantCity = $_POST['ApplicantCity'];
    $applicantProvince = $_POST['ApplicantProvince'];
    $applicantUsername = $_SESSION['username'];
    $anotherquery = "UPDATE applicationsubmitted SET applicantName='$applicantName',applicantID='$applicantId',applicantIDType='$applicantidType',applicantAddress='$applicantAddress',applicantCountry='$applicantCountry',applicantCity='$applicantCity',applicantProvince='$applicantProvince' WHERE applicationId='$applicationId'";
    $status = $db_handle->insertQuery($anotherquery);
    if ($status == "success") {
        echo "$applicationId";
    }
} else if ($_POST['form'] == "form2") {
    $tempfile = $_FILES['attachedcorparateregistration']['tmp_name'];
    $defFile = $_FILES['attachedcorparateregistration']['name'];
    $absPath =  $basePath . '' . $defFile;
    $CompanyName = $_POST['CompanyName'];
    $CompanyAddress = join(',_.', $_POST['companyaddress']);
    $CompanyCountry = $_POST['companycountry'];
    $CompanyProvince = $_POST['companyprovince'];
    $CompanyCity = $_POST['companycity'];
    $ApplicationType = $_POST['ApplicationType'];
    if (is_uploaded_file($tempfile)) {
        $file_type = $_FILES['attachedcorparateregistration']['type'];
        if (!in_array($file_type, $allowed)) {
            $error_message = 'Only jpg, gif,png and pdf files are allowed\n.';
            echo $error_message;
            $error = 'yes';
            return;
        }
        if (move_uploaded_file($tempfile, '../' . $absPath)) {
            $query = "UPDATE applicationsubmitted SET CompanyName='$CompanyName',CorparateRegistrationDocument='$absPath',CompanyAddress='$CompanyAddress',CompanyCountry='$CompanyCountry',CompanyProvince='$CompanyProvince',CompanyCity='$CompanyCity',ApplicationType='$ApplicationType' WHERE applicationId='$applicationId'";
            $status = $db_handle->insertQuery($query);
            if ($status == "success") {
                echo "success";
            }
        }
    }
    move_uploaded_file($_FILES['attachedcorparateregistration']['tmp_name'], '../' . $basePath . $_FILES['attachedcorparateregistration']['name']);
    echo "success";
} else if ($_POST['form'] == "form3") {
    $shareHolderNames = join(',_.', $_POST['nameofshareholder']);
    $shareHolderIDs = join(',_.', $_POST['passportnumber']);
    $def_files = array_map(function ($v) use ($basePath) {
        return '../' . $basePath . '' . $v;
    }, $_FILES['iddocument']['name']);
    $shareHolderIDAttachment = join(',_.', $def_files);
    $shareHolderAddresses = join(',_.', $_POST['addressofshareholder']);
    foreach ($_FILES['iddocument']['tmp_name'] as $index => $tmpName) {
        $file_type = $_FILES['iddocument']['type'][$index];

        if (!in_array($file_type, $allowed)) {
            $error_message = 'Only jpg, gif,png and pdf files are allowed\n.';
            echo $error_message;
            $error = 'yes';
            return;
        }
        if (!empty($tmpName) && is_uploaded_file($tmpName)) {
            move_uploaded_file($tmpName, $def_files[$index]); // move to new location perhaps?
        }
    }
    $query = "UPDATE applicationsubmitted SET ShareHolderNames='$shareHolderNames',ShareHolderIDs='$shareHolderIDs',ShareHolderIDDocument='$shareHolderIDAttachment',ShareHolderAddresses='$shareHolderAddresses' WHERE applicationId='$applicationId'";
    $status = $db_handle->insertQuery($query);
    if ($status == "success") {
        echo "success";
    }
} else if ($_POST['form'] == "form4") {
    var_dump($_POST);
    $directorsAddresses = join(',_.', $_POST['directoraddress']);
    $directorNames = join(',_.', $_POST['boardofirector']);
    $directorId = join(',_.', $_POST['directorpassport']);
    $def_files = array_map(function ($v) use ($basePath) {
        return '../' . $basePath . '' . $v;
    }, $_FILES['directoriddocument']['name']);
    $directorIdDocument = join(',_.', $def_files);

    foreach ($_FILES['directoriddocument']['tmp_name'] as $index => $tmpName) {
        $file_type = $_FILES['directoriddocument']['type'][$index];

        if (!in_array($file_type, $allowed)) {
            $error_message = 'Only jpg, gif,png and pdf files are allowed\n.';
            echo $error_message;
            $error = 'yes';
            return;
        }
        if (!empty($tmpName) && is_uploaded_file($tmpName)) {
            // the path to the actual uploaded file is in $_FILES[ 'image' ][ 'tmp_name' ][ $index ]
            // do something with it:
            move_uploaded_file($tmpName, $def_files[$index]); // move to new location perhaps?
        }
    }
    $query = "UPDATE applicationsubmitted SET BoardDirectorNames='$directorNames',BoardDirectorIDs='$directorId',BoardDirectorIDDocuments='$directorIdDocument',BoardDirectorAddresses='$directorsAddresses' WHERE applicationId='$applicationId'";
    $status = $db_handle->insertQuery($query);
    if ($status == "success") {
        echo "success";
    }
    if ($_POST['holdingCompany'] == 'yes') {
        $holdingCompanyName = $_POST['companyname'];
        $holdingRegistration = $_POST['registration'];
        $holdingAddress = $_POST['Address'];
        $query = "UPDATE applicationsubmitted SET HoldingCompany=1,HoldingCompanyName='$holdingCompanyName',HoldingCompanyRegNo='$holdingRegistration',HoldingCompanyAddress='$holdingAddress' WHERE applicationId='$applicationId'";
        $status = $db_handle->insertQuery($query);
        if ($status == "success") {
            echo "success";
        }
    } else {
        $query = "UPDATE applicationsubmitted SET HoldingCompany=0,HoldingCompanyName=NULL,HoldingCompanyRegNo=NULL,HoldingCompanyAddress=NULL WHERE applicationId='$applicationId'";
        $status = $db_handle->insertQuery($query);
        if ($status == "success") {
            echo "success";
        }
    }

    if ($_POST['ultimateHolding'] == 'yes') {
        $UltimateholdingCompanyName = $_POST['UltimateHoldingcompanyname'];
        $UltimateholdingRegistration = $_POST['UltimateHoldingregistration'];
        $UltimateholdingAddress = $_POST['UltimateHoldingAddress'];
        $query = "UPDATE applicationsubmitted SET UltimateHoldingComapny=1,UltimateHoldingComapnyName='$UltimateholdingCompanyName',UltimateHoldingComapnyRegNo='$UltimateholdingRegistration',UltimateHoldingComapnyAddress='$UltimateholdingAddress' WHERE applicationId='$applicationId'";
        $status = $db_handle->insertQuery($query);
        if ($status == "success") {
            echo "success";
        }
    } else {
        $query = "UPDATE applicationsubmitted SET UltimateHoldingComapny=0,UltimateHoldingComapnyName=NULL,UltimateHoldingComapnyRegNo=NULL,UltimateHoldingComapnyAddress=NULL WHERE applicationId='$applicationId'";
        $status = $db_handle->insertQuery($query);
        if ($status == "success") {
            echo "success";
        }
    }
} else if ($_POST['form'] == "form5") {
    var_dump($_POST);
    $post_vaue=$_POST['subsidiariesname'];
    foreach($post_vaue as $value){
        echo "HERE IS $value \n";
    }
    if(isset($_POST['subsidiariesname'])){
        $SubsidiariesNames =array_merge($_POST['nameofsubsidiaries'],$_POST['subsidiariesname']);
        $SubsidiariesReg =array_merge($_POST['subsidiariesregistration'],$_POST['subsidiraiesregistration']);
        $SubsidiariesAddress =array_merge($_POST['addressofsubsidiaries'],$_POST['subsidiariesaddress']);
    }else{
        $SubsidiariesNames =$_POST['nameofsubsidiaries'];
        $SubsidiariesReg =$_POST['subsidiariesregistration'];
        $SubsidiariesAddress =$_POST['addressofsubsidiaries'];
    }
    
    $SubsidiariesNames = join(',_.',$SubsidiariesNames );
    $SubsidiariesReg = join(',_.',$SubsidiariesReg );
    $SubsidiariesAddress = join(',_.',$SubsidiariesAddress );
    echo "$SubsidiariesAddress";
    $NumberOfEmployees = $_POST['noofemployees'];
    $ShareCapital = $_POST['sharecapital'];
    $NoOfShares = $_POST['noofshares'];
    $query = "UPDATE applicationsubmitted SET SubsidiariesNames='$SubsidiariesNames',SubsidiariesReg='$SubsidiariesReg',SubsidiariesAddresses='$SubsidiariesAddress',NumberOfEmployess='$NumberOfEmployees',ShareCapital='$ShareCapital',NoOfShares='$NoOfShares'  WHERE applicationId='$applicationId'";
    $status = $db_handle->insertQuery($query);
    if ($status == "success") {
        echo "success";
    }

    if ($_POST['foreignInvest'] == 'yes') {
        $PercentageForeignShare = $_POST['percentForiegnShare'];
        $countriesOrigin = join(',_.', $_POST['countryorigin']);
        $query = "UPDATE applicationsubmitted SET foreignInvest=1,PercentageForeignShare='$PercentageForeignShare',ForiegnInvestOriginCountry='$countriesOrigin' WHERE applicationId='$applicationId'";
        $status = $db_handle->insertQuery($query);
        if ($status == "success") {
            echo "success";
        }
    } else {
        $query = "UPDATE applicationsubmitted SET foreignInvest=0,PercentageForeignShare=NULL,ForiegnInvestOriginCountry=NULL WHERE applicationId='$applicationId'";
        $status = $db_handle->insertQuery($query);
        if ($status == "success") {
            echo "success";
        }
    }
} else if ($_POST['form'] == "form6") {
    $tempmemorandomfile = $_FILES['memorandomofassociation']['tmp_name'];
    $defmemorandomFile = '../' . $basePath . '' . $_FILES['memorandomofassociation']['name'];
    $temparticlesfile = $_FILES['articlesofassociation']['tmp_name'];
    $defarticlesfile = '../' . $basePath . '' . $_FILES['articlesofassociation']['name'];

    $temp_files = array($tempmemorandomfile, $temparticlesfile);
    $def_files = array($defmemorandomFile, $defarticlesfile);
    echo $_FILES['memorandomofassociation']['type'];
    $fileTypes = array($_FILES['memorandomofassociation']['type'], $_FILES['articlesofassociation']['type']);

    foreach ($temp_files as $index => $tmpName) {
        $file_type = $fileTypes[$index];

        if (!in_array($file_type, $allowed)) {
            $error_message = 'Only jpg, gif,png and pdf files are allowed\n.';
            echo $error_message;
            $error = 'yes';
            return;
        }
        if (!empty($tmpName) && is_uploaded_file($tmpName)) {
            // the path to the actual uploaded file is in $_FILES[ 'image' ][ 'tmp_name' ][ $index ]
            // do something with it:
            move_uploaded_file($tmpName, $def_files[$index]); // move to new location perhaps?
        }
    }
    $query = "UPDATE applicationsubmitted SET AttachmentMemorandomOfAssociation='$defmemorandomFile',AttachmentArticlesOfAssociation='$defarticlesfile' WHERE applicationId='$applicationId'";
    $status = $db_handle->insertQuery($query);
    if ($status == "success") {
        echo "success";
    }
    if (isset($_FILES['otherdocuments'])) {
        $def_files = array_map(function ($v) use ($basePath) {
            return '../' . $basePath . '' . $v;
        }, $_FILES['otherdocuments']['name']);
        $otherdocuments = join(',_.', $def_files);
        foreach ($_FILES['otherdocuments']['tmp_name'] as $index => $tmpName) {
            $file_type = $_FILES['otherdocuments']['type'][$index];

            if (!in_array($file_type, $allowed)) {
                $error_message = 'Only jpg, gif,png and pdf files are allowed\n.';
                echo $error_message;
                $error = 'yes';
                return;
            }
            if (!empty($tmpName) && is_uploaded_file($tmpName)) {
                move_uploaded_file($tmpName, $def_files[$index]); // move to new location perhaps?
            }
        }
        $query = "UPDATE applicationsubmitted SET AttachmentOtherDocuments='$otherdocuments' WHERE applicationId='$applicationId'";
        $status = $db_handle->insertQuery($query);
        if ($status == "success") {
            echo "success";
        }
    }
} else if ($_POST['form'] == "form7") {
    $ceoIdAttachment = $_FILES['ceoattachid']['name'];
    $cooIdAttachment = $_FILES['cooattachid']['name'];
    $HoIAIdAttachment = $_FILES['hiaattachid']['name'];
    $horIdAttachment = $_FILES['hrattachid']['name'];
    $CEODetails = $_POST['ceoname'] . ',_.' . $_POST['ceoid'] . ',_.' . $_POST['ceoidtype'] . ',_.' . $basePath . '' . $ceoIdAttachment;
    $COODetails = $_POST['cooname'] . ',_.' . $_POST['cooid'] . ',_.' . $_POST['cooidtype'] . ',_.' . $basePath . '' . $cooIdAttachment;
    $HIADetails = $_POST['hianame'] . ',_.' . $_POST['hiaid'] . ',_.' . $_POST['hiaidtype'] . ',_.' . $basePath . '' . $HoIAIdAttachment;
    $HORDetails = $_POST['hrname'] . ',_.' . $_POST['hrid'] . ',_.' . $_POST['hridtype'] . ',_.' . $basePath . '' . $horIdAttachment;
    $tempfile = $_FILES['ceoattachid']['tmp_name'];
    if (is_uploaded_file($tempfile)) {
        $file_type = $_FILES['ceoattachid']['type'];
        if (!in_array($file_type, $allowed)) {
            $error_message = 'Only jpg, gif,png and pdf files are allowed\n.';
            echo $error_message;
            $error = 'yes';
            return;
        }
        if (move_uploaded_file($tempfile, '../' . $basePath . '' . $ceoIdAttachment)) {
            echo "success";
        }
    }
    $tempfile = $_FILES['cooattachid']['tmp_name'];
    if (is_uploaded_file($tempfile)) {
        $file_type = $_FILES['cooattachid']['type'];
        if (!in_array($file_type, $allowed)) {
            $error_message = 'Only jpg, gif,png and pdf files are allowed\n.';
            echo $error_message;
            $error = 'yes';
            return;
        }
        if (move_uploaded_file($tempfile, '../' . $basePath . '' . $cooIdAttachment)) {
            echo "success";
        }
    }
    $tempfile = $_FILES['hiaattachid']['tmp_name'];
    if (is_uploaded_file($tempfile)) {
        $file_type = $_FILES['hiaattachid']['type'];
        if (!in_array($file_type, $allowed)) {
            $error_message = 'Only jpg, gif,png and pdf files are allowed\n.';
            echo $error_message;
            $error = 'yes';
            return;
        }
        if (move_uploaded_file($tempfile, '../' . $basePath . '' . $HoIAIdAttachment)) {
            echo "success";
        }
    }
    $tempfile = $_FILES['hrattachid']['tmp_name'];
    if (is_uploaded_file($tempfile)) {
        $file_type = $_FILES['hrattachid']['type'];
        if (!in_array($file_type, $allowed)) {
            $error_message = 'Only jpg, gif,png and pdf files are allowed\n.';
            echo $error_message;
            $error = 'yes';
            return;
        }
        if (move_uploaded_file($tempfile, '../' . $basePath . '' . $horIdAttachment)) {
            echo "success";
        }
    }
    $query = "UPDATE applicationsubmitted SET CEODetails='$CEODetails',COODetails='$COODetails',HOIADetails='$HIADetails',HORDetails='$HORDetails' WHERE applicationId='$applicationId'";
    $status = $db_handle->insertQuery($query);
    if ($status == "success") {
        $date=date("Y-m-d");
        $query = "UPDATE applicationsubmitted SET status='submitted',submission_date='$date' WHERE applicationId='$applicationId'";
        $status = $db_handle->insertQuery($query);
        if ($status == "success") {
            echo "success";
        }

        $mail = new PHPMailer(TRUE);
        /* Open the try/catch block. */
        try {
            /* Set the mail sender. */
            $mail->setFrom('faizank575@gmail.com', 'Faizan Khan');
            $mail->IsHTML(true);

            /* Add a recipient. */
            $mail->addAddress($username);

            /* Set the subject. */
            $mail->Subject = 'Application Submission';

            /* Set the mail message body. */
            $mail->Body = "You've Successfully submitted your application.\n";
            $mail->Body .= '<a href="http://localhost/WebProject/Signin.php">Login</a> to track your application';
            echo ($mail->Body);


            /* Tells PHPMailer to use SMTP. */
            $mail->isSMTP();

            /* SMTP server address. */
            $mail->Host = 'smtp.gmail.com';

            /* Use SMTP authentication. */
            $mail->SMTPAuth = TRUE;

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
    }
}
