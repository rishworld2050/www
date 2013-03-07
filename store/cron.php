<?php

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

  Script: Maian Cart v2.0
  Programmed & Designed by: David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Software Website: http://www.maiancart.com
  Script Portal: http://www.maianscriptworld.co.uk

  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  
  This File: cron.php
  Description: Cron Override - Currency Converter

  If the system fails when you setup a cron to auto update the currency converter, and ioncube 
  returns an error saying the system is encoded for another domain, you can bypass the main 
  index file via a trigger.
  
  1. Adjust the url below to be the full http url to the 'currency-updater.php' file in your
     store installation
     
  2. Change your cron job in your control panel to access this file instead of 
     the 'currency-updater.php; file.
  
  Note: CURL must be installed for this to run.

++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

if (function_exists('curl_init')) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://www.yoursite.com/store/currency-updater.php");
  curl_setopt ($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  $output = curl_exec($ch);      
  curl_close($ch);
  echo $output;
  exit;
}

echo 'Curl Not Installed';

?>
