<?php
/**
 * Created by PhpStorm.
 * User: Kraine
 * Date: 7/30/2016
 * Time: 3:25 PM
 */


$host="ap-cdbr-azure-east-c.cloudapp.net"; // Host name
$username="bed8c15b456030"; // Mysql username
$password="58380471"; // Mysql password
$db_name="db_prodpredict"; // Database name
$tbl_name="users"; // Table name

// Connect to server and select databse.
$conn=mysqli_connect("$host", "$username", "$password")or die("Cannot Connect");
mysqli_select_db($conn, $db_name)or die("Cannot Select DB");

// username and password sent from form
$myusername=$_POST['username'];
$mypassword=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
//$myusername = mysqli_real_escape_string($myusername);
//$mypassword = mysqli_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE email='$myusername' and password='$mypassword'";
$result=mysqli_query($sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
    session_start();
    $_SESSION['username'] = $myusername;
    $_SESSION['password'] = $mypassword;
    header("location:login_success.php");
}
else {
    echo "Wrong Username or Password";
}
?>