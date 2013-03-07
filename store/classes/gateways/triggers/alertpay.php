<?php

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

  Script: Maian Cart v2.0
  Programmed & Designed by: David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Software Website: http://www.maiancart.com
  Script Portal: http://www.maianscriptworld.co.uk

  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  
  This File: alertpay.php
  Description: System File

  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

// If you want to perform additional actions after a successful payment transaction from Alert Pay, enter code here..
//
// Any post variables sent by the gateway will be available here. Refer to the gateway docs for further info..
//
// To get the purchased products, loop the purchases table based on the saleID or even the buyCode. You can use the following variable:
//
// $ORDER->id = ID number in sales table, which is the saleID in the purchases table. This is the id of the completed sale.
//
// $q = mysql_query("SELECT * FROM mc_purchases WHERE saleID = '{$ORDER->id}'");
// while ($P = mysql_fetch_object($q)) {
//   do something..
// }
//
// You can reference any field in the purchases or sales tables.



?>
