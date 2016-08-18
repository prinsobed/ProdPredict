<?php
/**
 * Created by PhpStorm.
 * User: Kraine
 * Date: 8/13/2016
 * Time: 9:48 PM
 */

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file is a actual real orfake
if(isset($_POST["submit"])) {
    $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is real - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is real.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($fileType != "csv" && $fileType != "xls" && $fileType != "xlsx") {
    echo "Sorry, only CSV and XLS/XLSX files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        header("location: view_production.php");
        ?><script>alert('Success: Field Added');</script><?php
    } else {
        header("location: ../main/home.php");
        ?><script>alert('Failure: No Field Added');</script><?php
    }
}
?>