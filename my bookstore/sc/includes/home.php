<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	// front-end homepage

	//get root categories to be shown in the front-end homepage
	$q = db_query("SELECT categoryID, name, products_count, picture FROM ".CATEGORIES_TABLE." WHERE categoryID<>0 and parent=0 ORDER BY name") or die (db_error());
	$root = array();
	while ($row = db_fetch_row($q))
	{
		if (!file_exists("./products_pictures/$row[3]")) $row[3] = "";
		$root[] = $row;
	}

	//get subcategories of root categories
	$query = "SELECT categoryID FROM ".CATEGORIES_TABLE." WHERE categoryID<>0 ";
	$result = array();
	for ($i=0; $i<count($root); $i++)
	{
		$q = db_query("SELECT categoryID, name, products_count, parent FROM ".CATEGORIES_TABLE." WHERE categoryID<>0 and parent=".$root[$i][0]) or die (db_error());
		while ($row = db_fetch_row($q))
			$result[] = $row;
	}
	$smarty->assign("root_categories",$root);
	$smarty->assign("root_categories_subs",$result);

	//special offers
	$result = array();
	$q = db_query("SELECT productID FROM ".SPECIAL_OFFERS_TABLE." order by sort_order") or die (db_error());
	while ($row = db_fetch_row($q))
	{
		$q1 = db_query("SELECT productID, name, picture, Price FROM ".PRODUCTS_TABLE." where productID=$row[0]") or die (db_error());
		if ($row1 = db_fetch_row($q1))
		{
			if (trim($row1[2])!="" && file_exists("./products_pictures/$row1[2]"))
			{
				$row1[3] = show_price($row1[3]);
				$result[] = $row1;
			}
		}
	}
	$smarty->assign("special_offers",$result);


?>