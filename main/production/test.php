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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Upload page</title>
    <style type="text/css">
        body {
            background: #E3F4FC;
            font: normal 14px/30px Helvetica, Arial, sans-serif;
            color: #2b2b2b;
        }
        a {
            color:#898989;
            font-size:14px;
            font-weight:bold;
            text-decoration:none;
        }
        a:hover {
            color:#CC0033;
        }

        h1 {
            font: bold 14px Helvetica, Arial, sans-serif;
            color: #CC0033;
        }
        h2 {
            font: bold 14px Helvetica, Arial, sans-serif;
            color: #898989;
        }
        #container {
            background: #CCC;
            margin: 100px auto;
            width: 945px;
        }
        #form 			{padding: 20px 150px;}
        #form input     {margin-bottom: 20px;}
    </style>
</head>
<body>
<div id="container">
    <div id="form">

        <?php

        $deleterecords = "TRUNCATE TABLE tablename"; //empty the table of its current records
        mysqli_query($conn, $deleterecords);

        //Upload File
        if (isset($_POST['submit'])) {
            if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
                echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
                echo "<h2>Displaying contents:</h2>";
                readfile($_FILES['filename']['tmp_name']);
            }

            //Import uploaded file to Database
            $handle = fopen($_FILES['filename']['tmp_name'], "r");

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $import="INSERT into production(well, production_date, oil, gas, water, gor, bsw, bean, thp, bhp, api, ent_user) values('$data[0]','STR_TO_DATE('$data[1]','%d%m%y'),'$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]',11)";
                mysqli_query($conn, $import) or die(mysqli_error($conn));
            }

            fclose($handle);

            print "Import done";

            //view upload form
        }else {

            print "Upload new csv by browsing to file and clicking on Upload<br />\n";

            print "<form enctype='multipart/form-data' action='' method='post'>";

            print "File name to import:<br />\n";

            print "<input size='50' type='file' name='filename'><br />\n";

            print "<input type='submit' name='submit' value='Upload'></form>";

        }

        ?>

    </div>
</div>
</body>
</html>