<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	// auxiliary information page presentation

	if (isset($_GET["aux_page"]))
	{
		if (strstr($_GET["aux_page"],"aux") && file_exists("./cfg/".$_GET["aux_page"]))
		{
			$f = file("./cfg/".$_GET["aux_page"]);

			$out = implode("", $f);

			$smarty->assign("auxiliary_page", $out);
		}
		$smarty->assign("main_content_template", "aux_page.tpl.html");
	}

?>