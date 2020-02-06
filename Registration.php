<?php
error_reporting(E_ALL ^ E_NOTICE);
include ('connect.php');
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>OCMS - Registration</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/jquery-ui-1.10.1.custom.css" />
<link rel="stylesheet" href="css/jquery-ui-1.10.1.custom.min.css" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/jquery.jcarousel.css" type="text/css" media="all" />
<!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
<link rel="shortcut icon" href="images/favicon1.ico" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script> 
<script type="text/javascript" src="js/jquery.jcarousel.pack.js"></script>
<script type="text/javascript" src="js/func.js"></script>
<script type="text/javascript" src="js/validation.js"></script>
<script type="text/javascript">
function welcome()
	{
	alert("registered successfully... Please login to Continue");
	}
</script>
</head>
<body>
<div class="shell">
<div class="border">
    <div id="header">
        <h1 id="logo"><a href="#" class="notext"></a></h1>
        <div class="socials right">
        <ul>
          <li><a href="#" class="rss">RSS</a></li>
          <li><a href="#" class="fb">Facebook</a></li>
          <li class="last"><a href="#" class="twit">Twitter</a></li>
        </ul>
      	</div>
      	<div class="cl">&nbsp;</div>
    </div><!-- End of Header -->
    <div id="navigation">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <div align="right"><script language="JavaScript">
                // Get today's current date.
                var now = new Date();
                // Array list of days.
                var days = new Array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
                // Array list of months.
                var months = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
                // Calculate the number of the current day in the week.
                var date = ((now.getDate()<10) ? "0" : "")+ now.getDate();
                // Calculate four digit year.
                function fourdigits(number)     {
                        return (number < 1000) ? number + 1900 : number;                                                             }
                // Join it all together
                today =  " " + months[now.getMonth()] + " " + date + ", " + (fourdigits(now.getYear())) + " (" + days[now.getDay()] + ")" ;
                // Print out the data.
                document.write(today);
                //  End -->
                </script></div>
      </ul>
      <div class="cl">&nbsp;</div>
    </div><!-- end of mainmenu -->
    <div align="center">
    <br />
    <div id="registration" class="ui-corner-all">
      <form name="registration" action="" onsubmit="return formValidation();" method="post" enctype="multipart/form-data">
      	<table align="center">
        <tr><td colspan="9" align="center"><strong>Registration Form</strong></td></tr>
      	<tr><td>First Name</td><td>:</td><td><input type="text" value="" name="firstname" class="col" /></td></tr>
        <tr><td>Last Name</td><td>:</td><td><input type="text" value="" name="lastname" class="col" /></td></tr>
        <tr><td>Gender</td><td>:</td><td><input type="radio" name="gender" value="MALE" class="col" />MALE &nbsp;&nbsp;<input type="radio" name="gender" value="FEMALE" />FEMALE</td></tr>
        <tr><td>Temp Address</td><td>:</td><td><textarea  value="" name="tempaddress" class="col" ></textarea></td></tr>
        <tr><td>Permanent Address</td><td>:</td><td><textarea  value="" name="permaddress" class="col" ></textarea></td></tr>
        <tr><td>Mobile No</td><td>:</td><td><input type="text" value="" name="mobileno" class="col" /></td></tr>
        <tr><td>Phone No</td><td>:</td><td><input type="text" value="" name="phoneno" class="col" /></td></tr>
        <tr><td>Email id</td><td>:</td><td><input type="text" value="" name="email" class="col" /></td></tr>
        <tr><td>Password</td><td>:</td><td><input type="password" id="pass1" value="" name="password" class="col" /></td></tr>
        <tr><td>Confirm Password</td><td>:</td><td><input type="password" id="pass2" value="" name="confirmpassword" class="col" onblur="checkPass();" /></td></tr>
        <tr><td colspan="9"><b>Secondary</b></td></tr>
        <tr><td>Reg. No.</td><td>:</td><td><input type="text" value="" name="regno1" class="col" onblur="validateregno1();" /></td></tr>
        <tr><td>Average Mark</td><td>:</td><td><input type="text" value="" name="avg1" class="col" /></td></tr>
        <tr><td colspan="9"><b>Higher Secondary</b></td></tr>
        <tr><td>Reg No</td><td>:</td><td><input type="text" value="" name="regno2" class="col" onblur="validateregno2();" /></td></tr>
        <tr><td colspan="9"><b>Marks</b></td></tr>
        <tr><td>Maths</td><td>:</td><td><input type="text" value="" name="maths" class="col"  /></td>
        	<td>Physics</td><td>:</td><td><input type="text" value="" name="physics" class="col" /></td>
            <td>Chemistry</td><td>:</td><td><input type="text" value="" name="chemistry" class="col" /></td></tr>
        <tr><td>Computer/Biology</td><td>:</td><td><input type="text" value="" name="com_bio" class="col" /></td>
        	<td>English</td><td>:</td><td><input type="text" value="" name="english" class="col" /></td>
            <td>Tamil</td><td>:</td><td><input type="text" value="" name="tamil" class="col" /></td></tr>
        <tr><td>Average Mark</td><td>:</td><td><input type="text" value="" name="avg2" class="col" /></td>
         <tr><td>Cutoff Mark</td><td>:</td><td><input type="text" value="" name="cutoff" class="col" /></td>
        <tr><td colspan="4">Update ur Latest Passport size Photo</td><td>:</td><td colspan="3"><input type="file" name="file" id="file"></td></tr>
        <tr><td colspan="9">&nbsp;</td></tr>
        <tr><td colspan="4" align="center"><input type="reset" value="Reset" id="reset" name="reset" /></td>
        	<td colspan="5"><input type="submit" value="Submit" id="submit" name="registration" onclick="welcome();" /></td></tr>
        </table>
      </form>
    </div><!-- end ofmain -->
    </div>
  <div id="footer">
  <img src="images/shadow-b.png" />
  <div align="center">Develop by Rohit, Niti and Chandrashekhar.</div>
  </div>
</div><!-- end of border -->

</div><!-- end of shell -->
<?php 


if(!$conn)
{
	die('could not connect:'. mysql_error());
}
mysql_select_db("ocms2",$conn);
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$gender=$_POST['gender'];
$tempaddress=$_POST['tempaddress'];
$permaddress=$_POST['permaddress'];
$mobileno=$_POST['mobileno'];
$phoneno=$_POST['phoneno'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirmpassword=$_POST['confirmpassword'];
$regno1=$_POST['regno1'];
$avg1=$_POST['avg1'];
$regno2=$_POST['regno2'];
$maths=$_POST['maths'];
$physics=$_POST['physics'];
$chemistry=$_POST['chemistry'];
$com_bio=$_POST['com_bio'];
$english=$_POST['english'];
$tamil=$_POST['tamil'];
$avg2=$_POST['avg2'];
$cutoff=$_POST['cutoff'];
$file=$_POST['file'];
if(isset($_POST['registration']))
{
	$myfile= $_FILES['file']['name'];
	$query="INSERT INTO `registration` (`firstname`,`lastname`,`gender`,`tempaddress`,`permaddress`,`mobileno`,`phoneno`,`email`,`password`,`confirmpassword`,`regno1`,`avg1`,`regno2`,`maths`,`physics`,`chemistry`,`com_bio`,`english`,`tamil`,`avg2`,`cutoff`,`file`) VALUES ('$firstname','$lastname','$gender','$tempaddress','$permaddress','$mobileno','$phoneno','$email','$password','$confirmpassword','$regno1','$avg1','$regno2','$maths','$physics','$chemistry','$com_bio','$english','$tamil','$avg2','$cutoff','$myfile');";
mysql_query($query);
copy($_FILES['file']['tmp_name'],'upload/'.$myfile);
}
mysql_close($conn);
?>
</body>
</html>
