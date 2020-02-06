<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OCMS</title>
<link href="css/jquery-ui-1.10.1.custom.min.css" type="text/css" rel="stylesheet" />
<style>
.login
{
background:#6600CC;
width:600px;
height:400px;
border:solid #99FF00m 5px;
margin-top:10em;
}
.logintable
{
color:#FFFFFF;
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:18px;
font-weight:bold;
padding-top:8em;
}
</style>
</head>
<body background="images/Line-Background-Backgrounds--1024x1280.jpg">
<div align="center">
<form action="adminlogin.php" method="post" class="login ui-corner-all">
  <table class="logintable">
    <tr>
      <td>User Name</td>
      <td>:</td>
      <td><input type="text" name="username" value="" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td>:</td>
      <td><input type="password" name="password" value="" /></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><input type="submit" name="submit" value="Login" /></td>
    </tr>
  </table>
</form>
</div>
</body>
</html>
