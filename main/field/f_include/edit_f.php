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

//POST value retrieved from ajax
$getValue = $_POST['val'];

//checking if the variable is set
if(isset($getValue)){
    $sql = "SELECT * FROM field WHERE field_id = '$getValue'"; //select all from production well where well is the value passed through ajax

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_array()) {
            /*The next line is important as this will be the delimeter used in seperating the values*/

            echo $row["field_name"] . "\n"
                . $row["situated_off_on"] . "\n"
                . $row["location"] . "\n"
                . $row["field_type"] . "\n"
                . $row["water_depth"] . "\n"
                . $row["status"] . "\n";
        }
    }

}


