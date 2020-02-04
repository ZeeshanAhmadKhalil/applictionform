<?php
require_once("dbController.php");
$db_handle = new DBController();
$applicationID = $_POST['id'];
$Applications = "SELECT * FROM applicationsubmitted WHERE applicationID='$applicationID'";
$result = $db_handle->numRows($Applications);
if ($result > 0) {
    $result = $db_handle->runQuery($Applications);
    foreach ($result as $ApplicationData) {
        $applicantname = $ApplicationData['applicantName'];
        $applicantid = $ApplicationData['applicantID'];
        $applicantidtype = $ApplicationData['applicantIDType'];
        $applicantaddress = $ApplicationData['applicantAddress'];
        $applicantcountry = $ApplicationData['applicantCountry'];
        $applicantcity = $ApplicationData['applicantCity'];
        $applicantprovince = $ApplicationData['applicantProvince'];
        $corporateRegistrationDocument = $ApplicationData['CorparateRegistrationDocument'];
        $companyname = $ApplicationData['CompanyName'];
        $companyaddress = $ApplicationData['CompanyAddress'];
        $companycountry = $ApplicationData['CompanyCountry'];
        $companyprovince = $ApplicationData['CompanyProvince'];
        $companycity = $ApplicationData['CompanyCity'];
        $applicationType = $ApplicationData['ApplicationType'];
        $shareholdernames = $ApplicationData['ShareHolderNames'];
        $shareholderids = $ApplicationData['ShareHolderIDs'];
        $shareholderiddocuments = $ApplicationData['ShareHolderIDDocument'];
        $shareholderaddresses = $ApplicationData['ShareHolderAddresses'];
        $boarddirectornames = $ApplicationData['BoardDirectorNames'];
        $boarddirectorids = $ApplicationData['BoardDirectorIDs'];
        $boarddirectoriddocuments = $ApplicationData['BoardDirectorIDDocuments'];
        $boarddirectoraddresses = $ApplicationData['BoardDirectorAddresses'];
        $holdingcompany = $ApplicationData['HoldingCompany'];
        $holdingcompanyname = $ApplicationData['HoldingCompanyName'];
        $holdingcompanyregno = $ApplicationData['HoldingCompanyRegNo'];
        $holdingcompanyaddress = $ApplicationData['HoldingCompanyAddress'];
        $utlimateholdingcompany = $ApplicationData['UltimateHoldingComapny'];
        $utlimateholdingcompanyname = $ApplicationData['UltimateHoldingComapnyName'];
        $utlimateholdingcompanyregno = $ApplicationData['UltimateHoldingComapnyRegNo'];
        $utlimateholdingcompanyaddress = $ApplicationData['UltimateHoldingComapnyAddress'];
        $subsidiariesnames = $ApplicationData['SubsidiariesNames'];
        $subsidiariesregno = $ApplicationData['SubsidiariesReg'];
        $subsidiariesaddresses = $ApplicationData['SubsidiariesAddresses'];
        $noofemployees = $ApplicationData['NumberOfEmployess'];
        $sharecapital = $ApplicationData['ShareCapital'];
        $noofshares = $ApplicationData['NoOfShares'];
        $foriegninvest = $ApplicationData['foreignInvest'];
        $percentageforiegninvest = $ApplicationData['PercentageForeignShare'];
        $foriegninvestorigincountry = $ApplicationData['ForiegnInvestOriginCountry'];
        $memorandomattachment = $ApplicationData['AttachmentMemorandomOfAssociation'];
        $associationarticles = $ApplicationData['AttachmentArticlesOfAssociation'];
        $otherattachments = $ApplicationData['AttachmentOtherDocuments'];
        $ceodetails = $ApplicationData['CEODetails'];
        $coodetails = $ApplicationData['COODetails'];
        $hordetails = $ApplicationData['HORDetails'];
        $hoiadetails = $ApplicationData['HOIADetails'];
        $useremail = $ApplicationData['useremail'];
    }
    $data_arr = array(
        "applicantName" => $applicantname, "applicantid" => $applicantid, "applicationidtype" => $applicantidtype,
        "applicantaddress" => $applicantaddress, "applicantcountry" => $applicantcountry, "applicantcity" => $applicantcity, "applicantprovince" => $applicantprovince, "corporateregistrationdocument" => $corporateRegistrationDocument,
        "companyname" => $companyname, "companyaddress" => $companyaddress, "companycountry" => $companycountry, "companycity" => $companycity, "companyprovince" => $companyprovince, "applicationtype" => $applicationType,
        "shareholdername" => $shareholdernames, "shareholderid" => $shareholderids, "shareholderiddocuments" => $shareholderiddocuments, "shareholderaddresses" => $shareholderaddresses, "boarddirectornames" => $boarddirectornames, "boarddirectorids" => $boarddirectorids, "boarddirectoriddocuments" => $boarddirectoriddocuments, "boarddirectoraddresses" => $boarddirectoraddresses,
        "holdingcompany" => $holdingcompany, "holdingcompanyname" => $holdingcompanyname, "holdingcompanyregno" => $holdingcompanyregno, "holdingcompanyaddress" => $holdingcompanyaddress,
        "utlimateholdingcompany" => $utlimateholdingcompany, "utlimateholdingcompanyname" => $utlimateholdingcompanyname, "utlimateholdingcompanyregno" => $utlimateholdingcompanyregno,
        "utlimateholdingcompanyaddress" => $utlimateholdingcompanyaddress, "subsidiariesnames" => $subsidiariesnames,
        "subsidiariesregno" => $subsidiariesregno, "subsidiariesaddresses" => $subsidiariesaddresses, "noofemployees" => $noofemployees,
        "noofshares" => $noofshares, "sharecapital" => $sharecapital, "foriegninvest" => $foriegninvest, "percentageforiegninvest" => $percentageforiegninvest, "foriegninvestorigincountry" => $foriegninvestorigincountry,
        "memorandomattachment" => $memorandomattachment, "associationarticles" => $associationarticles, "otherattachments" => $otherattachments,
        "ceodetails" => $ceodetails, "hoiadetails" => $hoiadetails, "coodetails" => $coodetails, "hordetails" => $hordetails, "useremail" => $useremail
    );
    echo json_encode($data_arr);
}
