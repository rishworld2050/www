<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	//core file

	ini_set("display_errors", "1");

	// -------------------------INITIALIZATION-----------------------------//

	//make sure that URL does not contain something like index.php/?parameter1=1&... //

	//include core files
	include("./cfg/connect.inc.php");
	include("./includes/database/mysql.php");
	include("./cfg/general.inc.php");
	include("./cfg/appearence.inc.php");
	include("./cfg/functions.php");
	include("./cfg/category_functions.php");
	include("./cfg/language_list.php");


	session_start();

	ini_set("display_errors", "1");

	//init Smarty
	require 'smarty/smarty.class.php'; 
	$smarty = new Smarty; //core smarty object
	$smarty_mail = new Smarty; //for e-mails

	//select a new language?
	if (isset($_POST["new_language"]))
	{
		$_SESSION["current_language"] = $_POST["new_language"];
	}

	//current language session variable
	if (!isset($_SESSION["current_language"]) ||
		$_SESSION["current_language"] < 0 || $_SESSION["current_language"] > count($lang_list))
			$_SESSION["current_language"] = 0; //set default language
	//include a language file
	if (isset($lang_list[$_SESSION["current_language"]]) && file_exists("./languages/".$lang_list[$_SESSION["current_language"]]->filename))
		include("./languages/".$lang_list[$_SESSION["current_language"]]->filename); //include current language file
	else
	{
		die("<font color=red><b>ERROR: Couldn't find language file!</b></font>");
	}

	//connect to the database
	db_connect(DB_HOST,DB_USER,DB_PASS) or die (db_error());
	db_select_db(DB_NAME) or die (db_error());

	//get currency ISO 3 code
	$currency_iso_3 = (defined('CONF_CURRENCY_ISO3')) ? CONF_CURRENCY_ISO3 : "USD" ;
	$smarty->assign("currency_iso_3", $currency_iso_3);

	//load all categories to array $cats to avoid multiple DB queries (frequently used in future - but not always!)
	$cats = array();
	$i=0;
	$q = db_query("SELECT categoryID, name, parent, products_count, description, picture FROM ".CATEGORIES_TABLE." where categoryID<>0 ORDER BY name") or die (db_error());	
	while ($row = db_fetch_row($q))
	{
		$cats[$i++] = $row;
	}

	//set $categoryID
	if (isset($_GET["categoryID"]) || isset($_POST["categoryID"]))
		$categoryID = isset($_GET["categoryID"]) ? $_GET["categoryID"] : $_POST["categoryID"];
	else $categoryID = 0;

	$categoryID = (int)$categoryID;

	//$productID
	if (!isset($_GET["productID"]))
	{
		if (isset($_POST["productID"]))
		{
			$productID = (int)$_POST["productID"];
		}
	}
	else
	{
		$productID = (int)$_GET["productID"];
	}

	//and different vars...
	if (isset($_GET["register"]) || isset($_POST["register"]))
		$register = isset($_GET["register"]) ? $_GET["register"] : $_POST["register"];
	if (isset($_GET["update_details"]) || isset($_POST["update_details"]))
		$update_details = isset($_GET["update_details"]) ? $_GET["update_details"] : $_POST["update_details"];
	if (isset($_GET["order"]) || isset($_POST["order"]))
		$order = isset($_GET["order"]) ? $_GET["order"] : $_POST["order"];
	if (isset($_GET["check_order"]) || isset($_POST["check_order"]))
		$check_order = isset($_GET["check_order"]) ? $_GET["check_order"] : $_POST["check_order"];
	if (isset($_GET["proceed_ordering"]) || isset($_POST["proceed_ordering"]))
		$proceed_ordering = isset($_GET["proceed_ordering"]) ? $_GET["proceed_ordering"] : $_POST["proceed_ordering"];

	if (!isset($_SESSION["vote_completed"])) $_SESSION["vote_completed"] = array();

	//checking for proper $offset init
	$offset = isset($_GET["offset"]) ? $_GET["offset"] : 0;
	if ($offset<0 || $offset % CONF_PRODUCTS_PER_PAGE) $offset = 0;




	// -------------SET SMARTY VARS AND INCLUDE SOURCE FILES------------//

	if (isset($productID)) //to rollout categories navigation table
	{
		$q = db_query("SELECT categoryID FROM ".PRODUCTS_TABLE." WHERE productID='$productID'") or die (db_error());
		$r = db_fetch_row($q);
		if ($r) $categoryID = $r[0];
	}

	//set Smarty include files dir
	$smarty->template_dir = $lang_list[$_SESSION["current_language"]]->template_path;
	$smarty_mail->template_dir = $lang_list[$_SESSION["current_language"]]->template_path."/mail";

	//assign core Smarty variables

	$smarty->assign("lang_list", $lang_list);
	$smarty->assign("lang_list_count", count($lang_list));

	if (isset($_SESSION["current_language"])) $smarty->assign("current_language", $_SESSION["current_language"]);
	// - following vars are used as hidden in the customer survey form
	$smarty->assign("categoryID", $categoryID);
	if (isset($productID)) $smarty->assign("productID", $productID);
	if (isset($_GET["currency"])) $smarty->assign("currency", $_GET["currency"]);
	if (isset($_GET["user_details"])) $smarty->assign("user_details", $_GET["user_details"]);
	if (isset($_GET["aux_page"])) $smarty->assign("aux_page", $_GET["aux_page"]);
	if (isset($_GET["show_price"])) $smarty->assign("show_price", $_GET["show_price"]);
	if (isset($_GET["adv_search"])) $smarty->assign("adv_search", $_GET["adv_search"]);
	if (isset($_GET["searchstring"])) $smarty->assign("searchstring", $_GET["searchstring"]);
	if (isset($register)) $smarty->assign("register", $register);
	if (isset($order)) $smarty->assign("order", $order);
	if (isset($check_order)) $smarty->assign("check_order", $check_order);

	//set defualt main_content template to homepage
	$smarty->assign("main_content_template", "home.tpl.html");
	// includes all .php files from includes/ dir
	$includes_dir = opendir("./includes");
	while ( ($inc_file = readdir($includes_dir)) != false )
		if (strstr($inc_file,".php"))
		{
			include("./includes/$inc_file");
		}

	// output:

	//security warnings!
	if (file_exists("./install.php"))
	{
		echo "<center>".WARNING_DELETE_INSTALL_PHP."</center>";
	}
	if (file_exists("./forgot_password.php"))
	{
		echo "<center>".WARNING_DELETE_FORGOTPW_PHP."</center>";
	}

	if (!is_writable("./products_pictures") || !is_writable("./templates_c"))
	{
		echo "<center>".WARNING_WRONG_CHMOD."</center>";
	}

	//show administrative mode link if logged in as administrator
	include("./checklogin.php");
	if (isset($_SESSION["log"]) && isset($_SESSION["pass"]))
		echo "<br><center><a href=\"admin.php\"><font color=red>".ADMINISTRATE_LINK."</font></a></center><p>";

	//show Smarty output
	$smarty->display($lang_list[$_SESSION["current_language"]]->template_path."index.tpl.html"); 

?>