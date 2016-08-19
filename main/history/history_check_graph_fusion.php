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
    <title>ProdPredict | Well Production History</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
    <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <!-- Load c3.css -->
    <link href="../../assets/css/c3.css" rel="stylesheet" type="text/css">

    <!-- Load d3.js and c3.js -->
    <script src="../../assets/js/fusioncharts.js"></script>
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
        <li><a href="../home.php">Home</a> / Well Production History / Check History / Graph</li>
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
                                    <a class="btn btn-default" href="../field/add_field.php" role="button">Add New</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default" href="../field/view_fields.php" role="button">View Existing</a>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">Wells</div>
                        <div class="panel-body">
                            <div class="row2">
                                <ul>
                                    <a class="btn btn-default" href="../well/add_well.php" role="button">Add New</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default" href="../well/view_wells.php" role="button">View Existing</a>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">Production</div>
                        <div class="panel-body">
                            <div class="row2">
                                <ul>
                                    <a class="btn btn-default" href="../production/import_production.php" role="button">Import File</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default" href="../production/add_production.php" role="button">Add New</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default" href="../production/view_production.php" role="button">View Existing</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Main Section of Page for Analysis Option Selection, Showing or Editing Data/Graph -->

        <section>
            <div class="col-sm-9">

                <div class="panel panel-default">
                    <div class="panel-heading">Well Production History Graph</div>
                    <div class="panel-body">
                        <div id="chart"></div>
                        <!-- History -->
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-default" href="" role="button">Export to File</a>
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


<?php
// This is a simple example on how to draw a chart using FusionCharts and PHP.
// We have included includes/fusioncharts.php, which contains functions
// to help us easily embed the charts.
/* Include the `fusioncharts.php` file that contains functions  to embed the charts. */

include("../../includes/fusioncharts.php");

/* The following 4 code lines contain the database connection information. Alternatively, you can move these code lines to a separate file and include the file here. You can also modify this code based on your database connection. */

$servername="ap-cdbr-azure-east-c.cloudapp.net"; // Host name
$username="bed8c15b456030"; // Mysql username
$password="58380471"; // Mysql password
$dbname="db_prodpredict"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Establish a connection to the database
$dbhandle = new mysqli($servername, $username, $password, $dbname);

// Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect
if ($dbhandle->connect_error) {
    exit("There was an error with your connection: ".$dbhandle->connect_error);
}

// Form the SQL query that returns the top 10 most populous countries
$strQuery = "SELECT well, oil FROM production ORDER BY oil DESC";

// Execute the query, or else return the error message.
$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

// If the query returns a valid response, prepare the JSON string
if ($result) {
    // The `$arrData` array holds the chart attributes and data
    $arrData = array(
        "chart" => array(
            "caption" => "Wells and Oils",
            "paletteColors" => "#0075c2",
            "bgColor" => "#ffffff",
            "borderAlpha"=> "20",
            "canvasBorderAlpha"=> "0",
            "usePlotGradientColor"=> "0",
            "plotBorderAlpha"=> "10",
            "showXAxisLine"=> "1",
            "xAxisLineColor" => "#999999",
            "showValues" => "0",
            "divlineColor" => "#999999",
            "divLineIsDashed" => "1",
            "showAlternateHGridColor" => "0"


        )
    );

    $arrData["data"] = array();

    // Push the data into the array
    while($row = mysqli_fetch_array($result)) {
        array_push($arrData["data"], array(
                "label" => $row["Well"],
                "value" => $row["Oil"]
            )
        );
    }

    /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

    $jsonEncodedData = json_encode($arrData);

    /*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

    $columnChart = new FusionCharts("column2D", "myFirstChart" , 600, 300, "chart", "json", $jsonEncodedData);

    // Render the chart
    $columnChart->render();

    // Close the database connection
    $dbhandle->close();
}

?>
