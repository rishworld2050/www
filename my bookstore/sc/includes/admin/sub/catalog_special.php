<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	//catalog: products extra parameters list

if(!defined('WORKING_THROUGH_ADMIN_SCRIPT'))
{
	die;
}

	if (!strcmp($sub, "special"))
	{

		if (isset($_GET["save_successful"])) //update was successful
		{
			$smarty->assign("save_successful",ADMIN_UPDATE_SUCCESSFUL);
		}

		if (isset($_POST["save_offers"])) //save extra product options
		{
			//save existing
			db_query("delete from ".SPECIAL_OFFERS_TABLE) or die (db_error());

			$offers = array();
			foreach ($_POST as $key => $val)
			{
			  if(strstr($key, "offer_productID_") != false)
			  {
				$a = str_replace("offer_productID_","",$key);
				$offers[$a]["productID"] = $val;
			  }
			  if(strstr($key, "offer_sort_") != false)
			  {
				$a = str_replace("offer_sort_","",$key);
				$offers[$a]["sort"] = $val;
			  }
			}

			foreach ($offers as $key => $value)
			{
				db_query("insert into ".SPECIAL_OFFERS_TABLE." ( productID, sort_order) values ( '".$value["productID"]."', '".$value["sort"]."')") or die (db_error());
			}
			header("Location: admin.php?dpt=catalog&sub=special&save_successful=yes");
		}

		if (isset($_GET["new_offer"])) //add new special offer
		{

			db_query("insert into ".SPECIAL_OFFERS_TABLE." (productID, sort_order) values ('".$_GET["new_offer"]."',0)") or die (db_error());
			header("Location: admin.php?dpt=catalog&sub=special");
		}

		if (isset($_GET["delete"])) //delete special offer
		{
			db_query("delete from ".SPECIAL_OFFERS_TABLE." where offerID='".$_GET["delete"]."'") or die (db_error());
			header("Location: admin.php?dpt=catalog&sub=special");
		}

		//now select all available product options
		$q = db_query("select offerID, productID, sort_order from ".SPECIAL_OFFERS_TABLE." order by sort_order") or die (db_error());
		$result = array();
		while ($row = db_fetch_row($q))
		{
			//get product name
			$q1 = db_query("select categoryID, name from ".PRODUCTS_TABLE." where productID=$row[1]") or die (db_error());
			if ($row1 = db_fetch_row($q1))
			{
				$row[3] = $row1[0];
				$row[4] = $row1[1];
				$result[] = $row;
			}
		}
		$smarty->assign("offers", $result);

		//set sub-department template
		$smarty->assign("admin_sub_dpt", "catalog_special.tpl.html");
	}

?>