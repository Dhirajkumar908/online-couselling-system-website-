<?php
error_reporting(E_ALL ^ E_NOTICE);
include('connect.php');
if(!$conn)
{
	die('could not connect:'. mysql_error());
}
mysql_select_db("ocms2",$conn);
$selected=$_POST['selected'];
echo $selected;
$dec=mysql_query("select * from college where college='$college'");

?>