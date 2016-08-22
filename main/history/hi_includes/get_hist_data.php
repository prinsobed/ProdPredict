<?php
/**
 * Created by PhpStorm.
 * User: Kraine
 * Date: 8/19/2016
 * Time: 8:26 AM
 */


// This is a simple example on how to draw a chart using FusionCharts and PHP.
// We have included includes/fusioncharts.php, which contains functions
// to help us easily embed the charts.
/* Include the `fusioncharts.php` file that contains functions  to embed the charts. */

include("../../../includes/fusioncharts.php");

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

$h_well = $_POST['hist_well'];
$h_start = $_POST['start_date'];
$h_end = $_POST['end_date'];
$h_hydro = $_POST['hydrocarbon'];
$rep_type = $_POST['report_type'];

// Form the SQL query that returns data values
$strQuery = "SELECT * FROM  production WHERE well = '$h_well' AND production_date BETWEEN '$h_start' AND '$h_end' ORDER BY production_date ASC";

//$result = mysqli_query($conn, $strQuery);
//while ($row = mysqli_fetch_assoc($result)) {
//    echo $row['well'];
//    echo $row['production_date'];
//    echo " | ";



// Execute the query, or else return the error message.
$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

// If the query returns a valid response, prepare the JSON string
if ($result) {
    // The `$arrData` array holds the chart attributes and data
    $arrData = array();
    $arrData["data"] = array();

    // Push the data into the array
    while($row = mysqli_fetch_array($result)) {
        array_push($arrData["data"], array(
                "label" => $row["oil"],
                "value" => $row["production_date"]
            )
        );
    }

    /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */
    $jsonData = json_encode($arrData);

    foreach($arrData as $key => $value){
        print "$key => $value \n";
    }




//    /*Create an object for the column chart using the FusionCharts PHP class constructor.
//    Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart,
//    "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart,
//    the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart,
//    and will be passed as the value for the data source parameter of the constructor.*/
//
//    $lineChart = new FusionCharts("line", "WellHistory" , 600, 300, "chart", "json", $jsonEncodedData);
//
//    // Render the chart
//    $columnChart->render();
//
//    // Close the database connection
//    $dbhandle->close();
//
//
//    $string = file_get_contents($jsonData);
//    echo $string;

}

?>