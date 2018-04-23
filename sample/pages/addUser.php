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
                     <h2>Add User</h2>   
                        <h5>Welcome 
                            <?php  
                                    
                                    echo  $_SESSION["username"];

                            ?> </h5>
		<div class="table-responsive">
         <table class="table table-striped table-bordered table-hover" id="expired" name="anothercontent">
        <div class="container text-center">
        <div class="">
                <form action="fragments/adduser.php" method="POST">
                    
					<div class = "form-group">
                        <p class="form-control-label">Username</p>
                        <input placeholder="Username" type="text" id="username" name="username" required/>
                        <?php
                            if(isset($_POST['username'])){
                                $username = $_POST['username'];
                                if(strlen(trim($username)) == 0){
                                    echo "<p class='form-control-label' style='color:#e74c3c;'>username required</p>";
                                }
                                $_SESSION['username'] = $username;                                
                            }
                        ?>
                    </div>
					
					<div class = "form-group">
                        <p class="form-control-label">Password</p>
                        <input placeholder="Password" type="text" id="password" name="password" required/>
                        <?php
                            if(isset($_POST['password'])){
                                $password = $_POST['password'];
                                if(strlen(trim($password)) == 0){
                                    echo "<p class='form-control-label' style='color:#e74c3c;'>password required</p>";
                                }
                                $_SESSION['password'] = $password;                                
                            }
                        ?>
                    </div>
			
					
					
					
					
					<button type="Add" value="add" id="adding" class="btn btn-primary button">Add</button>
                    
                </form>
				
				
				<div class="panel-body">
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="expired" name="anothercontent">
                                        <thead>
                                            
                                        <?php
                                             require_once 'fragments/connection.php';

                                             $usr = $_SESSION['username'];

                                            $query = $pdo->prepare("SELECT username from user_account"); 
                                            $query->execute();
                                            $result = $query->fetchAll();
                                            
                                            echo "<tr>";
                                            echo "<th>List of Users</th>";
                                            echo "</tr>";

                                            foreach($result as $query){
                                                echo "<tr>";
                                                echo "<td>" . $query['username'] . "</td>";
                                            

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
		
		
       
</body>

</html>