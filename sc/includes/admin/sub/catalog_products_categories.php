<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	//products and categories tree view

if(!defined('WORKING_THROUGH_ADMIN_SCRIPT'))
{
	die;
}

	//show new orders page if selected
	if (!strcmp($sub, "products_categories"))
	{

		if (isset($_POST["products_update"])) { //save changes in current category

			db_query("UPDATE ".PRODUCTS_TABLE." SET enabled=0, in_stock = 0 WHERE categoryID='".$_POST["categoryID"]."'") or die (db_error());

			//disable all products
			db_query("UPDATE ".PRODUCTS_TABLE." SET enabled = 0, in_stock = 0 WHERE categoryID='".$_POST["categoryID"]."'") or die (db_error());

			foreach ($_POST as $key => $val)
			{

			  if (strstr($key, "price_")) //update price
			  {
				$temp = $val;
				$temp = round($temp*100)/100;
				db_query("UPDATE ".PRODUCTS_TABLE." SET Price='$temp' WHERE productID=".str_replace("price_","",$key)) or die (db_error());
			  }

			  if (strstr($key, "enable_")) //enable products
			  {
				db_query("UPDATE ".PRODUCTS_TABLE." SET enabled = 1 WHERE productID=".str_replace("enable_","",$key)) or die (db_error());
			  }

			  if (strstr($key, "instock_")) //in stock info
			  {
				db_query("UPDATE ".PRODUCTS_TABLE." SET in_stock = 1 WHERE productID=".str_replace("instock_","",$key)) or die (db_error());
			  }

			}

			update_products_Count_Value_For_Categories(0);

			header("Location: admin.php?dpt=catalog&sub=products_categories&categoryID=".$_POST["categoryID"]);

		}
		else if (isset($_GET["terminate"])) //delete product
			{
				db_query("DELETE FROM ".PRODUCTS_TABLE." WHERE productID='".$_GET["terminate"]."'");
				update_products_Count_Value_For_Categories(0);
				header("Location: admin.php?dpt=catalog&sub=products_categories&categoryID=".$_GET["categoryID"]);
			}

		//calculate how many products are there in the root category
		$q = db_query("SELECT count(*) FROM ".PRODUCTS_TABLE." WHERE categoryID=0") or die (db_error());
		$cnt = db_fetch_row($q);
		$smarty->assign("products_in_root_category",$cnt[0]);

		//create a category tree
		$c = fillTheCList(0,0);
		$smarty->assign("categories", $c);

		//show category name as a title
		$row = array();
		if (!isset($_GET["categoryID"]) && !isset($_POST["categoryID"]))
		{
			$categoryID = 0;
			$row[0] = ADMIN_CATEGORY_ROOT;
		}
		else //go to the root if category doesn't exist
		{
			$categoryID = isset($_GET["categoryID"]) ? $_GET["categoryID"] : $_POST["categoryID"];
			$q = db_query("SELECT name FROM ".CATEGORIES_TABLE." WHERE categoryID<>0 and categoryID='$categoryID'") or die (db_error());
			$row = db_fetch_row($q);
			if (!$row)
			{
				$categoryID = 0;
				$row[0] = ADMIN_CATEGORY_ROOT;
			}
		}

		$smarty->assign("categoryID", $categoryID);
		$smarty->assign("category_name", $row[0]);

		//get all products
		$q = db_query("SELECT productID, name, customers_rating, Price, in_stock, picture, big_picture, thumbnail, items_sold, enabled, product_code FROM ".PRODUCTS_TABLE." WHERE categoryID='$categoryID'  ORDER BY name;") or die (db_error());
		$result = array();
		$i=0;
		while ($row = db_fetch_row($q)) $result[$i++] = $row;

		$smarty->assign("products_count", $i);
		//update result
		for ($i=0; $i<count($result); $i++)
		{
			if (!trim($result[$i][5]) || !file_exists("./products_pictures/".trim($result[$i][5])))
				$result[$i][5] = "";
			if (!trim($result[$i][6]) || !file_exists("./products_pictures/".trim($result[$i][6])))
				$result[$i][6] = "";
			if (!trim($result[$i][7]) || !file_exists("./products_pictures/".trim($result[$i][7])))
				$result[$i][7] = "";
		}

		//products list
		$smarty->assign("products", $result);

		//set main template
		$smarty->assign("admin_sub_dpt", "catalog_products_categories.tpl.html");

	}

?>