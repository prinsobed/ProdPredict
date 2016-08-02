<?php
/**
 * Created by PhpStorm.
 * User: Kraine
 * Date: 8/2/2016
 * Time: 7:45 AM
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
