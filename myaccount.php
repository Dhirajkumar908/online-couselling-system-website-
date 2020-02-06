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
<title>online-test</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/jquery-ui-1.10.1.custom.css" />
<link rel="stylesheet" href="css/jquery-ui-1.10.1.custom.min.css" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/jquery.jcarousel.css" type="text/css" media="all" />
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.pack.js"></script>
<script type="text/javascript" src="js/func.js"></script>
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
		  <li><?php 
            if(!isset($_SESSION['email']))
            {
                echo '<span style="color:black">Welcome Guest</span>';
            }
            else
            {
            echo $_SESSION['email'];
            }?></li>
            <li><a href="myaccount.php"><b><?php if(isset($_SESSION['email'])) echo "MyAccount"; ?></b></a></li>
            <li class="last"><a href="logout.php"><b><?php if(isset($_SESSION['email'])) echo "logout"; ?></b></a></li>
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
      <?php
		mysql_select_db($database, $conn);
		$log=$_SESSION['email'];
		if(isset($_SESSION['email']))
		{
		$sql= mysql_query("SELECT * FROM registration where email='$log'" );
		$rows= mysql_fetch_assoc($sql);
		
		echo '<b>'.'Name:'.'</b>' . $rows['firstname'].'.'.$rows['lastname'] . '<br/>' .'<b>'. 'Email:'.'</b>' . $rows['email'] . '<br/>' . '<b>'.'Gender:'.'</b>' . $rows['gender'].'<br/>';
		}
	  ?>
    <div class="cl">&nbsp;</div>
      <?php 
	  		echo '<br>'.'<b>'.'Your Scores'.'</b>'.'</br>';
	  ?>
      <table>
      <tr><td>Test Score</td><td>:</td><td>
	  <?php 
	  if(isset($_SESSION['email']))
	  {
		$query= mysql_query("SELECT * FROM mst_result where test_id='1' and login='$log'" );
		$rows1= mysql_fetch_assoc($query);
		echo $rows1['score'];
		$suggested_br = $rows1['branch'];
		
		
		if($rows1<1)
		{
			echo '<a href="computers.php">Clik here to write test</a>';
		}
	  } 
	  ?>
      </td>
      </tr>
      <tr>
      	
	  <?php
	  	$log=$_SESSION['email']; 
		
	  	if(isset($_SESSION['email']))
	  	{
			$query= mysql_query("SELECT * FROM selection where email='".$_SESSION['email']."'" );
			$rows1 = mysql_fetch_assoc($query);
			
			
			echo "<td><br/>Alloted College </td><td>:</td><td><span class='tans'>".$rows1['selected']."</span> </td>      </tr>      <tr>      <td> ";
	  	} 
		
		
		
		echo "<br/>Suggested Branch </td><td>:</td><td><span class=''>$suggested_br</span></td></tr><tr><td colspan=3> ";
	  	if(isset($_SESSION['email']))
	  	{
			$query= mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM mst_result where login='$log'" );
			$rows1 = mysql_fetch_assoc(mysql_query('SELECT FOUND_ROWS() AS rows'));
			$number=$rows1['rows'];
			if($number==1)
			{
				echo '<a href="college.php">Clik here to select College</a>';
			}
	  	} 
	  ?>
      </td>
      </tr>
      </table>
    </div><!-- end ofmain -->
  <div id="footer">
  <img src="images/shadow-b.png" />
  <div align="center">Develop by Rohit, Niti and Chandrashekhar.</div>
  </div>
</div><!-- end of border -->

</div><!-- end of shell -->
</body>
</html>