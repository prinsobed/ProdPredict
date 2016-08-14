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

                // define variables and set to empty values
                $fname = $lname = $company = $email = $password = $type =  "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $fname = test_input($_POST["firstname"]);
                    $lname = test_input($_POST["lastname"]);
                    $company = test_input($_POST["company"]);
                    $email = test_input($_POST["email"]);
                    $password = test_input($_POST["password"]);
                    $type = test_input($_POST["type"]);
                }

                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                $sql = "INSERT INTO users (firstname, lastname, company, email, password, user_type)
                          VALUES ('$fname','$lname', '$company','$email', '$password', '$type')";

                if ($conn->query($sql) === TRUE) {
                    header("location: ../admin_view_users.php");
                }
                else{
                    header("location: ../admin_add_user.php");
                }
                $conn->close();
