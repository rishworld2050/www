<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/


	//last order step - providing customer information

	if (isset($_GET["order_custinfo"])) //place order
	{
		$smarty->assign("main_content_template", "order_custinfo.tpl.html");
	}

?>