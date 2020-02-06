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
<!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
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
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="aboutus.php">About Us</a></li>
		        <li><a href="contect.php">Contect</a></li>
				
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
    <div class="slider">
    
      <div class="slider-nav">
          <a href="#" class="left notext">1</a> 
          <a href="#" class="left notext">2</a> 
          <a href="#" class="left notext">3</a> 
          <a href="#" class="left notext">4</a>
      <div class="cl">&nbsp;</div>
      </div>
      <ul>
        <li>
          <div class="item">
            <div class="text">
              <h3 ><em> achieve your</em></h3>
              <h2><em>TARGETS</em></h2>
            </div>
            <img src="images/13.jpg" width="100%"alt="" /> 
            </div>
        </li>
        <li>
          <div class="item">
            <div class="text">
              <h3 align="left"><em>achieve your</em></h3>
              <h2 align="left"><em>TARGETS</em></h2>
            </div>
            <img src="images/011.jpg" width="100%"alt="" /> 
            </div>
        </li>
        <li>
          <div class="item">
            
            <img src="images/12.jpg" alt="" /> 
            </div>
        </li>
        <li>
          <div class="item">
            <div class="text">
              <h3><em>achieve your</em></h3>
              <h2><em>TARGETS</em></h2>
            </div>
            <img src="images/15.png" alt="" /> 
            </div>
        </li>
      </ul>
      	<div id="popupbox" align="center" class="ui-corner-all"> <!-- Login Box -->
            <form name="login" action="login.php" method="post">
            <table width="500" align="center" id="signin">
            <tr><td colspan="3" align="center"><b> Login Here</b></td></tr>
            <tr><td colspan="3">&nbsp;</td></tr>
                <tr><td>Email</td><td>:</td><td><input type="text" value="" name="email" class="col"/></td></tr>
                <tr><td>Password</td><td>:</td><td><input type="password" value="" name="password" class="col"/></td></tr>
                <tr><td colspan="3">&nbsp;</td></tr>
                <tr><td align="right">For Registration <a href="registration.php">Click Here</a></td>
                    <td align="center"><input name="submit" type="submit" class="ui-buttonset" id="log" value="Login" /></td>
                </tr>
            </table>
            </form>
        </div>
    </div><!-- end of navigation -->
    
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>Welcome Note</h3>
          <img src="images/highlight.gif" alt="" class="right" />
          <p>The Online Counseling System is developed to enhance counseling. The software will be great relief to the students. The Online Counseling System is developing to enhance the counseling, which fully works as an online. This software will be great relief to the student for Reporting, Registration and searching the information about college and university.</p>
          <a href="aboutus.php" class="more">Find out more</a><br /><BR />
         </div>
  	  </div>
    </div><!-- end ofmain -->
  <div id="footer">
  <img src="images/shadow-b.png" />
  <div align="center">Develop by Chandrashekhar,Dhiraj kumar, Niti and navya ,amresh .</div>
  </div>
</div><!-- end of border -->

</div><!-- end of shell -->
</body>
</html>