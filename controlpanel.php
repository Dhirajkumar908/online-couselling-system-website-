<?php
error_reporting(E_ALL ^ E_NOTICE);
include('connect.php');
// Inialize session
session_start();
error_reporting(E_ALL ^ E_NOTICE);
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
//header('Location: home.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin ControlPanel</title>
<script type="text/javascript">
function student(showhide){
    if(showhide == "show"){
        document.getElementById('popupbox').style.visibility="visible";
    }else if(showhide == "hide"){
        document.getElementById('popupbox').style.visibility="hidden"; 
    }
  }
  
  function college(showhide){
    if(showhide == "show"){
        document.getElementById('popupbox1').style.visibility="visible";
    }else if(showhide == "hide"){
        document.getElementById('popupbox1').style.visibility="hidden"; 
    }
  }
  
  function updatecollege(showhide){
    if(showhide == "show"){
        document.getElementById('popupbox2').style.visibility="visible";
    }else if(showhide == "hide"){
        document.getElementById('popupbox2').style.visibility="hidden"; 
    }
  }
  
  function assign(showhide){
    if(showhide == "show"){
        document.getElementById('popupbox4').style.visibility="visible";
    }else if(showhide == "hide"){
        document.getElementById('popupbox4').style.visibility="hidden"; 
    }
  }
</script>
<link href="css/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" type="text/css" />
</head>
<style>
body
{
margin:0;
padding:0;
background:#DCADF8;
}
#header
{
	background:#6600CC;
	height:150px;
}
#width
{
width:1000px;
}
.logout
{
color:#FFFFFF;
text-align:right;
font-family:Verdana, Arial, Helvetica, sans-serif;
font-weight:bolder;
text-decoration:none;
font-size:24px;
}
#page
{
width:1000px;
height:auto;
background:#FFFFFF;
}
#menu a
{
text-decoration:none;
}
.part1
{
background:#EEEEEE;
border-bottom:#666666 solid 1px;
border-top:#666666 solid 1px;
color:#000;
text-align:center;
font-weight:bold;
height:75px;
font-size:18px;
}
#line
{
border-bottom:#666666 solid 2px;
}

#popupbox
{	
	position:absolute;
	width:1000px;
	padding:1ex;
	background:#FFFFFF;
	font-family:Arial, Helvetica, sans-serif;  
	visibility: hidden;
	}
#popupbox1
{	
	position:absolute;
	width:1000px;
	padding:1ex;
	background:#FFFFFF;
	font-family:Arial, Helvetica, sans-serif;  
	visibility: hidden;
}
#popupbox2
{	
	position:absolute;
	width:1000px;
	padding:1ex;
	background:#FFFFFF;
	font-family:Arial, Helvetica, sans-serif;  
	visibility: hidden;
}

#popupbox4
{	
	position:absolute;
	width:1000px;
	padding:1ex;
	background:#FFFFFF;
	font-family:Arial, Helvetica, sans-serif;  
	visibility: hidden;
}

.form1
{
width:800px;
height:auto;
border:#009900 solid 2px;
padding:1ex;
}
</style>
<body>
<div id="header">
<div align="center">
    <div id="width">
    <img src="images/logo.png" />
    </div>
</div>
</div>
<div align="center">
<div id="page">
	<div id="menu">
   		<table>
        <tr>
        <td><a href="javascript:student('show');"><input type="button" name="button" value="View Student Details" /></a></td>
        <td><a href="javascript:college('show');"><input type="button" name="button" value="View College Details" /></a></td>
        <td><a href="javascript:updatecollege('show');"><input type="button" name="button" value="Update College Details" /></a></td>
        <td><a href="javascript:addcollege('show');"><input type="button" name="button" value="Add New College" /></a></td>
        <td><a href="javascript:assign('show');"><input type="button" name="button" value="Assign College" /></a></td>
        <td><a href="logout1.php"><input type="button" name="button" value="<?php 
            if(isset($_SESSION['username']))
            {
              echo "Logout";
            }
        ?>" /></a></td>

        </tr>
        </table>
    </div>
    <div id="popupbox">
    <h1>STUDENT DETAILS</h1>
	<?php
		mysql_select_db($database,$conn);
		$details=mysql_query("select * from registration");
	?>
    <table class="part1">
        <tr>
        <td width="200">Name</td><td width="100">Gender</td><td width="200">Contact No</td><td width="200">Address</td><td width="100">Mark</td><td width="200">Selected College</td>
        </tr>
    </table>
    <table>
		<?php
		
		 while($row=mysql_fetch_assoc($details)): ?>	
        <tr>
        <td width="200" bgcolor="#CFC8F7"><?php $name=$row['firstname'].'.'.$row['lastname']; echo $name;?></td>
        <td width="100"><?php echo $row['gender'];?></td>
        <td width="200" bgcolor="#CFC8F7"><?php echo $row['mobileno'];?></td>
        <td width="200"><?php echo $row['permaddress'];?></td>
        <td width="100" bgcolor="#CFC8F7">
			<?php
				$email=$row['email'];
				$nnn=mysql_query("select * from mst_result where login='$email'");
				$row1=mysql_fetch_assoc($nnn);
				$score=$row1['score'];
				echo $score;
            ?>
        </td>
        <td width="200">
			<?php 
				$email=$row['email'];
				$nnn=mysql_query("select * from selection where email='$email'");
				$row1=mysql_fetch_assoc($nnn);
				$college='1)'.$row1['college1'].'<br>2)'.$row1['college2'].'<br>3)'.$row1['college3'];
				
				echo $college;
			?>
        </td>
        </tr>
        <tr>
        <td id="line" colspan="6" >&nbsp;</td>
        </tr>
        <?php endwhile ?>
    </table>
	</div>
    
    <div id="popupbox1">
    	<h1>College Details with Available Seats</h1>
	<?php
		mysql_select_db($database,$conn);
		$details=mysql_query("select * from college");
	?>
    <table class="part1">
        <tr>
        <td width="50">id</td><td width="400">College Name</td><td width="200">Location</td><td width="50">CSE</td><td width="50">IT</td><td width="50">ECE</td>
        <td width="50">MECH</td><td width="50">CIVIL</td><td width="50">BIO-Tech</td><td width="50">EEE</td>
        </tr>
    </table>
    <table>
		<?php while($row=mysql_fetch_assoc($details)): ?>	
        <tr>
        <td width="50" bgcolor="#CFC8F7"><?php echo $row['id'];?></td>
        <td width="400"><?php echo $row['college'];?></td>
        <td width="200" bgcolor="#CFC8F7"><?php echo $row['location'];?></td>
        <td width="50"><?php echo $row['cse'];?></td>
        <td width="50"><?php echo $row['it'];?></td>
        <td width="50"><?php echo $row['ece'];?></td>
        <td width="50"><?php echo $row['mech'];?></td>
        <td width="50"><?php echo $row['civil'];?></td>
        <td width="50"><?php echo $row['bio_tech'];?></td>
        <td width="50"><?php echo $row['eee'];?></td>
        </tr>
        <tr>
        <td id="line" colspan="10" >&nbsp;</td>
        </tr>
        <?php endwhile ?>
    </table>
    </div>
    
    <div id="popupbox2">
    <h1>Update College details and Available Seats</h1>
    	<form action="update.php" name="update" class="form1 ui-corner-all" method="post">
        	<table>
            	<tr>
                <td>College Name</td>
                <td>:</td>
                <td>
                	<?php
					$mmm=mysql_query("select * from college");
					?>
					<select name="college"  id="size">
					<?php while($rows=mysql_fetch_assoc($mmm)):?>
					<option value="<?php $college=$rows['college']; echo $college; ?>"> <?php $college=$rows['college']; echo $college; 	?></option>
					<?php endwhile?>
					</select>
            	</td>
                </tr>
                <tr>
                <td>Computer Science & Engineering</td><td>:</td><td><input type="text" name="cse" value="" /></td>
                </tr>
                <tr>
                <td>Information Technology</td><td>:</td><td><input type="text" name="it" value="" /></td>
                </tr>
                <tr>
                <td>Electrical Communication Engineering</td><td>:</td><td><input type="text" name="ece" value="" /></td>
                </tr>
                <tr>
                <td>Mechanical Engineering</td><td>:</td><td><input type="text" name="mech" value="" /></td>
                </tr>
                <tr>
                <td>Civil Engineering</td><td>:</td><td><input type="text" name="civil" value="" /></td>
                </tr>
                <tr>
                <td>Bio Technology</td><td>:</td><td><input type="text" name="bio_tech" value="" /></td>
                </tr>
                <tr>
                <td>Electronic & Electrical Engineering</td><td>:</td><td><input type="text" name="eee" value="" /></td>
                </tr>
                <tr><td colspan="3">&nbsp;</td>
                <tr><td align="right"><input type="reset" name="reset" value="RESET" /></td><td colspan="2"><input type="submit" name="update" value="SUBMIT" /></td></tr>
            </table>
        </form>
        
    </div>
    
    
    <div id="popupbox3">
    <h1>Add New College</h1>
    	<form action="" method="post" name="insert">
        <table>
        <tr>
        <td>College Name</td><td>:</td><td><input type="text" name="college" value="" /></td>
        </tr>
        <tr>
        <td>Location</td><td>:</td><td><input type="text" name="location" value="" /></td>
        </tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr>
        <td align="right"><input type="reset" name="reset" value="RESET" /></td><td colspan="2"><input type="submit" name="insert" value="SUBMIT" /></td>
        </tr>
        </table>
        </form>
        
        <?php
			if(!$conn)
			{
				die('could not connect:'. mysql_error());
			}
			mysql_select_db("ocms2",$conn);
			$college=$_POST['college'];
			$location=$_POST['location'];
			if(isset($_POST['insert']))
			{
			$query="insert into `college` (`college`,`location`) values ('$college','$location');";
			mysql_query($query);
			}
			mysql_close($conn);
		?>
    </div>
    
    <div id="popupbox4">
    <h1>Assign College</h1>
	<?php
		include ('connect.php');
		//mysql_select_db('ocms2',$conn);
		$assign=mysql_query("select * from selection");
	?>
    <form method="post" action="assign.php" name="assign">
    <table align="left">
    <?php 
	$srno = 0;
	while($row = mysql_fetch_array($assign))
	{ ?>
        <tr>
        <td>Name</td><td>:</td><td><input type="text" name="name[]" value="<?php  echo $row['name'];?>" /></td></tr>
        <tr>
        <tr>
        <td>Email</td><td>:</td><td><input type="text" name="email[]" value="<?php  echo $row['email'];?>" /></td></tr>
        <tr> 
        <?php
		$srno++;
		$SelectionList = "selected".$srno;
		$selected_clg = $row['selected'];
		$clg1 = $row['college1'];
		$clg2 = $row['college2'];
		$clg3 = $row['college3'];
		$chk1 = 0; 
		$chk2 = 0; 
		$chk3 = 0; 
		if($clg1 == $selected_clg )
		{
			$chk1 = 1; 
		}
		if($clg2 == $selected_clg )
		{
			$chk2 = 1; 
		}
		if($clg3 == $selected_clg )
		{
			$chk3 = 1; 
		}
		//echo $SelectionList;
//		echo $selected_clg;
//		echo "----".$chk1."-".$chk2."-".$chk3."-";
		?>
        <td>College</td><td>:</td><td>
        <?php
		if($chk1 == 1)
			echo "<input type='radio' name='".$SelectionList."' value='".$clg1."' checked='checked'/>".$clg1."<br />";
		else
			echo "<input type='radio' name='".$SelectionList."' value='".$clg1."' />".$clg1."<br />";
		
		if($chk2 == 1)
			echo "<input type='radio' name='".$SelectionList."' value='".$clg2."' checked='checked'/>".$clg2."<br />";
		else
			echo "<input type='radio' name='".$SelectionList."' value='".$clg2."' />".$clg2."<br />";
	
		if($chk3 == 1)
			echo "<input type='radio' name='".$SelectionList."' value='".$clg3."' checked='checked'/>".$clg3."<br />";
		else
			echo "<input type='radio' name='".$SelectionList."' value='".$clg3."' />".$clg3."<br />";
        						  
                                  ?>
                                  </td>
                                  
        </tr>
        <tr>
        <td>Department</td><td>:</td><td><input type="text" name="department[]" value="<?php  echo $row['department'];?>" /></td>
        </tr>
        <tr>
        <td>Dept</td><td>:</td><td><input type="hidden" name="dept[]" value="<?php  echo $row['dept'];?>" /></td>
        </tr>
        <tr>
        <td colspan="3" align="center"></td>
        </tr>
     <?php } ?>
    </table>
    <input type="submit" name="assign" value="Assign" />
    </form>
	</div>
    
</div>
</div>


</body>
</html>
