<?php
/**
 * Created by PhpStorm.
 * User: Kraine
 * Date: 8/14/2016
 * Time: 7:56 AM
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
                $prod_well = $prod_date = $oil_prod = $gas_prod = $water_prod = $gas_oil_ratio = $basic_sed_water = $bean = $tubing_hang_press = $bottom_hole_pressure = $a_p_i = $ent_user = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $prod_well = test_input($_POST["prod_well"]);
                    $prod_date = test_input($_POST["prod_date"]);
                    $oil_prod = test_input($_POST["oil_prod"]);
                    $gas_prod = test_input($_POST["gas_prod"]);
                    $water_prod = test_input($_POST["water_prod"]);
                    $gas_oil_ratio = test_input($_POST["gas_oil_ratio"]);
                    $basic_sed_water = test_input($_POST["basic_sed_water"]);
                    $bean = test_input($_POST["bean"]);
                    $tubing_hang_press = test_input($_POST["tubing_hang_press"]);
                    $bottom_hole_pressure = test_input($_POST["bottom_hole_pressure"]);
                    $a_p_i= test_input($_POST["a_p_i"]);
                    $ent_user = test_input($_SESSION['id']);
                }

                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                $sql = "INSERT INTO production(well, production_date, oil, gas, water, gor, bsw, bean, thp, bhp, api, ent_user)
                          VALUES ('$prod_well','$prod_date','$oil_prod','$gas_prod', '$water_prod', '$gas_oil_ratio','$basic_sed_water','$bean', '$tubing_hang_press','$bottom_hole_pressure','$a_p_i','$ent_user')";

                if ($conn->query($sql) === TRUE) {
                    header("location: ../view_production.php");
                }
                else{
                    header("location: ../add_production.php");
                }

