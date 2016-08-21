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
    <title>ProdPredict | Edit Field Data</title>
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
        <li><a href="../home.php">Home</a> / Fields Data / Edit</li>
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
                                    <a class="btn btn-default custom" href="add_field.php" role="button"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Add New</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default custom" href="view_fields.php" role="button"><span class="glyphicon glyphicon-list-alt">&nbsp;</span>View Existing</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default custom" href="edit_fields.php" role="button"><span class="glyphicon glyphicon-edit">&nbsp;</span>Edit Field</a>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">Wells</div>
                        <div class="panel-body">
                            <div class="row2">
                                <ul>
                                    <a class="btn btn-default custom text-left" href="../well/add_well.php" role="button"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Add New</a>
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
                    <div class="panel-heading">Edit Field Data</div>
                    <div class="panel-body">
                        <div class="row2">
                            <!-- History -->
                            <article>
                                <div id="main_feature">
                                    <form action = "f_include/update_f.php" method = "POST">
                                        <ul class="form-style-1">
                                            <li>
                                                <label for = "field_id">Field ID: <span class="required">*</span></label>
                                                <select name="field_id" required onchange="fieldSelected(this.value)" accesskey="1">
                                                    <option value="">Please Select </option>;
                                                    <?php
                                                    $sel = "SELECT * FROM field";
                                                    $result = $conn->query($sel);

                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while($row = $result->fetch_assoc()) {

                                                            ?>

                                                            <option value="<?php echo $row['field_id']; ?>"><?php echo $row['field_id']; ?> </option>;
                                                            <?php
                                                        }
                                                    } else {?>
                                                        <option value=" "><?php echo  "No Fields Found"; ?> </br></option>;
                                                        <?php
                                                    }
                                                    ?>

                                                </select><br>
                                            </li>

                                            <li>
                                                <label for = "name">Name: </label>
                                                <input type="text" name="name" id="name" class="field-text" value=""  accesskey="2" /><br>
                                            </li>

                                            <li>
                                                <label for = "situated">Situated: <span class="required">*</span></label>
                                                <input type="text" name="situated" id="situated" class="field-text"  accesskey="3" disabled /><br>
                                            </li>

                                            <li>
                                                <label for = "location">Location: <span class="required">*</span></label>
                                                <input type="text" name="location" id="location" class="field-text"  accesskey="4" disabled /><br>
                                            </li>

                                            <li>
                                                <label for = "field_type">Type: <span class="required">*</span></label>
                                                <input type="text" name="field_type" id="field_type" class="field-text" value=""  accesskey="5" disabled /><br>
                                                <input type="radio" name="field_type_new" value="Oil" accesskey="6" checked> Oil
                                                <input type="radio" name="field_type_new" value="Gas"> Gas
                                                <input type="radio" name="field_type_new" value="Both"> Both<br>
                                            </li>

                                            <li>
                                                <label for = "water_depth">Water Depth(m): </label>
                                                <input type="text" name="water_depth" id="water_depth" class="field-text" value=""  accesskey="7"/><br>
                                            </li>


                                            <li>
                                                <label for = "status">Status: <span class="required">*</span></label>
                                                <input type="text" name="status" id="status" class="field-text" value=""  accesskey="8" disabled /><br>
                                                <input type="radio" name="status_new" value="Production" accesskey="9" checked> Production
                                                <input type="radio" name="status_new" value="Abandonment"> Abandonment<br><br><br>
                                            </li>

                                            <input type="reset" value="Clear" accesskey="11">
                                            <input type="submit" value="Save" accesskey="12">

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
    function fieldSelected(value){
        console.log(value)
        //get values using ajax

        $.ajax({
            type: 'post', //uses the post method asynchronously
            url:  'f_include/edit_f.php', //php page that does the actual query
            data: {
                val: value //the get value passed to the php page: its the field id in this case.
            },
            success:function(response){ //call back
                /**
                 * Get the response call back and split into an array using the next line delimeter
                 * @type {Array}
                 */
                var splitResponse = response.split("\n");
                var name            = splitResponse[0];
                var situated        = splitResponse[1];
                var location        = splitResponse[2];
                var field_type      = splitResponse[3];
                var water_depth     = splitResponse[4];
                var status          = splitResponse[5];

                /**
                 * pass the values retrieved dynamically into the corresponding input element by using their id
                 */
                document.getElementById("name").value = name;
                document.getElementById("situated").value = situated;
                document.getElementById("location").value = location;
                document.getElementById("field_type").value = field_type;
                document.getElementById("water_depth").value = water_depth;
                document.getElementById("status").value = status;

            },
            error: function(err){ //error call back
                console.log(err);
            }
        });
    }

</script>


