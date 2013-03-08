<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	ini_set("display_errors", "1");

 //main admin module

function add_department($admin_dpt)
	//adds new $admin_dpt to department list
{
	global $admin_departments;

	$i = 0;
	while ($i<count($admin_departments) && $admin_departments[$i]["sort_order"] < $admin_dpt["sort_order"]) $i++;
	for ($j=count($admin_departments)-1; $j>=$i; $j--)
		$admin_departments[$j+1] = $admin_departments[$j];
	$admin_departments[$i] = $admin_dpt;
}

function __escape_string($_Data)
{	
	return str_replace("'", "\'", str_replace('\\', '\\\\', stripslashes($_Data)));
}

	include("./cfg/connect.inc.php");
	include("./includes/database/mysql.php");
	include("./cfg/general.inc.php");
	include("./cfg/appearence.inc.php");
	include("./cfg/functions.php");
	include("./cfg/category_functions.php");
	include("./cfg/language_list.php");

	session_start();

	//authorized login check
	include("./checklogin.php");
	if (!isset($_SESSION["log"]) || !isset($_SESSION["pass"])) //unauthorized
	{
		//show authorization form
		header("Location: access_admin.php");
		die("<script>window.location='access_admin.php';</script>");
	}

	define('WORKING_THROUGH_ADMIN_SCRIPT', true); //for security purposes

	//logout?
	if (isset($_GET["logout"])) //logout
	{
		//show authorization form
		$_SESSION["log"] = "";
		$_SESSION["pass"] = "";
		unset($_SESSION["log"]);
		unset($_SESSION["pass"]);
		die("<script>window.location='access_admin.php';</script>");
	}

	//init Smarty
	require 'smarty/smarty.class.php'; 
	$smarty = new Smarty; //core smarty object
	$smarty_mail = new Smarty; //for e-mails

	if (!isset($_SESSION["current_language"]) ||
		$_SESSION["current_language"] < 0 || $_SESSION["current_language"] > count($lang_list))
			$_SESSION["current_language"] = 0; //set default language

	if (isset($lang_list[$_SESSION["current_language"]]) && file_exists("./languages/".$lang_list[$_SESSION["current_language"]]->filename))
		include("./languages/".$lang_list[$_SESSION["current_language"]]->filename); //include current language file
	else
	{
		die("<font color=red><b>ERROR: Couldn't find language file!</b></font>");
	}


	//connect to database
	db_connect(DB_HOST,DB_USER,DB_PASS) or die (db_error());
	db_select_db(DB_NAME) or die (db_error());

	//set Smarty include files dir
	$smarty->template_dir = $lang_list[$_SESSION["current_language"]]->template_path."/admin";
	$smarty_mail->template_dir = $lang_list[$_SESSION["current_language"]]->template_path."/mail";

	//get currency ISO 3 code
	$currency_iso_3 = (defined('CONF_CURRENCY_ISO3')) ? CONF_CURRENCY_ISO3 : "USD" ;
	$smarty->assign("currency_iso_3", $currency_iso_3);

	// several functions

	function mark_as_selected($a,$b) //required for excel import
	//returns " selected" if $a == $b
	{
		return !strcmp($a,$b) ? " selected" : "";

	} //mark_as_selected


	function get_NOTempty_elements_count($arr) //required for excel import
		//gets how many NOT NULL (not empty strings) elements are there in the $arr
	{
		$n = 0;
		for ($i=0;$i<count($arr);$i++)
			if (trim($arr[$i]) != "") $n++;
		return $n;
	} //get_NOTempty_elements_count


	//end of functions definition

	//define department and subdepartment
	if (!isset($_GET["dpt"]))
	{
		$dpt = isset($_POST["dpt"]) ? $_POST["dpt"] : "";
	}
	else $dpt = $_GET["dpt"];
	if (!isset($_GET["sub"]))
	{
		if (isset($_POST["sub"])) $sub = $_POST["sub"];
	}
	else $sub = $_GET["sub"];

	//define smarty template
	$smarty->assign("admin_main_content_template", "default.tpl.html");
	$smarty->assign("current_dpt", $dpt);

	//get new orders count
	$q = db_query("select count(*) from ".ORDERS_TABLE) or die (db_error());
	$n = db_fetch_row($q);
	$smarty->assign("new_orders_count", $n[0]);

	$admin_departments = array();

	// includes all .php files from includes/ dir
	$includes_dir = opendir("./includes/admin");
	$file_count = 0;
	while ( ($inc_file = readdir($includes_dir)) != false )
		if (strstr($inc_file,".php"))
		{
			include("./includes/admin/$inc_file");
			$file_count++;
		}

	if (isset($sub)) $smarty->assign("current_sub", $sub);

	$smarty->assign("admin_departments", $admin_departments);
	$smarty->assign("admin_departments_count", $file_count);

	//show Smarty output
	$smarty->display($lang_list[$_SESSION["current_language"]]->template_path."admin/index.tpl.html"); 

?>