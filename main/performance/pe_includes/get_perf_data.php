<?php
/**
 * Created by PhpStorm.
 * User: Kraine
 * Date: 8/19/2016
 * Time: 8:26 AM
 */

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

$f_well_1 = $_POST['well_1'];
$f_well_2 = $_POST['well_2'];
$f_start = $_POST['start_date'];
$f_end = $_POST['end_date'];
$f_hydro = $_POST['hydrocarbon'];
$rep_type = $_POST['report_type'];

// Form the SQL query that returns data values
$strQuery = "SELECT production_date,oil FROM  production WHERE well = '$f_well_1' AND production_date BETWEEN '$f_start' AND '$f_end' ORDER BY production_date ASC";
$result = mysqli_query($conn, $strQuery);

$strQuery_2 = "SELECT production_date,oil FROM  production WHERE well = '$f_well_2' AND production_date BETWEEN '$f_start' AND '$f_end' ORDER BY production_date ASC";
$result_2 = mysqli_query($conn, $strQuery_2);

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

//foreach($data as $key => $value){
//        print "$key => $value \n";
//    }


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