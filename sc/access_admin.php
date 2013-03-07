<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/
 
	ini_set("display_errors", "1");

	//admin mode access file

	session_start();

	include("./cfg/connect.inc.php");

	if (isset($_POST["authorize"]))
	{
		if (!strcmp(base64_encode($_POST["login"]), ADMIN_LOGIN) && !strcmp(md5($_POST["password"]), ADMIN_PASS))
		{ //login ok
			$_SESSION["log"] = ADMIN_LOGIN;
			$_SESSION["pass"] = ADMIN_PASS;
			//redirect to the admin interface
			header("Location: admin.php");
		}
		else $errorStr = "Invalid login and/or password";
	}

?>
<html>
<head>
<link rel=STYLESHEET href="style1.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Administrator login</title></head>
<body>
<center>

<?php
	if (isset($errorStr)) echo "<font color=red><b>$errorStr</b></font>";
?>

<form name="form1" method="post" action="access_admin.php">
    <table border="0" cellpadding="2" cellspacing="1" bgcolor="#333333">
      <tr bgcolor="#CCCCCC"> 
        <td colspan="2" align=center><h4>Administrator login</h4></td>
  </tr>
      <tr bgcolor="#FFFFFF"> 
        <td align="right">Login:</td>
        <td> 
          <input type="text" name="login"<?php if (isset($_POST["login"])) echo ' value="'.str_replace("\"","&quot;",stripslashes($_POST["login"])).'"';?>></td>
  </tr>
      <tr bgcolor="#FFFFFF"> 
        <td align="right">Password:</td>
        <td> 
          <input type="password" name="password"></td>
  </tr>
</table>

    <p>
      <input type="hidden" name="authorize" value="1">
      <input type="submit" value="Login">
    </p>
  </form>
  <p><a href="index.php">Go to front-end...</a></p>
</center>
</body>
</html>