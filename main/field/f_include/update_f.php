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
$field_id = $_POST['field_id'];
$name = $_POST['name'];
//$situated = $_POST['situated'];
//$location = $_POST['location'];
$field_type = $_POST['field_type_new'];
$water_depth = $_POST['water_depth'];
$status = $_POST['status_new'];


$sql = "UPDATE field SET field_name = '$name' ,  field_type='$field_type', water_depth='$water_depth' , status='$status' WHERE field_id ='$field_id'";
$result=mysqli_query($conn, $sql) or die ("");

// if successfully updated.
if($result){
    header("location: ../view_fields.php");
}
else {
    header("location: ../edit_fields.php");
}

?>

