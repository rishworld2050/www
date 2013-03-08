<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	// shopping cart brief info

	//calculate shopping cart value
	$k=0;
	$cnt = 0;
	if (isset($_SESSION["gids"])) //...session vars
	{
		for ($i=0; $i<count($_SESSION["gids"]); $i++)
		  if ($_SESSION["gids"][$i])
		  {
			$t = db_query("SELECT Price FROM ".PRODUCTS_TABLE." WHERE productID='".$_SESSION["gids"][$i]."'") or die (db_error());
			$rr = db_fetch_row($t);
			$k += $_SESSION["counts"][$i]*$rr[0];
			$cnt += $_SESSION["counts"][$i];
		  }
	}

	$smarty->assign("shopping_cart_value", $k);
	$smarty->assign("shopping_cart_value_shown", show_price($k));
	$smarty->assign("shopping_cart_items", $cnt);

?>