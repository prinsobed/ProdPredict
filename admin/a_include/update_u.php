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
$id = $_POST['user_id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$company = $_POST['company'];
$email = $_POST['email'];
$password = $_POST['password'];
$user_type = $_POST['user_type'];


$sql = "UPDATE users SET firstname = '$firstname' , lastname='$lastname', company='$company', email='$email', password='$password' , user_type='$user_type' WHERE id ='$id'";
$result=mysqli_query($conn, $sql) or die ("");

// if successfully updated.
if($result){
    header("location: ../admin_view_users.php");
}
else {
    header("location: ../admin_edit_user.php");
}

?>

