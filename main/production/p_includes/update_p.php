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
$oil = $_POST['oil_prod'];
$gas = $_POST['gas_prod'];
$water = $_POST['water_prod'];
$gor = $_POST['gas_oil_ratio'];
$bsw = $_POST['basic_sed_water'];
$bean = $_POST['bean'];
$thp = $_POST['tubing_hang_press'];
$bhp = $_POST['bottom_hole_pressure'];
$well = $_POST['prod_well'];
$production_date = $_POST['prod_date'];


$sql = "UPDATE production SET oil= '$oil' , gas='$gas', water='$water', gor='$gor', bsw='$bsw' , bean='$bean', thp ='$thp', bhp='$bhp' WHERE well='$well' AND production_date='$production_date'";
$result=mysqli_query($conn, $sql) or die ("");

// if successfully updated.
if($result){
    header("location: ../view_production.php");
}
else {
    header("location: ../edit_production.php");
}

?>

