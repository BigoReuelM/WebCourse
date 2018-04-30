<?php
	session_start(); 
	if(isset($_POST['login'])){
		if (empty($_POST['username'] || empty($_POST['inputPassword']))) {			
			$error = "Username or Password is invalid";
		}else{
			$username = trim($_POST['username']);
			$password = trim($_POST['inputPassword']);
		}
	}
?>