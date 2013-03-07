<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2006 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	//new orders subdepartment

if(!defined('WORKING_THROUGH_ADMIN_SCRIPT'))
{
	die;
}

	if (!strcmp($sub, "new_orders"))
	{

		if (isset($_GET["delete"]) && $_GET["delete"]) //cancel order without affecting products table
		{
				db_query("DELETE FROM ".ORDERED_CARTS_TABLE." WHERE orderID='".$_GET["delete"]."'") or die (db_error());
				db_query("DELETE FROM ".ORDERS_TABLE." WHERE orderID='".$_GET["delete"]."'") or die (db_error());
				header("Location: admin.php?dpt=custord&sub=new_orders");
		}

		//show all incomplete orders

		$q = db_query("SELECT orderID, order_time, cust_firstname, cust_lastname, cust_email, cust_country, cust_zip, cust_state, cust_city, cust_address, cust_phone FROM ".ORDERS_TABLE." order by order_time DESC") or die (db_error());
		$result = array(); $i=0;
		while ($row = db_fetch_row($q))
		{
			foreach($row as $key=>$val)
			{
				$val = str_replace("<","&lt;",$val);
				$val = str_replace("\"","&quot;",$val);
				$row[$key] = $val;
			}
			$result[$i++] = $row;
		}
		$smarty->assign("new_order_count", count($result)); //new orders qunatity

		//get all orders into array $result
		for ($i=0; $i<count($result); $i++)
		{
			$prs = "";
			$total = 0;
			$q = db_query("SELECT name, Price, Quantity FROM ".ORDERED_CARTS_TABLE." WHERE orderID=".$result[$i][0]."") or die(db_error());
			while ($it = db_fetch_row($q))
			{
				$prs .= "$it[0] x $it[2]: ".show_price($it[1]*$it[2])."<br>";
				$total += $it[1]*$it[2];
			}

			//add several parameters to the orders array
			$result[$i][11] = $prs; //order value
			$result[$i][12] = show_price($total); //order value

		}
		$smarty->assign("orders", $result);

		$smarty->assign("admin_sub_dpt", "custord_new_orders.tpl.html");

	}

?>