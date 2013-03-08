<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	//show all products of selected category

function get_Subs($cid) //get current category's subcategories IDs (of all levels!)
{
	$q = db_query("select categoryID from ".CATEGORIES_TABLE." where categoryID<>0 and parent='$cid'") or die (db_error());
	$r = array();
	while ($row = db_fetch_row($q))
	{
		$a = get_Subs($row[0]);
		for ($i=0;$i<count($a);$i++) $r[] = $a[$i];
		$r[] = $row[0];
	}

	return $r;
}

	if (isset($categoryID) && !isset($productID) && $categoryID)
	{

		//get selected category info
		$q = db_query("SELECT categoryID, name, description, picture FROM ".CATEGORIES_TABLE." WHERE categoryID='$categoryID'") or die (db_error());
		$row = db_fetch_row($q);
		if ($row)
		{
			if (!file_exists("./products_pictures/".$row[3])) $row[3] = "";
			$smarty->assign("selected_category", $row);
		}
		else
		{
			//category not found
			header("Location: index.php");
		}

		$smarty->assign("main_content_template", "category.tpl.html");

		//calculate a path to the category
		$path = array();
		$curr = $categoryID;
		do
		{
			$q = db_query("SELECT parent, name FROM ".CATEGORIES_TABLE." WHERE categoryID='$curr'") or die (db_error());
			$row = db_fetch_row($q);
			$tmp = $curr;
			$curr = $row[0]; //get parent ID
			$row[0] = $tmp;
			$path[] = $row;

		} while ($curr);
		//now reverse $path
		$path = array_reverse($path);
		$smarty->assign("product_category_path",$path);

		//show subcategories
		$q = db_query("SELECT categoryID, name, products_count FROM ".CATEGORIES_TABLE." WHERE parent='$categoryID'") or die (db_error());
		$result = array();
		while ($row = db_fetch_row($q))
		{
			$result[] = $row;
		}
		$smarty->assign("subcategories_to_be_shown",$result);

		//show active products
		$q = db_query("SELECT count(*) FROM ".PRODUCTS_TABLE." WHERE categoryID='$categoryID' AND enabled=1") or die (db_error());
		$g_count = db_fetch_row($q);
		$g_count = $g_count[0];

		$smarty->assign("catalog_navigator", NULL);
		$smarty->assign("products_to_show", NULL);
		$smarty->assign("products_to_show_count",NULL);

		if ($g_count) // there are products in the category
		{

			if ($offset > $g_count) $offset=0;

			$q = db_query("SELECT productID FROM ".PRODUCTS_TABLE." WHERE categoryID='$categoryID' AND enabled=1 ORDER BY name") or die (db_error());

			//fetch all products
			$result = array();
			$i=0;
			while ($row = db_fetch_row($q))
			{
				if (isset($_GET["show_all"]) || ($i>=$offset && $i<$offset+CONF_PRODUCTS_PER_PAGE))
				{
					$q1 = db_query("select categoryID, name, brief_description, customers_rating, Price, picture, in_stock, thumbnail, customer_votes, big_picture, list_price, productID from ".PRODUCTS_TABLE." where productID='$row[0]'") or die (db_error());
					$row1 = db_fetch_row($q1);
					//update several product fields
					if (!file_exists("./products_pictures/".$row1[5])) $row1[5] = 0;
					if (!file_exists("./products_pictures/".$row1[7])) $row1[7] = 0;
					if (!file_exists("./products_pictures/".$row1[9])) $row1[9] = 0;
					$row1[12] = show_price($row1[4]);
					$row1[13] = show_price($row1[10]);
					$row1[14] = show_price($row1[10]-$row1[4]); //you save (value)
					if ($row1[10]) $row1[15] = ceil(((($row1[10]-$row1[4])/$row1[10])*100)); //you save (%)
					$result[] = $row1;
				}
				$i++;
			}

			//number of products to show on this page
			if (!isset($_GET["show_all"]))
			{
				$min = CONF_PRODUCTS_PER_PAGE;
				if ($min > $g_count-$offset) $min = $g_count-$offset;
			}
			else
			{
				$min = $g_count;
				$offset = "show_all";
			}

			$smarty->assign("products_to_show", $result);
			$smarty->assign("products_to_show_count", $min);

			$navigator = ""; //navigation links
			showNavigator($g_count, $offset, CONF_PRODUCTS_PER_PAGE, "index.php?categoryID=$categoryID&",$navigator);
			$smarty->assign("catalog_navigator", $navigator);

		}
		else if (CONF_SHOW_BEST_CHOICE == 1) //there are no items in the category. search for items in it's subcategories if CONF_SHOW_BEST_CHOICE is set
		{
			//are there sub categories?
			$q = db_query("SELECT count(*) FROM ".CATEGORIES_TABLE." WHERE parent='$categoryID'") or die (db_error());
			$row = db_fetch_row($q);
			if ($row[0]) //there are
			{

				//create a query for extracting products from subcategories
				$s = "SELECT productID FROM ".PRODUCTS_TABLE." WHERE enabled=1 ";
				$a = get_Subs($categoryID);
				if (count($a) > 0)
				{
					$s.= " AND (categoryID=$a[0]";
					for ($i=1;$i<count($a);$i++)
					{
						$s.=" OR categoryID=$a[$i]";
					}
					$s.= ")";
				}

				$q = db_query(str_replace("SELECT productID","SELECT count(*)",$s)) or die (db_error());
				$cnt = db_fetch_row($q); $cnt = $cnt[0];

				if ($cnt) //there are products in the subcategories
				{
					$q = db_query($s." ORDER BY customers_rating DESC") or die (db_error());
					$i=0;
					$result = array();
					while ($i<CONF_PRODUCTS_PER_PAGE && $row = db_fetch_row($q))
					{
						$q1 = db_query("select categoryID, name, brief_description, customers_rating, Price, picture, in_stock, thumbnail, customer_votes, big_picture, list_price, productID from ".PRODUCTS_TABLE." where productID=$row[0]") or die (db_error());
						$row1 = db_fetch_row($q1);
						//update several product fields
						if (!file_exists("./products_pictures/".$row1[5])) $row1[5] = 0;
						if (!file_exists("./products_pictures/".$row1[7])) $row1[7] = 0;
						if (!file_exists("./products_pictures/".$row1[9])) $row1[9] = 0;
						$row1[12] = show_price($row1[4]);
						$row1[13] = show_price($row1[10]);
						$row1[14] = show_price($row1[10]-$row1[4]); //you save (value)
						if ($row1[10]) $row1[15] = ceil(((($row1[10]-$row1[4])/$row1[10])*100)); //you save (%)
						$result[] = $row1;
					}
					$smarty->assign("products_to_show", $result);
					$smarty->assign("products_to_show_count", min($cnt, CONF_PRODUCTS_PER_PAGE));
					$smarty->assign("products_to_show_best_choice", min($cnt, CONF_PRODUCTS_PER_PAGE));
				}

			}

		}

	}
?>