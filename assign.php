<form method="post" name="dec" action="">
<?php
error_reporting(E_ALL ^ E_NOTICE);
include('connect.php');
if(!$conn)
{
	die('could not connect:'. mysql_error());
}
//mysql_select_db("ocms2",$conn);
//var_dump($_REQUEST);
extract($_REQUEST);
/*
$name=$_POST['name'];
$email=$_POST['email'];
$selected=$_POST['selected'];
$department=$_POST['department'];
*/
if(isset($_POST['assign']))
{
	$total_stud = count($name);
//echo $total_stud;




for($z=1;$z<=$total_stud;$z++)
{
$selected_clg = ${'selected' . $z};
$ans=mysql_query("select * from college where college='$selected_clg'");
while($row=mysql_fetch_assoc($ans))
{
	$number = $z - 1;
	
		
	$cse=$row['cse'];
	$it=$row['it'];
	$mech=$row['mech'];
	$civil=$row['civil'];
	$ece=$row['ece'];
	$eee=$row['eee'];
	$bio_tech=$row['bio_tech'];
	
	if($department='BE - COMPUTER SCIENCE & ENGINEERING' && $cse!='0')
	{
		$query="update `selection` set selected ='$selected_clg' where email='$email[$number]';";
		mysql_query($query);

		$cse=--$cse;
		$query1="update `college` set cse ='$cse' where college='$selected_clg';";
		mysql_query($query1);
		echo "update successful.. <a href='controlpanel.php'>BACK</a><br>";
	}
	else if($department='BE - MECHANICAL ENGINEERING' && $mech!='0')
	{
		$query="update `selection` set selected ='$selected_clg' where email='$email[$number]';";
		mysql_query($query);

		$mech=--$cmech;
		$query1="update `college` set mech ='$mech' where college='$selected_clg';";
		mysql_query($query1);
		echo "update successful.. <a href='controlpanel.php'>BACK</a><br>";
	}
	else if($department='BE - ELECTRICAL & ELECTRONICS ENGINEERING' && $eee!='0')
	{
		$query="update `selection` set selected ='$selected_clg' where email='$email[$number]';";
		mysql_query($query);

		$eee=--$eee;
		$query1="update `college` set eee ='$eee' where college='$selected_clg';";
		mysql_query($query1);
		echo "update successful.. <a href='controlpanel.php'>BACK</a><br>";
	}
	else if($department='BE - INFORMATION TECHNOLOGY' && $it!='0')
	{
		$query="update `selection` set selected ='$selected_clg' where email='$email[$number]';";
		mysql_query($query);

		$it=--$it;
		$query1="update `college` set it ='$it' where college='$selected_clg';";
		mysql_query($query1);
		echo "update successful.. <a href='controlpanel.php'>BACK</a><br>";
	}
	else if($department='BE - CIVIL ENGINEERING' && $civil!='0')
	{
		$query="update `selection` set selected ='$selected_clg' where email='$email[$number]';";
		mysql_query($query);
		$civil=--$civil;
		$query1="update `college` set civil ='$civil' where college='$selected_clg';";
		mysql_query($query1);
		echo "update successful.. <a href='controlpanel.php'>BACK</a><br>";
	}
	else if($department='BE - BIO-TECHNOLOGY' && $bio_tech!='0')
	{
		$query="update `selection` set selected ='$selected_clg' where email='$email[$number]';";
		mysql_query($query);

		$bio_tech=--$bio_tech;
		$query1="update `college` set bio_tech ='$bio_tech' where college='$selected_clg';";
		mysql_query($query1);
		echo "update successful.. <a href='controlpanel.php'>BACK</a><br>";
	}
	else if($department='BE - ELECTRONICS & COMMUNICATION ENGINEERING' && $ece!='0')
	{
		$query="update `selection` set selected ='$selected_clg' where email='$email[$number]';";
		mysql_query($query);

		$ece=--$ece;
		$query1="update `college` set ece ='$ece' where college='$selected_clg';";
		mysql_query($query1);
		echo "update successful.. <a href='controlpanel.php'>BACK</a><br>";
	}
	else 
	{
	echo "Sorry ! . . . Seat Unavailable<a href='controlpanel.php'>BACK</a><br>";
	}
}
}
mysql_close($conn);

}
?>
</form>