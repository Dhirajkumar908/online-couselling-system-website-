<?php
error_reporting(E_ALL ^ E_NOTICE);
include('connect.php');
if(!$conn)
{
	die('could not connect:'. mysql_error());
}
mysql_select_db("ocms2",$conn);
$college=$_POST['college'];
echo $college;
$cse=$_POST['cse'];
$it=$_POST['it'];
$ece=$_POST['ece'];
$mech=$_POST['mech'];
$civil=$_POST['civil'];
$bio_tech=$_POST['bio_tech'];
$eee=$_POST['eee'];
if(isset($_POST['update']))
{
$query="update `college` set cse='$cse', it='$it', ece='$ece', mech='$mech', civil='$civil', bio_tech='$bio_tech', eee='$eee' where college='$college';";
mysql_query($query);
}
mysql_close($conn);
echo "update successful.. <a href='controlpanel.php'>BACK</a>";
?>