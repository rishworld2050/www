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

<?php
// The SEND_TO_GATEWAY var must NOT be removed and should exist in any 
// template updates. Remove this and the checkout payment systems will NOT work.
?>
<body<?php echo $this->SEND_TO_GATEWAY; ?>>
<?php
// overDiv is required for personalisation hover text in basket menu..
?>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>

<div id="topBar">

  <div class="inner">
   <p>
  
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
   
   <a href="<?php echo $this->BASE_PATH; ?>" class="store" title="<?php echo $this->TEXT[7]; ?>"><?php echo $this->TEXT[7]; ?></a>
   <a href="<?php echo $this->SPECIALS_URL; ?>" class="specials" title="<?php echo $this->TEXT[8]; ?>"><?php echo $this->TEXT[8]; ?></a>
   <?php
   // Are RSS feed enabled?
   if ($this->ENABLE_RSS=='yes') {
   ?>
   <a onclick="window.open(this);return false" href="<?php echo $this->FEED_URL; ?>" class="rsstop" title="<?php echo $this->TEXT[2]; ?>"><?php echo $this->TEXT[2]; ?></a>
   <?php
   }
   // Is sitemap enabled?
   if ($this->ENABLE_SITEMAP=='yes') {
   ?>
   <a href="<?php echo $this->SITEMAP_URL; ?>" class="sitemap" title="<?php echo $this->TEXT[9]; ?>"><?php echo $this->TEXT[9]; ?></a> 
   <?php
   }
   ?>
   </p>
  </div>
  
</div>

<div id="wrapper">

 <div id="logoSearch">
 
  <div class="left">
 
    <p><a href="<?php echo $this->URL_I; ?>"><img src="templates/<?php echo ($this->STORE_LOGO ? 'products/'.$this->STORE_LOGO : 'images/logo.gif'); ?>" alt="<?php echo $this->MY_STORE; ?>" title="<?php echo $this->MY_STORE; ?>" /></a></p>
 
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
  
  <br class="clear" />
 
 </div> 

 <div id="menu">
  <p<?php echo (!$this->CURRENCIES ? ' class="nocur"' : ''); ?>>
  <span class="breadcrumbs"><?php echo $this->BREADCRUMBS; ?></span>
  <span class="currencies">
  <?php
  // If no currencies are enabled for currency converter, show nothing..
  echo ($this->CURRENCIES ? $this->CURRENCIES : '&nbsp;'); 
  ?>
  </span>
  </p>
 </div>
 
 <?php
 // News ticker..
 // templates/html/ticker-wrapper.htm
 // templates/html/ticker-news-item.htm
 echo $this->NEWS_TICKER;
 ?>
 
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
