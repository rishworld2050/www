<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	// product detailed information view

	if (isset($_GET["vote"]) && isset($productID)) //vote for a product
	{
		if (!isset($_SESSION["vote_completed"][ $productID ]) && isset($_GET["mark"]) && $_GET["mark"])
		{
			$q = db_query("UPDATE ".PRODUCTS_TABLE." SET customers_rating=(customers_rating*customer_votes+'".(int)$_GET["mark"]."')/(customer_votes+1), customer_votes=customer_votes+1 WHERE productID='".$productID."'") or die (db_error());
		}
		$_SESSION["vote_completed"][ $productID ] = 1;
	}

	if (isset($productID) && $productID>0)
	{


			$smarty->assign("main_content_template", "product_detailed.tpl.html");

			$q = db_query("select categoryID, name, description, customers_rating, Price, picture, in_stock, thumbnail, customer_votes, big_picture, list_price, productID, product_code from ".PRODUCTS_TABLE." where productID='$productID' and enabled=1") or die (db_error());
			$a = db_fetch_row($q);

			if ($a) //product found
			{
				$a["product_code"] = $a[12];

				//get selected category info
				$q = db_query("SELECT categoryID, name, description, picture FROM ".CATEGORIES_TABLE." WHERE categoryID='$categoryID'") or die (db_error());
				$row = db_fetch_row($q);
				if ($row)
				{
					if (!file_exists("./products_pictures/".$row[3])) $row[3] = "";
					$smarty->assign("selected_category", $row);
				}
				else
					$smarty->assign("selected_category", NULL);

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

				//update several product fields
				if (!file_exists("./products_pictures/".$a[5])) $a[5] = 0;
				if (!file_exists("./products_pictures/".$a[7])) $a[7] = 0;
				if (!file_exists("./products_pictures/".$a[9])) $a[9] = 0;
				else if ($a[9])
				{
					$size = getimagesize("./products_pictures/".$a[9]);
					$a[16] = $size[0]+40;
					$a[17] = $size[1]+30;
				}
				$a[12] = show_price($a[4]);
				$a[13] = show_price($a[10]);
				$a[14] = show_price($a[10]-$a[4]); //you save (value)
				if ($a[10]) $a[15] = ceil(((($a[10]-$a[4])/$a[10])*100)); //you save (%)
				$smarty->assign("product_info", $a);
			}
			else
			{
				//product not found
				header("Location: index.php");
			}

	}

?>