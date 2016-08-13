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

<!--                --><?php
//                $target_dir = "uploads/";
//                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//                $uploadOk = 1;
//                $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
//
//                // Check if file is a actual real orfake
//                if(isset($_POST["submit"])) {
//                    $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
//                    if($check !== false) {
//                        echo "File is real - " . $check["mime"] . ".";
//                        $uploadOk = 1;
//                    } else {
//                        echo "File is real.";
//                        $uploadOk = 0;
//                    }
//                }
//                // Check if file already exists
//                if (file_exists($target_file)) {
//                    echo "Sorry, file already exists.";
//                    $uploadOk = 0;
//                }
//                // Check file size
//                if ($_FILES["fileToUpload"]["size"] > 500000) {
//                    echo "Sorry, your file is too large.";
//                    $uploadOk = 0;
//                }
//                // Allow certain file formats
//                if($fileType != "csv" && $fileType != "xls" && $fileType != "xlsx") {
//                    echo "Sorry, only CSV and XLS/XLSX files are allowed.";
//                    $uploadOk = 0;
//                }
//                // Check if $uploadOk is set to 0 by an error
//                if ($uploadOk == 0) {
//                    echo "Sorry, your file was not uploaded.";
//                // if everything is ok, try to upload file
//                } else {
//                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//                        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
//                    } else {
//                        echo "Sorry, there was an error uploading your file.";
//                    }
//                }
//                ?>



                <div class="col-sm-9">
            	
  					<div class="panel panel-default">
    				<div class="panel-heading">Import New Production</div>
    				<div class="panel-body">
                    	<div class="row2">
                        <!-- History -->
  							<article>
                                <div id="main_feature">

                                    <form action="upload.php" method="post" enctype="multipart/form-data">
                                        Select image to upload:
                                        <input type="file" name="fileToUpload" id="fileToUpload">
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


