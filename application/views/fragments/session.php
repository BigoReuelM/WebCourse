<?php 
  $userLogedin = false;
  $userRole = "none";
  if (isset($_SESSION['userID'])) {
    $userLogedin = true;
    $userRole = $_SESSION['userType'];
    $userName = $_SESSION['firstName'] . " " . $_SESSION['middleName'] . " " . $_SESSION['lastName'];
  }
?> 