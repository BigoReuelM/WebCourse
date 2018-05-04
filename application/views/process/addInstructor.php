<?php  
	session_start();
	if (isset($_POST['addInstructorConfirm'])) {
		if (empty($_POST['instructorIdNumber']) || empty($_POST['instructorFname']) || empty($_POST['instructorMname']) || empty($_POST['instructorLname'])) {
			echo "All fields must be Field out";
		}else{
			$instructorIdNumber = trim(htmlspecialchars($_POST['instructorIdNumber']));
			$instructorFname = trim(htmlspecialchars($_POST['instructorFname']));
			$instructorMname = trim(htmlspecialchars($_POST['instructorMname']));
			$instructorLname = trim(htmlspecialchars($_POST['instructorLname']));

			include('../fragments/db.php');

			$query = "INSERT INTO users (idNumber, firstName, middleName, lastName, userType, password) VALUES ('$instructorIdNumber', '$instructorFname', '$instructorMname', '$instructorLname', 'instructor', 'password')";

			

			if ($con->query($query) === TRUE) {
				header("location: ../adminInstructors.php");
			} else {
				echo "Error: " . $query . "<br>" . $conn->error;
			}
			
		}
	}
?>