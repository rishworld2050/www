<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/


	//frequently used category tree functions

function processCategories($level, $path, $sel)
{

	//returns an array of categories, that will be presented by the category_navigation.tpl.html template

	//$categories[] - categories array
	//$level - current level: 0 for main categories, 1 for it's subcategories, etc.
	//$path - path from root to the selected category (calculated by calculatePath())
	//$sel -- categoryID of a selected category

	//returns an array of (categoryID, name, level)

	//category tree is being rolled out "by the path", not fully

	$out = array();
	$cnt = 0;

	$q = db_query("select categoryID, name from ".CATEGORIES_TABLE." where parent=$path[$level] order by name") or die (db_error());
	while ($row = db_fetch_row($q))
	{
		$out[$cnt][0] = $row[0];
		$out[$cnt][1] = $row[1];
		$out[$cnt][2] = $level;
		$cnt++;

		//process subcategories?
		if ($level+1<count($path) && $row[0] == $path[$level+1])
		{
			$sub_out = processCategories($level+1,$path,$sel);
			//add $sub_out to the end of $out
			for ($j=0; $j<count($sub_out); $j++)
			{
				$out[] = $sub_out[$j];
				$cnt++;
			}
		}

	}

	return $out;

} //processCategories

function fillTheCList($parent,$level) //completely expand category tree
{

	$q = db_query("SELECT categoryID, name, products_count, products_count_admin, parent FROM ".CATEGORIES_TABLE." WHERE categoryID<>0 and parent=$parent ORDER BY name") or die (db_error());
	$a = array(); //parents
	while ($row = db_fetch_row($q))
	{
		$row[5] = $level;
		$a[] = $row;
		//process subcategories
		$b = fillTheCList($row[0],$level+1);
		//add $b[] to the end of $a[]
		for ($j=0; $j<count($b); $j++)
		{
			$a[] = $b[$j];
		}
	}
	return $a;

} //fillTheCList

function update_products_Count_Value_For_Categories($parent)
{
	//updates products_count and products_count_admin values for each category

	$q = db_query("SELECT categoryID FROM ".CATEGORIES_TABLE." WHERE parent=$parent AND categoryID<>0") or die (db_error());
	$cnt = array();
	$cnt[0] = 0;
	$cnt[1] = 0;

	while ($row = db_fetch_row($q))
	{

		//process subcategories

		//products_count of current category ($count[0]) surpluses it's subcategories' productsCounts
		$t = update_products_Count_Value_For_Categories($row[0]);
		$cnt[0] += $t[0];
		$cnt[1]  = $t[1];

	}

	$p = db_query("SELECT count(*) FROM ".PRODUCTS_TABLE." WHERE categoryID=$parent") or die (db_error());
	$t = db_fetch_row($p); $t = $t[0];
	$p = db_query("SELECT count(*) FROM ".PRODUCTS_TABLE." WHERE categoryID=$parent AND enabled=1") or die (db_error());
	$c = db_fetch_row($p); $c = $c[0];
	$cnt[0] += $c;
	$cnt[1]  = $t;

	//save calculations
	if ($parent)
		db_query("UPDATE ".CATEGORIES_TABLE." SET products_count=$cnt[0], products_count_admin=$cnt[1] WHERE categoryID=".$parent) or die (db_error());

	return $cnt;

} //update_products_Count_Value_For_Categories

function SetRightsToUploadedFile( $file_name )
{
	@chmod( $file_name, 0666);
}

?>