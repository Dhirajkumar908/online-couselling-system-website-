<?php
error_reporting(E_ALL ^ E_NOTICE);
include('connect.php');
// Inialize session
session_start();
extract($_REQUEST);
extract($_SESSION);
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['email'])) {
//header('Location: home.php');
}
if($submit=='Finish')
{
	mysql_query("delete from mst_useranswer where sess_id='" . session_id() ."'") or die(mysql_error());
	unset($_SESSION['qn']);
	header("Location: abilitytest.php");
	exit;
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
          <h3>Revivew Answers</h3>
      	  <?php
			echo "<h1 class=head1> Review Test Question</h1>";
			//$_SESSION['qn'] = 1;
			echo $_SESSION['qn'];
			if(!isset($_SESSION['qn']))
			{
					$_SESSION['qn']=1;
			}
			else if($submit=='Next Question' )
			{
				$_SESSION['qn']=$_SESSION['qn']+1;
				
			}
						

			$rs=mysql_query("select * from mst_useranswer where sess_id='" . session_id() ."'",$conn) or die(mysql_error());
			mysql_data_seek($rs,$_SESSION['qn']);
			$row= mysql_fetch_row($rs);
			echo "<form name=myfm method=post action=review.php>";
			echo "<table border=0>";
			$n=$_SESSION['qn']+1;
			echo "<tr><td colspan='2' height='30'>Que ".  $n .": $row[2]</style>";
			echo "<tr><td width='300' height='30' class=".($row[7]==1?'tans':'style8').">$row[3]</td>";
			echo "<td width='300' class=".($row[7]==2?'tans':'style8').">$row[4]</td></tr>";
			echo "<tr><td height='30' class=".($row[7]==3?'tans':'style8').">$row[5]</td>";
			echo "<td class=".($row[7]==4?'tans':'style8').">$row[6]</td></tr>";
			if($_SESSION['qn']<mysql_num_rows($rs)-1)
			echo "<tr><td colspan='2'><input type=submit name=submit value='Next Question'></td></tr>";
			else
			echo "<tr><td colspan='2'><a href='abilitytest.php'><input type=submit name=submit value='Finish'></a></td></tr>";
			
			echo "</table></form>";
		?>
        </div>
  	  </div>
    </div><!-- end ofmain -->
  <div id="footer">
  <img src="images/shadow-b.png" />
  <div align="center">&copy; 2013, Councelling Management System</div>
  </div>
</div><!-- end of border -->

</div><!-- end of shell -->
</body>
</html>