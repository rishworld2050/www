<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	//ADMIN :: products and categories view

	//define admin department
	$admin_dpt = array(
		"id" => "catalog", //department ID
		"sort_order" => 10, //sort order (less `sort_order`s appear first)
		"name" => ADMIN_CATALOG, //department name
		"sub_departments" => array
		(
			array("id"=>"products_categories", "name"=>ADMIN_CATEGORIES_PRODUCTS),
			array("id"=>"special", "name"=>ADMIN_SPECIAL_OFFERS)
		)
	);
	add_department($admin_dpt);


	//show new orders page if selected
	if ($dpt == "catalog")
	{
		//set default sub department if required
		if (!isset($sub)) $sub = "products_categories";

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