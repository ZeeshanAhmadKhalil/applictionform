<?php
session_start();
require_once("dbController.php");
$db_handle = new DBController();
$username = $_SESSION['username'];
$Applications = "SELECT * FROM applicationsubmitted WHERE useremail='$username'";
$result = $db_handle->numRows($Applications);
if ($result > 0) {
    $result = $db_handle->runQuery($Applications);
    $createTable = '<table cellpadding="0" cellspacing="0" border="0">';
    $createTable .= '<tbody>';
    foreach ($result as $ApplicationData) {
        $createTable .= '<tr>';
        $createTable .= '<td>' . $ApplicationData['applicationID'] . '</td>';
        $createTable .= '<td>' . $ApplicationData['CompanyName'] . '</td>';
        $createTable .= '<td>' . $ApplicationData['CompanyCountry'] . '</td>';
        $createTable .= '<td>' . $ApplicationData['status'] . '</td>';
        $createTable .= '</tr>';
    }

    $createTable .= '</tbody></table>';

    echo $createTable;
}
