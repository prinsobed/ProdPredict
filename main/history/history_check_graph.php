<?php
/**
 * Created by PhpStorm.
 * User: Obed Kraine, RGU-1314863 , o.k.boachie@rgu.ac.uk
 * Project: ProdPredict V1
 * Date: 8/1/2016
 * Time: 8:02 AM
 */

session_start();
if(!$_SESSION['username']){
    header("Location: ../../index.php");
}
?>


<?php

    echo 'History Well: ' . ' '. $hist_well = $_POST['hist_well'];
    echo 'Start Date: ' . ' ' . $start_date = $_POST['start_date'];
    echo 'End Date: ' . '' . $end_date = $_POST['end_date'];
    echo 'Hydrocarbon: '. ' ' . $hydrocarbon = $_POST['hydrocarbon'];

?>