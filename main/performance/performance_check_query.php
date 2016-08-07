<?php
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
    <title>ProdPredict | Well Production Performance</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
    <link rel="stylesheet" href="../../assets/css/styles.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bootstrap.js"></script>
	<script src="../../assets/js/npm.js"></script>
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
  		<li><a href="../home.php">Home</a> / Well Production Performance / Check Performance</li>
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
                            <a class="btn btn-default" href="../field/add_field.php" role="button">Add New</a>
                            </ul>
                            <ul>
              				<a class="btn btn-default" href="../field/view_fields.php" role="button">View Existing</a>
            				</ul>	
						</div>
                    </div>
                    </div>
                    
                    <div class="panel panel-default">
    				<div class="panel-heading">Wells</div>
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

                <!--PHP Code to implement Record Insert -->





                <!--End of PHP Code to implement Record Insert -->

                <div class="col-sm-9">

                    <div class="panel panel-default">
                        <div class="panel-heading">Well Performance Query</div>
                        <div class="panel-body">
                            <div class="row2">
                                <!-- History -->
                                <article>
                                    <div id="main_feature">
                                        <form>
                                            <ul class="form-style-1">

                                                <label for = "num_wells">Number of Wells: <span class="required">*</span></label>
                                                <select name="num_wells" required accesskey="1">
                                                    <option value="1">1</option>;
                                                    <option value="2">2</option>;
                                                    <option value="3">3</option>;
                                                </select><br>
                                                <br>

                                                <label for = "Wells">Performance Wells </label>
                                                <label for = "well_1">Well 1: <span class="required">*</span></label>
                                                <select name="well_1" required accesskey="2">
                                                    <?php
                                                    $sel = "SELECT * FROM well";
                                                    $result = $conn->query($sel);

                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while($row = $result->fetch_assoc()) {
                                                            $items = $row["well_id"];
                                                            ?>
                                                            <option value=" "><?php echo $items; ?> </br></option>;
                                                            <?php
                                                        }
                                                    } else {?>
                                                        <option value=" "><?php echo  "No Fields Found"; ?> </br></option>;
                                                        <?php
                                                    }
                                                    ?>
                                                </select><br>
                                                <br>

                                                <label for = "well_2">Well 2: </label>
                                                <select name="well_2" accesskey="3">
                                                    <?php
                                                    $sel = "SELECT * FROM well ";
                                                    $result = $conn->query($sel);

                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while($row = $result->fetch_assoc()) {
                                                            $items = $row["well_id"];
                                                            ?>
                                                            <option value=" "><?php echo $items; ?> </br></option>;
                                                            <?php
                                                        }
                                                    } else {?>
                                                        <option value=" "><?php echo  "No Fields Found"; ?> </br></option>;
                                                        <?php
                                                    }
                                                    ?>
                                                </select><br>
                                                <br>

                                                <label for = "well_3">Well 3: </label>
                                                <select name="well_3" accesskey="4">
                                                    <?php
                                                    $sel = "SELECT * FROM well ";
                                                    $result = $conn->query($sel);

                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while($row = $result->fetch_assoc()) {
                                                            $items = $row["well_id"];
                                                            ?>
                                                            <option value=" "><?php echo $items; ?> </br></option>;
                                                            <?php
                                                        }
                                                    } else {?>
                                                        <option value=" "><?php echo  "No Fields Found"; ?> </br></option>;
                                                        <?php
                                                    }
                                                    ?>
                                                </select><br>
                                                <br>

                                                <label for = "period">Performance Period </label>
                                                <label for = "start_date">From (Performance Start): <span class="required">*</span></label>
                                                <input type="date" name="start_date" accesskey="5" required/><br>
                                                <br>

                                                <label for = "end_date">To (Performance End): <span class="required">*</span></label>
                                                <input type="date" name="end_date" accesskey="6" required/><br>
                                                <br>

                                                <li>
                                                    <label for = "hydrocarbon">Hydrocarbon: <span class="required">*</span></label>
                                                    <input type="radio" name="hydrocarbon" value="All" checked accesskey="4"> All
                                                    <input type="radio" name="hydrocarbon" value="Oil"> Oil
                                                    <input type="radio" name="hydrocarbon" value="Gas"> Gas
                                                    <input type="radio" name="hydrocarbon" value="Water"> Water

                                                </li>

                                                <li>
                                                    <label for = "report_type">Report Type: <span class="required">*</span></label>
                                                    <input type="radio" name="report_type" value="Graph" checked accesskey="5"> Graph
                                                    <input type="radio" name="report_type" value="Data" required> Data
                                                </li><br><br>

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


