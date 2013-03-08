<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	// shopping cart

	//calculate shopping cart value

	if (isset($_GET["shopping_cart"]) || isset($_POST["shopping_cart"]))
	{

		if (isset($_GET["add2cart"]) && $_GET["add2cart"]>0) //add product to cart with productID=$add
		{

			$q = db_query("select in_stock from ".PRODUCTS_TABLE." where productID='".$_GET["add2cart"]."'") or die (db_error());
			$is = db_fetch_row($q); $is = $is[0];

			//$_SESSION[gids] contains product IDs
			//$_SESSION[counts] contains product quantities ($_SESSION[counts][$i] corresponds to $_SESSION[gids][$i])
			//$_SESSION[gids][$i] == 0 means $i-element is 'empty'
			if (!isset($_SESSION["gids"]))
			{
				$_SESSION["gids"] = array();
				$_SESSION["counts"] = array();
			}
			//check for current item in the current shopping cart content
			$i=0;
			while ($i<count($_SESSION["gids"]) && $_SESSION["gids"][$i] != $_GET["add2cart"]) $i++;
			if ($i < count($_SESSION["gids"])) //increase current product's quantity
			{
				$_SESSION["counts"][$i]++;
			}
			else //no item - add it to $gids array
			{
				$_SESSION["gids"][] = $_GET["add2cart"];
				$_SESSION["counts"][] = 1;
			}

			header("Location: index.php?shopping_cart=yes");

		}


		if (isset($_GET["remove"]) && $_GET["remove"] > 0) //remove from cart product with productID == $remove
		{
			$i=0;
			while ($i<count($_SESSION["gids"]) && $_SESSION["gids"][$i] != $_GET["remove"]) $i++;
			if ($i<count($_SESSION["gids"])) $_SESSION["gids"][$i] = 0;

			header("Location: index.php?shopping_cart=yes");
		}


		if (isset($_POST["update"])) //update shopping cart content
		{

			foreach ($_POST as $key => $val)
				if (strstr($key, "count_"))
				{
				  //select product's in stock level
				  $q = db_query("select in_stock from ".PRODUCTS_TABLE." where productID='".str_replace("count_","",$key)."'") or die (db_error());
				  $is = db_fetch_row($q); $is = $is[0];

					if ($val > 0)
					{
						for ($i=0; $i<count($_SESSION["gids"]); $i++)
						{
							if ($_SESSION["gids"][$i] == str_replace("count_","",$key))
							{
								$_SESSION["counts"][$i] = floor($val);
							}
						}
					}
					else //remove
					{
						$i=0;
						while ($_SESSION["gids"][$i] != str_replace("count_","",$key) && $i<count($_SESSION["gids"])) $i++;
						$_SESSION["gids"][$i] = 0;
					}
				  }

			header("Location: index.php?shopping_cart=yes");

		}

		if (isset($_GET["clear_cart"])) //completely clear shopping cart
		{
			//clear cart
			unset($_SESSION["gids"]);
			unset($_SESSION["counts"]);

			header("Location: index.php?shopping_cart=yes");
		}



		//shopping cart items count
		$c = 0;
		if (isset($_SESSION["gids"]))
			for ($j=0; $j<count($_SESSION["gids"]); $j++)
				if ($_SESSION["gids"][$j]) $c += $_SESSION["counts"][$j];

		//not empty?
		if (isset($_SESSION["gids"]) && $c)
		{
			$k = 0; //total cart value
			$products = array();
			for ($i=0; $i<count($_SESSION["gids"]); $i++)
			  if ($_SESSION["gids"][$i])
			  {
				$q = db_query("SELECT name, Price, product_code FROM ".PRODUCTS_TABLE." WHERE productID='".$_SESSION["gids"][$i]."'") or die (db_error());
				if ($r = db_fetch_row($q))
				{
					$tmp = array("id"=>$_SESSION["gids"][$i], "name"=>$r[0], "quantity"=>$_SESSION["counts"][$i], "cost"=>show_price($_SESSION["counts"][$i]*$r[1]), "product_code"=>$r[2]);

					$products[] = $tmp;

					$k += $_SESSION["counts"][$i]*$r[1];
				}
			  }

			//total...
			$smarty->assign("cart_content", $products);
			$smarty->assign("cart_total", show_price($k));

		}
		else
		{
			$smarty->assign("cart_total", "");
		}

		$smarty->assign("main_content_template", "shopping_cart.tpl.html");


	}
?>