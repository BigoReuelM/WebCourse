

<!DOCTYPE html>
<html lang="en">

<head>
      <title>Sitel Inventory</title><meta charset="UTF-8" />

      <link rel="stylesheet" href="pages/assets/css/style.css">

      <style type="text/css">
      body {
        background-repeat: no-repeat;
        background-size: cover;
        background-color: white; /* Black fallback color */
      background-color: rgba(0,0,0, 0.2); /* Black w/opacity */
      }
      </style>

</head>
<body>

    <?php
	
    $errMsg = "";
  if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if($username == '')
      $errMsg .= 'You must enter your Username <br>';

    if($password == '')
      $errMsg .= 'You must enter your Password';

    //if($errMsg == ''){
        if($username && $password){
            require "pages/fragments/connection.php";
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $queryLogin = "SELECT * FROM user_account WHERE username='$username' AND password='$password'";

            $records = $pdo->query($queryLogin);
            $records->execute();
            $counter = $records->rowCount();


            if($counter != 0){
                while($rows = $records->fetch(PDO::FETCH_ASSOC)){
                    $dbuser = $rows["username"];
                    $dbpass = $rows["password"];
                    if($username == $dbuser && $password == $dbpass ) {
                        session_start();
                        $host="localhost"; // Host name 
      $username="root"; // Mysql username 
      $password=""; // Mysql password 
      $db_name="inventory"; // Database name 
      $tbl_name="user_account"; // Table name 

      // Connect to server and select databse.
      mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
      mysql_select_db("$db_name")or die("cannot select DB");
        

                        $_SESSION["username"]=$dbuser;
                        header('location: pages/index.php');

                    }else{
                       $errMsg .= "User Credentials Not Found!";
                    }
                }
            }

    }

  }

?>
  <div align="center">
    <div style="width:300px; border: solid 1px #006D9C; " align="left">
      <?php
        if(isset($errMsg)){
          echo '<div style="color:#FFFFFF;text-align:center;font-size:12px;">'.$errMsg.'</div>';
        }
      ?>
      <div style="background-color:#006D9C; color:#FFFFFF; padding:3px;text-align:center; font-size:18px;"><b>User Login</b></div>
      <div style="margin:30px">
        <form action="" method="post">
          <label style="color:white; text-align: center;">Username  :</label><input type="text" name="username" class="box"/><br /><br />
          <label style="color:white; text-align: center;">Password  :</label><input type="password" name="password" class="box" /><br/><br />
          <input type="submit" name='submit' class="btn btn-info" value="Submit" class="col s6" class='submit'/><br />
        </form>
      </div>
    </div>
  </div>
    </body>

</html>