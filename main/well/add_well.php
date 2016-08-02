<?php
/**
 * Created by PhpStorm.
 * User: Obed Kraine, RGU-1314863 , o.k.boachie@rgu.ac.uk
 * Project: ProdPredict V1
 * Date: 8/1/2016
 * Time: 8:02 AM
 */

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
    <title>ProdPredict | Add Well</title>
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
                <li>Welcome</li>
                <li><a href="#">Settings</a></li>
                <li><button type="button" class="btn navbar-btn btn-circle">Log Out</button></li>
            </ul>
        </div>
      </div>
    </nav>
	</div>	
    </header> 
    <!-- End of Navigation or Header Bar -->
    
   	<!-- Start of Breadcrum or Address Bar -->
    <ol class="breadcrumb">
  		<li><a href="../home.php">Home</a> / Add Well</li>
	</ol>
	<!-- End of Breadcrum or Address Bar -->
    
    <!-- Main Page starts here -->
  	  	<main>
    	<div class="row2">
  			<div class="col-sm-3">
            <!-- Side Navigation for Fields, Wells and Production -->
            	<nav>
                	<div class="panel panel-default">
    				<div class="panel-heading">Wells</div>
    				<div class="panel-body">
                    	<div class="row2">
  							<ul>
                        	<a class="btn btn-default" href="add_well.php" role="button">Add New</a>
                            </ul>
                            <ul>
              				<a class="btn btn-default" href="view_wells.php" role="button">View Existing</a>
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
    				<div class="panel-heading">Production</div>
    				<div class="panel-body">
                    	<div class="row2">
                        <ul>
                            <a class="btn btn-default" href="../production/import_production.php" role="button">Import File</a>
                            </ul>
  							<ul>
                        	<a class="btn btn-default" href="../production/add_production.php" role="button">Add New</a>
                            </ul>
                            <ul>
              				<a class="btn btn-default" href="../production/view_production.php" role="button">View Existing</a>
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
    				<div class="panel-heading">Add New Well</div>
    				<div class="panel-body">
                    	<div class="row2">
                        <!-- History -->
  							<article>
            <div id="main_feature">
            <form action="" method="post">
                <ul class="form-style-1">
                    <label for = "well_id">Well ID: <span class="required"></span></label>
                    <input type="text" name="well_id" class="field-text" value=""  accesskey="1" placeholder="Well Identification No." required/><br>
                    <br>

                    <label for = "well_name">Name: </label>
                    <input type="text" name="well_name" class="field-text" value=""  accesskey="2" placeholder="Well Name"/><br>
                    <br>

                    <label for = "well_field">Field: <span class="required"></span></label>
                    <select name="well_field" required>
                        <?php
                        $query = mysqli_query("SELECT field_id FROM field");
                        while ($new_row = mysqli_fetch_array($query)){
                            echo "<option value=\"wel1_field\">" . $new_row['field_id'] . "</option>";
                        }
                        ?>
                    </select><br>
                    <br>

                    <label for = "well_prod_start">Productions Start Date: </label>
                    <input type="date" name="well_prod_start" accesskey="4"/><br>
                    <br>

                    <label for = "well_status">Status: <span class="required"></span></label>
                    <input type="radio" name="well_status" value="Production" accesskey="5"> Production
                    <input type="radio" name="well_status" value="Abandonment"> Abandonment<br>
                    <br><br>

                    <input type="submit" value="Clear" accesskey="6">
                    <input type="submit" value="Save" accesskey="7">

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


<?php

$well_id = $_POST['well_id'];
$well_name = $_POST['well_name'];
$well_field = $_POST['well_field'];
$well_prod_start = $_POST['well_prod_start'];
$well_status = $_POST['well_status'];

$sql = "INSERT INTO users (well_id, well_name, well_off_on, well_prod_start, well_status)
                VALUES ('$well_id','$well_name', '$well_field','$well_prod_start', '$well_status')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
//    echo '
//            <div class=\"w3-container\">
//            <div class=\"w3-container w3-green\">
//            <h3>Success!</h3>
//            <p>New User Added</p>
//            </div>
//            </div>';

}
else{
    echo "Error";
//    echo '
//            <div class=\"w3-container\">
//            <div class=\"w3-container w3-red\">
//            <h3>Failure!</h3>
//            <p>User Not Added</p>
//            </div>
//            </div>';

}

$conn->close();
?>