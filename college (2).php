<?php
error_reporting(E_ALL ^ E_NOTICE);
include('connect.php');
// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['email'])) {
//header('Location: home.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>OCMS - Index</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/jquery-ui-1.10.1.custom.css" />
<link rel="stylesheet" href="css/jquery-ui-1.10.1.custom.min.css" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/jquery.jcarousel.css" type="text/css" media="all" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.pack.js"></script>
<script type="text/javascript" src="js/func.js"></script>
<script type="text/javascript">
function login(showhide){
    if(showhide == "show"){
        document.getElementById('popupbox').style.visibility="visible";
    }else if(showhide == "hide"){
        document.getElementById('popupbox').style.visibility="hidden"; 
    }
  }
function welcome()
	{
	alert("College Selection Successful... Click print button to print a selection oder");
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
          <li class="last"><a href="#" class="twit">Twitter</a></li><br /><br />
          <li>
          <?php
          if(!isset($_SESSION['email']))
		  {
			  echo "Welcome Guest";
		  }
		  else
		  {
			  echo $_SESSION['email'];
		  }
		  ?></li>
          <li><a href="javascript:login('show');" class="option"><?php if(!isset($_SESSION['email'])) echo "Login"; ?></a>
          <a href="myaccount.php"><b><?php if(isset($_SESSION['email'])) echo "MyAccount"; ?></b></a></li>
            <li class="last"><a href="registration.php" class="option">
			<?php 
				if(isset($_SESSION['email']))
				{
			 		echo '<a href="logout.php">'."logout".'</a>';
				}
				else								
				{ 
				echo "Registration";
				}
			?></a></li>
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
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>Select your College and Department</h3>
          <form method="post" name="selected" action="successful.php" enctype="multipart/form-data">
          
          <?php
		  mysql_select_db($database, $conn);
		  	$email=$_SESSION['email'];
		  	$kkk=mysql_query("select * from registration where email='$email'");
		  ?>
          	<table class="ui-corner-all border" width="500px">
            <?php while ($rows = mysql_fetch_assoc($kkk)):?>
            <tr>
            <td>Name</td><td>:</td>
            <td><input type="text" name="name" value="<?php $name=$rows['firstname'].'.'.$rows['lastname']; echo $name; ?>" /></td>
            </tr>
            <tr>
            <td>Mobile No</td><td>:</td>
            <td><input type="text" name="mobileno" value="<?php echo $rows['mobileno']; ?>" /></td>
            </tr>
            <tr>
            <td>Email</td><td>:</td>
            <td><input type="text" name="email" value="<?php echo $rows['email']; ?>" /></td>
            </tr>
            <tr>
            <td>Gender</td><td>:</td>
            <td><input type="text" name="gender" value=" <?php echo $rows['gender']; ?>" /></td>
            </tr>
            <tr>
            <td>Address</td><td>:</td>
            <td><input type="text" name="address" value="<?php echo $rows['permaddress'];?>" /></td>
            </tr>
            <tr>
            <td>10th Reg-No</td><td>:</td>
            <td><input type="text" name="reg1" value="<?php echo $rows['regno1']; ?>" /></td>
            </tr>
            <tr>
            <td>PU Reg-No</td><td>:</td>
            <td><input type="text" name="reg2" value="<?php echo $rows['regno2']; ?>" /></td>
            </tr>
            <?php endwhile ?>
            <tr>
            <td>Select your Department</td><td>:</td>
            <td>
            <?php
        	$nnn=mysql_query("select * from dept");
			?>
        	<select name="department"  id="size">
        	<?php while($rows=mysql_fetch_assoc($nnn)):?>
        	<option value="<?php $department=$rows['department']; echo $department; ?>"> <?php $department=$rows['department']; echo $department; 	?></option>
        	<?php endwhile?>
    		</select>
            </td>
            </tr>
            <tr>
            <td>Select your 1st College</td><td>:</td>
            <td>
            <?php
        	$mmm=mysql_query("select * from college");
			?>
        	<select name="college1"  id="size">
        	<?php while($rows=mysql_fetch_assoc($mmm)):?>
        	<option value="<?php $college=$rows['college']; echo $college; ?>"> <?php $college=$rows['college']; echo $college; 	?></option>
        	<?php endwhile?>
    		</select>
            </td>
            </tr>
            <tr>
            <td>Select your 2nd College</td><td>:</td>
            <td>
            <?php
        	$mmm=mysql_query("select * from college");
			?>
        	<select name="college2"  id="size">
        	<?php while($rows=mysql_fetch_assoc($mmm)):?>
        	<option value="<?php $college=$rows['college']; echo $college; ?>"> <?php $college=$rows['college']; echo $college; 	?></option>
        	<?php endwhile?>
    		</select>
            </td>
            </tr>
            <tr>
            <td>Select your 3rd College</td><td>:</td>
            <td>
            <?php
        	$mmm=mysql_query("select * from college");
			?>
        	<select name="college3"  id="size">
        	<?php while($rows=mysql_fetch_assoc($mmm)):?>
        	<option value="<?php $college=$rows['college']; echo $college; ?>"> <?php $college=$rows['college']; echo $college; 	?></option>
        	<?php endwhile?>
    		</select>
            </td>
            </tr>
            <tr>
            <td align="right"><input type="reset" name="Reset" value="Reset" /></td>
            <td><input type="submit" name="selected" value="Submit" /></td>
            <td></td>
            </tr>
            </table>
          </form>
	    </div>
  	  </div>
      <div class="cl">&nbsp;</div>
    </div><!-- end ofmain -->
  <div id="footer">
  <img src="images/shadow-b.png" />
  <div align="center">Develop by Rohit, Niti and Chandrashekhar.</div>
  </div>
</div><!-- end of border -->

</div><!-- end of shell -->

</body>
</html>