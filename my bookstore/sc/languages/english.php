<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/



//language file

//		ENGLISH		//

//default character set, that will be used
define('DEFAULT_CHARSET', 'iso-8859-1');
define('LINK_TO_HOMEPAGE', 'Home');
define('PRODUCTS_BEST_CHOISE', '<h5>Highest rated products:</h5>');
define('MORE_INFO_ON_PRODUCT', 'more info...');
define('ENLARGE_PICTURE', 'enlarge...');
define('ADD_TO_CART_STRING', 'add to cart');
define('LIST_PRICE', 'List price');
define('CURRENT_PRICE', 'Price');
define('YOU_SAVE', 'You save');
define('IN_STOCK', 'In stock');
define('VOTING_FOR_ITEM_TITLE', 'Rate this item');
define('MARK_EXCELLENT', 'Excellent');
define('MARK_GOOD', 'Good');
define('MARK_AVERAGE', 'Average');
define('MARK_POOR', 'Poor');
define('MARK_PUNY', 'Puny');
define('VOTE_BUTTON', 'Rate!');
define('VOTES_FOR_ITEM_STRING', 'vote(s)');

define('LOGOUT_LINK', 'Logout');
define('ADMINISTRATE_LINK', '>> ADMINISTRATE <<');

define('ANSWER_YES', 'yes');
define('ANSWER_NO', 'no');
define('SAVE_BUTTON', 'Save');
define('DELETE_BUTTON', 'Delete');
define('CLOSE_BUTTON', 'Close');
define('CANCEL_BUTTON', 'Cancel');
define('UPDATE_BUTTON', 'Update');
define('ADD_BUTTON', 'Add');
define('ADMIN_ENABLED', 'Enabled');

//misc strings
define('STRING_BACK_TO_SHOPPING', 'Back to shopping');
define('STRING_SHOW', 'show');
define('STRING_NUMBER', 'number');
define('STRING_RELATED_ITEMS', 'Related items');
define('STRING_NUMBER_ONLY', 'number only');
define('STRING_EMPTY_CATEGORY', 'no products');
define('STRING_NO_ORDERS', 'no orders');
define('STRING_SEARCH', 'Search products');
define('STRING_LANGUAGE', 'Language');
define('STRING_PRICELIST', 'Price list');
define('STRING_GREETINGS', '<h1>Welcome to My Online Store!</h1>
<p>This online store is powered by <a href="bookstore">a
</a>.<br />
Shop-Script FREE is lite PHP shopping cart solution that allows you to create your own online store. Shop-Script FREE comes with fully open source code, and is free to use and modify.
<p>This text is editable.<br />
To edit open file <b>languages/english.php</b> in your text editor (e.g. Notepad).</p>');
define('STRING_FOUND', 'Found ');
define('STRING_NO_MATCHES_FOUND', 'No matches found');
define('STRING_PRODUCTS', 'product(s)');
define('STRING_ORDER_ID', 'Order ID');
define('STRING_ORDER_PLACED', '<div align="center"><h1>Thank you for you order!</h1><h3>We will contact you as soon as possible.</h3></div>');
define('STRING_PLACE_ORDER', 'Place order!');
define('STRING_NEXT', 'next');
define('STRING_PREVIOUS', 'prev');
define('STRING_SHOWALL', 'show all');
define('STRING_REQUIRED', '<font color=red>*</font> required');
define('STRING_CONTACT_INFORMATION', 'CONTACT INFORMATION');

define('CART_CONTENT_EMPTY', '(no items)');
define('CART_CONTENT_NOT_EMPTY', 'item(s): ');
define('CART_TITLE', 'My shopping cart');
define('CART_CLEAR', 'clear');
define('CART_PROCEED_TO_CHECKOUT', 'Proceed to checkout');
define('CART_EMPTY', 'Shopping cart is empty');

//table titles

define('TABLE_PRODUCT_NAME', 'Product name');
define('TABLE_PRODUCT_QUANTITY', 'Quantity');
define('TABLE_PRODUCT_COST', 'Cost');
define('TABLE_TOTAL', 'Total:');
define('TABLE_ORDER_TIME', 'Order time');
define('TABLE_ORDERED_PRODUCTS', 'Ordered products');
define('TABLE_ORDER_TOTAL', 'Order total');
define('TABLE_CUSTOMER', 'Customer');

//different admin strings

define('ADMIN_TITLE', 'Administrative tools');

define('ADMIN_WELCOME', '<p><font class=big>Welcome to the administrative back end!</font><p>Please use navigation menu to access administrative departments.');
define('ADMIN_NEW_ORDERS', 'New orders');
define('ADMIN_CATEGORIES_PRODUCTS', 'Categories and products');
define('ADMIN_CATALOG', 'Catalog');
define('ADMIN_SETTINGS', 'Configuration');
define('ADMIN_SETTINGS_GENERAL', 'General settings');
define('ADMIN_SETTINGS_APPEARENCE', 'Appearance');
define('ADMIN_CUSTOMERS_AND_ORDERS', 'Orders');
define('ADMIN_ABOUT_PAGE', 'About us');
define('ADMIN_SHIPPING_PAGE', 'Shipping and delivery');
define('ADMIN_AUX_INFO', 'Auxiliary information');
define('ADMIN_PAYPAL_INTEGRATION', 'Enable PayPal integration<br>(when enabled, customer will be offered to pay <br>by PayPal on the last step of checkout)');
define('ADMIN_PAYPAL_EMAIL', 'Your PayPal account email address<br>(leave blank if PayPal integration is disabled)');
define('ADMIN_BACK_TO_SHOP', 'go to front-end ...');
define('ADMIN_SORT_ORDER', 'Sort order');
define('ADMIN_LOGIN_PASSWORD', 'Admin login/password');
define('ADMIN_CHANGE_LOGINPASSWORD', 'Change administrator login and password');
define('ADMIN_CURRENT_LOGIN', 'Login');
define('ADMIN_OLD_PASS', 'Current password');
define('ADMIN_NEW_PASS', 'New password');
define('ADMIN_NEW_PASS_CONFIRM', 'Confirm new password');
define('ADMIN_UPDATE_SUCCESSFUL', '<font color=blue><b>Update successful!</b></font>');
define('ADMIN_NO_SPECIAL_OFFERS', 'No special offers selected');
define('ADMIN_ADD_SPECIAL_OFFERS', 'Add to special offers list');
define('ADMIN_SPECIAL_OFFERS_DESC', 'Special offers are shown at the front-end homepage.<br>
You may select special offers in the <a href="admin.php?dpt=catalog&sub=products_categories">"Categories and products"</a>,<br>
by clicking <img src="images/admin_special_offer.gif" border=0> in the products table.<br>
You can only select products with a picture uploaded to the special offers list.');
define('ADMIN_ROOT_WARNING', '<font color=red>All products in the root directory are not shown to users!</font>');
define('ADMIN_ABOUT_PRICES', '<font class=small>// prices are actual for the time of the order //</font>');
define('ADMIN_SHOP_NAME', 'Store name');
define('ADMIN_SHOP_URL', 'Store URL');
define('ADMIN_SHOP_EMAIL', 'General contact email address');
define('ADMIN_ORDERS_EMAIL', 'Order notifications email');
define('ADMIN_SHOW_ADD2CART', 'Enable shopping cart facility<br>(uncheck to completely disable ordering feature)');
define('ADMIN_SHOW_BESTCHOICE', 'Show highest rated subcategories\' products in empty categories');
define('ADMIN_MAX_PRODUCTS_COUNT_PER_PAGE', 'Maximum products count per page');
define('ADMIN_MAX_COLUMNS_PER_PAGE', 'Maximum columns per page');
define('ADMIN_MAIN_COLORS', 'Colors used for tables and forms drawing (e.g. checkout form, shopping cart form, price list)');
define('ADMIN_COLOR', 'Color');
define('ADMIN_SPECIAL_OFFERS', 'Special offers');
define('ADMIN_CATEGORY_TITLE', 'Categories');
define('ADMIN_CATEGORY_NEW', 'Create new category');
define('ADMIN_CATEGORY_PARENT', 'Parent:');
define('ADMIN_CATEGORY_MOVE_TO', 'Move to:');
define('ADMIN_CATEGORY_NAME', 'Category name:');
define('ADMIN_CATEGORY_LOGO', 'Logo:');
define('ADMIN_CATEGORY_ROOT', 'Root');
define('ADMIN_CATEGORY_DESC', 'Description');
define('ADMIN_PRODUCT_TITLE', 'Products');
define('ADMIN_PRODUCT_NEW', 'Create new product');
define('ADMIN_PRODUCT_CODE', 'Product code');
define('ADMIN_PRODUCT_NAME', 'Product name');
define('ADMIN_PRODUCT_RATING', 'Rating');
define('ADMIN_PRODUCT_PRICE', 'Price');
define('ADMIN_PRODUCT_LISTPRICE', 'List price');
define('ADMIN_PRODUCT_INSTOCK', 'In stock');
define('ADMIN_PRODUCT_PICTURE', 'Picture');
define('ADMIN_PRODUCT_THUMBNAIL', 'Thumbnail');
define('ADMIN_PRODUCT_BIGPICTURE', 'Enlarged picture');
define('ADMIN_PRODUCT_DESC', 'Description');
define('ADMIN_PRODUCT_BRIEF_DESC', 'Brief description');
define('ADMIN_PRODUCT_SOLD', 'Sold');
define('CUSTOMER_EMAIL', 'Email:');
define('CUSTOMER_FIRST_NAME', 'First name:');
define('CUSTOMER_LAST_NAME', 'Last name:');
define('CUSTOMER_COUNTRY', 'Country:');
define('CUSTOMER_ZIP', 'Zip code:');
define('CUSTOMER_STATE', 'State:');
define('CUSTOMER_CITY', 'City:');
define('CUSTOMER_ADDRESS', 'Address:');
define('CUSTOMER_PHONE_NUMBER', 'Phone number:');

define('ADMIN_PICTURE_NOT_UPLOADED', '(picture not uploaded)');


//errors

define('ERROR_FAILED_TO_UPLOAD_FILE', '<b><font color=red>Failed to upload file to the server. Make sure server allows you to write files on it</font></b>');
define('ERROR_CANT_FIND_REQUIRED_PAGE', 'Sorry, but requested page was not found of the server');
define('ERROR_INPUT_EMAIL', 'Please input your email address');
define('ERROR_INPUT_NAME', 'Please input your name');
define('ERROR_INPUT_COUNTRY', 'Please input country');
define('ERROR_INPUT_CITY', 'Please input city');
define('ERROR_INPUT_ZIP', 'Please input ZIP');
define('ERROR_INPUT_STATE', 'Please input state');
define('ERROR_FILL_FORM', 'Please fill in all fields in the form');
define('ERROR_WRONG_PASSWORD', 'Invalid password specified');
define('ERROR_PASS_CONFIRMATION', 'Invalid password confirmation');

//questions

define('QUESTION_DELETE_PICTURE', 'Delete picture?');
define('QUESTION_DELETE_CONFIRMATION', 'Delete?');

//emails
define('EMAIL_ADMIN_ORDER_NOTIFICATION_SUBJECT', 'New order!');
define('EMAIL_CUSTOMER_ORDER_NOTIFICATION_SUBJECT', 'Your order');
define('EMAIL_MESSAGE_PARAMETERS', 'Content-Type: text/plain; charset="'.DEFAULT_CHARSET.'"');
define('EMAIL_HELLO', 'Hello');
define('EMAIL_SINCERELY', 'Sincerely');
define('EMAIL_THANK_YOU_FOR_SHOPPING_AT', 'Thank you for shopping at');
define('EMAIL_ORDER_WILL_BE_SHIPPED_TO', 'Your order will be shipped to');
define('EMAIL_OUR_MANAGER_WILL_CONTACT_YOU', 'We will contact you as soon as possible.');

//warnings

define('WARNING_DELETE_INSTALL_PHP', 'File <b>install.php</b> exists in the Shop-Script root folder. Please delete it.<br>');
define('WARNING_DELETE_FORGOTPW_PHP', 'File <b>forgot_password.php</b> exists in the Shop-Script root folder. Please delete it.<br>');
define('WARNING_WRONG_CHMOD', 'Wrong file access permissions for folder cfg, its content and folders products_pictures, templates_c (or these folers does not exist). Please set (enable) write permissions for these folders and files to make them rewritable.');

//currencies

define('ADMIN_CURRENCY', 'Currency');
define('ADMIN_CURRENCY_ID_LEFT', 'Currency left symbol<br>(shown left to the price value)');
define('ADMIN_CURRENCY_ID_RIGHT', 'Currency right symbol<br>(shown right to the price value)');
define('ADMIN_CURRENCY_ISO3', 'Currency ISO3 code<br>(e.g. USD, EUR, GBP)');

?>