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
    header("Location: ../index.php");
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
    <title>ProdPredict | Edit User</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
    <link rel="stylesheet" href="../assets/css/styles.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/w3.css">
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/npm.js"></script>
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
                            <li><button type="button" class="btn navbar-btn btn-circle"><a href="../includes/logout.php">Log Out</a></button></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- End of Navigation or Header Bar -->

    <!-- Start of Breadcrum or Address Bar -->
    <ol class="breadcrumb">
        <li><a href="admin_home.php">Admin Home</a> / User Data / Edit</li>
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
                                    <a class="btn btn-default custom" href="../main/field/add_field.php" role="button"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Add New</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default custom" href="../main/field/view_fields.php" role="button"><span class="glyphicon glyphicon-list-alt">&nbsp;</span>View Existing</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default custom" href="../main/field/edit_fields.php" role="button"><span class="glyphicon glyphicon-edit">&nbsp;</span>Edit Field</a>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">Wells</div>
                        <div class="panel-body">
                            <div class="row2">
                                <ul>
                                    <a class="btn btn-default custom text-left" href="../main/well/add_well.php" role="button"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Add New</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default custom" href="../main/well/view_wells.php" role="button"><span class="glyphicon glyphicon-list-alt">&nbsp;</span>View Existing</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default custom" href="../main/well/edit_wells.php" role="button"><span class="glyphicon glyphicon-edit">&nbsp;</span>Edit Well</a>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">Production</div>
                        <div class="panel-body">
                            <div class="row2">
                                <ul>
                                    <a class="btn btn-default custom" href="../main/production/import_production.php" role="button"><span class="glyphicon glyphicon-cloud-upload">&nbsp;</span>Import File</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default custom" href="../main/production/add_production.php" role="button"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Add New</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default custom" href="../main/production/view_production.php" role="button"><span class="glyphicon glyphicon-list-alt">&nbsp;</span>View Existing</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default custom" href="../main/production/edit_production.php" role="button"><span class="glyphicon glyphicon-edit">&nbsp;</span>Edit Production</a>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">Users</div>
                        <div class="panel-body">
                            <div class="row2">
                                <ul>
                                    <a class="btn btn-default" href="admin_add_user.php" role="button"><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Add New</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default" href="admin_view_users.php" role="button"><span class="glyphicon glyphicon-list-alt">&nbsp;</span>View Existing</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default" href="admin_edit_user.php" role="button"><span class="glyphicon glyphicon-edit">&nbsp;</span>Edit User</a>
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
                    <div class="panel-heading">Edit User</div>
                    <div class="panel-body">
                        <div class="row2">
                            <!-- History -->
                            <article>
                                <div id="main_feature">
                                    <form action="a_include/update_u.php" method="POST">
                                        <ul class="form-style-1">

                                            <label for = "User ID">User ID: <span class="required">*</span></label>
                                            <select name="user_id" required onchange="userSelected(this.value)>
                                                <option value="">Please Select </option>;
                                                <?php
                                                $sel = "SELECT * FROM users";
                                                $result = $conn->query($sel);

                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while($row = $result->fetch_assoc()) {

                                                        ?>

                                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['id']; ?> </option>;
                                                        <?php
                                                    }
                                                } else {?>
                                                    <option value=" "><?php echo  "No Users Found"; ?> </br></option>;
                                                    <?php
                                                }
                                                ?>

                                            </select><br>

                                            <label for = "firstname">First Name: <span class="required">*</span></label>
                                            <input type="text" name="firstname" id="firstname" class="field-text" value=""  accesskey="1" placeholder="First Name" required/><br>
                                            <br>

                                            <label for = "lastname">Last Name: <span class="required">*</span></label>
                                            <input type="text" name="lastname" id="lastname"  class="field-text" value=""  accesskey="2" placeholder="Last Name" required/><br><br>

                                            <label for = "company">Company: <span class="required">*</span></label>
                                            <input type="text" name="company" id="company"  class="field-text" value=""  accesskey="3" placeholder="Company" required/><br><br>

                                            <label for = "email">Email: <span class="required">*</span></label>
                                            <input type="email" name="email" id="email" class="field-text" value=""  accesskey="4" placeholder="Corporate Email" required/><br><br>

                                            <label for = "password">Password: <span class="required">*</span></label>
                                            <input type="password" name="password" id="password" class="field-text" value="" accesskey="5" placeholder="Password" required/><br><br>

                                            <label for = "type">Type: <span class="required">*</span></label>
                                            <input type="radio" name="type" id="type" value="1" accesskey="6" checked> User
                                            <input type="radio" name="type" id="type" value="2"> Admin</input><br><br>
                                            <br>

                                            <input type="reset" name="clear" value="Clear" accesskey="7">
                                            <input type="submit" name="submit" value="Update" accesskey="8">

                                        </ul>
                                    </form>
                                </div>
                            </article>



                        </div>
                    </div>
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
    function userSelected(value){
        console.log(value)
        //get values using ajax

        $.ajax({
            type: 'post', //uses the post method asynchronously
            url:  'a_include/edit_u.php', //php page that does the actual query
            data: {
                val: value //the get value passed to the php page: its the user id in this case.
            },
            success:function(response){ //call back
                /**
                 * Get the response call back and split into an array using the next line delimeter
                 * @type {Array}
                 */
                var splitResponse   = response.split("\n");
                var firstname       = splitResponse[0];
                var lastname        = splitResponse[1];
                var company         = splitResponse[2];
                var email           = splitResponse[3];
                var password        = splitResponse[4];
                var user_type       = splitResponse[5];



                /**
                 * pass the values retrieved dynamically into the corresponding input element by using their id
                 */
                document.getElementById("firstname").value    = firstname;
                document.getElementById("lastname").value     = lastname;
                document.getElementById("company").value      = company;
                document.getElementById("email").value        = email;
                document.getElementById("password").value     = password;
                document.getElementById("type").value         = user_type;

            },
            error: function(err){ //error call back
                console.log(err);
            }
        });
    }

</script>


