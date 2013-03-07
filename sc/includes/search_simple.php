<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	// simple search

	if (isset($_GET["inside"])) $smarty->assign("search_in_results", $_GET["inside"]);

	if (isset($_GET["searchstring"])) //make a simple search
	{
		//prepare search string
		$_GET["searchstring"] = trim($_GET["searchstring"]);
		$_GET["searchstring"] = validate_search_string($_GET["searchstring"]);

		$products_search = array();
		$cats_search = array();
		$g_search_count = 0;

		//explode string to a set separate of words
		$search = explode(" ",$_GET["searchstring"]);

		$result=array();
		$r = array();
		$i = 0;
		$k = 0;

		if ($_GET["searchstring"])
		{

			$smarty->assign("searchstring", $_GET["searchstring"]);

			//searching for categories
			$s = "SELECT categoryID, name FROM ".CATEGORIES_TABLE." WHERE categoryID<>0 and name LIKE '%".$search[0]."%' ";
			for ($i=1; $i<count($search); $i++)
			{
				$s .= "AND name LIKE '%".$search[$i]."%' ";
			}
			$s.="ORDER BY name";
			$q = db_query($s);
			while ($row = db_fetch_row($q)) $cats_search[] = $row;

			//searching for products
			$s_search = "SELECT count(*) FROM ".PRODUCTS_TABLE." WHERE Enabled=1 and categoryID<>0 and ";

			$s_search .= "((name LIKE '%".$search[0]."%' OR description LIKE '%".$search[0]."%' OR brief_description LIKE '%".$search[0]."%') ";
			for ($j=1; $j<count($search); $j++) $s_search .= "AND (name LIKE '%".$search[$j]."%' OR description LIKE '%".$search[$j]."%' OR brief_description LIKE '%".$search[$j]."%') ";
			$s_search .= ") ";


			$q = db_query($s_search) or die (db_error());
			$g_search_count = db_fetch_row($q); $g_search_count = $g_search_count[0];

			if ($offset>$g_search_count) $offset = 0;

			$q = db_query(str_replace("SELECT count(*)", "SELECT categoryID, name, brief_description, customers_rating, Price, picture, in_stock, thumbnail, customer_votes, big_picture, list_price, productID", $s_search)."ORDER BY customers_rating DESC") or die (db_error());

			$i = 0;
			$k = 0;
			$products_search = array();
			while ($row = db_fetch_row($q))
			{
				if (isset($_GET["show_all"]) || ($i >= $offset && $i < $offset+CONF_PRODUCTS_PER_PAGE))
				{
					//add several fields
					if (!file_exists("./products_pictures/".$row[5])) $row[5] = "";
					if (!file_exists("./products_pictures/".$row[7])) $row[7] = "";
					if (!file_exists("./products_pictures/".$row[9])) $row[9] = "";
					$row[12] = show_price($row[4]);
					$row[13] = show_price($row[10]);
					$row[14] = show_price($row[10]-$row[4]); //you save (value)
					if ($row[10]) $row[15] = ceil(((($row[10]-$row[4])/$row[10])*100)); //you save (%)

					$products_search[] = $row;
					$k++;
				}
				$i++;
			}

			//number of products to show on this page
			if (isset($_GET["show_all"]))
			{
				$offset = "show_all";
			}

			//navigation
			$search_navigator = "";
			showNavigator($g_search_count, $offset, CONF_PRODUCTS_PER_PAGE, "index.php?searchstring=".$_GET["searchstring"]."&",$search_navigator);
			$smarty->assign("search_navigator",$search_navigator);

			$smarty->assign("products_to_show", $products_search);
		}
		$smarty->assign("products_to_show_count", $k);
		$smarty->assign("products_found", $i);

		$smarty->assign("main_content_template", "search_simple.tpl.html");
	}




?>