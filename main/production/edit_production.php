﻿<?php
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
    <title>ProdPredict | Edit Production</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
    <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/dropzone.css">
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bootstrap.js"></script>
    <script src="../../assets/js/npm.js"></script>
    <script src="../../assets/js/dropzone.js"></script>
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
        <li><a href="../home.php">Home</a> / Production Data / Edit</li>
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
            <div class="col-sm-9">

                <div class="panel panel-default">
                    <div class="panel-heading">Edit Production</div>
                    <div class="panel-body">
                        <div class="row2">
                            <!-- History -->
                            <article>
                                <div id="main_feature">
                                    <form action="p_includes/add_p.php" method="POST">
                                        <ul class="form-style-1">

                                            <label for = "prod_well">Well: <span class="required">*</span></label>
                                            <select name="prod_well" required>
                                                <option value=" ">Please Select</br></option>;
                                                <?php
                                                $sel = "SELECT * FROM well";
                                                $result = $conn->query($sel);

                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($row = $result->fetch_assoc()) {

                                                        ?>

                                                        <option value="<?php echo $row['well_id']; ?>" ><?php echo $row['well_id']; ?></option>;
                                                        <?php
                                                    }
                                                } else {?>
                                                    <option value=" "><?php echo  "No Fields Found"; ?> </br></option>;
                                                    <?php echo $i;?>
                                                    <?php
                                                }
                                                ?>
                                            </select><br>
                                            <br>

                                            <label for = "prod_date">Production Date: <span class="required">*</span></label>
                                            <input type="date" name="prod_date" accesskey="3" value="<?php echo date('Y-m-d'); ?>" required/><br>
                                            <br>

                                            <label for = "oil_prod">Oil Produced (BOPD): <span class="required">*</span></label>
                                            <input type="text" name="oil_prod" class="field-text" value=""  accesskey="4" placeholder="Oil Produced" required/><br>
                                            <br>

                                            <label for = "gas_prod">Gas Produced (MMCFD): <span class="required">*</span></label>
                                            <input type="text" name="gas_prod" class="field-text" value=""  accesskey="5" placeholder="Gas Produced" required/><br>
                                            <br>

                                            <label for = "water_prod">Water Produced (BBLS): <span class="required">*</span></label>
                                            <input type="text" name="water_prod" class="field-text" value=""  accesskey="6" placeholder="Water Produced" required/><br>
                                            <br>

                                            <label for = "gas_oil_ratio">Gas Oil Ratio (SCF/B): <span class="required">*</span></label>
                                            <input type="text" name="gas_oil_ratio" class="field-text" value=""  accesskey="7" placeholder="Gas Oil Ratio" required/><br>
                                            <br>

                                            <label for = "basic_sed_water">Basic Sediment Water (%): <span class="required">*</span></label>
                                            <input type="text" name="basic_sed_water" class="field-text" value=""  accesskey="8" placeholder="Basic Sediment Water" required/><br>
                                            <br>

                                            <label for = "bean">Bean (1/16"): <span class="required">*</span></label>
                                            <input type="text" name="bean" class="field-text" value=""  accesskey="9" placeholder="Bean/Choke" required/><br>
                                            <br>

                                            <label for = "tubing_hang_press">Tubing Hang Pressure (PSI): <span class="required">*</span></label>
                                            <input type="text" name="tubing_hang_press" class="field-text" value=""  accesskey="10" placeholder="Tubing Hanger Press" required/><br>
                                            <br>

                                            <label for = "bottom_hole_pressure">Bottom Hole Pressure (PSGI): <span class="required">*</span></label>
                                            <input type="text" name="bottom_hole_pressure" class="field-text" value=""  accesskey="11" placeholder="Bottom Hole Pressure" required/><br>
                                            <br>

                                            <label for = "a_p_i">API: <span class="required">*</span></label>
                                            <input type="text" name="a_p_i" class="field-text" value='47.7'  accesskey="12" disabled/><br>
                                            <br><br>

                                            <input type="reset" value="Clear" accesskey="13">
                                            <input type="submit" value="Save" accesskey="14">

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


