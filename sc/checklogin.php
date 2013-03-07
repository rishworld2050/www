<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	//authorized access check

	if ((isset($_SESSION["log"]) && isset($_SESSION["pass"])) && (strcmp($_SESSION["log"], ADMIN_LOGIN) || strcmp($_SESSION["pass"], ADMIN_PASS)))
	{
		unset($_SESSION["log"]);
		unset($_SESSION["pass"]);
	}

?>