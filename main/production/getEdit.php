<?php
/**
 * Created by PhpStorm.
 * User: Obed Kraine, RGU-1314863 , o.k.boachie@rgu.ac.uk
 * Project: ProdPredict V1
 * Date: 8/1/2016
 * Time: 8:02 AM
 */

$getValue = $_POST['val']; //POST value retrieved from ajax

if(isset($getValue)){ //checking if the variable is set

    /**
     * setting your db parameters, you should probably have this in a static file and include it :)
     */
    $servername="ap-cdbr-azure-east-c.cloudapp.net"; // Host name
    $username="bed8c15b456030"; // Mysql username
    $password="58380471"; // Mysql password
    $dbname="db_prodpredict"; // Database name

    /**********************************************/


// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM production WHERE well = '$getValue'"; //select all from production well where well is the value passed through ajax

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_array()) {
            /*The next line is important as this will be the delimeter used in seperating the values*/
            
            echo $row["production_date"] . "\n"
                 .$row["oil"]   . "\n"
                 .$row["gas"]   . "\n"
                 .$row["water"] . "\n"
                 .$row["gor"]   . "\n"
                 .$row["bsw"]   . "\n"
                 .$row["bean"]  . "\n"
                 .$row["thp"]   . "\n"
                 .$row["bhp"]   . "\n"
                 .$row["api"]   . "\n";
        }
    }

}


