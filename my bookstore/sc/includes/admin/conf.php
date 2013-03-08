<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	//ADMIN :: configuration

	//define admin department
	$admin_dpt = array(
		"id" => "conf", //department ID
		"sort_order" => 30, //sort order (less `sort_order`s appear first)
		"name" => ADMIN_SETTINGS, //department name
		"sub_departments" => array
		 (
			array("id"=>"general", "name"=>ADMIN_SETTINGS_GENERAL),
			array("id"=>"appearence", "name"=>ADMIN_SETTINGS_APPEARENCE),
			array("id"=>"login_pass", "name"=>ADMIN_LOGIN_PASSWORD),
			array("id"=>"aux", "name"=>ADMIN_AUX_INFO)
		 )
	);
	add_department($admin_dpt);


	//show department if it is being selected
	if ($dpt == "conf")
	{
		//set default sub department if required
		if (!isset($sub)) $sub = "general";

		//assign admin main department template
		$smarty->assign("admin_main_content_template", $admin_dpt["id"].".tpl.html");
		//assign subdepts
		$smarty->assign("admin_sub_departments", $admin_dpt["sub_departments"]);
		//include selected sub-department
		if (file_exists("./includes/admin/sub/".$admin_dpt["id"]."_$sub.php")) //sub-department file exists
			include("./includes/admin/sub/".$admin_dpt["id"]."_$sub.php");
		else //no sub department found
			$smarty->assign("admin_main_content_template", "notfound.tpl.html");

	}

?>