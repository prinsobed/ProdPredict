<?php
/**
 * Created by PhpStorm.
 * User: Kraine
 * Date: 8/23/2016
 * Time: 9:37 PM
 */

$servername="ap-cdbr-azure-east-c.cloudapp.net"; // Host name
$username="bed8c15b456030"; // Mysql username
$password="58380471"; // Mysql password
$dbname="db_prodpredict"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$strQuery = "SELECT production_date,oil FROM  production WHERE well = '$h_well' AND production_date BETWEEN '$h_start' AND '$h_end' ORDER BY production_date ASC";
$result = mysqli_query($conn, $strQuery);

// Print out rows
$valuesArray = array();
$datesArray = array();

$valuesArray[] = 'Oil';
$datesArray[] = 'x';
while ($row = $result->fetch_assoc()) {
    $datesArray[] = $row['production_date'];
    $valuesArray[] = $row['oil'];
}
?>


<html>
<head>
    <title>C3 Liner example</title>
    <link href="assets/css/c3.css" rel="stylesheet" type="text/css" />
    <script src="https://d3js.org/d3.v3.min.js"></script>
    <script src="assets/js/c3.js"></script><!-- load jquery -->


</head>
<body>
<div id="chart"></div>
<script>
    var xAxisArr = <?php echo json_encode($datesArray); ?>;
    var dataArr = <?php echo json_encode($valuesArray, JSON_NUMERIC_CHECK); ?>;
    var chart = c3.generate({
        bindto: '#chart',
        data: {
            x: 'x',
            columns: [
                xAxisArr,
                dataArr
            ]
        },
        axis: {
            x: {
                type: 'timeseries',
                tick: {
                    format: '%Y-%m-%d'
                }
            }
        }
    });
</script>
</body>
</html>