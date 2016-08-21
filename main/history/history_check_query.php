<?php
/**
 * Created by PhpStorm.
 * User: Obed Kraine, RGU-1314863 , o.k.boachie@rgu.ac.uk
 * Project: ProdPredict V1
 * Date: 8/1/2016
 * Time: 8:02 AM
 */

session_start();
if(!$_SESSION['username']){
    header("Location: ../../index.php");
}

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

?>

    <!DOCTYPE html>
    <html lang="en">
    <!-- Start of Head -->
    <head>
        <meta charset="UTF-8">
        <title>ProdPredict | Well Production History</title>
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
        <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css">
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
        <script src="../../assets/js/bootstrap.min.js"></script>
        <script src="../../assets/js/bootstrap.js"></script>
        <script src="../../assets/js/npm.js"></script>
        <script src="../../assets/js/npm.js"></script>
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
            <li><a href="../home.php">Home</a> / Well Production History / Check History</li>
        </ol>
        <!-- End of Breadcrum or Address Bar -->

        <!-- Main Page starts here -->
        <main>
            <div class="row2">
                <div class="col-sm-3">
                    <!-- Side Navigation for Fields, Wells and Production -->
                    <nav>
                        <div class="panel panel-default">
                            <div class="panel-heading">Fields</div>
                            <div class="panel-body">
                                <div class="row2">
                                    <ul>
                                        <a class="btn btn-default custom" href="../field/add_field.php" role="button"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Add New</a>
                                    </ul>
                                    <ul>
                                        <a class="btn btn-default custom" href="../field/view_fields.php" role="button"><span class="glyphicon glyphicon-list-alt">&nbsp;</span>View Existing</a>
                                    </ul>
                                    <ul>
                                        <a class="btn btn-default custom" href="../field/edit_fields.php" role="button"><span class="glyphicon glyphicon-edit">&nbsp;</span>Edit Field</a>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">Wells</div>
                            <div class="panel-body">
                                <div class="row2">
                                    <ul>
                                        <a class="btn btn-default custom" href="../well/add_well.php" role="button"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Add New</a>
                                    </ul>
                                    <ul>
                                        <a class="btn btn-default custom" href="../well/view_wells.php" role="button"><span class="glyphicon glyphicon-list-alt">&nbsp;</span>View Existing</a>
                                    </ul>
                                    <ul>
                                        <a class="btn btn-default custom" href="../well/edit_wells.php" role="button"><span class="glyphicon glyphicon-edit">&nbsp;</span>Edit Well</a>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">Production</div>
                            <div class="panel-body">
                                <div class="row2">
                                    <ul>
                                        <a class="btn btn-default custom" href="../production/import_production.php" role="button"><span class="glyphicon glyphicon-cloud-upload">&nbsp;</span>Import File</a>
                                    </ul>
                                    <ul>
                                        <a class="btn btn-default custom" href="../production/add_production.php" role="button"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Add New</a>
                                    </ul>
                                    <ul>
                                        <a class="btn btn-default custom" href="../production/view_production.php" role="button"><span class="glyphicon glyphicon-list-alt">&nbsp;</span>View Existing</a>
                                    </ul>
                                    <ul>
                                        <a class="btn btn-default custom" href="../production/edit_production.php" role="button"><span class="glyphicon glyphicon-edit">&nbsp;</span>Edit Production</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- Main Section of Page for Analysis Option Selection, Showing or Editing Data/Graph -->
            <section>

                <!--PHP Code to implement Record Insert -->





                <!--End of PHP Code to implement Record Insert -->

                <div class="col-sm-9">

                    <div class="panel panel-default">
                        <div class="panel-heading">Well History Query</div>
                        <div class="panel-body">
                            <div class="row2">
                                <!-- History -->
                                <article>
                                    <div id="main_feature">
                                        <form action="hi_includes/analysis_h.php" method="POST">
                                            <ul class="form-style-1">

                                                <label for = "hist_well">History Well:<span class="required">*</span></label>
                                                <select name="hist_well" required accesskey="1" required>
                                                    <option value="">Please Select</option>
                                                    <?php
                                                    $sel = "SELECT * FROM production";
                                                    $result = $conn->query($sel);

                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while($row = $result->fetch_assoc()) {
                                                            $wells = $row["well"];
                                                            ?>

                                                            <option value="<?php echo $wells; ?>"><?php echo $wells; ?> </option>;
                                                            <?php
                                                        }
                                                    } else {?>
                                                        <option value=" "><?php echo  "No Wells Found"; ?> </br></option>;
                                                        <?php
                                                    }
                                                    ?>

                                                </select><br>
                                                <br>


                                                <label for = "period">History Period </label>
                                                <label for = "start_date">From (History Start): <span class="required">*</span></label>
                                                <select name="start_date" required accesskey="2" required>
                                                    <option value="">Please Select</option>
                                                    <?php
                                                    $sel1 = "SELECT * FROM production WHERE well_id ='$wells'";
                                                    $result1 = $conn->query($sel1);

                                                    if ($result1->num_rows > 0) {
                                                        // output data of each row
                                                        while($row1 = $result1->fetch_assoc()) {
                                                            $s_dates = $row1["production_date"];
                                                            ?>

                                                            <option value="<?php echo $s_dates; ?>"><?php echo $s_dates; ?> </option>;
                                                            <?php
                                                        }
                                                    } else {?>
                                                        <option value=" "><?php echo  "No Dates Found"; ?> </br></option>;
                                                        <?php
                                                    }
                                                    ?>

                                                </select><br>
                                                <br>


                                                <label for = "end_date">To (History End): <span class="required">*</span></label>
                                                <select name="end_date" required accesskey="3" required>
                                                    <option value="">Please Select</option>
                                                    <?php
                                                    $sel2 = "SELECT * FROM production WHERE well_id ='$wells'";
                                                    $result2 = $conn->query($sel2);

                                                    if ($result2->num_rows > 0) {
                                                        // output data of each row
                                                        while($row2 = $result2->fetch_assoc()) {
                                                            $e_dates = $row2["production_date"];
                                                            ?>

                                                            <option value="<?php echo $e_dates; ?>"><?php echo $e_dates; ?> </option>;
                                                            <?php
                                                        }
                                                    } else {?>
                                                        <option value=" "><?php echo  "No Dates Found"; ?> </br></option>;
                                                        <?php
                                                    }
                                                    ?>

                                                </select><br>
                                                <br>

                                                <li>
                                                    <label for = "hydrocarbon">Hydrocarbon: <span class="required">*</span></label>
                                                    <input type="radio" name="hydrocarbon" value="All" checked accesskey="4"> All<br>
                                                    <input type="radio" name="hydrocarbon" value="Oil"> Oil
                                                    <input type="radio" name="hydrocarbon" value="Gas"> Gas
                                                    <input type="radio" name="hydrocarbon" value="Water"> Water

                                                </li>

                                                <li>
                                                    <label for = "report_type">Report Type: <span class="required">*</span></label>
                                                    <input type="radio" name="report_type" value="Graph" checked accesskey="5"> Graph
                                                    <input type="radio" name="report_type" value="Data"> Data
                                                </li><br><br>

                                                <input type="reset" value="Clear" accesskey="6">
                                                <input type="submit" value="Generate Report" accesskey="7">

                                            </ul>
                                        </form>
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
    </body>
    <!-- End of Page Body -->
    </html>


<?php

?>