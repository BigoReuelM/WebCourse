<?php

session_start();
include 'addcon.php';

echo $_SESSION['username'] . "<br>";
echo $_POST['username'] . "<br>";
echo $_POST['password'] . "<br>";

$username = $_SESSION['username'];

$username = $_POST['username'];
$password= $_POST['password'];


$sql = "INSERT INTO user_account(username,password)
    VALUES('$username','$password')";

	if ($conn->query($sql) === TRUE) {
	
		header('Location: ../addUser.php');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	//connection close
	$conn->close();

?>