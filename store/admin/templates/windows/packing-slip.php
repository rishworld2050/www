<?php if (!defined('PARENT')) { die('You do not have permission to view this file!!'); }
$pMethods = paymentMethods(); 
if (file_exists(PATH.'templates/header-custom.php')) {
  include_once(PATH.'templates/header-custom.php');
} else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
}
?>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=<?php echo $charset; ?>" />
<link rel="stylesheet" href="packing-slip.css" type="text/css" />
<title><?php echo $title; ?></title>
</head>

<body>

<div id="wrapper">

<div id="header">

  <div class="headLeft">
   <h1><?php echo cleanDataEnt($SETTINGS->cName); ?></h1>
   <p class="ptag">
    <span class="wrap">
     <span class="heading"><?php echo $msg_invoice2; ?></span>
     <span class="heading_value"><?php echo saleInvoiceNumber($SALE->invoiceNo); ?></span>
     <br class="clear" />
    </span>
    <span class="wrap">
     <span class="heading"><?php echo $msg_invoice3; ?></span>
     <span class="heading_value"><?php echo $SALE->pdate; ?></span>
     <br class="clear" />
    </span>
    <span class="wrap">
     <span class="heading"><?php echo $msg_invoice4; ?></span>
     <span class="heading_value"><?php echo (isset($pMethods[$SALE->paymentMethod]) ? $pMethods[$SALE->paymentMethod] : $SALE->paymentMethod); ?></span>
     <br class="clear" />
    </span>
    <?php
    if ($SALE->setShipRateID>0 && in_array($SALE->shipType,array('weight'))) {
    ?>
    <span class="wrap">
     <span class="heading"><?php echo $msg_invoice30; ?></span>
     <span class="heading_value"><?php echo getShippingService(getShippingServiceFromRate($SALE->setShipRateID)); ?></span>
     <br class="clear" />
    </span>
    <?php
    }
    ?>
    <span class="wrap" style="border-bottom:0">
     <span class="heading"><?php echo $msg_invoice32; ?></span>
     <span class="heading_value"><?php echo getShippingCountry($SALE->shipSetCountry); ?></span>
     <br class="clear" />
    </span>
   </p>
   <h2><?php echo $msg_invoice5; ?>:</h2>
   <p class="ptag2">
    <span class="delAddress">
     <?php echo cleanDataEnt($SALE->saleBuyerName); ?><br />
     <?php echo nl2br(cleanDataEnt($SALE->buyerAddress)); ?><br /><br />
     <?php echo cleanDataEnt($SALE->buyerEmail); ?>
    </span>
   </p>
  </div>
  
  <div class="headRight">
   <p><img src="templates/images/packing-slip.gif" alt="<?php echo cleanDataEnt($msg_invoice15); ?>" title="<?php echo cleanDataEnt($msg_invoice15); ?>" /></p>
  </div>
  
  <br class="clear" />

</div>

<div id="content">

<table width="100%" cellspacing="0" cellpadding="0">
<tr>
  <td class="head1" colspan="2"><?php echo $msg_invoice6; ?></td>
  <td class="head2"><?php echo $msg_invoice7; ?></td>
</tr>
<?php
// Physical..
$run = 0;
$q_phys = mysql_query("SELECT *,".DB_PREFIX."products.id AS pid,".DB_PREFIX."purchases.id AS pcid FROM ".DB_PREFIX."purchases
          LEFT JOIN ".DB_PREFIX."products
          ON ".DB_PREFIX."purchases.productID = ".DB_PREFIX."products.id
          WHERE saleID                        = '".digitSan($_GET['sale'])."' 
          AND productType                     = 'physical' 
          ORDER BY ".DB_PREFIX."purchases.id
          ") or die((ENABLE_MYSQL_ERRORS ? mc_MySQLError(mysql_errno(),mysql_error(),__LINE__,__FILE__) : MYSQL_DEFAULT_ERROR));
if (mysql_num_rows($q_phys)>0) {
  while ($PHYS = mysql_fetch_object($q_phys)) {
  ++$run;
  $details      = '';
  $code         = ($PHYS->pCode ? $PHYS->pCode : 'N/A');
  $weight       = ($PHYS->pWeight ? $PHYS->pWeight : 'N/A');
  $PHYS->pName  = ($PHYS->pName ? $PHYS->pName : $PHYS->deletedProductName);
  $isDel        = ($PHYS->deletedProductName ? '<b class="deletedItem">'.$msg_script53.'</b>' : '');
  ?>
  <tr>
    <td class="sale1"<?php echo ($run==mysql_num_rows($q_phys) ? ' style="border-bottom:0"' : ''); ?>><span class="tickbox">&nbsp;</span></td>
    <td class="sale2"<?php echo ($run==mysql_num_rows($q_phys) ? ' style="border-bottom:0"' : ''); ?>>[<?php echo $code; ?>] <?php echo cleanDataEnt($PHYS->pName); ?>
    <?php
    // Attributes..
    echo mc_saleAttributes(digitSan($_GET['sale']),$PHYS->pcid,$PHYS->pid);
    $pers_Price = '0.00';
    // Personalised items..
    $q_ps = mysql_query("SELECT * FROM ".DB_PREFIX."purch_pers
            WHERE purchaseID       = '{$PHYS->pcid}'
            ORDER BY id
            ") or die((ENABLE_MYSQL_ERRORS ? mc_MySQLError(mysql_errno(),mysql_error(),__LINE__,__FILE__) : MYSQL_DEFAULT_ERROR));
    if (mysql_num_rows($q_ps)>0) {
    ?>
    <p class="personalisation">
    <?php
      while ($PS = mysql_fetch_object($q_ps)) {
        $PERSONALISED  = getTableData('personalisation','id',$PS->personalisationID);
        if ($PS->visitorData && $PS->visitorData!='no-option-selected') {
          echo '<span class="option">'.mc_persTextDisplay(cleanDataEnt($PERSONALISED->persInstructions),true).($PERSONALISED->persAddCost>0 ? ' (+'.mc_currencyFormat(formatPrice($PERSONALISED->persAddCost)).')' : '').':</span>';
          echo '<span class="data">'.cleanDataEnt($PS->visitorData).'</span>';
        }
      }  
      // Pers per item..
      $pers_Price = ($PHYS->persPrice>0 ? formatPrice($PHYS->persPrice) : '0.00');
    ?>
    </p>
    <?php  
    }
    ?>
    </td>
    <td class="sale3"<?php echo ($run==mysql_num_rows($q_phys) ? ' style="border-bottom:0"' : ''); ?>><?php echo $PHYS->productQty; ?></td>
  </tr> 
  <?php
  }
}
$run = 0;
// Download..
$q_down = mysql_query("SELECT *,".DB_PREFIX."products.id AS pid,".DB_PREFIX."purchases.id AS pcid FROM ".DB_PREFIX."purchases
          LEFT JOIN ".DB_PREFIX."products
          ON ".DB_PREFIX."purchases.productID = ".DB_PREFIX."products.id
          WHERE saleID                        = '".digitSan($_GET['sale'])."' 
          AND productType                     = 'download'
          ORDER BY ".DB_PREFIX."purchases.id
          ") or die((ENABLE_MYSQL_ERRORS ? mc_MySQLError(mysql_errno(),mysql_error(),__LINE__,__FILE__) : MYSQL_DEFAULT_ERROR));
if (mysql_num_rows($q_down)>0 && INCLUDE_DOWNLOADS_ON_PACKING_SLIP) {
  while ($DOWN = mysql_fetch_object($q_down)) {
  ++$run;
  $details      = '';
  $code         = ($DOWN->pCode ? $DOWN->pCode : 'N/A');
  $weight       = ($DOWN->pWeight ? $DOWN->pWeight : 'N/A');
  $DOWN->pName  = ($DOWN->pName ? $DOWN->pName : $DOWN->deletedProductName);
  $isDel2       = ($DOWN->deletedProductName ? '<b class="deletedItem">'.$msg_script53.'</b>' : '');
  ?>
  <tr>
    <td class="sale1"<?php echo ($run==mysql_num_rows($q_down) ? ' style="border-bottom:0"' : ''); ?>><span class="tickbox">&nbsp;</span></td>
    <td class="sale2"<?php echo ($run==mysql_num_rows($q_down) ? ' style="border-bottom:0"' : ''); ?>>[<?php echo $code; ?>] <?php echo cleanDataEnt($DOWN->pName); ?> (<b><?php echo $msg_invoice16; ?></b>)
    <?php
    // Attributes..
    echo mc_saleAttributes(digitSan($_GET['sale']),$DOWN->pcid,$DOWN->pid);
    $pers_Price = '0.00';
    // Personalised items..
    $q_ps = mysql_query("SELECT * FROM ".DB_PREFIX."purch_pers
            WHERE purchaseID       = '{$DOWN->pcid}'
            ORDER BY id
            ") or die((ENABLE_MYSQL_ERRORS ? mc_MySQLError(mysql_errno(),mysql_error(),__LINE__,__FILE__) : MYSQL_DEFAULT_ERROR));
    if (mysql_num_rows($q_ps)>0) {
    ?>
    <p class="personalisation">
    <?php
      while ($PS = mysql_fetch_object($q_ps)) {
        $PERSONALISED  = getTableData('personalisation','id',$PS->personalisationID);
        if ($PS->visitorData && $PS->visitorData!='no-option-selected') {
          echo '<span class="option">'.mc_persTextDisplay(cleanDataEnt($PERSONALISED->persInstructions),true).($PERSONALISED->persAddCost>0 ? ' (+'.mc_currencyFormat(formatPrice($PERSONALISED->persAddCost)).')' : '').':</span>';
          echo '<span class="data">'.cleanDataEnt($PS->visitorData).'</span>';
        }
      }  
      // Pers per item..
      $pers_Price = ($DOWN->persPrice>0 ? formatPrice($DOWN->persPrice) : '0.00');
    ?>
    </p>
    <?php  
    }
    ?>
    </td>
    <td class="sale3"<?php echo ($run==mysql_num_rows($q_down) ? ' style="border-bottom:0"' : ''); ?>><?php echo $DOWN->productQty; ?></td>
  </tr> 
  <?php
  }
}
?>
</table>

</div>

<div id="checkedby">
  <p><?php echo $msg_invoice23; ?>:_________________________ <?php echo $msg_invoice25; ?>:_________________________</p>
  <p><?php echo $msg_invoice24; ?>:_________________________<?php echo $msg_invoice25; ?>:_________________________</p>
</div>

<h4><?php echo cleanDataEnt($SETTINGS->cName); ?></h4>

<div id="footer">

  <div class="footLeft">
   <p>
    <?php echo nl2br(cleanDataEnt($SETTINGS->cAddress)); ?>
   </p>
  </div>
  
  <div class="footRight">
   <p>
     <span class="wrap">
      <span class="text"><?php echo $msg_invoice11; ?>:</span>
      <span class="text_value"><?php echo cleanDataEnt($SETTINGS->cTel); ?></span>
      <br class="clear" />
     </span>
     <span class="wrap">
      <span class="text"><?php echo $msg_invoice14; ?>:</span>
      <span class="text_value"><?php echo cleanDataEnt($SETTINGS->cFax); ?></span>
      <br class="clear" />
     </span>
     <span class="wrap">
      <span class="text"><?php echo $msg_invoice12; ?>:</span>
      <span class="text_value"><?php echo cleanDataEnt($SETTINGS->email); ?></span>
      <br class="clear" />
     </span>
     <span class="wrap">
      <span class="text"><?php echo $msg_invoice13; ?>:</span>
      <span class="text_value"><?php echo cleanDataEnt($SETTINGS->cWebsite); ?></span>
      <br class="clear" />
     </span>
   </p>
  </div>
  
  <br class="clear" /> 

</div>

<div id="other">
 <?php echo cleanData($SETTINGS->cOther); ?>
</div>

<?php
if (PACKING_SLIP_SHOW_IP) {
?>
<p class="ip"><?php echo $msg_invoice29.$SALE->ipAddress; ?></p>
<?php
}
?>

</div>

</body>

</html>
