<?php

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

  Script: Maian Cart v2.0
  Programmed & Designed by: David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Software Website: http://www.maiancart.com
  Script Portal: http://www.maianscriptworld.co.uk

  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  
  This File: currency-updater.php
  Description: System File

  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

// ERROR REPORTING..
include(dirname(__FILE__).'/control/error-reporting.php');

// Set path to recipe folder
define('PARENT', 1);
define('PATH', dirname(__FILE__).'/');

// Database connection..
include(PATH.'control/connect.inc.php');
include(PATH.'control/functions.php');
include(PATH.'control/currencies.php');

// Connect..
dbConnector();

// DETECT TIMEZONE (PHP5+)..
mc_dateTimeDetect();

// Load Settings Data..
$SETTINGS = @mysql_fetch_object(
             mysql_query("SELECT * FROM ".DB_PREFIX."settings LIMIT 1")
             );
  
// Load user defined vars..             
include(PATH.'control/defined.inc.php');

// DEFINE LANGUAGE PATH..
define('MCLANG', PATH.'templates/language/'.$SETTINGS->languagePref.'/');             
             
// Check data..             
if (!isset($SETTINGS->languagePref)) {
  header("Location: install/index.php");
  exit;
}              
 
// Load include files..
include_once(MCLANG.'global.php');
include(PATH.'classes/currencyConverter.php');

// Download rates..
$MCCRV          = new CurrencyConverter();
$MCCRV->prefix  = DB_PREFIX;
$MCCRV->downloadExchangeRates();

// Output text..
if (CURRENCY_CONVERTER_CRON_OUTPUT) {
  echo $msg_script30;
}

?>
