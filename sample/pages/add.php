<!Doctype html>
<html lang="en">

<?php
        //Start your session
        session_start();
        if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
        } else {
            header("location: login.php");
        }

        function echoActiveClassIfRequestMatches($requestUri){
            $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

            if ($current_file_name == $requestUri)
                echo 'class="active-menu"';
        }

    ?>
	
<div id="wrapper">
        <?php include '../pages/fragments/page-head.php'; ?>
           <!-- /. NAV TOP  -->
        <?php include '../pages/fragments/sidebar-nav.php'; ?>
		
        <!-- /. NAV SIDE  -->
	
<head>
	<title>Register</title>
	<meta charset="UTF-8">
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
    <script src="../assets/js/script.js" defer="defer"></script>

</head>



<body>
<div id="wrapper">
       <div id="page-wrapper" >
            <div id="page-inner">
                     <h2>Add Record</h2>   
                        <h5>Welcome 
                            <?php  
                                    
                                    echo  $_SESSION["username"];

                            ?> </h5>
		<div class="table-responsive">
         <table class="table table-striped table-bordered table-hover" id="expired" name="anothercontent">
        <div class="container text-center">
        <div class="">
                <form action="fragments/add.php" method="POST">
                    
					<div class = "form-group">
                        <p class="form-control-label">Serial Number</p>
                        <input placeholder="Serial Number" type="text" id="serial_number" name="serial_number" required/>
                        <?php
                            if(isset($_POST['serial_number'])){
                                $serial_number = $_POST['serial_number'];
                                if(strlen(trim($serial_number)) == 0){
                                    echo "<p class='form-control-label' style='color:#e74c3c;'>serial_number required</p>";
                                }
                                $_SESSION['serial_number'] = $serial_number;                                
                            }
                        ?>
                    </div>
					
					<div class="form-group">
						<p class="form-control-label">Location</p>
						<select name="location" id="location" required>
                            <option value=''></option>
							<option value='AT&T-DTV-ACE'>AT&T-DTV-ACE</option>
							<option value='AT&T-DTV-BGI'>AT&T-DTV-BGI</option>
							<option value='Training Room'>Training Room</option>
							<option value='Recruitment'>Recruitment</option>
							<option value='Nurse'>Nurse</option>
							<option value='Maxicare'>Maxicare</option>
							<option value='Reception Area'>Reception Area</option>
							<option value='Meeting Room'>Meeting Room</option>
							<option value='Lounge Area'>Lounge Area</option>
							<option value='Board Room'>Board Room</option>
							<option value='Storage Room'>Storage Room</option>
						</select>
                        <?php
                            if(isset($_POST['location'])){
                                $_SESSION['location'] = $_POST['location'];
                            }
                        ?>
					</div>
					
					<div class="form-group">
						<p class="form-control-label">Department</p>
						<select name="department" id="department" required>
						<option value=''></option>
						<option value='HR'>HR</option>
						<option value='Maxicare'>Maxicare</option>
						<option value='Nurse'>Nurse</option>
						<option value='Operations'>Operations</option>
						<option value='Board Room'>Board Room</option>
						<option value='EA'>EA</option>
						<option value='Facilities'>Facilities</option>
						<option value='IT'>IT</option>
						<option value='Learning'>Learning</option>
						<option value='Meeting Room 1'>Meeting Room 1</option>
						<option value='Meeting Room 2'>Meeting Room 2</option>
						<option value='PMO'>PMO</option>
						<option value='Security'>Security</option>
						<option value='VP'>VP</option>
						</select>
                        <?php
                            if(isset($_POST['department'])){
                                $_SESSION['department'] = $_POST['department'];
                            }
                        ?>
					</div>
					
					
					
					<div class="form-group">
						<p class="form-control-label">Asset Description</p>
						<select name='asset_description' id='asset_description' required>
                           <option value=''></option>
							<option value='AVAYA 9608G Phone'>AVAYA 9608G Phone</option>
							<option value='AVAYA B189 IP Conference Phone'>AVAYA B189 IP Conference Phone</option>
							<option value='Dell E170Sc - 17 inch monitor'>Dell E170Sc - 17 inch monitor</option>
							<option value='Dell e1913sf - 19 inch Monitor'>Dell e1913sf - 19 inch Monitor</option>
							<option value='Dell E2210C - 22 inch Monitor'>Dell E2210C - 22 inch Monitor</option>
							<option value='HP Prodesk 400 G2 Base Model Small Form Factor PC'>HP Prodesk 400 G2 Base Model Small Form Factor PC</option>
							<option value='HP Prodesk 400 G3 Base Model Small Form Factor PC'>HP Prodesk 400 G3 Base Model Small Form Factor PC</option>
							<option value='HP V194 18.5-inch Monitor'>HP V194 18.5-inch Monitor</option>
						</select>
                        <?php
                            if(isset($_POST['asset_description'])){
                                $_SESSION['asset_description'] = $_POST['asset_description'];
                            }
                        ?>
					</div>
					
					<button type="Add" value="add" id="adding" class="btn btn-primary button">Add</button>
                    
                </form>
				
               
            </div>
        </div>
        </div>
		</div>
		
		
       
</body>

</html>