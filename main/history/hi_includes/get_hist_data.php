<?php
/**
 * Created by PhpStorm.
 * User: Kraine
 * Date: 8/19/2016
 * Time: 8:26 AM
 */

include("../../../includes/fusioncharts.php");

//Database connection information.

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
$strQuery = "SELECT production_date,oil FROM  production WHERE well = '$h_well' AND production_date BETWEEN '$h_start' AND '$h_end' ORDER BY production_date ASC";
$result = mysqli_query($conn, $strQuery);

//$result = mysqli_query($conn, $strQuery);
//while ($row = mysqli_fetch_assoc($result)) {
//    echo $row['well'];
//    echo $row['production_date'];
//    echo " | ";

// Print out rows
$data = array();
while ( $row = $result->fetch_assoc() ) {
    $data[] = $row;
}
echo json_encode( $data );

?>

<script>
d3.json($data, function(data) {
    var modData = [];
    data.results.forEach(function(d, i) {
        var item = ["param-" + d.param];
        d.val.forEach(function(j) {
            item.push(j);
        });
    modData.push(item);
  });
  var chart = c3.generate({
    data: {
        xs: {
            'param-y':'param-x'
        },
        columns: modData
    }
  });
});
</script>