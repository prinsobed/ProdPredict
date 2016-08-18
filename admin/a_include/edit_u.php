<?php
/**
 * Created by PhpStorm.
 * User: Kraine
 * Date: 8/14/2016
 * Time: 6:30 AM
 */

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

$id = mysqli_real_escape_string($conn, $_POST["id"]);
$firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
$lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
$company = mysqli_real_escape_string($conn, $_POST["company"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);
$user_type = mysqli_real_escape_string($conn, $_POST["user_type"]);

$query="UPDATE user SET firstname = '.$firstname.', lastname = '.$lastname.',company = '.$company.', email = '.$email.',password = '.$password.', user_type = '.$user_type.' WHERE id='$id'";


mysqli_query($conn,$query)or die(mysqli_error());
if(mysqli_affected_rows($conn)>=1){
    echo "<p>($id) Record Updated<p>";
}else{
    echo "<p>($id) Not Updated<p>";
}
$conn->close();
?>

<a href="../admin_edit_user.php">Next</a>

