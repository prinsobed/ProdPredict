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
?>




<!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ProdPredict | Contact Us</title>
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

    <!-- Start of Breadcrum or Address Bar -->
    <ol class="breadcrumb">
        <li><a href="main/home.php">Home</a></li>
    </ol>
    <!-- End of Breadcrum or Address Bar -->


    <!-- Main Page starts here -->
    <div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6"><div class="panel panel-default">
                    <div class="panel-heading">Send Us a Comment</div>
                    <div class="panel-body">
                        <div class="row2">

                            <?=$thankYou ?>

                            <form method="post" action="" class="form-style-1">
                                <label>Name:</label>
                                <input type="text" name="sender">

                                <label>Email address:</label>
                                <input type="email" name="senderEmail">

                                <label>Message:</label>
                                <textarea rows="5" cols="20" name="message"></textarea>

                                <input type="submit" name="submit">
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</div>

</body>

</html>

<!--PHP to Send User Message-->
<?php

if($_POST["submit"]) {
$recipient="prinsobed@gmail.com";
$subject="ProdPredict User Message";
$sender=$_POST["sender"];
$senderEmail=$_POST["senderEmail"];
$message=$_POST["message"];

$mailBody="Name: $sender\nEmail: $senderEmail\n\n$message";

mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>");

$thankYou="<p>Thank you! Your message has been sent.</p>";

header('Location: main/home.php');
}

?>









