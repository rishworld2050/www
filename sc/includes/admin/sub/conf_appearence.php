<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	//appearence settings

if(!defined('WORKING_THROUGH_ADMIN_SCRIPT'))
{
	die;
}

	if (!strcmp($sub, "appearence"))
	{

		if (isset($_GET["save_successful"])) //show successful save confirmation message
		{
			$smarty->assign("configuration_saved", 1);
		}

		if (isset($_POST["save_appearence"])) //save system settings
		{
			//modify checkbox vars
			if (!isset($_POST["add2cart"])) $_POST["add2cart"] = 0;
			if (!strcmp($_POST["add2cart"], "on")) $_POST["add2cart"] = 1;
			else $_POST["add2cart"] = 0;
			if (!isset($_POST["bestchoice"])) $_POST["bestchoice"] = 0;
			if (!strcmp($_POST["bestchoice"], "on")) $_POST["bestchoice"] = 1;
			else $_POST["bestchoice"] = 0;

			//appearence settings
			$f = fopen("./cfg/appearence.inc.php","w");
			fputs($f,"<?php\n\tdefine('CONF_PRODUCTS_PER_PAGE', '".(int)$_POST["productscount"]."');\n");
			fputs($f,"\tdefine('CONF_COLUMNS_PER_PAGE', '".(int)$_POST["colscount"]."');\n");
			fputs($f,"\tdefine('CONF_SHOW_ADD2CART', '".$_POST["add2cart"]."');\n");
			fputs($f,"\tdefine('CONF_SHOW_BEST_CHOICE', '".$_POST["bestchoice"]."');\n");
			fputs($f,"\tdefine('CONF_DARK_COLOR', '".__escape_string($_POST["darkcolor"])."');\n");
			fputs($f,"\tdefine('CONF_MIDDLE_COLOR', '".__escape_string($_POST["middlecolor"])."');\n");
			fputs($f,"\tdefine('CONF_LIGHT_COLOR', '".__escape_string($_POST["lightcolor"])."');\n?>");
			fclose($f);

			header("Location: admin.php?dpt=conf&sub=appearence&save_successful=yes");
		}

		//set sub-department template
		$smarty->assign("admin_sub_dpt", "conf_appearence.tpl.html");
	}

?>