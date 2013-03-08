<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	//general settings

if(!defined('WORKING_THROUGH_ADMIN_SCRIPT'))
{
	die;
}

	if (!strcmp($sub, "login_pass"))
	{

		if (isset($_GET["save_successful"])) //show successful save confirmation message
		{
			$smarty->assign("configuration_saved", 1);
		}

		if (isset($_POST["save_login_pass"])) //save system settings
		{
			//validate input
			if ($_POST["new_login"]=="" || $_POST["old_pass"]=="" || $_POST["new_pass"]=="" || $_POST["new_passconfirm"]=="")
			{
				$smarty->assign("error",ERROR_FILL_FORM);
			}
			else
			if (strcmp(md5($_POST["old_pass"]), ADMIN_PASS)) //wrong old password
			{
				$smarty->assign("error",ERROR_WRONG_PASSWORD);
			}
			else
			if (strcmp($_POST["new_pass"], $_POST["new_passconfirm"]))
			{
				$smarty->assign("error",ERROR_PASS_CONFIRMATION);
			}
			else //all ok
			{

				$f = fopen("./cfg/connect.inc.php","w");
				$s = "<?php
	//database connection settings

	define('DB_HOST', '".DB_HOST."'); // database host
	define('DB_USER', '".DB_USER."'); // username
	define('DB_PASS', '".DB_PASS."'); // password
	define('DB_NAME', '".DB_NAME."'); // database name
	define('ADMIN_LOGIN', '".base64_encode($_POST["new_login"])."'); //administrator's login
	define('ADMIN_PASS', '".md5($_POST["new_pass"])."'); //administrator's login

	//database tables
	include(\"./cfg/tables.inc.php\");

?>";
?><?php

				fputs($f,$s);
				fclose($f);

				//update session vars
				$_SESSION["log"] = base64_encode($_POST["new_login"]);
				$_SESSION["pass"] = md5($_POST["new_pass"]);

				header("Location: admin.php?dpt=conf&sub=login_pass&save_successful=yes");
			}
		}

		$smarty->assign("curr_log", base64_decode(ADMIN_LOGIN));

		//set sub-department template
		$smarty->assign("admin_sub_dpt", "conf_login_pass.tpl.html");
	}

?>