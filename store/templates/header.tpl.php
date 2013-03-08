<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=<?php echo $this->CHARSET; ?>" />
<title><?php echo $this->TITLE; ?></title>
<meta name="keywords" content="<?php echo $this->META_KEYS; ?>" /> 
<meta name="description" content="<?php echo $this->META_DESC; ?>" />
<base href="<?php echo $this->BASE_PATH; ?>/" />
<?php
// DO NOT REMOVE THIS!!
// Required for some payment servers..
if ($this->META_REFRESH) {
?>
<meta http-equiv="refresh" content="4;url=<?php echo $this->META_REFRESH; ?>" />
<?php
}
// RSS LINK
echo $this->RSS_HEAD_LINK; 
// JAVASCRIPT MODULES
// This is important. DO NOT remove it..
echo $this->JAVASCRIPT; 
?>
<link rel="stylesheet" href="stylesheet.css" type="text/css" />
<!--[if lt IE 7]>
<link rel="stylesheet" href="ie6.css" type="text/css" />
<![endif]-->
<link rel="SHORTCUT ICON" href="favicon.ico" />
</head>
<body>

<div id="logoSearch" style="background:url(images/head.png) repeat-x;">
 
  <div class="left">
 
    <p><a href="<?php echo $this->URL_I; ?>"><img src="images/logo.png" /></a></p>
 
  </div>
  
  <div class="right">
  
    <form method="get" action="#" id="headSearchForm">
     <div class="search">
      <p>
      <span class="cursor" title="<?php echo $this->TEXT[3]; ?>" onclick="$('#headSearchForm').submit()">&nbsp;</span>
      <span class="text"><?php echo $this->TEXT[3]; ?>:</span>
      <input type="text" class="box" value="<?php echo $this->TEXT[4]; ?>" name="keys" onclick="this.value=''" />
      <span class="links">
       <a class="latest" href="<?php echo $this->LATEST_URL; ?>" title="<?php echo $this->TEXT[6]; ?>"><?php echo $this->TEXT[6]; ?></a>
       <a class="advanced" href="<?php echo $this->ADVANCED_SEARCH_URL; ?>" title="<?php echo $this->TEXT[5]; ?>"><?php echo $this->TEXT[5]; ?></a>
      </span>
      </p>
     </div> 
    </form>
  
  </div>
  
  
   <span class="basket">
    <?php
    // Is checkout enabled?
    if ($this->ENABLE_CHECKOUT=='yes') {
    ?>
    <span id="topCartCount"><?php echo $this->CART_COUNT; ?></span> <?php echo $this->TEXT[0]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt; <a href="<?php echo $this->CHECKOUT_URL; ?>" title="<?php echo $this->TEXT[1]; ?>"><?php echo $this->TEXT[1]; ?></a> &gt;
    <?php
    } else {
    // If checkout is disabled, fill gap with the date..
    echo date('D, j F Y',strtotime($this->TIME_ADJ));
    }
    ?>
   </span>
   
   
  
  
  <br class="clear" />
 
 </div>
 
<div id="menu">
  
  <span class="breadcrumbs"><?php echo $this->BREADCRUMBS; ?></span>
  
 </div>
 
 
 
 <div id="innerWrapper">
  
  <div class="leftMenu">
   
    <?php
    // Menu basket, visible on all pages EXCEPT pages in array..
    // Should NOT be visible when on checkout page..
    // Also disable if checkout isn`t enabled..
    if ($this->ENABLE_CHECKOUT=='yes') {
    if (!isset($_GET['p']) || (isset($_GET['p']) && !in_array($_GET['p'],array('checkout','no-gateway')))) {
    ?>
    <div id="shoppingBasket">
      
      <div class="basketItems">
       <p class="top"><span><?php echo $this->SHOPPING_BASKET; ?></span></p>
       <?php
       // BASKET ITEMS
       // templates/html/basket-menu/menu-basket-empty.htm
       // templates/html/basket-menu/menu-basket-item.htm
       // templates/html/basket-menu/menu-basket-item-rebuild.htm
       // templates/html/basket-menu/menu-basket-item-personalisation.htm 
       // templates/html/basket-menu/menu-basket-item-personalisation-hover.htm 
       // templates/html/basket-menu/menu-basket-item-personalisation-hover-item.htm       
       // templates/html/basket-menu/menu-basket-refresh.htm
       // templates/html/basket-menu/menu-basket-wrapper.htm
       echo $this->BASKET_ITEMS;
       ?>
       <p class="bottom"></p>
      </div>
    
    </div>
    <?php 
    }
    }
    
    // LEFT BOXES..
    // Ordered in admin settings..
    
    // CATEGORIES
    // templates/html/left-menu/category-wrapper.htm
    // templates/html/left-menu/category-link.htm
    // templates/html/left-menu/category-sub-click.htm
    // templates/html/left-menu/sub-category-wrapper.htm
    // templates/html/left-menu/sub-category-link.htm
    
    // PRICE POINTS
    // templates/html/left-menu/price-points-wrapper.htm
    // templates/html/left-menu/price-points-link.htm
    
    // BRANDS
    // templates/html/left-menu/brands-wrapper.htm
    // templates/html/left-menu/brands-link.htm
    
    // MOST POPULAR PRODUCTS
    // templates/html/left-menu/most-popular-wrapper.htm
    // templates/html/left-menu/most-popular-links.htm
    
    // RECENTLY VIEW ITEMS
    // templates/html/left-menu/most-recent-wrapper.htm
    // templates/html/left-menu/most-recent-links.htm
    
    // NEW PAGES..
    // templates/html/left-menu/new-pages-wrapper.htm
    // templates/html/left-menu/new-page-links.htm
    
    echo $this->DISPLAY_LEFT_BOXES; 
    ?>
  
  </div>
  
  <div class="mainContent">
  
    <div class="contentBody">
