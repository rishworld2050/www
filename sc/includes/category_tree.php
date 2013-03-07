<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	// category navigation form

	//calculate a path to the category
	$path = array($categoryID);
	$curr = $categoryID;
	do
	{
		$q = db_query("SELECT parent FROM ".CATEGORIES_TABLE." WHERE categoryID='$curr'") or die (db_error());
		$row = db_fetch_row($q);
		$curr = $row ? $row[0] : 0; //get parent ID
		$path[] = $curr;

	} while ($curr);

	//now reverse $path
	$path = array_reverse($path);

	$out = processCategories(0,$path,$categoryID);

	$smarty->assign("categories_tree",$out);

?>