<?php  
	/**
	* 
	*/
	class Session_model extends CI_model
	{
		
		public function sessionCheck()
		{
			$data['userLogedin'] = false;
			$data['userRole'] = "none";
			$data['userName'] = "";
			if (isset($_SESSION['userID'])) {
			  $data['userLogedin'] = true;
			  $data['userRole'] = $_SESSION['userType'];
			  $data['userName'] = $_SESSION['firstName'] . " " . $_SESSION['middleName'] . " " . $_SESSION['lastName'];
			  return $data;
			}else{
				return $data;
			}
		}

		public function sessionTopicCheck()
		{
			if (!isset($_SESSION['contentID'])) {
				redirect('welcome');
			}
		}

		public function properAccessCheckAdmin(){
			if (!isset($_SESSION['userID']) || $_SESSION['userType'] !== "admin") {
				redirect('welcome');
			}
		}

		public function properAccessCheckInstructor(){
			if (!isset($_SESSION['userID']) || $_SESSION['userType'] !== "instructor") {
				redirect('welcome');
			}
		}
	}
?> 