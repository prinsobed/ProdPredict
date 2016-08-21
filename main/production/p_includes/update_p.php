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
/**********************************************/

$sql = "UPDATE production SET oil='oil_prod', gas='gas_prod', water='water_prod', gor='gas_oil_ratio', bsw='basic_sed_water' bean='bean', thp='tubing_hang_press', bhp='bottom_hole_pressure' WHERE well = 'prod_well' AND production_date = 'prod_date'";
$result=mysqli_query($conn, $sql) or die ("");


// if successfully updated.
if($result){
    header("location: ../view_production.php");
}
else {
    header("location: ../edit_production.php");
}

?>

