<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ProdPredict | Sign In</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
    <link rel="stylesheet" href="assets/css/styles.css" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index_only.css">
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/npm.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--/*	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>*/-->
</head>

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

                </div>
            </nav>
        </div>
    </header>
    <!-- End of Navigation or Header Bar -->


    <!-- Main Page starts here -->
    <div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6"><div class="panel panel-default">
                    <div class="panel-heading">Please Sign In</div>
                    <div class="panel-body">
                        <div class="row2">

                            <form action="includes/checklogin.php" method="POST" class="form-style-1">

                                <ul>
                                    <li>
                                        <label for = "username">Username: <span class="required"></span></label>
                                        <input type="email" name="username" class="field-text" accesskey="1" placeholder="Corporate Email" required/>
                                        <br></li>

                                    <li>
                                        <label for = "password">Password: <span class="required"></span></label>
                                        <input type="password" name="password" class="field-text"   accesskey="2" placeholder="Password"/><br>
                                        <br></li>

                                    <li>
                                        <!--                        <button type="button" class="btn btn-default">Sign Int</button>-->
                                        <input type="submit" name="Submit" value="Login" accesskey="3">
                                    </li>
                                    <li>
                                        <!--                        <button type="button" class="btn btn-default">Sign Int</button>-->
                                        <a href="#myModal" data-toggle="modal" data-target="#myModal" id="link">Request for Access</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target="#" id="link">Change Password</a>
                                    </li>

                                </ul>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            </div>
        </div>
    </div>
        </main>
</body>

</html>


<div class="container">

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Access Request</h4>
                </div>
                <div class="modal-body">
                    <div id="main_feature">

                        <?=$thankYou ?>

                        <form action = "" method = "GET">
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

                                <label for = "password">Confirm Password: <span class="required">*</span></label>
                                <input type="password" name="confirm_password" class="field-text"   accesskey="5" placeholder="Password Confirmation" required/><br><br>


                                <input type="reset" name="clear" value="Clear" accesskey="7">
                                <input type="submit" name="submit" value="Submit" accesskey="8">

                            </ul>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


<!--Javascript to Check Same Password-->
<script>

    var password = document.getElementById("password")
            , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>


<!--Php to Send Access Request to Admin by Email-->
<?php

if($_GET["lastname"]) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $company = $_POST['company'];
    $email = $_POST['email'];
    $password = $_POST['password'];



    $recipient="prinsobed@gmail.com";
    $subject="Request for Access from ".$firstname." ".$lastname;
    $sender= $firstname." ".$lastname;
    $senderEmail= $email;
    $message = "Hello Admin,\n I request for access to ProdPredict. \n\n My details are:\n\n First Name: ".$firstname."\n". "Last Name: ".$lastname."\n"."Company: ".$company."\n"."Email: ".$email."\n"."Preferred Password: ".$password."\n\n\n Thank You";

    mail($recipient, $subject, $message, "From: $sender <$email>");

$thankYou="<p>Thank you! Your request has been sent.</p>";
}
?>
