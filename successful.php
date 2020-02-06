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
</script>
</head>
<body>
<div class="shell">
<div class="border">
    <div id="main">
      <div id="content" class="left">
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
        <div align="center">        
        <div class="highlight">
        <?php
		extract($_REQUEST);
		

include("connect.php");
if(!$conn)
{
	die('could not connect:'. mysql_error());
}
/*
$name=$_POST['name'];
$mobileno=$_POST['mobileno'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$reg1=$_POST['reg1'];
$reg2=$_POST['reg2'];
$department=$_POST['department'];
$college1=$_POST['college1'];
$college2=$_POST['college2'];
$college3=$_POST['college3'];
*/

$query="INSERT INTO `selection` (`name`,`mobileno`,`email`,`gender`,`address`,`reg1`,`reg2`,`department`,`college1`,`college2`,`college3`,`selected`) VALUES ('".$name."','".$mobileno."','".$email."','".$gender."','".$address."','".$reg1."','".$reg2."','".$department."','".$college1."','".$college2."','".$college3."','NOT Assigned');";
mysql_query($query);

	/*
				  
mysql_query("UPDATE `selection` SET `name`='".$name."',`mobileno`='".$mobileno."',`email`='".$email."',`gender`='".$gender."',`address`='".$address."',`reg1`='".$reg1."',`reg2`='".$reg2."',`department`='".$department."',`college1`='".$college1."',`college2`='".$college2."',`college3`='".$college3."' WHERE  `selection`.`email`='".$email."';");
*/
		?>
          <h3>College selection Successfull</h3>
          <h4>Congrates & All the best for Your Future</h4>
          <form method="post" name="selected" action="" >
          <?php
		//  mysql_select_db($database, $conn);
		  	$email=$_SESSION['email'];
		  	$kkk=mysql_query("select * from selection where email='".$email."';");
		  ?>
          	<table class="ui-corner-all border pad" width="600px">
            <?php while ($rows = mysql_fetch_assoc($kkk))
			{?>
            <tr><td colspan="3"><br />
			<h1 align="center">Offer Leter</h1><br /></td></tr>
			<tr>
            <td>Department</td><td>:</td>
            <td><?php echo $rows['department']; ?></td>
            </tr>
            <tr>
            <td>College1</td><td>:</td>
            <td><?php echo $rows['college1']; ?></td>
            </tr>
            <tr>
            <td>College2</td><td>:</td>
            <td><?php echo $rows['college2']; ?></td>
            </tr>
            <tr>
            <td>College3</td><td>:</td>
            <td><?php echo $rows['college3']; ?></td>
            </tr>
            <tr>
            <td>Name</td><td>:</td>
            <td><?php  echo $rows['name']; ?></td>
            </tr>
            <tr>
            <td>Mobile No</td><td>:</td>
            <td><?php echo $rows['mobileno']; ?></td>
            </tr>
            <tr>
            <td>Email</td><td>:</td>
            <td><?php echo $rows['email']; ?></td>
            </tr>
            <tr>
            <td>Gender</td><td>:</td>
            <td><?php echo $rows['gender']; ?></td>
            </tr>
            <tr>
            <td>Address</td><td>:</td>
            <td><?php echo $rows['address'];?></td>
            </tr>
            <tr>
            <td>10th Reg-No</td><td>:</td>
            <td><?php echo $rows['reg1']; ?></td>
            </tr>
            <tr>
            <td>PU Reg-No</td><td>:</td>
            <td><?php echo $rows['reg2']; ?></td>
            </tr>
            <tr>
            <td colspan="3"align="center"><input type="button" name="print" value="Print" onclick="window.print()" /></td>
            </tr>
            <?php }?>
            </table>
          </form>
	    </div>
        </div>
  	  </div>
      <div class="cl">&nbsp;</div>
    </div><!-- end ofmain -->
  <div id="footer">
  <img src="images/shadow-b.png" />
  <div align="center">&copy; 2013, Councelling Management System</div>
  </div>
</div><!-- end of border -->

</div><!-- end of shell -->
</body>
</html>