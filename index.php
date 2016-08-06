<?php
/**
 * Created by PhpStorm.
 * User: Obed Kraine, RGU-1314863 , o.k.boachie@rgu.ac.uk
 * Project: ProdPredict V1
 * Date: 8/1/2016
 * Time: 8:02 AM
 */
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ProdPredict | Sign In</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
 	<link rel="stylesheet" href="assets/css/styles.css" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/npm.js"></script>
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
  	<main>
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
                	</ul>
            		</form>
                           
             </div>   
             </div>  
             </div> 
  <div class="col-md-3"></div>
  </div>
</body>

</html>
