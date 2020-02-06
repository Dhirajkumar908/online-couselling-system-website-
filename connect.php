<?php
// error_reporting(0);
error_reporting(E_ALL ^ E_NOTICE);
$hostname = "localhost";
$database = "counseling";
$username = "root";
$password = "";
$conn = mysql_connect($hostname,$username,$password) or die('Server Information is not Correct'); 
mysql_select_db($database,$conn) or die('Database Information is not correct');

?>