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
    <title>ProdPredict | Admin Home</title>
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
  		<li><a href="admin_home.php">Admin Home </a></li>
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
                        	<a class="btn btn-default" href="admin_add_user.php" role="button">Add New</a>
                            </ul>
                            <ul>
              				<a class="btn btn-default" href="admin_edit_user.php" role="button">View Existing</a>
            				</ul>	
						</div>
                    </div>
                    </div>
                
                
                	<div class="panel panel-default">
    				<div class="panel-heading">Fields</div>
    				<div class="panel-body">
                    	<div class="row2">
  							<ul>
                            <a class="btn btn-default" href="../main/field/add_field.php" role="button">Add New</a>
                            </ul>
                            <ul>
              				<a class="btn btn-default" href="../main/field/view_fields.php" role="button">View Existing</a>
            				</ul>	
						</div>
                    </div>
                    </div>
                    
                    <div class="panel panel-default">
    				<div class="panel-heading">Wells</div>
    				<div class="panel-body">
                    	<div class="row2">
  							<ul>
                        	<a class="btn btn-default" href="../main/well/add_well.php" role="button">Add New</a>
                            </ul>
                            <ul>
              				<a class="btn btn-default" href="../main/well/view_wells.php" role="button">View Existing</a>
            				</ul>	
						</div>
                    </div>
                    </div>
                    
                    <div class="panel panel-default">
    				<div class="panel-heading">Production</div>
    				<div class="panel-body">
                    	<div class="row2">
                        <ul>
                            <a class="btn btn-default" href="../main/production/import_production.php" role="button">Import File</a>
                            </ul>
  							<ul>
                        	<a class="btn btn-default" href="../main/production/add_production.php" role="button">Add New</a>
                            </ul>
                            <ul>
              				<a class="btn btn-default" href="../main/production/view_production.php" role="button">View Existing</a>
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
    				<div class="panel-heading">Analysis</div>
    				<div class="panel-body">
                    	<div class="row2">
                        <!-- History -->
  							<div class="col-sm-4">
                            <div class="row2">
  							<div class="col-sm-12">
    						<a href="../main/home.php" class="thumbnail">
      						<img src="../assets/images/main-history-med.png" alt="History">
                            <div class="caption">
        					History
                            </div>
    						</a>
  							</div>

							</div>
                            <div class="row2">
  							<div class="col-sm-12"></div>
							</div>
                            </div>
                            
                             <!-- Performance -->
  							<div class="col-sm-4">
                            <div class="row2">
  							<div class="col-sm-12">
    						<a href="../main/home.php" class="thumbnail">
      						<img src="../assets/images/main-performance-med.png" alt="Performance">
                            <div class="caption">
        					Performance
                            </div>
    						</a>
  							</div>

							</div>
                            <div class="row2">
  							<div class="col-sm-12"></div>
							</div>
                            </div>
                            
                             <!-- Forecast -->
  							<div class="col-sm-4">
                            <div class="row2">
  							<div class="col-sm-12">
    						<a href="../main/home.php" class="thumbnail">
      						<img src="../assets/images/main-forecast-med.png" alt="Forecast">
                            <div class="caption">
        					Forecast
                            </div>
    						</a>
  							</div>

							</div>
                            <div class="row2">
  							<div class="col-sm-12"></div>
							</div>
                            </div>  
            </div>
			</div>
			</div>

            <div class="panel panel-default">
    				<div class="panel-heading">Data</div>
    				<div class="panel-body">
                    	<div class="row2">
                        <!-- History -->
  							<div class="col-sm-4">
                            <div class="row2">
  							<div class="col-sm-12">
    						<a href="#" class="thumbnail">
      						<img src="../assets/images/main_saved.png" alt="Uploads">
                            <div class="caption">
        					Uploaded Files
                            </div>
    						</a>
  							</div>

							</div>
                            <div class="row2">
  							<div class="col-sm-12"></div>
							</div>
                            </div>
                            
                             <!-- Performance -->
  							<div class="col-sm-4">
                            <div class="row2">
  							<div class="col-sm-12">
    						<a href="#" class="thumbnail">
      						<img src="../assets/images/main_edited.png" alt="Edited">
                            <div class="caption">
        					Saved File Edits
                            </div>
    						</a>
  							</div>

							</div>
                            <div class="row2">
  							<div class="col-sm-12"></div>
							</div>
                            </div>
                            
                             <!-- Forecast -->
  							<div class="col-sm-4">
                            <div class="row2">
  							<div class="col-sm-12">
    						<a href="#" class="thumbnail">
      						<img src="../assets/images/main_report.png" alt="Reports">
                            <div class="caption">
        					Saved Reports
                            </div>
    						</a>
  							</div>

							</div>
                            <div class="row2">
  							<div class="col-sm-12"></div>
							</div>
                            </div>
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


