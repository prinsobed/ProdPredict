<?php
/**
 * Created by PhpStorm.
 * User: Kraine
 * Date: 7/30/2016
 * Time: 4:04 PM
 */

// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page

session_start();
//if(!session_is_registered($myusername)){
//if ( isset( $_SESSION['firstname'] ) ){
//    header("location:main_login.php");
//}


if ( isset( $_SESSION['username'] ) ){
    header("location: main/home.html"); // << makes the script send them to any page we set
    } else {
    print "<h2>Could not log you out, sorry the system encountered an error.</h2>";
    exit();
    }
?>
