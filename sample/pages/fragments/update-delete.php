<?php

session_start();
include 'addcon.php';
$serial_number = $_GET['serial_number'];
$_SESSION['username'] . "<br>";
$_GET['serial_number'] . "<br>";

$username = $_SESSION['username'];




$sql = "DELETE from site_four where serial_number!='$serial_number' limit 1";

	if ($conn->query($sql) === TRUE) {
	
		header('Location: ../delete.php');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	//connection close
	$conn->close();

?>