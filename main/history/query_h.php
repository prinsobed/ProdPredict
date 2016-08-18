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


$SQLCommand = "SELECT production_date, oil FROM production";
$result = mysqli_query($conn, $SQLCommand); // This line executes the MySQL query that you typed above

$dataArray = array(); // make a new array to hold all your data


$index = 0;
while($row = mysqli_fetch_array($result)){ // loop to store the data in an associative array.
    $dataArray[$index] = $row;
    $index++;
}

for($i =0; $i<sizeof($dataArray); $i++){
    echo $dataArray[$i][$i];
}

$conn->close();
?>



