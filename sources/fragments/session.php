<?php 
  session_start();
  $userLogedin = false;
  $userRole = "none";
  if (isset($_SESSION['user_id'])) {
    $userLogedin = true;
    $userRole = $_SESSION['user_role'];
    $userName = $_SESSION['fname'] . " " . $_SESSION['mname'] . " " . $_SESSION['lname'];
  }
?> 