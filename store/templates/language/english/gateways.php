<?php

/*+++++++++++++++++++++++++++++++++++++++++++++

  Script: Maian Cart v2.0
  Programmed & Designed by: David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Software Website: http://www.maiancart.com
  Script Portal: http://www.maianscriptworld.co.uk

  +++++++++++++++++++++++++++++++++++++++++++++
  
  This File: gateways.php
  Description: English Language File

  +++++++++++++++++++++++++++++++++++++++++++++*/


$msg_gatewayapi            = '[{website}] Invalid Response from Payment System';
$msg_gatewayapi2           = 'Return to {merchant}';

/*
  Paypal pending reasons..
  DO NOT rename the array keys. ie: address,echeck,intl etc
*/

$ppPendingReasons          = array('address'        => 'The payment is pending because your customer did not include a confirmed shipping address 
                                                        and your Payment Receiving Preferences is set to allow you to manually accept or deny each of these payments. 
                                                        To change your preference, go to the Preferences section of your Profile.',
                                   'authorization'  => 'You set the payment action to Authorization and have not yet captured funds.', 
                                   'echeck'         => 'The payment is pending because it was made by an eCheck that has not yet cleared.',
                                   'intl'           => 'The payment is pending because you hold a non-U.S. account and do not have a withdrawal mechanism. 
                                                        You must manually accept or deny this payment from your Account Overview.',
                                   'multi-currency' => 'You do not have a balance in the currency sent, and you do not have your Payment Receiving Preferences set 
                                                        to automatically convert and accept this payment. You must manually accept or deny this payment.',
                                   'order'          => 'You set the payment action to Order and have not yet captured funds.',
                                   'paymentreview'  => 'The payment is pending while it is being reviewed by PayPal for risk.',
                                   'unilateral'     => 'The payment is pending because it was made to an email address that is not yet registered or confirmed.',
                                   'upgrade'        => 'The payment is pending because it was made via credit card and you must upgrade your account to Business or 
                                                        Premier status in order to receive the funds. upgrade can also mean that you have reached the monthly limit 
                                                        for transactions on your account.',
                                   'verify'         => 'The payment is pending because you are not yet verified. You must verify your account before you can accept this payment.',
                                   'other'          => 'The payment is pending for a reason other than the standard reasons. For more information, contact PayPal Customer Service.'
                                   );

/*
  Moneybookers supported languages
  DO NOT rename the array keys. ie: EN,FI,ES etc
*/  
$mbLanguages               = array('CN' => 'Chinese',
                                   'CZ' => 'Czech',
                                   'DA' => 'Danish',
                                   'NL' => 'Dutch',
                                   'EN' => 'English',
                                   'FI' => 'Finnish',
                                   'FR' => 'French',
                                   'DE' => 'German',
                                   'GR' => 'Greek',
                                   'IT' => 'Italian',
                                   'PL' => 'Polish',
                                   'RO' => 'Romanian',
                                   'RU' => 'Russian',
                                   'ES' => 'Spanish',
                                   'SV' => 'Swedish',
                                   'TR' => 'Turkish'
                                   );


?>
