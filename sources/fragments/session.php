<?php session_start();

include('dbconfig.php');

if(isset($_SESSION['last_acted_on']) && (time() - $_SESSION['last_acted_on'] > $_SESSION['allowed_idle_time'])){
    header('Location: ../../logout.php');
    exit;
}else{
    $_SESSION['last_acted_on'] = time();
}

if(!isset($_SESSION['login_user'])){
	header("location: ../../logout.php");
	exit;
}

$user_check=$_SESSION['login_user'];
$s_level_check=$_SESSION['s_level'];
$c_level_check=$_SESSION['c_level'];
$ses_sql=mysqli_query($con, "SELECT id_number from lowwm.student where id_number='$user_check'
							union
							select id_number from lowwm.network_leader where id_number='$user_check'
							union
							select id_number from lowwm.staff where id_number='$user_check' and school_level='$s_level_check'
							union
							select id_number from lowwm.coordinator where id_number='$user_check' and school_level='$c_level_check'
							union
							select id_number from lowwm.administrator where id_number='$user_check'
							union
							select id_number from lowwm.pastor where id_number='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['id_number'];
if(!isset($login_session)){
	mysqli_close($con);
	header('Location: ../../logout.php');
	exit;
}
?>