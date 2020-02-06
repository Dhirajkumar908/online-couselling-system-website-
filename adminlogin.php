<?php
error_reporting(E_ALL ^ E_NOTICE);
	ob_start();
include ('connect.php');
// Define $myusername and $mypassword
$username=$_POST['username'];
$password=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$sql="SELECT * FROM admin WHERE username='$username' and password='$password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_start();

$_SESSION['username'] = $username;
header("location:controlpanel.php");
}
else {
echo "Wrong Username or Password";
}

ob_end_flush();
?>