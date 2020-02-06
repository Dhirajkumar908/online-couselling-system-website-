<?php
error_reporting(E_ALL ^ E_NOTICE);
include('connect.php');
session_start();

$_SESSION['test_started'] = date("Y-m-d H:i:s");
$_SESSION['test_end'] = date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")) + 60*2);
extract($_SESSION);
extract($_REQUEST);
// Inialize session

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
<script type="text/javascript" src="js/timer.js"></script>
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
			 		echo '<a href="logout.php">logout</a>';
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
        <li><a href="index.php" >Home</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="abilitytest.php">Ablity Test</a></li>
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
    <!-- end of navigation -->
    
    <div id="main">
      <div id="content" class="left">
        <div class="highlight">
          <h3>Fundamental Computer & Basic C</h3>
          <?php 
		  /*
		  echo session_id();
		  echo "<br/>".$submit;
		  echo "<br/>".$_SESSION['qn'];
		  echo "<br/>".$_SESSION['trueans'];
		  */
		  ?>
          <img src="images/highlight.gif" alt="" class="right" />
          <div id="testing">
          <!--<table align="right" width="200">
			<td>Remaining time: <input id="minutes" type="text" style="width: 22px;">min :<input id="seconds" type="text" style="width: 22px"> sec</td></tr>
		  </table>-->
          <?php
			$rs=mysql_query("select * from mst_question",$conn) or die(mysql_error());
			if(!isset($_SESSION['qn']))
			{
				$_SESSION['qn']=1;
				mysql_query("delete from mst_useranswer where sess_id='".session_id()."'") or die(mysql_error());
				$_SESSION['trueans']=0;
				/*
				2-ce
				3-mech
				4-eee
				5-it
				7-civil
				10-bt
				12-ece
				*/
				$_SESSION['ce']=0;
				$_SESSION['mech']=0;
				$_SESSION['eee']=0;
				$_SESSION['it']=0;
				$_SESSION['civil']=0;
				$_SESSION['bt']=0;
				$_SESSION['ece']=0;
			}
			else
			{	
					if($submit=='Next Question' && isset($ans))
					{
							mysql_data_seek($rs,$_SESSION['qn']);
							$row= mysql_fetch_row($rs);	
							mysql_query("insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', 1,'".$row[2]."','".$row[3]."','".$row[4]."','".$row[5]."', '".$row[6]."','".$row[7]."','".$ans."')") or die(mysql_error());
							
						
							
						if($ans==$row[7])
							{
										$_SESSION['trueans']=$_SESSION['trueans']+1;
										
										if($row['1'] == 2)
											$_SESSION['ce'] = $_SESSION['ce'] + 1;
										if($row['1'] == 3)
											$_SESSION['mech']= $_SESSION['mech'] + 1;
										if($row['1'] == 4)
											$_SESSION['eee']= $_SESSION['eee'] + 1;
										if($row['1'] == 5)
											$_SESSION['it']= $_SESSION['it'] + 1;
										if($row['1'] == 7)
											$_SESSION['civil']= $_SESSION['civil'] + 1;
										if($row['1'] == 10)
											$_SESSION['civil']= $_SESSION['civil'] + 1;
										if($row['1'] == 12)
											$_SESSION['ece']= $_SESSION['ece'] + 1;
							}
							$_SESSION['qn']=$_SESSION['qn']+1;
					}
					
					else if($submit=='Get Result' && isset($ans))
					{
							mysql_data_seek($rs,$_SESSION['qn']);
							$row= mysql_fetch_row($rs);	
							mysql_query("insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', 1,'".$row[2]."','".$row[3]."','".$row[4]."','".$row[5]."', '".$row[6]."','".$row[7]."','".$ans."')") or die(mysql_error());
							if($ans==$row[7])
							{
										$_SESSION['trueans']=$_SESSION['trueans']+1;
							}
							echo "<h1 class=head1> Result</h1>";
							$_SESSION['qn']=$_SESSION['qn']+1;
							echo "<Table align=center><tr class=tot><td>Total Question<td>".$_SESSION['qn']."";
							echo "<tr class=tans><td>True Answer<td>".$_SESSION['trueans'];
							$w=$_SESSION['qn']-$_SESSION['trueans'];
							echo "<tr class=fans><td>Wrong Answer<td> ". $w;
							echo "</table>";
							
							/* MY CODE FOR BRANCH SUGGESTION */
							
							$branch_scores = array($_SESSION['ce'] , $_SESSION['mech'] , $_SESSION['eee'] , $_SESSION['it'] , $_SESSION['civil'] , $_SESSION['bt'] ,	$_SESSION['ece']);
							$maxi = max($branch_scores);
							
							//echo "<br/>MAX=".max($branch_scores);
							
							$p = 0;
							for( ; $p < count($branch_scores) ;$p++)
							{
								if($maxi == $branch_scores[$p])
									break;
								
								if($p > 6)
									break;	
							}
							
							$suggested_branch;
							if($p == 0)
								$suggested_branch = "BE - COMPUTER SCIENCE & ENGINEERING";
							else if($p == 1)
								$suggested_branch = "BE - MECHANICAL ENGINEERING";
							else if($p == 2)
								$suggested_branch = "BE - ELECTRICAL & ELECTRONICS ENGINEERING";
							else if($p == 3)
								$suggested_branch = "BE - INFORMATION TECHNOLOGY";
							else if($p == 4)
								$suggested_branch = "BE - CIVIL ENGINEERING";
							else if($p == 5)
								$suggested_branch = "BE - BIO-TECHNOLOGY";
							else if($p == 6)
								$suggested_branch = "BE - ELECTRONICS & COMMUNICATION ENGINEERING";
							echo "<br/>Suggested Branch : <span class='tans'>".$suggested_branch."</span>";
								
							/* END -MY CODE FOR BRANCH SUGGESTION  */
							
							mysql_query("insert into mst_result(login,test_id,test_date,score,branch) values('".$_SESSION['email']."',1,'".date("d/m/Y")."','".$_SESSION['trueans']."','".$suggested_branch."')") or die(mysql_error());
							echo "<h1 align=center><a href=review.php> Review Question</a> </h1>";
							unset($_SESSION['qn']);
							//unset($_SESSION['sid']);
							//unset($_SESSION['tid']);
							unset($_SESSION['trueans']);
							exit;
					}
			}
			$rs=mysql_query("select * from mst_question",$conn) or die(mysql_error());
			if($_SESSION['qn']>mysql_num_rows($rs)-1)
			{
			unset($_SESSION['qn']);
			echo "<h1 class=head1>Some Error  Occured</h1>";
			//session_destroy();
			echo "Please <a href=index.php> Start Again</a>";
			
			exit;
			}
			mysql_data_seek($rs,$_SESSION['qn']);
			$row= mysql_fetch_row($rs);
			echo "<form name='myfm' method='post' action=computers.php>";
			echo "<table border=0>";
			$n=$_SESSION['qn']+1;
			echo "<tr><td colspan='2' height='30'>Question"."&nbsp;".  $n .": $row[2]</td></tr>";
			echo "<tr><td width='300' height='30'><input type='radio' name='ans' value='1'>$row[3]</td>";
			echo "<td width='300'> <input type='radio' name='ans' value='2'>$row[4]</td></tr>";
			echo "<tr><td height='30'><input type='radio' name='ans' value='3'>$row[5]</td>";
			echo "<td class='style8'><input type='radio' name='ans' value='4'>$row[6]</td>";
			
			if($_SESSION['qn']<mysql_num_rows($rs)-1)
			echo "<tr><td colspan='2'><input type=submit name=submit value='Next Question'></form></td></tr>";
			else
			{
					echo "<tr><td><input type=submit name=submit value='Get Result'></td></tr></form>";
					
			}
			echo "</table>";
			
			echo "<br/>CE=".$_SESSION['ce'];
			echo "<br/>MECH=".$_SESSION['mech'];
			echo "<br/>EEE=".$_SESSION['eee'];
			echo "<br/>IT=".$_SESSION['it'];
			echo "<br/>CIVIL=".$_SESSION['civil'];
			echo "<br/>BT=".$_SESSION['bt'];
			echo "<br/>ECE=".$_SESSION['ece'];
			
			/* Suggestion CODE after evry ques answered */
			 /*
							$branch_scores = array($_SESSION['ce'] , $_SESSION['mech'] , $_SESSION['eee'] , $_SESSION['it'] , $_SESSION['civil'] , $_SESSION['bt'] ,	$_SESSION['ece']);
							$maxi = max($branch_scores);
							
							echo "<br/>MAX=".max($branch_scores);
							
							$p = 0;
							for( ; $p < count($branch_scores) ;$p++)
							{
								if($maxi == $branch_scores[$p])
									break;
								
								if($p > 6)
									break;	
							}
							
							$suggested_branch;
							if($p == 0)
								$suggested_branch = "BE - COMPUTER SCIENCE & ENGINEERING";
							else if($p == 1)
								$suggested_branch = "BE - MECHANICAL ENGINEERING";
							else if($p == 2)
								$suggested_branch = "BE - ELECTRICAL & ELECTRONICS ENGINEERING";
							else if($p == 3)
								$suggested_branch = "BE - INFORMATION TECHNOLOGY";
							else if($p == 4)
								$suggested_branch = "BE - CIVIL ENGINEERING";
							else if($p == 5)
								$suggested_branch = "BE - BIO-TECHNOLOGY";
							else if($p == 6)
								$suggested_branch = "BE - ELECTRONICS & COMMUNICATION ENGINEERING";
							echo "<br/>".$suggested_branch;
								
							*/
		?>
        </div>
         </div>
  	  </div>
    </div><!-- end ofmain -->
  <div id="footer">
  <img src="images/shadow-b.png" />
  <div align="center">Develop by Rohit, Niti and Chandrashekhar.</div>
  </div>
</div><!-- end of border -->

</div><!-- end of shell -->
</body>
</html>