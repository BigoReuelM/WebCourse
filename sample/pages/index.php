<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sitel Inventory</title><meta charset="UTF-8" />
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
     <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body id="index">
<?php 
    session_start();

        function echoActiveClassIfRequestMatches($requestUri)
        {
            $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

            if ($current_file_name == $requestUri)
                echo 'class="active-menu"';
        }

?>
    <div id="wrapper">
        <?php include 'fragments/page-head.php'; ?>
           <!-- /. NAV TOP  -->
        <?php include 'fragments/sidebar-nav.php'; ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Dashboard</h2>   
                        <h5>Welcome 
                            <?php  
                                    
                                    echo  $_SESSION["username"];

                            ?> </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                <hr/> 
                <div class="row" >
                <div class="panel panel-back noti-box">
                        <div class="text-box" >
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                               Site Four Inventory
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="expired" name="anothercontent">
                                        <thead>
                                            
                                        <?php
                                             require_once 'fragments/connection.php';

                                             $usr = $_SESSION['username'];

                                            $query = $pdo->prepare("SELECT * from site_four"); 
                                            $query->execute();
                                            $result = $query->fetchAll();
                                            
                                            echo "<tr>";
                                            echo "<th>Serial Number</th>";
                                            echo "<th>Location</th>";
                                            echo "<th>Asset Description</th>";
                                            echo "<th>Department</th>";
                                            echo "<th>Site</th>";
                                            echo "</tr>";

                                            foreach($result as $query){
                                                echo "<tr>";
                                                echo "<td>" . $query['serial_number'] . "</td>";
                                                echo "<td>" . $query['location'] . "</td>";
                                                echo "<td>" . $query['asset_description'] . "</td>";
                                                echo "<td>" . $query['department'] . "</td>";
                                                echo "<td>" . $query['site'] . "</td>";
                                                echo "</tr>";
                                            }

                                            echo "</table>";
                                        ?>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                          </div>   
                          </div>
                          </div>   
                </div>

        </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    
   
</body>
</html>

