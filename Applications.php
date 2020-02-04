<?php
$pageTitle = 'Applications';
include_once('include/dashboard.header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Application</h1>
    </div>

    <!-- Content Row -->
    <ul class="list-group" id="applicationsList">
    </ul>
</div>
<!-- /.container-fluid -->

<?php
function customPageFooter()
{
    echo '<script src="js/getApplications.js"></script>';
}
include_once('include/dashboard.footer.php');
?>