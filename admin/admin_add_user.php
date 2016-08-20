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
?>

<!DOCTYPE html>
<html lang="en">
<!-- Start of Head -->
<head>
    <meta charset="UTF-8">
    <title>ProdPredict | Add User</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
    <link rel="stylesheet" href="../assets/css/styles.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/w3.css">
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/npm.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.noty.packaged.min.js"></script>
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
        <li><a href="admin_home.php">Admin Home</a> / Add User</li>
    </ol>
    <!-- End of Breadcrum or Address Bar -->

    <!-- Main Page starts here -->
    <main>
        <div class="row2">
            <div class="col-sm-3">
                <!-- Side Navigation for Fields, Wells and Production -->
                <nav>
                    <div class="panel panel-default">
                        <div class="panel-heading">Users</div>
                        <div class="panel-body">
                            <div class="row2">
                                <ul>
                                    <a class="btn btn-default custom" href="admin_add_user.php" role="button">Add New</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default custom" href="admin_view_users.php" role="button">View Existing</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default custom" href="admin_edit_user.php" role="button">Edit User</a>
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
                    <div class="panel-heading">Add New User</div>
                    <div class="panel-body">
                        <div class="row2">
                            <!-- History -->
                            <article>
                                <div id="main_feature">
                                    <form action = "a_include/add_u.php" method = "POST">
                                        <ul class="form-style-1">

                                            <label for = "firstname">First Name: <span class="required">*</span></label>
                                            <input type="text" name="firstname" class="field-text" value=""  accesskey="1" placeholder="First Name" required/><br>
                                            <br>

                                            <label for = "lastname">Last Name: <span class="required">*</span></label>
                                            <input type="text" name="lastname" class="field-text" value=""  accesskey="2" placeholder="Last Name" required/><br><br>

                                            <label for = "company">Company: <span class="required">*</span></label>
                                            <input type="text" name="company" class="field-text" value=""  accesskey="3" placeholder="Company" required/><br><br>

                                            <label for = "email">Email: <span class="required">*</span></label>
                                            <input type="email" name="email" class="field-text" value=""  accesskey="4" placeholder="Corporate Email" required/><br><br>

                                            <label for = "password">Password: <span class="required">*</span></label>
                                            <input type="password" name="password" class="field-text"   accesskey="5" placeholder="Password" required/><br><br>

                                            <label for = "type">Type: <span class="required">*</span></label>
                                            <input type="radio" name="type" value="1" accesskey="6" checked> User
                                            <input type="radio" name="type" value="2"> Admin</input><br><br>
                                            <br>

                                            <input type="reset" name="clear" value="Clear" accesskey="7">
                                            <input type="submit" name="submit" value="Save" accesskey="8">

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


