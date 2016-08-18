<?php
/**
 * Created by PhpStorm.
 * User: Obed Kraine, RGU-1314863 , o.k.boachie@rgu.ac.uk
 * Project: ProdPredict V1
 * Date: 8/1/2016
 * Time: 8:02 AM
 */

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<!-- Start of Head -->
<head>
    <meta charset="UTF-8">
    <title>ProdPredict | Production Data</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
    <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/dropzone.css">
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bootstrap.js"></script>
    <script src="../../assets/js/npm.js"></script>
    <script src="../../assets/js/dropzone.js"></script>
    <script src="p_includes/papaparse.js"></script>
</head>
<!-- End of Head -->

<!-- Start of Body of Page -->
<body>
<!-- Start of Navigation or Header Bar -->
<div class="container">
    <header>
        <div class="navbar">
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand text-uppercase" href="#">ProdPredict <span class="label label-success text-capitalize">V1</span></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Welcome<?php echo ", "."{$_SESSION['firstname']}"; ?></a></li>
                            <li><a href="#">Settings</a></li>
                            <li><button type="button" class="btn navbar-btn btn-circle"><a href="../../includes/logout.php">Log Out</a></button></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- End of Navigation or Header Bar -->

    <!-- Start of Breadcrum or Address Bar -->
    <ol class="breadcrumb">
        <li><a href="../home.php">Home</a> / Production Data</li>
    </ol>
    <!-- End of Breadcrum or Address Bar -->

    <!-- Main Page starts here -->
    <main>
        <div class="row2">
            <div class="col-sm-3">
                <!-- Side Navigation for Fields, Wells and Production -->
                <nav>
                    <div class="panel panel-default">
                        <div class="panel-heading">Production</div>
                        <div class="panel-body">
                            <div class="row2">
                                <ul>
                                    <a class="btn btn-default" href="import_production.php" role="button">Import File</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default" href="add_production.php" role="button">Add New</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default" href="view_production.php" role="button">View Existing</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default" href="edit_production.php" role="button">Edit Production</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Main Section of Page for Analysis Option Selection, Showing or Editing Data/Graph -->
        <section>
            <div class="col-sm-9">

                <div class="panel panel-default">
                    <div class="panel-heading">Production Data</div>
                    <div class="panel-body">
                        <div class="row2">
                            <!-- History -->
                            <article>
                                <div id="main_feature">


                                    <!-- Code Here -->
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Well</th>
                                            <th>Production Date</th>
                                            <th>Oil(BOPD)</th>
                                            <th>Gas(MMCFD)</th>
                                            <th>Water(BBLS)</th>
                                            <th>GOR(SCF/B)</th>
                                            <th>BSW(%)</th>
                                            <th>Bean(1/16")</th>
                                            <th>THP(PSI)</th>
                                            <th>BHP(PSGI)</th>
                                            <th>API</th>
                                        </tr>
                                        </thead>
                                        <?php

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


                                        $sql = "SELECT prod_id, production_date, well, oil, gas, water, gor, bsw, bean, thp, bhp, api FROM production";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                echo '

                <tbody>
                <tr class="odd">
                    <td id="w_id" contenteditable="false">' .$row["well"].'</td>
                    <td id="prod_date" contenteditable="false">' .$row["production_date"].'</td>
                    <td id="oil" contenteditable="true">' .$row["oil"].'</td>
                    <td id="gas" contenteditable="true">' .$row["gas"].'</td>
                    <td id="water" contenteditable="true">' .$row["water"].'</td>
                    <td id="gor" contenteditable="true">' .$row["gor"].'</td>
                    <td id="bsw" contenteditable="true">' .$row["bsw"].'</td>
                    <td id="bean" contenteditable="true">' .$row["bean"].'</td>
                    <td id="thp" contenteditable="true">' .$row["thp"].'</td>
                    <td id="bhp" contenteditable="true">' .$row["bhp"].'</td>
                    <td id="api" contenteditable="true">' .$row["api"].'</td>
                </tr>

                </tbody>
            ';
                                            }
                                        } else {
                                            echo "No Production Records";
                                        }
                                        $conn->close();
                                        ?>
                                    </table>


                                </div>
                            </article>



                        </div>
                    </div>
                </div></div>
        </section>

    </main>
    <!-- End of Main of Page -->

    <!-- Footer starts here -->
    <footer>
        <div class="row">
            <div class="col-sm-12">Designed by Obed Kraine Boachie, ©2016.</div>
        </div>
    </footer>
    <!-- End of Footer -->
</div>
<script>
    Papa.parse("http://example.com/file.csv", {
        download: true,
        complete: function(results) {
            console.log(results);
        }
    });

</script>
</body>
<!-- End of Page Body -->
</html>


