<?php
$pageTitle = 'Dashboard';
function customPageHeader()
{
    echo '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>';
    
}
include_once('include/dashboard.header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <?php if(!isset($_SESSION['type'])): ?>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="newApplication">Start New Application</button>
        <?php endif; ?>
    </div>

    <!-- Content Row -->

    <div class="row">

        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header d-flex flex-row ">
                    <h6 class="m-0 font-weight-bold text-primary">Applications Overview</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    
                    
                        <!--for demo wrap-->
                        <?php if (isset($_SESSION['type'])) {
                            echo '<section id="charts_section">
                            <div id="chart1" class="chart"></div>
                            <div id="chart2"  class="chart"></div>
                            <div id="chart3"  class="chart"></div>
                            <div id="chart4"  class="chart"></div>';
                        } else {
                            echo '<section>
                            <div class="tbl-header">
                                    <table cellpadding="0" cellspacing="0" border="0">
                                        <thead>
                                            <tr>
                                                <th>Application ID</th>
                                                <th>Company Name</th>
                                                <th>Country</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="tbl-content" id="Table_data">
                                </div>';
                        }
                        ?>

                    </section>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Advertisments</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <img src="images\download (13).jpg" alt="add" width="270px" height="180px">
                    <br>
                    <br>
                    <img src="images\gettyimages-1025433052-612x612.jpg" alt="add" width="270px" height="180px">
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
function customPageFooter()
{
    if(isset($_SESSION['type'])){
        echo '<script type="text/javascript" src="js\chartVisualization.js"></script>';
    }
    echo '<script src="js/dashboard.js"></script>';
}
include_once('include/dashboard.footer.php');
?>