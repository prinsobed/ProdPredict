<?php
/**
 * Created by PhpStorm.
 * User: Obed Kraine, RGU-1314863 , o.k.boachie@rgu.ac.uk
 * Project: ProdPredict V1
 * Date: 8/1/2016
 * Time: 8:02 AM
 */


// Check if session is not registered, redirect back to main page.
// Put this code in first line of web page

session_start();
//if(!session_is_registered($myusername)){
//if ( isset( $_SESSION['firstname'] ) ){
//    header("location:main_login.php");
//}


if ( isset( $_SESSION['username'] ) ){
    header("location: ../main/home.php"); // << makes the script send them to any page we set
//    $thisuser = 'username';
    } else {
    print "<h2>Could not log you in, Sorry.</h2>";
    exit();
    }

