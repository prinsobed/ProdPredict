﻿<?php
/**
 * Created by PhpStorm.
 * User: Obed Kraine, RGU-1314863 , o.k.boachie@rgu.ac.uk
 * Project: ProdPredict V1
 * Date: 8/1/2016
 * Time: 8:02 AM
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

?>

<!DOCTYPE html>
<html lang="en">
<!-- Start of Head -->
<head>
    <meta charset="UTF-8">
    <title>ProdPredict | Import Production</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
    <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bootstrap.js"></script>
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
  		<li><a href="../home.php">Home</a> / Import Production</a></li>
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
						</div>
                    </div>
                    </div>
                    
                    <div class="panel panel-default">
    				<div class="panel-heading">Fields</div>
    				<div class="panel-body">
                    	<div class="row2">
  							<ul>
                            <a class="btn btn-default" href="../field/add_field.php" role="button">Add New</a>
                            </ul>
                            <ul>
              				<a class="btn btn-default" href="../field/view_fields.php" role="button">View Existing</a>
            				</ul>	
						</div>
                    </div>
                    </div>
                    
                    <div class="panel panel-default">
    				<div class="panel-heading">Well</div>
    				<div class="panel-body">
                    	<div class="row2">
  							<ul>
                        	<a class="btn btn-default" href="../well/add_well.php" role="button">Add New</a>
                            </ul>
                            <ul>
              				<a class="btn btn-default" href="../well/view_wells.php" role="button">View Existing</a>
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
    				<div class="panel-heading">Import New Production</div>
    				<div class="panel-body">
                    	<div class="row2">
                        <!-- History -->
  							<article>
                                <div id="main_feature">

                                    <?php

                                    $deleterecords = "TRUNCATE TABLE tablename"; //empty the table of its current records
                                    mysqli_query($conn, $deleterecords);

                                    //Upload File
                                    if (isset($_POST['submit'])) {
                                    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
                                    echo "<h1>" . "File ". $_FILES['filename']['name'] ." Uploaded successfully." . "</h1>";
                                    echo "<h2>Displaying contents:</h2>";
                                    readfile($_FILES['filename']['tmp_name']);
                                    }

                                    //Import uploaded file to Database
                                    $handle = fopen($_FILES['filename']['tmp_name'], "r");
                                        //insert

                                    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                                    $import="INSERT into production( well, production_date, oil, gas, water, gor, bsw, bean, thp, bhp, api, ent_user) values('well1', '2016-09-09', 210, 34, 5, 34, 5, 454, 345, 234, 42, 11)";

                                    mysqli_query($conn, $import) or die(mysqli_error($conn));
                                    }

                                    fclose($handle);

                                    print "Import done";

                                    //view upload form
                                    }else {

                                    print "Upload new csv by browsing to file and clicking on Upload<br />\n";

//                                    print "<form enctype='multipart/form-data' action='upload.php' method='post'>";
//
//                                        print "File name to import:<br />\n";
//
//                                        print "<input size='50' type='file' name='filename'><br />\n";
//
//                                        print "<input type='submit' name='submit' value='Upload'></form>";

                                    }

                                    ?>

                                    <form action="" method="post" enctype="multipart/form-data">
                                        Select image to upload:
                                        <input type="file" name="filename" id="fileToUpload">
                                        <input type="submit" value="Upload File" name="submit">
                                    </form>


                                </div>
                            </article>
                            
                            
                  
                        </div>
			        </div>
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


