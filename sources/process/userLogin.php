<?php
	session_start(); 
	if(isset($_POST['login'])){
		if (empty($_POST['username'] || empty($_POST['inputPassword']))) {			
			$error = "Username or Password is invalid";
		}else{
			$username = trim($_POST['username']);
			$password = trim($_POST['inputPassword']);

			include('../fragments/db.php');

			$query = "SELECT * FROM users WHERE username like '$username' and password like '$password'";

			$result = $con->query($query);

			if ($result->num_rows == 1) {
				$data = $result->fetch_assoc();
				$_SESSION['user_id'] = $data['user_id'];
				$_SESSION['fname'] = $data['fname'];
				$_SESSION['lname'] = $data['lname'];
				$_SESSION['mname'] = $data['mname'];
				$_SESSION['user_role'] = $data['user_role'];
				$_SESSION['instructor'] = $data['instructor'];
				$_SESSION['username'] = $data['username'];
				$_SESSION['course'] = $data['course'];
				$_SESSION['year'] = $data['year'];
				header("location: ../index.php");

			}else{
				$error = "Username or Password is invalid";
			}
		}
	}
?>