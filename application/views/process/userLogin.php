<?php
	session_start(); 
	if(isset($_POST['login'])){
		if (empty($_POST['username'] || empty($_POST['inputPassword']))) {			
			$error = "Username or Password is invalid";
		}else{
			$username = trim($_POST['username']);
			$password = trim($_POST['inputPassword']);

			include('../fragments/db.php');

			$query = "SELECT * FROM users WHERE idNumber like '$username' and password like '$password'";

			$result = $con->query($query);

			if ($result->num_rows == 1) {
				$data = $result->fetch_assoc();
				$_SESSION['userID'] = $data['userID'];
				$_SESSION['firstName'] = $data['firstName'];
				$_SESSION['lastName'] = $data['lastName'];
				$_SESSION['middleName'] = $data['middleName'];
				$_SESSION['userType'] = $data['userType'];
				$_SESSION['instructor'] = $data['instructor'];
				$_SESSION['course'] = $data['course'];
				$_SESSION['year'] = $data['year'];
				
				header("location: ../home.php");
				exit;

			}else{
				$error = "Username or Password is invalid";
			}
		}
	}
?>