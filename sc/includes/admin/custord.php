<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	//ADMIN :: new orders managment

	//define a new admin department
	$admin_dpt = array(
		"id" => "custord", //department ID
		"sort_order" => 20, //sort order (less `sort_order`s appear first)
		"name" => ADMIN_CUSTOMERS_AND_ORDERS, //department name
		"sub_departments" => array
		 (
			array("id"=>"new_orders", "name"=>ADMIN_NEW_ORDERS),
		 )
	);
	add_department($admin_dpt);

	//show department if it is being selected
	if ($dpt == "custord")
	{
		//set default sub department if required
		if (!isset($sub)) $sub = "new_orders";

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