<?php

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

  Script: Maian Cart v2.0
  Programmed & Designed by: David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Software Website: http://www.maiancart.com
  Script Portal: http://www.maianscriptworld.co.uk

  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  
  This File: defined.inc.php
  Description: User Editable Options (Admin)

  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

/*
  RELATIVE PATHS
  Relative system and http paths. Some servers running in safe mode don`t like relative paths,
  so you may have to enter the full server path to your cart root. Examples:
  
  define('REL_PATH', '/home/server/path/cart/');
  define('REL_HTTP_PATH', 'http://www.yoursite.com/cart/');
  
*/  
define('REL_PATH', '../');
define('REL_HTTP_PATH', '../');

/*
  ENABLE COOKIE 'REMEMBER ME' OPTION ON LOGIN PAGE
  Do you wish to enable the cookie option on the login page?
*/
define('ENABLE_LOGIN_COOKIE', 1);  

/*
  ADMIN HOMEPAGE DEFAULT SALES/TOTALS VIEW
  Specify the default view for the admin homepage
  Can be any of the following:
  today  = Today
  week   = This Week
  month  = This Month
  year   = This Year
*/
define('ADMIN_HOME_DEFAULT_SALES_VIEW', 'today');  

/*
  ENABLE 'HELP' LINK
  Do you wish to enable the help link on the top bar in the admin area?
  This is only an option in the commercial version..
  0 = Disabled, 1 = Enabled
*/
define('DISPLAY_HELP_LINK', 1); 

/*
  ENABLE CATEGORY TOGGLING
  Do you want to enable the toggle option on the categories page?
  If disabled, all categories are always viewable on page load
*/
define('CATEGORY_TOGGLE', 1);  

/*
  ELFINDER FILE MANAGER LOCALE
  Language locale for Elfinder File Manager
  Available languages at:
  admin/templates/js/i18n/
  
  Enter 2 characters after first . in file name.
  Example: elfinder.fr.js (French)
  define('ELF_LOCALE', 'fr');
*/
define('ELF_LOCALE', 'en');  

/*
  ENABLE SOFTWARE VERSION CHECK
  Displays on the top bar and is an easy check option to see if new versions have
  been release. You may wish to disable this for clients.
  0 = Disabled, 1 = Enabled
*/
define('DISPLAY_SOFTWARE_VERSION_CHECK', 1);  

/*
  DATA PER PAGE
  Relates to data shown per page in the admin area
*/  
define('PRODUCTS_PER_PAGE', 20);
define('SEARCH_LOGS_PER_PAGE', 25);
define('LOGS_PER_PAGE', 35);
define('CAMPAIGNS_PER_PAGE', 20);
define('COUPON_REPORTS_PER_PAGE', 50);
define('ZONES_PER_PAGE', 20);
define('SERVICES_PER_PAGE', 20);
define('RATES_PER_PAGE', 20);
define('EMAILS_PER_PAGE', 50);

/*
  SYSTEM MESSAGES
  When an action is performed in the admin area a system confirmation message appears. This can be disabled if you wish
  0 = Disabled, 1 = Enabled
*/  
define('ENABLE_SYSTEM_MESSAGES', 1);

/*
  COMPLETED SALES ON ADMIN HOMEPAGE
  On the admin homepage you`ll see the latest completed sales. Enter amount to show or 0 to disable
*/    
define('SHOW_COMPLETED_SALES_ON_MAIN_PAGE', 10);

/*
  PENDING SALES ON ADMIN HOMEPAGE
  On the admin homepage you`ll see the latest pending sales. ALL pending sales display if enabled.
  0 = Disabled, 1 = Enabled
*/ 
define('SHOW_PENDING_SALES_ON_MAIN_PAGE', 1);

/*
  SALE QTY LIMIT
  For drop downs on sale edit page
*/  
define('SALE_QTY_LIMIT', 50);

/*
  DISPLAY IP ADDRESS AT FOOTER OF INVOICES/PACKING SLIP
  Do you want to display the order IP address(es) at the bottom of invoiced and packing slips?
  0 = Disabled, 1 = Enabled
*/  
define('INVOICE_SHOW_IP', 1);
define('PACKING_SLIP_SHOW_IP', 1);

/*
  SKIP LOGGING OF CERTAIN USERS
  If you have the entry log enabled, you can skip the logging of certain users. Enter usernames
  exactly as they appear on the user management page and separate with comma.
*/  
define('ENTRY_LOG_SKIP_USERS', '');

/*
  INCLUDE DOWNLOADS ON PACKING SLIPS & INVOICES
  Do you want to show download purchases on invoices and packing slips?
  0 = No, 1 = Yes
*/  
define('INCLUDE_DOWNLOADS_ON_INVOICE', 1);
define('INCLUDE_DOWNLOADS_ON_PACKING_SLIP', 1);

/*
   PICTURES PER ROW
   Pictures per row on products picture page.
*/   
define('PICS_PER_ROW_FOR_DISPLAY', 6);

/*
  AUTO TAGS TEXT LIMIT
  When you auto create tags from descriptions, do you want to only include words of a certain character length?
  0 for no limit
*/  
define('AUTO_TAGS_TEXT_LIMIT', 5);

/*
  AUTO TAGS CAPITALISATION
  Do you want to capitalise all tags?
  0 = No, 1 = Yes
*/  
define('CAPITALISE_TAGS', 1);

/*
  WRITE STATUS WHEN DOWNLOAD PAGE LOCKED / UNLOCKED
  Do you want to write an edit status when a download page is locked / unlocked.
  0 = No, 1 = Yes
*/  
define('DL_LOCK_UNLOCK_STATUS', 1);

/*
 DEFAULT CHECKED OPTION FOR PRODUCT DOWNLOAD
 When adding products, do you want the product download radio button checked as yes or no by default?
*/
define('IS_PRODUCT_DOWNLOAD','no'); 

/*
  WRITE STATUS WHEN DOWNLOADS ARE RE-ACTIVATED
  Do you want to write an edit status when downloads are re-activated?
  0 = No, 1 = Yes
*/  
define('DL_ACTIVATE_STATUS', 1);

/*
  WRITE STATUS WHEN PRODUCTS ARE ADDED TO SALE
  Do you want to write an edit status when products are added to sale?
  0 = No, 1 = Yes
*/  
define('NEW_PRODUCT_EDIT_STATUS', 1);

/*
  PICTURE PREFIXES
  Prefix names for thumbnails and pictures. 
*/  
define('PREFIX_FOR_PICTURES', 'product');
define('PREFIX_FOR_THUMBS', 'thumb');

/*
  RENAME PICTURES
  Do you want to keep original file names for pictures or rename them?
  Default is to rename pictures. 
  Disable to keep original file names.
  0 = Don`t rename, 1 = Rename
*/  
define('RENAME_PICTURES', 1);

/*
  MAX/MIN FIELDS FOR SHIPPING RATES
  The max and min amount of shipping rate fields that can be added at any one time
*/
define('MIN_FIELDS_SHIPPING_RATES', 1);
define('MAX_FIELDS_SHIPPING_RATES', 10);

/*
  MAX/MIN FIELDS FOR COUNTRIES
  The max and min amount of country fields that can be added at any one time
*/
define('MIN_FIELDS_COUNTRIES', 1);
define('MAX_FIELDS_COUNTRIES', 30);

/*
  MAX/MIN FIELDS FOR PICTURES
  The max and min amount of picture uploads that can be added at any one time
*/
define('MIN_FIELDS_UPLOAD_BOXES', 1);
define('MAX_FIELDS_UPLOAD_BOXES', 3);

/*
  GREYBOX POPUP WINDOW SIZES
  The greybox appears foe certain operations. Adjust if necessary
*/  
define('GREYBOX_WIDTH', 920);
define('GREYBOX_HEIGHT', 580);
define('GREYBOX_WIDTH_PRINT', 850);
define('GREYBOX_HEIGHT_PRINT', 400);
define('COLORBOX_WIDTH', 700);
define('COLORBOX_HEIGHT', 400);
define('GREYBOX_STATUS_WIDTH', 875);
define('GREYBOX_STATUS_HEIGHT', 500);
define('GREYBOX_PRODUCTS_WIDTH', 875);
define('GREYBOX_PRODUCTS_HEIGHT', 500);
define('GREYBOX_PERS_WIDTH', 875);
define('GREYBOX_PERS_HEIGHT', 500);
define('GREYBOX_DOWNLOADS_WIDTH', 875);
define('GREYBOX_DOWNLOADS_HEIGHT', 500);
define('GREYBOX_FIELD_INFO_WIDTH', 800);
define('GREYBOX_FIELD_INFO_HEIGHT', 400);
define('BBCODE_WINDOW_WIDTH', 920);
define('BBCODE_WINDOW_HEIGHT', 580);

/*
  ISBN API URL
  Url for ISBN API lookup. DO NOT change unless you know what you are doing!
*/
define('ISNB_API_URL', 'http://isbndb.com/api/books.xml?access_key={KEY}&index1=isbn&value1={ISBN}&results=texts');  

/*
  CHMOD VALUES
  For linux servers only. Only change if you understand this.
  DO NOT enclose values in quotes or apostrophes..
*/  
define('CHMOD_VALUE', 0777);
define('AFTER_UPLOAD_CHMOD_VALUE', 0644);

/*
  ATTACHMENT CLEANUP
  This cleans up attachment names and removes problem characters
*/  
define('ATTACHMENT_FILE_CLEANUP', '[^a-zA-Z0-9\s]');

/*
  ATTACHMENTS FOLDER NAME
  By default the admin attachments folder is called 'attachments'. If you wish to change it, rename folder
  and enter name here
*/  
define('ATTACH_FOLDER', 'attachments');

/*
  CHECK SAVE ATTACHMENTS TO SERVER
  Set default checked option for save to server option for attachments on sale update page
  yes = default checked option is yes
  no  = default checked option is no
*/
define('SAVE_ATTACHMENTS_TO_SERVER', 'no');  

/*
  REDIRECT TO ORDER IF ORDER LINK CLICKED IN E-MAILS
  If you have clicked a link to an order in an email the system will redirect you to the order page
  if the users permissions are allowed.
  
  You can disable this by default if you wish.
  0 = No Redirect, 1 = Redirect if allowed
*/
define('ORDER_REDIRECT', 1);  

/*
  SHOW DISABLED CATEGORIES ON PRODUCT ADD/EDIT PAGE
  Do you want to show disabled products on add/edit product pages?
  Can be useful if you want to add products to a disabled category before enabling the category
  0 = No, 1 = Yes
*/
define('SHOW_DISABLED_CATS_ADD_PRODUCT', 1);  

/*
  ZONE AREA DISPLAY LIMIT 
  Amount of zone areas to show before 'View/Close' appears.
*/
define('ZONE_AREA_DISPLAY_LIMIT', 20);  

/*
  DATE DISPLAY FOR HEADER
  Date display format for top header
  Supports any parameters supported by the PHP date function:
  http://php.net/manual/en/function.date.php
*/
define('HEADER_DATE_FORMAT', 'D, j F Y');  

/*
  ENABLE BACK TO TOP SCROLLER
  Do you want to enable the back to top image that appears at the base of admin pages?
  0 = Disabled, 1 = Enabled
*/
define('SCROLL_TO_TOP_IMG', 1);  

/*
  DEFAULT SCREEN LOAD FOR SALES TRENDS
  Can be any of the following values:
  3,6,12,24 or year
*/
define('DEFAULT_SALES_TREND', 'year');  

/*
  FOLDERS
  Folder paths. DO NOT change these values..
*/  
define('PRODUCTS_FOLDER', 'templates/products');
define('BANNER_FOLDER', 'templates/images/banners');

/*
  STATS DECIMAL PLACES
  Amount of decimals for stats. This probably won`t need changing
*/  
define('STATS_DECIMAL_PLACES', 1);

?>
