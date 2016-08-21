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
    <title>ProdPredict | Edit Well Data</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
    <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/dropzone.css">
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bootstrap.js"></script>
    <script src="../../assets/js/npm.js"></script>
    <script src="../../assets/js/dropzone.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
        <li><a href="../home.php">Home</a> / Wells Data / Edit</li>
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
                    <div class="panel-heading">Edit Well Data</div>
                    <div class="panel-body">
                        <div class="row2">
                            <!-- History -->
                            <article>
                                <div id="main_feature">
                                    <form action="w_include/update_w.php" method="POST">
                                        <ul class="form-style-1">
                                            <label for = "well_id">Well ID: <span class="required">*</span></label>
                                            <select name="well_id" required onchange="wellSelected(this.value)" accesskey="1">
                                                <option value="">Please Select </option>;
                                                <?php
                                                $sel = "SELECT * FROM well";
                                                $result = $conn->query($sel);

                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($row = $result->fetch_assoc()) {
                                                        ?>
                                                        <option value="<?php echo $row['well_id']; ?>"><?php echo $row['well_id']; ?> </option>;
                                                        <?php
                                                    }
                                                } else {?>
                                                    <option value=" "><?php echo  "No Wells Found"; ?> </br></option>;
                                                    <?php
                                                }
                                                ?>

                                            </select><br>
                                            <br>

                                            <label for = "well_name">Name: </label>
                                            <input type="text" name="well_name" id="well_name" class="field-text" value=""  accesskey="2" placeholder="Well Name"/><br>
                                            <br>

                                            <label for = "well_field">Field: <span class="required">*</span></label>
                                            <input type="text" name="well_field" id="well_field" class="field-text" value=""  accesskey="3" placeholder="Field" disabled/><br>
                                            <br>

                                            <label for = "well_prod_start">Productions Start Date: <span class="required">*</span></label>
                                            <input type="text" name="well_prod_start" id="well_prod_start" accesskey="4" placeholder="Production Start Date" disabled/><br>
                                            <br>

                                            <label for = "well_status">Status: <span class="required"></span></label>
                                            <input type="text" name="well_status" id="well_status" accesskey="5" placeholder="Status" required/><br>
                                            <input type="radio" name="well_status_new" value="Production" accesskey="6" checked> Production
                                            <input type="radio" name="well_status_new" value="Abandonment"> Abandonment<br>
                                            <br><br>

                                            <input type="submit" value="Clear" accesskey="7">
                                            <input type="submit" value="Update" accesskey="8">

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

<script type="application/javascript">
    function wellSelected(value){
        console.log(value)
        //get values using ajax

        $.ajax({
            type: 'post', //uses the post method asynchronously
            url:  'w_include/edit_w.php', //php page that does the actual query
            data: {
                val: value //the get value passed to the php page: its the wellid in this case.
            },
            success:function(response){ //call back
                /**
                 * Get the response call back and split into an array using the next line delimeter
                 * @type {Array}
                 */
                var splitResponse = response.split("\n");
                var well_name            = splitResponse[0];
                var well_field           = splitResponse[1];
                var well_prod_start      = splitResponse[2];
                var well_status          = splitResponse[3];


                /**
                 * pass the values retrieved dynamically into the corresponding input element by using their id
                 */
                document.getElementById("well_name").value = well_name;
                document.getElementById("well_field").value = well_field;
                document.getElementById("well_prod_start").value = well_prod_start;
                document.getElementById("well_status").value = well_status;

            },
            error: function(err){ //error call back
                console.log(err);
            }
        });
    }

</script>


