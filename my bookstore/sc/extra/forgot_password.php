<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	//new password generation routine

	//DO NOT KEEP THIS FILE ON YOUR SERVER IN THE SHOP-SCRIPT FREE ROOT FOLDER !!

	session_start();

	if (!file_exists("./cfg/connect.inc.php"))
	{
		die ("Couldn't proceed!<br>Place this file into Shop-Script FREE root folder");
	}

	include("./cfg/connect.inc.php");

	if (isset($_POST["generate"]))
	{
		if (!is_writable("./cfg/connect.inc.php"))
		{
			$error = "Couldn't rewrite file cfg/connect.inc.php.";
		}
		else
		{
			$f = fopen("./cfg/connect.inc.php","w");
			$s = "<?php
	//database connection settings

	define('DB_HOST', '".DB_HOST."'); // database host
	define('DB_USER', '".DB_USER."'); // username
	define('DB_PASS', '".DB_PASS."'); // password
	define('DB_NAME', '".DB_NAME."'); // database name
	define('ADMIN_LOGIN', '".base64_encode($_POST["admin_login"])."'); //administrator's login
	define('ADMIN_PASS', '".md5($_POST["admin_pass"])."'); //administrator's login

	//database tables
	include(\"./cfg/tables.inc.php\");

?>";
?><?php

			fputs($f,$s);
			fclose($f);

		}

	}

	if (!is_writable("./cfg/connect.inc.php"))
	{
		$error = "File cfg/connect.inc.php is not writable";
	}

?>
<html>

<head>

<link rel=STYLESHEET href="style1.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>New administrator password generation</title>

<script>

	function validate()
	{
		if (document.form1.admin_login.value.length<1)
		{
			alert("Please input administrator`s login");
			return false;
		}
		if (document.form1.admin_pass.value.length<1)
		{
			alert("Please input administrator`s password");
			return false;
		}

		return true;
	}


</script>

</head>

<body>
<center>

<?php
	if (isset($_POST["generate"]) && !isset($error))
	{
		echo "<h1>Login information updated!</h1>";
		echo "<p><a href=\"admin.php\">Administrator login page ...</a>";
		exit;
	}
?>

<h1>Administrator login information</h1>

<?php
	if (isset($error)) echo "<p><font color=red><b>$error</b></font>";
?>

<form name=form1 action="forgot_password.php" method=post onSubmit="return validate(this);">
<p>

<p>
<u><b>Please input new login and password</b></u><br>
<table cellpadding=5>
	<tr>
	 <td align=right>Login:</td>
	 <td><input type=text name=admin_login value="<?php echo isset($admin_login) ? $admin_login:"admin";?>"></td>
	</tr>
	<tr>
	 <td align=right>Password:</td>
	 <td><input type=text name=admin_pass value="<?php echo isset($admin_pass) ? $admin_pass:"1234";?>"></td>
	</tr>
</table>

<p>

<?php
	if (is_writable("./cfg/connect.inc.php"))
	{
		echo "<input type=submit name=generate value=\"Done\">";
	}
?>

</form>

</center>
</body>

</html>