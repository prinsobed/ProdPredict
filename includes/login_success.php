<?php
/**
 * Created by PhpStorm.
 * User: Obed Kraine, RGU-1314863 , o.k.boachie@rgu.ac.uk
 * Project: ProdPredict V1
 * Date: 8/1/2016
 * Time: 8:02 AM
 */


// A check to verify if session is registered.
session_start();
$myusername = $_SESSION['username'];
$myusertype = $_SESSION['user_type'];
$thisUserID = $_SESSION['id'];

if(isset($myusername)){
    if ($myusertype == 2){
        header("location: ../admin/admin_home.php");
    }else {
        if ($myusertype == 1) {
            header("location: ../main/home.php");
        }
    }
}else {
    print "<h2>Could not log you in, Sorry.</h2>";
    exit();
}


