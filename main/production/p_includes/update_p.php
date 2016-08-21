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
$prod_well = test_input($_POST["prod_well"]);
$prod_date = test_input($_POST["prod_date"]);
$oil_prod = test_input($_POST["oil_prod"]);
$gas_prod = test_input($_POST["gas_prod"]);
$water_prod = test_input($_POST["water_prod"]);
$gas_oil_ratio = test_input($_POST["gas_oil_ratio"]);
$basic_sed_water = test_input($_POST["basic_sed_water"]);
$bean = test_input($_POST["bean"]);
$tubing_hang_press = test_input($_POST["tubing_hang_press"]);
$bottom_hole_pressure = test_input($_POST["bottom_hole_pressure"]);
$a_p_i= test_input($_POST["a_p_i"]);
$ent_user = test_input($_SESSION['id']);

$sql = "UPDATE production SET oil='oil_prod', gas='gas_prod', water='water_prod', gor='gas_oil_ratio', bsw='basic_sed_water' bean='bean', thp='tubing_hang_press', bhp='bottom_hole_pressure' WHERE well = $wellSelect AND production_date = $dateSelect";
$result=mysqli_query($conn, $sql) or die ("");


// if successfully updated.
if($result){
    header("location: ../view_production.php");
}
else {
    header("location: ../edit_production.php");
}

?>

