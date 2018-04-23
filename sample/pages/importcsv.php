<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sitel Inventory</title>
    <link rel="shortcut icon" type="image/x-icon" href="">
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
<body>
    <div id="wrapper">
           <?php include 'fragments/page-head.php'; ?>    
           <!-- /. NAV TOP  -->
           <?php include 'fragments/sidebar-nav.php'; ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>CSV File Import</h2>          
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                              <i class="fa fa-table" aria-hidden="true"></i> &nbsp
                             Import Inventory
                        </div>
                        <div class="panel-body">

                            <div class="table-responsive">
                               <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                           
                                            <th>Serial Number</th>
                                            <th>Location</th>
                                            <th>Asset Description</th>
                                            <th>Department</th>
                                            <th>Site</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                             
        <?php
                  function echoActiveClassIfRequestMatches($requestUri)
                  {
                      $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
                      if ($current_file_name == $requestUri)
                          echo 'class="active-menu"';
                  }                           
                  include 'fragments/mysqli-connection.php';

                  $stack  = array();
                  $stackValidData = array();


                  
                  
                  $stackDuplicate = array();
            
                  $stackInvalid;
                  $stackInvalid  = array();
                  $invalidData = 0;
                 
                  
              if(isset($_POST['import'])){
                
                //validate whether uploaded file is a csv file
                $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
                
                if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
               
                if(is_uploaded_file($_FILES['file']['tmp_name'])) {
      
                    $target_dir = "uploads/";
                      $target_file = $target_dir . basename($_FILES["file"]["name"]);
                      $uploadOk = 1;
                      
                      if ($target_file !=  "uploads/" && file_exists($target_file)) {
                       //   echo "Sorry, file name already exists. Use other file name.";
                          
                          $uploadOk = 0;
                      }
                      if ($uploadOk = 1 &&$_FILES["file"]["size"] <= 0) {
                        //  echo "\n File is empty.";
                          $uploadOk = 0;
                      }
                      
                      // if everything is ok, try to upload file
                      if($uploadOk = 1){
                        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                           //  echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
                          }
                        }
                      
                      $fsa = basename( $_FILES["file"]["name"]);
                      $Filepath = "uploads/$fsa";
                                
                    $csvFile = fopen($Filepath, "r");
                              
                    $sql  =  "SELECT * FROM site_four";

                    $query = $pdo->prepare($sql);
                    $query->execute();
                    $result = $query->fetchAll();

                    static $line, $row;
                    static $matchSerialValue = "nomatch";
                    static $breakValue = "no";

                    $Tempcounter=0;
                    while (($line = fgetcsv($csvFile)) !== false) {
                    
                        foreach ($result as $row){
                      
                      // echo "row: $row[1] $row[2] ";
                     
                
                              //  echo '<script>window.alert("Match name");</script>';
                              // breaks and scans the next row  if serial no. has match  
                            if(trim($row['serial_number'])==trim($line[9])){
                                // echo '<script>window.alert("Match serial");</script>';
                                    $matchSerialValue =   "match";
                                    $breakValue == "yes";
                                    array_push($stackDuplicate, $line);
                                    break;
                                }
                            else if(trim($row['serial_number'])!=trim($line[9]) ){
                                  $validity = insertToDatabase($line,$conn,"site_four"); 
                                if($validity==0){
                                  array_push($stack, $line);
                                }
                                else if($validity==1){
                                  array_push($stackInvalid, $line);
                                }
                              }
                              else{
                                array_push($stackDuplicate, $line);
                          }
                          
                        }// end of foreach loop($result as $row)
                           
                    if($matchSerialValue!="match"){

                       if($matchSerialValue=="nomatch" && $breakValue == "no"){
                          $validity = insertToDatabase($line,$conn,"site_four");
                            if($validity==0){
                              array_push($stack, $line);
                            }
                             else if($validity==1){
                              array_push($stackInvalid, $line);
                            }                                
                        }
                    }
                         $invalidData==0;
                         $matchSerialValue = "nomatch";
                         $breakValue = "no";
                         $Tempcounter++;
                }// end of while loop
                
          fclose($csvFile);
              
               if($stack!=null){
                echo count($stack) , " New record saved in the database <br>";
              $counter=0;
              $Todisplay ="true";
             while ($Todisplay=="true") {
                  foreach ($stack as $record){

                               if (count($stack)==$counter) {
                                 $Todisplay="false";
                                 break; 
                                }
                                echo "<tr>";
                                echo " <td>" , $record[0];   echo "</td>";
                                echo " <td>" , $record[1];   echo "</td>";
                                echo " <td>" , $record[9];   echo "</td>";
                                echo " <td>" , $record[6];   echo "</td>";
                                echo " <td>" , $record[7];   echo "</td>";
                                echo " <td>" , $record[13];  echo "</td>";
                                $counter++;
                                echo "</tr>";
                                }   
                            } 
                        }
                    else {
                        echo " No unique data to be saved in the database<br>";
                    }
        
        if($stackInvalid!=null){
              
              if(count($stackInvalid)!=0){
                $_SESSION['InvalidInfo_array'] =  $stackInvalid;
               echo "<a href=ViewInvalidInfo.php> " , count($stackInvalid)  ," Invalid Data Detected</a> <br>";  
              $counter=0;
              $TodisplayINVALID ="true";
             while ($TodisplayINVALID=="true") {
                  foreach ($stackInvalid as $record){
                               if (count($stackInvalid)==$counter) {
                                 $TodisplayINVALID="false";
                                 break;
                                }
                                $counter++;
                                }   
                            }
                        }
                    else {
                       // echo "<br> No INVALID data to be  viewed";
                    }  
                  }
        if($stackDuplicate!=null){
            
               $_SESSION['array_name'] =  $stackDuplicate;
               
              echo "<a href=ViewDuplicate.php> " , count($stackDuplicate)  ," Duplicate Data Detected</a>";    

              $counter=0; 
              $TodisplayDuplicate ="true";
             while ($TodisplayDuplicate=="true") {
                  foreach ($stackDuplicate as $record){
                               if (count($stackDuplicate)==$counter) {
                                 $TodisplayDuplicate="false";
                                 break;
                                }
                                $counter++;
                                }   
                            }
                        }
                 else {
                       //echo " No duplicate data to be  viewed  <br> ";
                    }  
              
            $qstring = '?status=succ';
        } else{
            $qstring = '?status=err';
        }
    }  else{
        $qstring = '?status=invalid_file';
    }
}
  // only unique and valid data will be inserted in the database
 function insertToDatabase($line, $conn, $insertTo){
   
        $counterChecker=0;
         while($counterChecker!=15 && $invalidData==0){
            //echo "test: $line[$counterChecker] <br>"; 

            if($line[2]<18){
               $invalidData=1;  
               return  $invalidData;
            }

            if(($line[$counterChecker][0]=='') or ($line[$counterChecker][0]==' ')){
               $invalidData=1; 
               return  $invalidData;
            }
            if(($line[$counterChecker]=='') or ($line[$counterChecker]==' ')){
               $invalidData=1;   
               return  $invalidData;
            }
            if($line[13][0]=="0" or strpos($line[13], "00") ){
               $invalidData=1;
              return  $invalidData;
            }
            if($location = (strpos($line[12], "/") or strpos($line[13], "/") ) ==true){
                $invalidData=1;
                return  $invalidData;
              }
         $counterChecker++;  
     
       } 
        if ($invalidData==0) {

          if($insertTo="site_four"){

            $sql = "INSERT INTO site_four(serial_number, location, asset_description, department, site)
            VALUES ('$line[0]','$line[1]','$line[2]','$line[3]','$line[4]')";
        
              if($conn->query($sql) === false){
                // echo "donor = $line[0] $line[1] is not inserted in the database  <br> <br>";
                return  $invalidData=1;
              }
         
                $sql  =  "SELECT serial_number FROM `site_four` where location='$line[1]' and department='$line[3]' limit 1";
                $result = $conn->query($sql);   
                
                $row = $result->fetch_assoc();
                $ID = $row[serial_number];
     
          }
              
       }
  }
 
                      ?>
                          </tbody>
                         </table>
                        </div>
                      </div>

                      <div class="panel-footer panel-primary">
                        <div class="form-actions" align="right" >
                            <a href="../pages/index.php"><button class="btn btn-primary"><i></i>View All Record</button></a>
                        </div>
                      </div>
                    
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
        </div>           
    </div>
             <!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>


