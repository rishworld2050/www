<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	//aux pages

if(!defined('WORKING_THROUGH_ADMIN_SCRIPT'))
{
	die;
}

	if (!strcmp($sub, "aux"))
	{

		if (isset($_GET["save_successful"])) //show successful save confirmation message
		{
			$smarty->assign("configuration_saved", 1);
		}

		if (isset($_POST["save_aux"])) //save system settings
		{

			//appearence settings
			$f = fopen("./cfg/aux1","w");
			$str = stripslashes( str_replace("\r\n","\n",$_POST["about_page"]) );
			fputs($f,$str);
			fclose($f);
			$f = fopen("./cfg/aux2","w");
			$str = stripslashes( str_replace("\r\n","\n",$_POST["shipping_page"]) );
			fputs($f,$str);
			fclose($f);

			header("Location: admin.php?dpt=conf&sub=aux&save_successful=yes");
		}

		$f = implode("",file("./cfg/aux1"));
		$smarty->assign("about_page", $f);
		$f = implode("",file("./cfg/aux2"));
		$smarty->assign("shipping_page", $f);

		//set sub-department template
		$smarty->assign("admin_sub_dpt", "conf_aux.tpl.html");
	}

?>