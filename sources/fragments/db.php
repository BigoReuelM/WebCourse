<?php

$servername = "localhost";
$user = "root";
$pwd = "";
$dbname = "webtechlec";

error_reporting(0);

$con = new mysqli($servername, $user, $pwd, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>