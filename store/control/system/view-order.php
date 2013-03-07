<?php

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

  Script: Maian Cart v2.0
  Programmed & Designed by: David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Software Website: http://www.maiancart.com
  Script Portal: http://www.maianscriptworld.co.uk

  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  
  This File: view-order.php
  Description: System File

  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

if (!defined('PARENT')) {
  header('HTTP/1.0 403 Forbidden');
	 header('Content-type: text/html; charset=utf-8');
  echo '<h1>Permission Denied</h1>';
  exit;
}

// Load language files..
include(MCLANG.'view-order.php');

// Handle product download..
if (isset($_GET['pdl'])) {
  checkOrderCode($_GET['pdl']);
  $DL   = getTableData('purchases','downloadCode',$_GET['pdl'],' AND liveDownload = \'yes\'');
  if (isset($DL->productID)) {
    $PRD   = getTableData('products','id',$DL->productID);
    $path  = $MCPROD->determineDownloadPath($PRD->pDownloadPath);
    // Increment download count..
    $status = $MCCART->incrementProductDownload($DL,$PRD);
    // Add click log..
    $MCCART->addClickHistory($DL->saleID,$DL->id,$DL->productID);
    if ($status=='ok') {
      // If returned status ok, download product..
      $MCCART->forceProductDownload($path);
    } else {
      header("Location: ".setDisplayUrl('dl-expired.html','?p=dl-expired'));
    }
  } else {
    header("Location: ".setDisplayUrl('dl-code-error.html','?p=dl-code-error'));
  }
  exit;
}

// Zip download..
if (isset($_GET['zip']) && $SETTINGS->enableZip=='yes' && ctype_alnum($_GET['zip'])) {
  if (!is_writeable(PATH.$SETTINGS->logFolderName) || !is_dir(PATH.$SETTINGS->logFolderName)) {
    die('&quot;<b>'.PATH.$SETTINGS->logFolderName.'</b>&quot; folder must exist and be writeable for the zip functions to work. Folder name is set in admin settings. Folder to be created manually.');
  }
  // Check how many times zip has been downloaded..
  $S = getTableData('sales','buyCode',$_GET['zip']);
  if (isset($S->zipLimit) && ($S->zipLimit+1)>$SETTINGS->zipLimit && $SETTINGS->zipLimit>0) {
    header("Location: ".setDisplayUrl('zip-limit.html','?p=zip-limit'));
    exit;
  }
  $ZIP      = new ZipArchive();
  $ZIPFILE  = $ZIP->open(PATH.$SETTINGS->logFolderName.'/'.$_GET['zip'].'.zip', ZipArchive::CREATE);
  // Adjust timeout and memory limit..
  if ($SETTINGS->zipTimeOut>0) {
    @set_time_limit($SETTINGS->zipTimeOut);
  }
  if ($SETTINGS->zipMemoryLimit>0) {
    @ini_set('memory_limit', (int)$SETTINGS->zipMemoryLimit.'M');
  }
  // Add files to zip..
  $cnt = $MCPROD->loadOrderStructureForZipCreation($ZIP);
  // Close zip file..
  $ZIP->close();
  // Download zip file..
  if (isset($S->id) && isset($ZIPFILE) && $ZIPFILE===true && $cnt>0) {
    $MCPROD->downloadZipFile(PATH.$SETTINGS->logFolderName.'/'.$_GET['zip'].'.zip');
  } else {
    header("Location: ".setDisplayUrl('zip-error.html','?p=zip-error'));
  }
  exit;
}

// Check order code..
checkOrderCode($_GET['vOrder']);

// Get order data..
$ORDER = getTableData('sales','buyCode',substr($_GET['vOrder'],0,50));

// Is this page valid..
if (!isset($ORDER->id)) {
  header("Location: ".setDisplayUrl('dl-code-error.html','?p=dl-code-error'));
  exit;
}

// Is page locked..
if ($ORDER->downloadLock=='yes') {
  header("Location: ".setDisplayUrl('dl-lock.html','?p=dl-lock'));
  exit;
}

// If order has a none gateway payment option and is pending, do not load screen..
// If order is cancelled, prevent access too..
if ((in_array($ORDER->paymentMethod,array('cheque','phone','cod','bank')) && $ORDER->paymentStatus=='pending') ||
     $ORDER->paymentStatus=='cancelled') {
  header("Location: ".setDisplayUrl('dl-code-error.html','?p=dl-code-error'));
  exit;
}

// Is code present..
if (!isset($_GET['vOrder']) || !in_array(strlen($_GET['vOrder']),array(50,52))) {
  include(PATH.'control/response-headers/403.php');
  exit;
}
   
// Does order exist..
if (!isset($ORDER->id) || (isset($ORDER->saleConfirmation) && $ORDER->saleConfirmation=='no')) {
  header("Location: ".setDisplayUrl('code-error.html','?p=code-error'));
  exit;
}

// If there is a zip limit and its been reached, hide link..
if ($ORDER->zipLimit>=$SETTINGS->zipLimit && $SETTINGS->zipLimit>0) {
  $SETTINGS->enableZip = 'no';
}

$headerTitleText = cleanData($msg_public_view16.': '.$headerTitleText);
   
$breadcrumbs[] = $msg_public_view21;   
   
include(PATH.'control/header.php');

// Does this order have downloads..
$downloadCount = rowCount('purchases WHERE saleID = \''.$ORDER->id.'\' AND liveDownload = \'yes\' AND saleConfirmation  = \'yes\' AND productType = \'download\'');

$tpl = getSavant();
if ($ORDER->paymentMethod=='free') {
  $tpl->assign('TEXT', array(str_replace('{invoice}',saleInvoiceNumber($ORDER->invoiceNo),$msg_public_view),$mgs_public_view17,$msg_public_view3));
} else {
  $tpl->assign('TEXT', array((strlen($_GET['vOrder'])==52 ? $msg_public_view5 : str_replace('{invoice}',saleInvoiceNumber($ORDER->invoiceNo),$msg_public_view)),
                             (strlen($_GET['vOrder'])==52 ? $mgs_public_view6 : $msg_public_view2),
                             $msg_public_view3,
                             $msg_public_view22
                       )
              );
}
$tpl->assign('PRODUCT_DOWNLOADS', $MCPROD->buildProductSaleDownloads($ORDER));
$tpl->assign('ORDER_DOWNLOADS_COUNT', $downloadCount);
$tpl->assign('ZIP_DOWNLOAD', ($SETTINGS->enableZip=='yes' ? $MCPROD->buildProductSaleDownloads($ORDER,'zip') : ''));
$tpl->display('templates/view-order.tpl.php');

include(PATH.'control/footer.php');

?>
