<?php
/**
 * Created by PhpStorm.
 * User: Kraine
 * Date: 8/14/2016
 * Time: 7:06 AM
 */

session_start();

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

// define variables and set to empty values
$well_id = $well_name = $well_field = $well_prod_start = $well_status = $ent_user =   "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $well_id = test_input($_POST["well_id"]);
    $well_name = test_input($_POST["well_name"]);
    $well_field = test_input($_POST["well_field"]);
    $well_prod_start = test_input($_POST["well_prod_start"]);
    $well_status = test_input($_POST["well_status"]);
    $ent_user = test_input($_SESSION['id']);

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$sql = "INSERT INTO well (well_id, well_name, field_id, production_start, status, ent_user)
                          VALUES ('$well_id','$well_name', '$well_field','$well_prod_start', '$well_status','$ent_user' )";

if ($conn->query($sql) === TRUE) {
    header("location: ../view_wells.php");
}
else{
    header("location: ../add_well.php");
}
