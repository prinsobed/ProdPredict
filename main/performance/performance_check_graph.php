<?php
/**
 * Created by PhpStorm.
 * User: Obed Kraine, RGU-1314863 , o.k.boachie@rgu.ac.uk
 * Project: ProdPredict V1
 * Date: 8/1/2016
 * Time: 8:02 AM
 */

session_start();
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
    <!-- Load c3.css -->
    <link href="../../assets/css/c3.css" rel="stylesheet" type="text/css">

    <!-- Load d3.js and c3.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.js"></script>
    <script src="../../assets/js/c3.min.js"></script>
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
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navigation">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand text-uppercase" href="#">ProdPredict <span
                                class="label label-success text-capitalize">V1</span></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Welcome<?php echo ", " . "{$_SESSION['firstname']}"; ?></a></li>
                            <li><a href="#">Settings</a></li>
                            <li>
                                <button type="button" class="btn navbar-btn btn-circle"><a
                                        href="../../includes/logout.php">Log Out</a></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- End of Navigation or Header Bar -->

    <!-- Start of Breadcrum or Address Bar -->
    <ol class="breadcrumb">
        <li><a href="../home.php">Home</a> / Well Production Performance / Check Performance / Graph</li>
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
                                    <a class="btn btn-default" href="../field/view_fields.php" role="button">View
                                        Existing</a>
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
                                    <a class="btn btn-default" href="../well/view_wells.php" role="button">View
                                        Existing</a>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">Production</div>
                        <div class="panel-body">
                            <div class="row2">
                                <ul>
                                    <a class="btn btn-default" href="../production/import_production.php" role="button">Import
                                        File</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default" href="../production/add_production.php" role="button">Add
                                        New</a>
                                </ul>
                                <ul>
                                    <a class="btn btn-default" href="../production/view_production.php" role="button">View
                                        Existing</a>
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
                    <div class="panel-heading">Well Production Performance Graph</div>
                    <div class="panel-body">
                        <div class="row2">
                            <!-- History -->
                            <article>
                                <div id="chart">

                                    <!-- Code Here -->


                                </div>
                            </article>


                        </div>
                    </div>
                </div>
            </div>
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


<script>
    var chart = c3.generate({
        data: {
            x: 'x',
//        xFormat: '%Y%m%d', // 'xFormat' can be used as custom format of 'x'
            columns: [
                ['x', '2013-01-01', '2013-01-02', '2013-01-03', '2013-01-04', '2013-01-05', '2013-01-06'],
//            ['x', '20130101', '20130102', '20130103', '20130104', '20130105', '20130106'],
                ['data1', 30, 200, 100, 400, 150, 250],
                ['data2', 130, 340, 200, 500, 250, 350]
            ]
        },
        axis: {
            x: {
                type: 'timeseries',
                tick: {
                    format: '%Y-%m-%d'
                }
            }
        }
    });

    setTimeout(function () {
        chart.load({
            columns: [
                ['data3', 400, 500, 450, 700, 600, 500]
            ]
        });
    }, 1000);

</script>