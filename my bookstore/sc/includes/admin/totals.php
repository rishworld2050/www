<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script PREMIUM                                                       *
 * Copyright (c) 2006 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 *****************************************************************************/
?><?php
	

	//get total number of customers, orders, etc.

	// --- ORDERS ---
	//excluding CANCELLED status

	$curr_time = time();
	$y = strftime("%Y", $curr_time);
	$m = strftime("%m", $curr_time);
	$d = strftime("%d", $curr_time);
	$TODAY = "$y-$m-$d 00:00:00";
	$YESTERDAY = strftime( "%Y-%m-%d 00:00:00", time()-24*3600 );
	$THISMONTH = "$y-$m-01 00:00:00";

	$total = array(
			"orders_today" => 0,
			"revenue_today" => 0,
			"orders_yesterday" => 0,
			"revenue_yesterday" => 0,
			"orders_thismonth" => 0,
			"revenue_thismonth" => 0,
			"orders" => 0,
			"revenue" => 0,
		);

	//get total revenue
	$q = db_query("select orderID, order_time from ".ORDERS_TABLE) or die (db_error());
	while($ordr = db_fetch_row($q))
	{

		//get this order total amount
		$ordrttl = 0;
		$q1 = db_query("SELECT Price, Quantity FROM ".ORDERED_CARTS_TABLE." WHERE orderID=".$ordr[0]."") or die(db_error());
		while ($item = db_fetch_row($q1))
		{
			$ordrttl += $item[0]*$item[1];
		}

		//surplus calculated amount to $total[]
		if ( strtotime($ordr[1]) > strtotime($TODAY) )
		{
			$total["orders_today"]++;
			$total["revenue_today"] += $ordrttl;
		}
		if ( (strtotime($ordr[1]) > strtotime($YESTERDAY)) && (strtotime($ordr[1]) < strtotime($TODAY)) )
		{
			$total["orders_yesterday"]++;
			$total["revenue_yesterday"] += $ordrttl;
		}
		if ( strtotime($ordr[1]) > strtotime($THISMONTH) )
		{
			$total["orders_thismonth"]++;
			$total["revenue_thismonth"] += $ordrttl;
		}

		$total["orders"]++;
		$total["revenue"] += $ordrttl;

	}
	$total["revenue_today"] = show_price( $total["revenue_today"] );
	$total["revenue_yesterday"] = show_price( $total["revenue_yesterday"] );
	$total["revenue_thismonth"] = show_price( $total["revenue_thismonth"] );
	$total["revenue"] = show_price( $total["revenue"] );

/*
	//orders today
	$curr_time = time();
	$y = strftime("%Y", $curr_time);
	$m = strftime("%m", $curr_time);
	$d = strftime("%d", $curr_time);

	$TODAY = "$y-$m-$d 00:00:00";
	$q = db_query("select orderID from ".ORDERS_TABLE." where order_time > '".$TODAY."'") or die (db_error());
	$n = 0;
	$a = 0;
	while($r = db_fetch_row($q))
	{
		$a += $r[0] * $r[1];
		$n++;
	}
	$total["orders_today"] = $n;
	$total["revenue_today"] = show_price($a);

	$YESTERDAY = strftime( "%Y-%m-%d 00:00:00", time()-24*3600 );
	$q = db_query("select orderID from ".ORDERS_TABLE." where order_time > '".$YESTERDAY."' and order_time < '".$TODAY."'") or die (db_error());
	$n = 0;
	$a = 0;
	while($r = db_fetch_row($q))
	{
		$a += $r[0] * $r[1];
		$n++;
	}
	$total["orders_yesterday"] = $n;
	$total["revenue_yesterday"] = show_price($a);

	$THISMONTH = "$y-$m-01 00:00:00";
	$q = db_query("select orderID from ".ORDERS_TABLE." where order_time > '".$THISMONTH."'") or die (db_error());
	$n = 0;
	$a = 0;
	while($r = db_fetch_row($q))
	{
		$a += $r[0] * $r[1];
		$n++;
	}
	$total["orders_thismonth"] = $n;
	$total["revenue_thismonth"] = show_price($a);

*/
	// --- PRODUCTS ---
	$q = db_query("select count(*) from ".PRODUCTS_TABLE) or die (db_error());
	$r = db_fetch_row($q);
	$total["products"] = $r[0];
	$q = db_query("select count(*) from ".PRODUCTS_TABLE." where Enabled=1") or die (db_error());
	$r = db_fetch_row($q);
	$total["products_enabled"] = $r[0];

	// --- CATEGORIES ---
	$q = db_query("select count(*) from ".CATEGORIES_TABLE) or die (db_error());
	$r = db_fetch_row($q);
	$total["categories"] = $r[0];

	$smarty->assign("totals", $total);

?>