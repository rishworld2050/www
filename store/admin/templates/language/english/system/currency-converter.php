<?php

/*+++++++++++++++++++++++++++++++++++++++++++++

  Script: Maian Cart v2.0
  Programmed & Designed by: David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Software Website: http://www.maiancart.com
  Script Portal: http://www.maianscriptworld.co.uk

  +++++++++++++++++++++++++++++++++++++++++++++
  
  This File: currency-converter.php
  Description: English Language File

  +++++++++++++++++++++++++++++++++++++++++++++*/


$msg_currency              = 'Maian Cart has a built in currency conversion system. Currencies are obtained from the European Central Bank via its daily xml feed at <a title="European Central Bank" href="http://www.ecb.int/stats/eurofxref/eurofxref-daily.xml" onclick="window.open(this);return false">www.ecb.int/stats/eurofxref/eurofxref-daily.xml</a>. Your base currency is your processing currency. From this calculations are made
                              to present your visitor with a currency conversion into their local currency. Note that payment processing is <b>always</b> in your base currency.<br /><br />To enable this feature, specify which currency conversions you want to present to your visitors. You`ll need to set up a cron tab to have the rates updated daily in your database. If you don`t have this function, you can simply update this page at any time to add the latest rates to your database.
                              <br /><br />Your base processing currency is currently: <b>{base}</b> (<a href="?p=settings&amp;s=3" title="Change">Change</a>)';
$msg_currency2             = 'Enable/Disable Currencies';
$msg_currency3             = 'Enable/Disable All';
$msg_currency4             = 'Update Currencies &amp; Rates';
$msg_currency5             = 'Currency Converter Updated';

?>
