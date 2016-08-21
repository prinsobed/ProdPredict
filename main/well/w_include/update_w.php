<?php
//echo 'Bonjour ' . htmlspecialchars($_POST["oil_prod"]), ($_POST["gas_prod"]). '!';
//
//$water = $_POST["water_prod"];
//echo $water;
//?>


<?php
/**
 * Created by PhpStorm.
 * User: Obed Kraine, RGU-1314863 , o.k.boachie@rgu.ac.uk
 * Project: ProdPredict V1
 * Date: 8/1/2016
 * Time: 8:02 AM
 */

// Setting up Connection with Database
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
///**********************************************/
$well_id = $_POST['well_id'];
$well_name = $_POST['well_name'];
$well_field = $_POST['well_field'];
$well_prod_start = $_POST['well_prod_start'];
$well_status = $_POST['well_status_new'];

$sql = "UPDATE well SET well_name = '$well_name' ,  well_field='$well_field', well_prod_start='$well_prod_start' , well_status='$well_status' WHERE well_id ='$well_id'";
$result=mysqli_query($conn, $sql) or die ("");

// if successfully updated.
if($result){
    header("location: ../view_wells.php");
}
else {
    header("location: ../edit_wells.php");
}

?>

