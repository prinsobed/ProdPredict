<?php
/**
 * Created by PhpStorm.
 * User: Obed Kraine, RGU-1314863 , o.k.boachie@rgu.ac.uk
 * Project: ProdPredict V1
 * Date: 8/1/2016
 * Time: 8:02 AM
 */
session_start();
if(!$_SESSION['username']){
    header("Location: ../../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<!-- Start of Head -->
<head>
    <meta charset="UTF-8">
    <title>ProdPredict | Well Forecast</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
    <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <!-- Load c3.css -->
    <link href="../../assets/css/c3.css" rel="stylesheet" type="text/css">

    <!-- Load d3.js and c3.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.js"></script>
    <script src="../../assets/js/c3.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bootstrap.js"></script>
    <script src="../../assets/js/npm.js"></script>
</head>
<!-- End of Head -->

<!-- Start of Body of Page -->
<body>
<!-- Start of Navigation or Header Bar -->
<div class="container">
    <header>
        <div class="navbar">
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand text-uppercase" href="#">ProdPredict <span class="label label-success text-capitalize">V1</span></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Welcome<?php echo ", "."{$_SESSION['firstname']}"; ?></a></li>
                            <li><a href="#">Settings</a></li>
                            <li><button type="button" class="btn navbar-btn btn-circle"><a href="../../includes/logout.php">Log Out</a></button></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- End of Navigation or Header Bar -->

    <!-- Start of Breadcrumb or Address Bar -->
    <ol class="breadcrumb">
        <li><a href="../home.php">Home</a> / Well Forecast / Graph</li>
    </ol>
    <!-- End of Breadcrumb or Address Bar -->

    <!-- Main Page starts here -->
    <main>
        <div class="row2">
            <div class="col-sm-3">
                <!-- Side Navigation for Fields, Wells and Production -->
                <nav>
                    <div class="panel panel-default">
                        <div class="panel-heading">Fields</div>
                        <div class="panel-body">
                            <div class="row2">
                                <ul>
                                    <a class="btn btn-default custom" href="../field/add_field.php" role="button"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Add New</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default custom" href="../field/view_fields.php" role="button"><span class="glyphicon glyphicon-list-alt">&nbsp;</span>View Existing</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default custom" href="../field/edit_fields.php" role="button"><span class="glyphicon glyphicon-edit">&nbsp;</span>Edit Field</a>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">Wells</div>
                        <div class="panel-body">
                            <div class="row2">
                                <ul>
                                    <a class="btn btn-default custom" href="../well/add_well.php" role="button"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Add New</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default custom" href="../well/view_wells.php" role="button"><span class="glyphicon glyphicon-list-alt">&nbsp;</span>View Existing</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default custom" href="../well/edit_wells.php" role="button"><span class="glyphicon glyphicon-edit">&nbsp;</span>Edit Well</a>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">Production</div>
                        <div class="panel-body">
                            <div class="row2">
                                <ul>
                                    <a class="btn btn-default custom" href="../production/import_production.php" role="button"><span class="glyphicon glyphicon-cloud-upload">&nbsp;</span>Import File</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default custom" href="../production/add_production.php" role="button"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Add New</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default custom" href="../production/view_production.php" role="button"><span class="glyphicon glyphicon-list-alt">&nbsp;</span>View Existing</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default custom" href="../production/edit_production.php" role="button"><span class="glyphicon glyphicon-edit">&nbsp;</span>Edit Production</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Main Section of Page for Analysis Option Selection, Showing or Editing Data/Graph -->

        <?php

            $fore_well      = $_POST['fore_well'];
            $period         = $_POST['period'];
            $bvalue         = $_POST['bvalue'];
            $year           = $_POST['year'];
            $hydrocarbon    = $_POST['hydrocarbon'];
            $dca_type       = $_POST['dca_type'];
            $report_type    = $_POST['report_type'];

            $dataResult = [];
            $de = null;
            $di = null;
            $firstValueInRange = 0;
            $lastValueInRange = 0;
            $d = null;
            $q = null;

            $xArray = [];
            $yArray = [];
            $dataResult = [];

            $servername = "ap-cdbr-azure-east-c.cloudapp.net"; // Host name
            $username = "bed8c15b456030"; // Mysql username
            $password = "58380471"; // Mysql password
            $dbname = "db_prodpredict"; // Database name
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $strQuery = "SELECT * FROM production WHERE production_date like '%$year%' and well = '$fore_well'";
            $result = mysqli_query($conn, $strQuery);

            while ($row = $result->fetch_array()) {
                if ($hydrocarbon == 'Oil') {
                    array_push($dataResult, $row['oil']);
                } else if ($hydrocarbon == 'Gas') {
                    array_push($dataResult, $row['gas']);
                } else if ($hydrocarbon == 'Water') {
                    array_push($dataResult, $row['water']);
                }
            }

            if(isset($dataResult)){
                $firstValueInRange = $dataResult[0];
                $lastValueInRange  = $dataResult[11];
                $de = ($firstValueInRange - $lastValueInRange)/$firstValueInRange;
                $di = 1 - $de;
                $d = -log($di);

                array_push($yArray, 'Forecast');
                array_push($xArray, 'x');
                for($i=1; $i<= $period; $i++){
                    $q = $firstValueInRange*(1 + ($bvalue*$i));
                    array_push($yArray, $q);
                    array_push($xArray, $i);
                }
            }

        ?>

        <section>
            <div class="col-sm-9">

                <div class="panel panel-default">
                    <div class="panel-heading">Well Production Forecast Graph</div>
                    <div class="panel-body">
                        <div id="chart" onclick="printDiv('chart')" value="print a div!">



                        </div>
                        <!-- History -->
                        <article>





                        </article>
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-default" href="" role="button" onclick="printDiv('chart')" ><span class="glyphicon glyphicon-print">&nbsp;</span>Print Graph</a>&nbsp;
                        <a class="btn btn-default" href="" role="button"><span class="glyphicon glyphicon-cloud-download">&nbsp;</span>Save Graph to PDF</a>
                    </div>
                </div></div>
        </section>

    </main>
    <!-- End of Main of Page -->

    <!-- Footer starts here -->
    <footer>
        <div class="row">
            <div class="col-sm-12">Designed by Obed Kraine Boachie, ©2016.</div>
        </div>
    </footer>
    <!-- End of Footer -->
</div>
</body>
<!-- End of Page Body -->
</html>

<script>

    //Plotting Graph with c3 Charts Library

    var xAxisArr = <?php echo json_encode($xArray); ?>//;
    var dataArr = <?php echo json_encode($yArray, JSON_NUMERIC_CHECK); ?>//;


    var chart = c3.generate({
        bindto: '#chart',
        data: {
            x: 'x',
            columns: [
                xAxisArr,
                dataArr,
            ]
        }
    });
</script>

<!--Script for printing-->
<script>
    function printDiv(chart) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>


