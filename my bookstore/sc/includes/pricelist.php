<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script PRO                                                           *
 * Copyright (c) 2004 Articus consulting group. All rights reserved.         *
 *                                                                           *
 ****************************************************************************/

	// show whole price list

function pricessCategories($parent,$level)
{

	//same as processCategories(), except it creates a pricelist of the shop

	$out = array();
	$cnt = 0;

	$q1 = db_query("select categoryID, name from ".CATEGORIES_TABLE." where parent=$parent order by name") or die (db_error());
	while ($row = db_fetch_row($q1))
	{

		//define back color of the cell
		$r = hexdec(substr(CONF_LIGHT_COLOR, 0, 2)); 
		$g = hexdec(substr(CONF_LIGHT_COLOR, 2, 2)); 
		$b = hexdec(substr(CONF_LIGHT_COLOR, 4, 2)); 
		$m = (float)max($r, max($g,$b));
		$r = round((190+20*min($level,3))*$r/$m);
		$g = round((190+20*min($level,3))*$g/$m);
		$b = round((190+20*min($level,3))*$b/$m);
		$c = dechex($r).dechex($g).dechex($b); //final color

		//add category to the output
		$out[$cnt][0] = $row[0];
		$out[$cnt][1] = $row[1];
		$out[$cnt][2] = $level;
		$out[$cnt][3] = $c;
		$out[$cnt][4] = 0; //0 is for category, 1 - product
		$cnt++;

		//add products
		$q = db_query("select productID, name, Price from ".PRODUCTS_TABLE." where categoryID=".$row[0]." and Price>0 and enabled=1 order by name") or die (db_error());
		while ($row1 = db_fetch_row($q))
		 {
			if ($row1[2] <= 0)
				$row1[2]= "n/a";
			else
				$row1[2] = show_price($row1[2]);

			//add product to the output
			$out[$cnt][0] = $row1[0];
			$out[$cnt][1] = $row1[1];
			$out[$cnt][2] = $level;
			$out[$cnt][3] = "FFFFFF";
			$out[$cnt][4] = 1; //0 is for category, 1 - product
			$out[$cnt][5] = $row1[2];
			$cnt++;

		 }

		//process all subcategories
		$sub_out = pricessCategories($row[0], $level+1);

		//add $sub_out to the end of $out
		for ($j=0; $j<count($sub_out); $j++)
		{
			$out[] = $sub_out[$j];
			$cnt++;
		}
 	}

	return $out;

} //pricessCategories



	if (isset($_GET["show_price"])) //show pricelist
	{
		$pricelist_elements = pricessCategories(0, 0);
		$smarty->assign("pricelist_elements", $pricelist_elements);
		$smarty->assign("main_content_template", "pricelist.tpl.html");
	}

?>