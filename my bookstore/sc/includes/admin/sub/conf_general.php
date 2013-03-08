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

	if (!strcmp($sub, "general"))
	{

		if (isset($_GET["save_successful"])) //show successful save confirmation message
		{
			$smarty->assign("configuration_saved", 1);
		}

		if (isset($_POST["save_general"])) //save system settings
		{

			//general settings
			$f = fopen("./cfg/general.inc.php","w");
			fputs($f,"<?php\n\tdefine('CONF_SHOP_NAME', '".__escape_string($_POST["shop_name"])."');\n");
			fputs($f,"\tdefine('CONF_SHOP_URL', '".__escape_string($_POST["shop_url"])."');\n");
			fputs($f,"\tdefine('CONF_GENERAL_EMAIL', '".__escape_string($_POST["general_email"])."');\n");
			fputs($f,"\tdefine('CONF_ORDERS_EMAIL', '".__escape_string($_POST["orders_email"])."');\n");

			fputs($f,"\tdefine('CONF_CURRENCY_ID_LEFT', '".__escape_string($_POST["currency_id_left"])."');\n");
			fputs($f,"\tdefine('CONF_CURRENCY_ID_RIGHT', '".__escape_string($_POST["currency_id_right"])."');\n");
			fputs($f,"\tdefine('CONF_CURRENCY_ISO3', '".__escape_string($_POST["currency_iso3"])."');\n");

			fputs($f,"\tdefine('CONF_PAYPAL_EMAIL', '".__escape_string($_POST["paypal_email"])."');\n");
			fputs($f,"\tdefine('CONF_PAYPAL_INTEGRATION', ".((int)$_POST["paypal_enabled"]).");\n");
			fputs($f,"?>");
			fclose($f);

			header("Location: admin.php?dpt=conf&sub=general&save_successful=yes");
		}

		//set sub-department template
		$smarty->assign("admin_sub_dpt", "conf_general.tpl.html");
	}

?>