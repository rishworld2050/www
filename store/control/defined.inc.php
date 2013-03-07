<?php

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

  Script: Maian Cart v2.0
  Programmed & Designed by: David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Software Website: http://www.maiancart.com
  Script Portal: http://www.maianscriptworld.co.uk

  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  
  This File: defined.inc.php
  Description: User Editable Options

  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
  
/*
  CATEGORY, SEARCH, SPECIAL - VIEW ALL OPTIONS
  Do you want to enable the 'View All Products', 'View All Searches' option in the drop down filters?
  If selected loads all products without pagination. For heavy databases this may cause load issues, so enable with caution..
*/
define('VIEW_ALL_CATEGORY_DD', 'no');
define('VIEW_ALL_SPECIALS_DD', 'no');
define('VIEW_ALL_SEARCH_DD', 'no');
  
/*
  PRODUCT DOWNLOADS - FLUSH OUTPUT BUFFER
  Enabling this generally results in better reliablity for product downloads
  If you find that your downloads are 0 bytes and your paths are correct you may
    want to disable this
  1 = Enabled, 0 = Disabled  
*/
define('DOWNLOADS_FLUSH_BUFFER', 1);   
  
/*
  BREADCRUMB LINKS SEPARATOR
  Specify separator character or symbol for breadcrumb links
*/
define('BREADCRUMBS_SEPARATOR', ' &gt; ');

/*
  RESTRICTED COUNTRIES LINKS SEPARATOR
  Specify separator character for restricted countries on product page
*/
define('RESTRICTED_COUNTRIES_SEPARATOR', ', ');

/*
  PRODUCT TEXT CHARACTER LIMIT IN LEFT MENU BASKET
  How much text to show for product name in left menu basket..
  Set to 0 for no limit
*/
define('LEFT_MENU_BASKET_CHAR_LIMIT', 60);
  
/*
  ORDER SALE COMPARISON ITEMS
  How do you wish to order sale comparison items?
  Can be a product table field name or rand()
  id DESC, id ASC, pName, pName DESC, rand() etc
  
  You can also use FIELD to map certain fields first.
  FIELD(id,1,5,9),pName
*/
define('COMPARISON_ORDER_BY', 'pName');

/*
  ORDER RELATED PRODUCT ITEMS
  How do you wish to order related product items?
  Can be a product table field name or rand()
  id DESC, id ASC, pName ASC, pName DESC, rand() etc
  
  You can also use FIELD to map certain fields first.
  FIELD(id,1,5,9),pName
*/
define('RELATED_ORDER_BY', 'pName');  

/*
  ORDER BRANDS
  How do you wish to order brands?
  Can be a product table field name
  id DESC, id ASC, name ASC, name DESC
  
  You can also use FIELD to map certain fields first.
  FIELD(id,1,5,9),name
*/
define('BRANDS_ORDER_BY', 'name'); 

/*
  AUTO SORT PERSONALISATION
  Do you want to auto sort personalisation options if specified?
  1 = Enabled, 0 = Disabled
*/
define('AUTO_SORT_PERSONALISATION_OPTIONS', 1);

/*
  RESTRICT PERSONALISATION TEXT
  On the checkout page, do you wish to restrict how much personalisation
  text data is shown? Enter number for restriction, or 0 to disable
*/
define('PERSONALISATION_TEXT_RESTRICTION', 200);

/* 
  SPECIAL OFFER PAGE - DEFAULT ORDER
  Can be any column name in the products table, asc or desc
  id DESC, id ASC, pName ASC, pName DESC, pOffer ASC, pOffer DESC etc
*/
define('ORDER_SPECIAL_OFFERS', 'pName');

/*
  SET DEFAULT FILTER FOR CATEGORY PAGE
  price-low  = Price: Low - High
  price-high = Price: High - Low
  title-az   = Title: A - Z
  title-za   = Title: Z - A
  date-new   = Date: Newest
  date-old   = Date: Oldest
  stock      = Low Stock
*/
define('CATEGORY_FILTER', 'title-az');  

/*
  SET DEFAULT FILTER FOR SEARCH PAGE
  price-low  = Price: Low - High
  price-high = Price: High - Low
  title-az   = Title: A - Z
  title-za   = Title: Z - A
  date-new   = Date: Newest
  date-old   = Date: Oldest
*/
define('SEARCH_FILTER', 'title-az'); 

/*
  ORDER SEARCH RESULTS
  How do you wish to order search results initially?
  Can be a product table field name
  id DESC, id ASC, pName ASC, pName DESC
  
  You can also use FIELD to map certain fields first.
  FIELD(id,1,5,9),pName
*/
define('SEARCH_ORDER_BY', 'pName'); 

/*
  ONLY SHOW NEWS TICKER ON STORE MAIN PAGE
  Do you only want to show the news ticker on the store main page?
  1 = Yes, 0 = No, show on all pages
*/
define('NEWS_TICKER_DISPLAY_PREF', 1);  

/*
  SHOW TICKER ON CUSTOM PAGES
  Do you want to show the news ticker on custom pages?
  Enter ID numbers separated with comma. Look for the ID number in the url.
  
  np/about-us/3/index.html = 3
  index.php?np=3           = 3
  
  Example to show ticker on pages 3,5 & 6
  define('NEWS_TICKER_DISPLAY_CUSTOM_PAGES', '3,5,6');
  
  Set to 0 to disable on custom pages.
*/
define('NEWS_TICKER_DISPLAY_CUSTOM_PAGES', 0);

/*
  ORDER PRODUCT DOWNLOADS
  How do you wish to order product downloads?
  Can be a product table field name
  id DESC, id ASC, pName ASC, pName DESC
*/
define('DOWNLOADS_ORDER_BY', 'pName');   

/*
  ORDER ZONES
  How do you wish to order zones on the checkout page
  Can be a zone table field name
  id DESC, id ASC, zName ASC, zName DESC
*/
define('CHECKOUT_ZONE_ORDER_BY', 'zName'); 

/*
  ORDER ZONES AREAS
  How do you wish to order zone areas on the checkout page
  Can be a zone_areas table field name
  id DESC, id ASC, areaName ASC, areaName DESC
*/
define('CHECKOUT_ZONE_AREA_ORDER_BY', 'areaName'); 

/*
  LEFT MENU CATEGORIES LIST ORDERING
  Can be any row in the categories table ASC or DESC
  Combinations are also allowed. Examples:
  catname DESC
  catname DESC,id
*/
define('CATEGORY_SUB_MENU_ORDERING', 'catname');

/*
  SUB MENU AUTO OPEN
  If you have sub cats, do you want these to auto show in left menu when the parent is clicked or
  when viewing a product in a parent category?
  1 = Enabled, 0 = Disabled
*/
define('AUTO_OPEN_SUB_MENUS', 1);  

/*
  ZONE AREAS DELIMITER
  Delimiter for displaying zone areas on shipping/returns page..
*/
define('ZONE_AREA_DELIMITER', ','); 

/*
  CLOUD ZOOM
  Enable /disable cloud zoom
  1 = Enabled, 0 = Disabled
*/
define('ENABLE_CLOUD_ZOOM', 1);  

/*
  CONTACT FORM AUTO RESPONDER
  Do you wish to enable the contact form auto responder?
  Sends confirmation email to sender to confirm their submission..
  1 = Enabled, 0 = Disabled
*/
define('CONTACT_AUTO_RESPONDER', 1);  

/*
  SEO URLS PREG MATCH EXPRESSION
  Strips none alphanumeric chars from titles for search engine friendly urls.
  Adjust expression if required. For advanced users only..
*/
define('SEO_EXPRESSION', '`[^\w_-]`'); 

/*
  STOCK THRESHOLD
  Stock threshold for qty options on products page
  This is the amount of qty options that appear if a large stock level is set.
*/
define('QTY_STOCK_THRESHOLD', 50);

/*
  SPECIFY PRODUCT STOCK THRESHOLD TO SHOW EXACTLY HOW MANY PRODUCTS ARE IN STOCK. 
  For example if you set this as 30, stock levels above this would simply state "In Stock". 
  Less than or equal to the threshold would say "30 in Stock". Set to 0 to always show stock count. 
*/  
define('PRODUCT_STOCK_THRESHOLD', 30);

/* 
  CONTACT FORM RANDOM NUMBERS
  Specify number range for contact form random numbers
  Seperate values with comma..
*/
define('RANDOM_RANGE_FIRST', '1,9');
define('RANDOM_RANGE_SECOND', '11,99');

/*
  DEFAULT BUILD DATE FOR RSS FEEDS
  Should NOT be changed
*/  
define('RSS_BUILD_DATE_FORMAT', date('r',strtotime($SETTINGS->serverTimeAdjustment)));

/*
  DEFAULT FORMAT USED IN E-MAIL MESSAGES
  Supports any parameters supported by the PHP date function:
  http://php.net/manual/en/function.date.php
*/  
define('MAIL_MSG_DATE_FORMAT', date('j F Y',strtotime($SETTINGS->serverTimeAdjustment)));

/*
  HTML IN E-MAILS
  If enabled, e-mail templates should contain HTML and NOT standard plain text formatting. 
  If you are unsure of this, leave disabled.
  1 = Enabled, 0 = Disabled
*/
define('ENABLE_HTML_IN_EMAILS', 0);

/*
  AUTO PARSE LINE BREAKS
  Do you want to auto parse line breaks for new page text data?
*/
define('AUTO_PARSE_LINE_BREAKS', 1);   

/*
  CURRENCY CRON OUTPUT
  When the currency updater cron is run, do you want to see output?  
  Outputs date/time. If unsure, leave enabled.
  1 = Enabled, 0 = Disabled
*/
define('CURRENCY_CONVERTER_CRON_OUTPUT', 1);

/*
  INCLUDE PERSONALISED OPTIONS IN ORDER EMAILS
  Include personalised options in e-mails if applicable?
  1 = Enabled, 0 = Disabled
*/
define('EMAIL_PERSONALISATION_INCL', 1);

/*
  INCLUDE ATTRIBUTE OPTIONS IN EMAILS
  Include attribute options in e-mails if applicable?
  1 = Enabled, 0 = Disabled
*/
define('EMAIL_ATTRIBUTES_INCL', 1);

/*
  REMOVE INDEX.HTML FROM REWRITE RULES.
  If you are adjusting the rewrite rules in the .htaccess file and prefer
  NOT to have index.html as part of the url, set this to 0
*/
define('REWRITE_INDEX', 1);  

/*
  AMOUNT OF REFRESHES FOR RESPONSE PAGE
  Refreshes every 4 seconds. Change in header template.
  <meta http-equiv="refresh" content="4;url=<?php echo $this->META_REFRESH; ?>" />
  
  Google Checkout takes longer to send responses, so ideally best set to 15 or higher..
  Once limit is reached, page times out and pending message displays.
*/
define('RESPONSE_PAGE_REFRESHES', 15);

/* 
  COOKIE EXPIRATION
  If visitor selects alternative currency, cookie is set
  Duration in days before currency cookie expires
*/
define('CURRENCY_EXPIRATION', 180);

/*
  CUSTOM TAG SEPERATOR
  Specify custom tag seperator. For product tags, this is the seperator between each
*/
define('TAG_SEPERATOR', ', ');

/*
  GLOBAL SWITCH FOR NEWSLETTER OPTION/SIGNUP
  If you disable the signup option by removing the box, set this to 0
  to prevent anyone from sending data to the site to force auto signup spam.
  1 = Enabled, 0 = Disabled
*/
define('NEWSLETTER_SIGNUP', 1);  

/*
  ENABLE NEWSLETTER EMAIL AUTO RESPONDERS
  Do you wish to enable the email confirmation auto responders?
  If enabled, sends emails on subscribe and unsubscribe
  1 = Enabled, 0 = Disabled
*/
define('NEWSLETTER_EMAIL_AUTO_RESPONDERS', 1); 

/*
  THOUSANDS SEPARATOR ON PRICES
  Applies to formatting on certain pages..
  Blank for none.
*/
define('PRICE_THOUSANDS_SEPERATORS', ',');  

/*
  TABBED SEPARATORS FOR CATEGORY DROP DOWNS
  This produces a tree menu affect. Enter custom code if required.
*/
define('CHILD_TABBED_SEPARATOR', '&nbsp;&nbsp;');
define('INFANT_TABBED_SEPARATOR', '&nbsp;&nbsp;&nbsp;&nbsp;');  

/*
  ACTIVATE GOOGLE CHECKOUT PENDING EMAILS FOR CHARGEABLE SALES
  Only needs enabling if you have specified NOT to auto charge buyers cards
  At this point, no further e-mails would occur until you click 'Charge' in your GC account area
  1 = Enabled, 0 = Disabled
*/
define('GC_CHARGEABLE_EMAILS', 0);

/*
  YOUTUBE EMBED CODE
  Adjust code if required for Youtube embed code
  This is used in BB code tags.
  Where the code should be use {CODE}
*/
define('YOU_TUBE_EMBED_CODE','<iframe width="560" height="315" src="http://www.youtube.com/embed/{CODE}" frameborder="0" allowfullscreen></iframe>');

/*
  VIMEO EMBED CODE
  Adjust code if required for Vimeo embed code
  This is used in BB code tags.
  Where the video ID should be use {ID}
*/
define('VIMEO_EMBED_CODE', '<iframe src="http://player.vimeo.com/video/{ID}?title=0&amp;byline=0&amp;portrait=0" width="400" height="225" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></p>');

/*
  MP3 PLAYER EMBED CODE
  Adjust code if required for mp3 bb code
  This is used in BB code tags.
  Where the mp3 path loads use {MP3}
  {BASE} should not be changed as this is the base path to the mp3 player
*/
define('MP3_EMBED_CODE','
 <object type="application/x-shockwave-flash" data="{BASE}bb-player.swf" width="200" height="20">
   <param name="movie" value="{BASE}bb-player.swf" />
   <param name="bgcolor" value="#555555" />
   <param name="FlashVars" value="mp3={MP3}&amp;loadingcolor=ffffff" />
 </object>
');  
  
/*
  BACKUP CRON E-MAILS
  If you are running the 'db-backup.php' file as a cron, enter emails here, separated with a comma for multiple addresses.
  The cron tab/job emails should not exist on the same server as your database.
  If this is left blank, backups are saved locally in the 'logs' folder.
  
  Examples:
  define('BACKUP_CRON_EMAILS', 'email@mysite.co.uk');
  define('BACKUP_CRON_EMAILS', 'email@mysite.co.uk,email2@mysite.co.uk');
  
*/
define('BACKUP_CRON_EMAILS', '');  

/*
  DISPLAYS THE 'POWERED BY MAIAN CART' LINK IN YOUR BROWSER TITLE
  You may disable this if you wish, but ONLY in the commercial version.
  The free version displays this always.
  1 = Enabled, 0 = Disabled
*/  
define('ENABLE_POWERED_BY_LINK', 1);

?>
