<?php

session_start();
include 'addcon.php';

echo $_SESSION['username'] . "<br>";
echo $_POST['serial_number'] . "<br>";
echo $_POST['location'] . "<br>";
echo $_POST['asset_description'] . "<br>";
echo $_POST['department'] . "<br>";

$username = $_SESSION['username'];

$serial_number = $_POST['serial_number'];
$location = $_POST['location'];
$asset_description = $_POST['asset_description'];
$department = $_POST['department'];


$sql = "UPDATE site_four SET (serial_number,location,asset_description,department)
    VALUES('$serial_number','$location','$asset_description','$department')";

	if ($conn->query($sql) === TRUE) {
	
		header('Location: ../edit.php');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	//connection close
	$conn->close();

?>