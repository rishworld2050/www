<?php

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

  Script: Maian Cart v2.0
  Programmed & Designed by: David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Software Website: http://www.maiancart.com
  Script Portal: http://www.maianscriptworld.co.uk

  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  
  This File: currencies.php
  Description: System File

  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

//-------------------------------------------------------------------------
// CURRENCIES
// Payment option currencies. Must be supported by preferred gateways..
//-------------------------------------------------------------------------

$master_currencies = array(
'AUD' => 'Australian Dollar',
'EUR' => 'Euro',
'JPY' => 'Japanese Yen',
'GBP' => 'UK Pound Sterling',
'USD' => 'US Dollar',
''    => '- - - - - - -'
);

$other_currencies = array(
'BRL' => 'Brazilian Real',
'BGN' => 'Bulgarian Leva',
'CAD' => 'Canadian Dollar',
'HRK' => 'Croatian Kuna',
'CZK' => 'Czech Koruna',
'DKK' => 'Danish Krone',
'EEK' => 'Estonian Kroon',
'HKD' => 'Hong Kong Dollar',
'HUF' => 'Hungarian Forint',
'ISK' => 'Icelandic Krona',
'INR' => 'Indian Rupee',
'ILS' => 'Israeli Shekel',
'JOD' => 'Jordanian Dinar',
'LVL' => 'Latvian Lat',
'LTL' => 'Lithuanian Litas',
'MYR' => 'Malaysian Ringgits',
'MXN' => 'Mexican Peso',
'MAD' => 'Moroccan Dirham',
'TRY' => 'New Turkish Lira',
'NZD' => 'New Zealand Dollar',
'NOK' => 'Norwegian Krone',
'OMR' => 'Omani Rial',
'PHP' => 'Philippine Pesos',
'PLN' => 'Polish Zloty',
'QAR' => 'Qatari Rial',
'RON' => 'Romanian Leu New',
'SAR' => 'Saudi Riyal',
'RSD' => 'Serbian Dinar',
'SGD' => 'Singapore Dollar',
'SKK' => 'Slovakian Koruna',
'ZAR' => 'South African Rand',
'KRW' => 'South Korean Won',
'SEK' => 'Swedish Krona',
'CHF' => 'Swiss Franc',
'TWD' => 'Taiwan New Dollars',
'THB' => 'Thai Baht',
'TND' => 'Tunisian Dinar',
'AED' => 'United Arab Emirates Dirham'
);

$currencies = array_merge($master_currencies,$other_currencies);

//-------------------------------------------------------------------------
// CURRENCY HTML ENTITIES
// Codes and their HTML entity equivalent..
// Note that some may not display properly in older browsers.
//-------------------------------------------------------------------------

$currencyEntities = array(
'USD'  =>  'US&#036;',
'CAD'  =>  'CA&#036;',
'GBP'  =>  '&#163;',
'JPY'  =>  '&#165;',
'EUR'  =>  '&#8364;',
'CHF'  =>  '&#067;',
'CZK'  =>  '&#075;',
'DKK'  =>  '&#107;',
'HKD'  =>  'HK&#036;',
'HUF'  =>  '&#070;',
'SGD'  =>  'S&#036;',
'NOK'  =>  '&#107;',
'NZD'  =>  '&#036;',
'PLN'  =>  '&#122;',
'SEK'  =>  '&#107;'
);

//-------------------------------------------------------------------------
// CURRENCY FORMAT OVERRIDE
// Display override for currencies. Use {PRICE} where you want price to
// appear. Example for Australian Dollar:
//
// '&#036;{PRICE}AUD'
//
//-------------------------------------------------------------------------

$currencyFormatOverride = array(
'AUD'  =>  '&#036;{PRICE}AUD'
);

//---------------------------------------------------------------------------------------------------
// SYMBOL DISPLAY OVERRIDE FOR CURRENCY CONVERTER
//
// In the global payment settings you can set whether a currency symbol or ISO code is displayed
// before or after the price. This is global and affects all. 
// If you wish to override this and set the display differently for different currencies, enter them here.
//
// Key is currency ISO code, value is either 'before' OR 'after'.
//
// See examples
//---------------------------------------------------------------------------------------------------

$cur_sym_display = array(
'AUD' => 'before',
'BRL' => 'after',
'INR' => 'before',
'EUR' => 'after',
'GBP' => 'before',
'USD' => 'before'
);

//-------------------------------------------------------------------------
// SUPPORTED FOR CURRENCY CONVERTER
// Do NOT add to this list..
//-------------------------------------------------------------------------

$currencyConversion = array(
'GBP' => 'British Pound',
'USD' => 'US Dollar',
'EUR' => 'Euro',
'AUD' => 'Australian Dollar',
'BGN' => 'Bulgarian Leva',
'CAD' => 'Canadian Dollar',
'CHF' => 'Swiss Franc',
'CNY' => 'Chinese Yuan Renminbi',
'CYP' => 'Cyprian Pound',
'CZK' => 'Czech Koruny',
'DKK' => 'Danish Kroner',
'EEK' => 'Estonian Krooni',
'HKD' => 'Hong Kong Dollar',
'HRK' => 'Croatian Kuna',
'HUF' => 'Hungarian Forint',
'IDR' => 'Indonesian Rupiah',
'ISK' => 'Icelandic Kronur',
'ILS' => 'Israeli Shekel',
'JPY' => 'Japanese Yen',
'KRW' => 'South Korean Won',
'LTL' => 'Lithuanian Litai',
'LVL' => 'Latvian Lati',
'MTL' => 'Malta Liri',
'MYR' => 'Malaysian Ringgit',
'NOK' => 'Norwegian Krone',
'NZD' => 'New Zealand Dollar',
'PHP' => 'Philippine Peso',
'PLN' => 'Polish Zlotych',
'RON' => 'Romanian New Lei',
'RUB' => 'Russian Rubles',
'SEK' => 'Swedish Kronor',
'SGD' => 'Singapore Dollar',
'SIT' => 'Slovenian Tolar',
'SKK' => 'Slovakian Koruny',
'THB' => 'Thai Baht',
'TRY' => 'Turkish New Lira',
'ZAR' => 'South African Rand',
'BRL' => 'Brazilian Real',
'INR' => 'Indian Rupee',
'MXN' => 'Mexican Peso'
);

?>
