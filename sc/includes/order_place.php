<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/


	//place order: save to the database, send notifications, gateway processing

	if (isset($_GET["order_placement_result"])) //show 'order successful' page
	{		
		$smarty->assign("order_id", $_SESSION["order_id"]);
		$smarty->assign("order_amount", $_SESSION["order_amount"]);

		$smarty->assign("main_content_template", "order_place.tpl.html");
		$smarty->assign("order_is_placed", $_GET["order_placement_result"]);
	}
	else if (isset($_POST["complete_order"])) //place order
	{

		//shopping cart items count
		$c = 0;
		if (isset($_SESSION["gids"]))
			for ($j=0; $j<count($_SESSION["gids"]); $j++)
				if ($_SESSION["gids"][$j]) $c += $_SESSION["counts"][$j];

		//not empty?
		if (isset($_SESSION["gids"]) && $c)
		{
			//insert order into database

			db_query("insert into ".ORDERS_TABLE." (order_time, cust_firstname, cust_lastname, cust_email, cust_country, cust_zip, cust_state, cust_city, cust_address, cust_phone) values ('".get_current_time()."','".$_POST["first_name"]."','".$_POST["last_name"]."','".$_POST["email"]."','".$_POST["country"]."','".$_POST["zip"]."','".$_POST["state"]."','".$_POST["city"]."','".$_POST["address"]."','".$_POST["phone"]."');") or die (db_error());
			$oid = db_insert_id(); //order ID

			//now move shopping cart content to the database

			$k = 0; //total cart value
			$products = array();
			$adm = ""; //order notification for administrator

			for ($i=0; $i<count($_SESSION["gids"]); $i++)
			  if ($_SESSION["gids"][$i])
			  {
				$q = db_query("SELECT name, Price, product_code FROM ".PRODUCTS_TABLE." WHERE productID='".$_SESSION["gids"][$i]."'") or die (db_error());
				if ($r = db_fetch_row($q))
				{
					//product info
					$tmp = array(
						$_SESSION["gids"][$i],
						$r[0],
						$_SESSION["counts"][$i],
						($_SESSION["counts"][$i]*$r[1])." ".$currency_iso_3,
						$r[2]
					);

					//store ordered products info into database
					$articul = trim($tmp[4]) ? "[".$tmp[4]."] " : "";
					db_query("insert into ".ORDERED_CARTS_TABLE." (orderID, productID, name, Price, Quantity) values ('$oid', '".$tmp[0]."', '".$articul.$tmp[1]."', '".$r[1]."', '".$tmp[2]."');");

					$products[] = $tmp;

					//update order amount
					$k += $_SESSION["counts"][$i]*$r[1];

					//order notification for administrator - update
					$adm .= $articul.$tmp[1]." (x".$tmp[2]."): ".$tmp[3]."\n";

				}
			  }

			//assign order content to smarty
			$smarty_mail->assign("order_content", $products);
			$smarty_mail->assign("order_total", $k." ".$currency_iso_3);
			$smarty_mail->assign("order_id", $oid);
			$smarty_mail->assign("order_custname", $_POST["first_name"]." ".$_POST["last_name"]);
			$smarty_mail->assign("order_shipping_address", $_POST["address"]."\n".$_POST["city"]." ".$_POST["state"]."  ".$_POST["zip"]."\n".$_POST["country"]);

			$_SESSION["order_id"] = $oid;
			$_SESSION["order_amount"] = $k;

			//send message to customer
			mail($_POST["email"], EMAIL_CUSTOMER_ORDER_NOTIFICATION_SUBJECT, $smarty_mail->fetch("order_notification.tpl.html"), "From: \"".CONF_SHOP_NAME."\"<".CONF_GENERAL_EMAIL.">\n".stripslashes(EMAIL_MESSAGE_PARAMETERS)."\nReturn-path: <".CONF_GENERAL_EMAIL.">");

			//notification for administrator
			$od = STRING_ORDER_ID.": $oid\n\n";
			$adm .= "\n".CUSTOMER_FIRST_NAME." ".$_POST["first_name"]."\n".CUSTOMER_LAST_NAME." ".$_POST["last_name"]."\n".CUSTOMER_ADDRESS.": ".$_POST["country"].", ".$_POST["zip"].", ".$_POST["state"].",  ".$_POST["city"].", ".$_POST["address"]."\n".CUSTOMER_PHONE_NUMBER.": ".$_POST["phone"]."\n".CUSTOMER_EMAIL.": ".$_POST["email"];
			mail(CONF_ORDERS_EMAIL, EMAIL_ADMIN_ORDER_NOTIFICATION_SUBJECT, $od.$adm, "From: \"".CONF_SHOP_NAME."\"<".CONF_GENERAL_EMAIL.">\n".stripslashes(EMAIL_MESSAGE_PARAMETERS)."\nReturn-path: <".CONF_GENERAL_EMAIL.">");

			unset($_SESSION["gids"]);
			unset($_SESSION["counts"]);

			//show order placement result
			header("Location: index.php?order_placement_result=1");

		}
		else //empty shopping cart
		{
			header("Location: index.php?shopping_cart=yes");
		}
	}

?>