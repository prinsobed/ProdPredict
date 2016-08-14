<?php
/**
 * Created by PhpStorm.
 * User: Kraine
 * Date: 8/14/2016
 * Time: 6:48 AM
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

                // define variables and set to empty values
                $field_id = $name = $situated = $location = $field_type = $water_depth= $status =   "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $field_id = test_input($_POST["field_id"]);
                    $name = test_input($_POST["name"]);
                    $situated = test_input($_POST["situated"]);
                    $location = test_input($_POST["location"]);
                    $field_type = test_input($_POST["field_type"]);
                    $water_depth = test_input($_POST["water_depth"]);
                    $status = test_input($_POST["status"]);
                }

                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                $sql = "INSERT INTO field (field_id, field_name, situated_off_on, location, field_type, water_depth, status)
                          VALUES ('$field_id','$name', '$situated','$location', '$field_type', '$water_depth','$status')";

                if ($conn->query($sql) === TRUE) {
                    header("location: view_fields.php");
                    ?><script>alert('Success: New Field Added');</script><?php
                }
                else{
                    header("location: add_field.php");
                    ?><script>alert('Failure: No Field Added');</script><?php
                }
                $conn->close();
                ?>

<!--End of PHP Code to implement Record Insert -->