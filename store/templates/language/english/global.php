<?php

/*+++++++++++++++++++++++++++++++++++++++++++++

  Script: Maian Cart v2.0
  Programmed & Designed by: David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Software Website: http://www.maiancart.com
  Script Portal: http://www.maianscriptworld.co.uk

  +++++++++++++++++++++++++++++++++++++++++++++
  
  This File: global.php
  Description: English Language File

  +++++++++++++++++++++++++++++++++++++++++++++*/


/*---------------------------------------------
  CHARACTER SET
  For encoding HTML characters
  Unless specified, this does not need altering
----------------------------------------------*/


$charset                   = 'iso-8859-1'; // Main HTML charset..
$mail_charset              = 'iso-8859-1'; // E-mail header charset..


/*-----------------------------
  GENERAL LANGUAGE VARIABLES
-------------------------------*/


$msg_script                = 'Maian Cart';
$msg_script2               = 'v2.0';
$msg_script3               = 'Powered by';
$msg_script4               = 'All Rights Reserved';
$msg_script5               = 'Yes';
$msg_script6               = 'No';
$msg_script7               = 'Administration';
$msg_script8               = 'Close';
$msg_script9               = 'Edit';
$msg_script10              = 'Delete';
$msg_script11              = 'Cancel';
$msg_script12              = 'Report';
$msg_script13              = 'First Page';
$msg_script14              = 'Second Page';
$msg_script15              = 'None';
$msg_script16              = 'Installation Folder (<b>/install/</b>) should be renamed or removed..';
$msg_script17              = 'Default cookie name must be changed in "<b>control/connect.inc.php</b>" file..';
$msg_script18              = 'Default secret key must be changed in "<b>control/connect.inc.php</b>" file..';
$msg_script19              = 'You have enabled search engine friendly urls in the settings, but have <b>not</b> read the documentation correctly as the .htaccess file required does not exist. Please refer to the <a href="docs/install-3.html">instructions</a> in the documentation.';
$msg_script20              = 'Page Not Found';
$msg_script21              = 'Data received from payment system:';
$msg_script22              = 'Moneybookers';
$msg_script23              = 'Print';
$msg_script24              = 'Click links for more information..';
$msg_script25              = 'Latest "{category}" products @ {website_name}';
$msg_script26              = 'Completed';
$msg_script27              = 'Pending';
$msg_script28              = 'Refunded';
$msg_script29              = 'Unknown Status';
$msg_script30              = 'Currencies Updated on '.date('j F Y @ H:i:s');
$msg_script31              = 'Latest Products @ {website_name}';
$msg_script32              = 'Special Offers @ {website_name}';
$msg_script33              = 'Paypal';
$msg_script34              = '2Checkout';
$msg_script35              = 'Google Checkout';
$msg_script36              = 'Phone Order';
$msg_script37              = 'Payment by Cheque/Check';
$msg_script38              = 'Cash on Delivery';
$msg_script39              = 'Alert Pay';
$msg_script40              = 'KG';
$msg_script41              = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
$msg_script42              = 'Offline: ';
$msg_script43              = 'Before';
$msg_script44              = 'After';
$msg_script45              = 'Bank Transfer';
$msg_script46              = 'Return to Top of Page';
$msg_script47              = 'Bytes';
$msg_script48              = 'You have enabled the auto zipping option in the settings, but the <a href="http://php.net/manual/en/book.zip.php" onclick="window.open(this);return false">zip functions</a> are NOT installed or enabled on your server. OR your server does not have access to the <a href="http://www.php.net/manual/en/class.ziparchive.php" onclick="window.open(this);return false">ZipArchive class</a>. PHP5+ or higher is required.<br /><br /><a href="http://www.php.net/manual/en/zip.installation.php" onclick="window.open(this);return false">Enable zip functions</a> or disable in settings.';
$msg_script49              = 'You have enabled <a href="http://www.paypal.com" onclick="window.open(this);return false">Paypal</a> as a payment option, but the <a href="http://php.net/manual/en/book.curl.php" onclick="window.open(this);return false">CURL</a> functions required to handle Paypal`s gateway responses is NOT installed or enabled on your server.<br /><br /><a href="http://www.php.net/manual/en/curl.installation.php" onclick="window.open(this);return false">Enable the CURL functions</a> or disable Paypal in admin area.';
$msg_script50              = 'Your installed PHP version is too old to run this software. Please upgrade your version of PHP to at least v4.3. Your current version is: <b>'.phpversion().'</b>';
$msg_script51              = 'Graph Rendering';
$msg_script52              = 'You have elected to log gateway responses, but the following folder either does not exist or is not writeable.<br /><br /><b>{folder}</b><br /><br />This folder MUST exist in the root of your store installation.';
$msg_script53              = 'DELETED ITEM';
$msg_script54              = 'System';
$msg_script55              = 'Follow Us on Facebook';
$msg_script56              = 'Follow Us on Twitter';
$msg_script57              = 'You have enabled error logging but the "error-log" directory does not exist or is not writeable. You should read the <a href="install-2.html">docs</a> for assistance.';
$msg_script58              = 'Unknown';
$msg_script59              = 'Free Download Order';
$msg_script60              = 'For security it is important you rename or remove the "install" directory.<br /><br />Re-running the installer could result in your store data being wiped out.';
$msg_script61              = array('Code','Error','File','Line'); // For mysql errors..
$msg_script62              = 'You have enabled <a href="http://checkout.google.co.uk/" onclick="window.open(this);return false">Google Checkout</a> as a payment option but have not enabled the SSL option in your administration area. To use Google Checkout your server MUST have a SSL certificate installed. See the Google Checkout info in the <a href="docs/payment-3.html">docs</a>.<br /><br />If an <a href="http://en.wikipedia.org/wiki/Secure_Sockets_Layer" onclick="window.open(this);return false">SSL</a> connection is not an option, please disable Google Checkout.';
$msg_script63              = 'Cancelled';
$msg_script64              = 'Despatched';
$msg_script65              = 'Moneybookers is enabled, but no countries exist in the database. Countries must be available for Moneybookers checkout.';
$msg_script66              = 'BB Code';
$msg_script67              = '[{website}] MySQL Backup File for {date}/{time}';
$msg_script68              = 'Preview';
$msg_script69              = 'Preview not available.';
$msg_script70              = 'Previous';
$msg_script71              = 'Next';
$msg_script72              = array('Mon','Tue','Wed','Thur','Fri','Sat','Sun');
$msg_script73              = array('Sun','Mon','Tue','Wed','Thur','Fri','Sat');
$msg_script74              = 'Awaiting Despatch';
$msg_script75              = 'Other Pages';


/*------------------------------------------------------------------------------------------------------
  JAVASCRIPT CALENDAR LOCALE
  Javascript arrays. Square brackets are important, do NOT remove these.
  
  Default is English. 
  If changing to foreign locale, set $msg_cal7 to 'yes' after translation
--------------------------------------------------------------------------------------------------------*/


$msg_cal                   = '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"]';
$msg_cal2                  = '["Sun","Mon","Tue","Wed","Thu","Fri","Sat","Sun"]';
$msg_cal3                  = '["Su","Mo","Tu","We","Th","Fr","Sa","Su"]';
$msg_cal4                  = '["January","February","March","April","May","June","July","August","September","October","November","December"]';
$msg_cal5                  = '["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]';
$msg_cal6                  = 'WK';  
$msg_cal7                  = 'no'; // Use above locale? If no, uses default = English


/*--------------------
  BB Code Related
----------------------*/


$msg_bbcode                = 'BB Code Formatting';
$msg_bbcode2               = 'BB Code is a collection of formatting tags that are used to change the look of text. BB Code is based on a similar principal to HTML. Below is a list of all the available BB Codes and instructions on how to use them in this software. Nesting of tags is allowed and tags can be upper or lowercase. Style data can also be changed via the main store stylesheet.';
$msg_bbcode3               = 'Bold Text';
$msg_bbcode4               = 'Underlined Text';
$msg_bbcode5               = 'Italic Text';
$msg_bbcode6               = 'Strike-Through Text';
$msg_bbcode7               = 'Deleted Text';
$msg_bbcode8               = 'Inserted Text';
$msg_bbcode9               = 'Emphasised Text';
$msg_bbcode10              = 'Red Text';
$msg_bbcode11              = 'Blue Text';
$msg_bbcode12              = 'Heading 1 Text';
$msg_bbcode13              = 'Heading 2 Text';
$msg_bbcode14              = 'Heading 3 Text';
$msg_bbcode15              = 'Heading 4 Text';
$msg_bbcode16              = 'BB Code Usage &amp; Examples';
$msg_bbcode17              = 'Hyperlinks and Images';
$msg_bbcode18              = 'Lists';
$msg_bbcode19              = 'Nesting Tags';
$msg_bbcode20              = 'Bullet List Item';
$msg_bbcode21              = 'Numbered List Item';
$msg_bbcode22              = 'Alpha List Item';
$msg_bbcode23              = 'Bold, Underlined Text';
$msg_bbcode24              = 'Bold, Underlined Blue Text';
$msg_bbcode25              = 'Return to Payment Method';
$msg_bbcode26              = 'Click to E-Mail Me';
$msg_bbcode27              = 'New tab/window';
$msg_bbcode28              = 'Media Tags';
$msg_bbcode29              = 'Video Display';
$msg_bbcode30              = 'MP3 Player Display';
$msg_bbcode31              = 'Centre Text';


/*-----------------------------------------------------------------------------------------------------
  JAVASCRIPT VARIABLES
  IMPORTANT: If you want to use apostrophes in these variables, you MUST escape them with 3 backslashes
             Failure to do this will result in the script malfunctioning on javascript code.
  EXAMPLE: d\\\'apostrophe
  
  Alternatively use double quotes where possible.
------------------------------------------------------------------------------------------------------*/


$msg_javascript            = 'Are you sure?';
$msg_javascript2           = 'Help/Information';
$msg_javascript3           = 'The name of your website';
$msg_javascript4           = 'Your main e-mail address. For e-mail notifications. This address also appears as the reply-to e-mail address in e-mails.';
$msg_javascript5           = 'The url to your cart installation. NO trailing slash. Example:<br /><br /><b>http://www.yoursite.com/cart</b><br /><br />Replace the path with your own path and domain. The script will attempt to complete this on installation.';
$msg_javascript6           = 'Do you wish to enable this page?';
$msg_javascript7           = 'Default meta keywords. This can be also be set on a per category/product basis.';
$msg_javascript8           = 'Default meta description. This can be also be set on a per category/product basis.';
$msg_javascript9           = 'Do you wish to enable the latest product, special offer &amp; category RSS feeds? Can be read in any feed reader.';
$msg_javascript10          = 'Do you wish to enable the search engine friendly urls? Your server MUST support .htaccess and mod_rewrite.';
$msg_javascript11          = 'Software Language Folder.';
$msg_javascript12          = 'Do you wish to enable your cart? Useful if you need to do site maintenance.';
$msg_javascript13          = 'Enter your paypal business, premier or sandbox e-mail address.';
$msg_javascript14          = 'Specify processing currency. This is always the currency payments are processed in regardless of the currency conversion feature.';
$msg_javascript15          = 'Paypal lets you create a page style. If you have one that you wish to load for cart payments, specify its name here. Page styles are created in your Paypal account area. If unsure, leave blank.';
$msg_javascript16          = 'Which mode do you want to enable? "Test" is for testing ONLY and will not take live payments from your bank. This should be the default until you are sure your store is working.<br /><br />IMPORTANT: For AlertPay you MUST enable test/live mode via your AlertPay account area.';
$msg_javascript17          = 'Your company name';
$msg_javascript18          = 'Your company website';
$msg_javascript19          = 'Your company telephone number';
$msg_javascript20          = 'Your company fax number';
$msg_javascript21          = 'Your company address';
$msg_javascript22          = 'Do you wish to enable SMTP for sending mail? Some servers require this. Authentication is also required for some servers. If the mail is working fine, leave this disabled.<br /><br /><b>Note:</b> If you plan on using the attachment option with order updates, this MUST be enabled!';
$msg_javascript23          = 'Your SMTP username. Usually your e-mail address. Check with your host if you aren`t sure.';
$msg_javascript24          = 'Your SMTP password.';
$msg_javascript25          = 'Enter SMTP port number. Usually 25 or 26. You may also be able to use the submission port, ie: 587. Check with your host if you aren`t sure.';
$msg_javascript26          = 'Add Product';
$msg_javascript27          = 'Manage Products';
$msg_javascript28          = 'Manage Pictures';
$msg_javascript29          = 'Discount Coupons';
$msg_javascript30          = 'Currency Converter';
$msg_javascript31          = 'Shipping Countries';
$msg_javascript32          = 'Shipping Zones';
$msg_javascript33          = 'Rates';
$msg_javascript34          = 'Tools';
$msg_javascript35          = 'Import Routines';
$msg_javascript36          = 'Contact Buyers';
$msg_javascript37          = 'Logout';
$msg_javascript38          = 'Your SMTP host. Usually "localhost" or your server IP address.';
$msg_javascript39          = 'Enter new category name. Max 250 chars.';
$msg_javascript40          = 'Is this a new parent category or a sub category of another parent or child?';
$msg_javascript41          = 'Meta keywords for this category. If blank defaults to settings meta keys.';
$msg_javascript42          = 'Meta description for this category. If blank defaults to settings meta description.';
$msg_javascript43          = 'Do you want to enter a description or comments for this category? This might be brief details about the products in this category. Leave blank for no description. Use BB Code for formatting if enabled, HTML is not allowed.';
$msg_javascript44          = 'Do you want to enable this category? Useful if you have no products in stock in this category.<br /><br />Note that disabling a parent category will also disable its children.';
$msg_javascript45          = 'Confirm action..\n\nAre you sure?';
$msg_javascript46          = 'Delete parent category..\n\nThis will clear all data associated with this category including child categories, products and images...\n\nAre you sure?';
$msg_javascript47          = 'Enter zone name. Max 250 chars.';
$msg_javascript48          = 'Does a tax rate apply to customers in this shipping zone? This is applicable to all areas in this zone and will be applied to the cart total.<br /><br />Set to 0 for no rate.';
$msg_javascript49          = 'If a tax rate is specified, should this rate also be applied to the shipping? If yes, total is total+shipping+rate. If no, total is total+rate+shipping.';
$msg_javascript50          = 'Specify the start weight. This can be any kind of weight band, but must match your product weight. For example, if your products are in grammes, use a gramme range. ie: 0 to 1000. No commas or period symbols.';
$msg_javascript51          = 'Specify the end weight. This can be any kind of weight band, but must match your product weight. For example, if your products are in grammes, use a gramme range. ie: 0 to 1000. No commas or period symbols.';
$msg_javascript52          = 'Specify the cost of shipping in this weight band. No currency symbol. ie: 9.99 (NO commas)';
$msg_javascript53          = 'Specify the service this rate applies to. Use the checkboxes to batch add rates to multiple services if in add mode. If in edit mode, use select option.';
$msg_javascript54          = 'Product Attributes';
$msg_javascript55          = 'Enter campaign name. You can view an overview of each campaign to see how many coupon codes have been used. Max 250 chars.';
$msg_javascript56          = 'Enter coupon code. This is the code a visitor enters to receive discount. Alphanumeric codes (letters/numbers) are recommended. Max 50 chars.';
$msg_javascript57          = 'This is the amount a customer must spend before they can apply a coupon code from this campaign.<br /><br /><b>NOTE: This does not apply if the Free Shipping or No Tax discounts are utilised</b>.<br /><br />Discount applies to total only, not shipping rate. Example:<br /><br /><b>9.99</b><br /><br />Set to 0 for no minimum amount. It is recommended you set a minimum spend amount.';
$msg_javascript58          = 'How many times can this discount coupon code be used? Enter 0 for unlimited or specify amount.';
$msg_javascript59          = 'Enter discount amount. This can be any of the following:<br /><br /><b>2.99</b> - (Fixed Amount Discount)<br /><b>5%</b> - (Percentage Discount)<br /><b>freeshipping</b> - (Offers Free Shipping ONLY)<br /><b>notax</b> - (Offers No Tax Payment ONLY)<br /><br />Fixed &amp; percentage discounts apply to total only, not shipping or tax. A value must be entered in this field.';
$msg_javascript60          = 'Update Prices';
$msg_javascript61          = 'Update Stock Levels';
$msg_javascript62          = 'Special Offers';
$msg_javascript63          = 'Do you want to enable coupons in this campaign? This is an easy way of stopping discounts in a campaign without deleting the campaign.';
$msg_javascript64          = '';
$msg_javascript65          = 'Specify if products are to be omitted from this offer. Once a product is added to an offer it will disappear from this list.';
$msg_javascript66          = 'Enter expiry date for this special offer. If no expiry is desired, leave blank. Click box to view calendar.';
$msg_javascript67          = 'Enter information about this payment method. This is a clickable option for visitors on the checkout page to see more info on this payment method. Use BB Code for formatting if enabled, HTML is not allowed.';
$msg_javascript68          = 'Specify product code. A tick or a cross will appear when you start typing. A tick indicates the code is unique, a cross indicates a product is already using that code.';
$msg_javascript69          = 'Specify your product name. Max 250 chars.';
$msg_javascript70          = 'Specify the categories for this product if applicable. Products can appear in multiple categories if required.';
$msg_javascript71          = 'Enter your products full description. This is the description shown on the product page. Use BB Code for formatting if enabled, HTML is not allowed.<br /><br />Use the copy option for quickness if you want to use some of the short description text if any exists.';
$msg_javascript72          = 'Is this a downloadable product? ie, after payment can the buyer download this product to their computer.';
$msg_javascript73          = 'Enter local file/folder name or http location/ftp link to downloadable file if remotely hosted. Click "View Local Files" to load local files.';
$msg_javascript74          = 'How many times can this product be downloaded? Set to 0 for unlimited.';
$msg_javascript75          = 'Enter product code. Max 250 chars.';
$msg_javascript76          = 'Enter product tags. This is optional. These are keywords relating to this product. Separate tags with a comma. Example:<br /><br /><b>shoes,ladies shoes,high heels</b><br /><br />Use the links to copy the keywords over to the tags field for quickness or to create tags from the description text.';
$msg_javascript77          = 'Do you wish to enable this product initially? If no, it will not be viewable to the public. This enables you to add a product with attributes and pictures before enabling it.';
$msg_javascript78          = 'Product meta keywords. For search engines. If left blank, defaults to category keywords. Keywords should be separated with a comma.';
$msg_javascript79          = 'Product meta description. For search engines. If left blank, defaults to category description.';
$msg_javascript80          = 'Do you wish to enable low stock notification? When this product or any attribute associated with this product reaches a specified level, you will receive an e-mail. Set to 0 for no notification. ';
$msg_javascript81          = 'Enter attribute name.';
$msg_javascript82          = 'Enter product weight. This can be any kind of weight band, but must match your product weight. For example, if your products are in grammes, use a gramme range. ie: 0 to 1000. No commas or period symbols.<br /><br />For downloadable product, set to 0. If weight is entered and product is downloadable, this is ignored.';
$msg_javascript83          = 'Enter stock level. For a downloadable item, enter a really high amount. Max 9999999. Or set the system to not reduce stock on downloadable items on the global payment settings page.<br /><br />By default the system will NOT reduce stock on downloadable items.';
$msg_javascript84          = 'View Sales';
$msg_javascript85          = 'Delete product..\n\n&quot;{product}&quot;\n\nNote that this does not remove images and/or mp3 files in case they are being used elsewhere.\n\nAre you sure?';
$msg_javascript86          = 'Locate your image file. Recommended sizes are around 150KB. Images that are too big will take longer to upload and also take longer to load on your website.<br /><br />Please resize your image to 800 x 640 @ 90 dpi before upload for best performance.<br /><br />Supported formats: JPG&nbsp;&nbsp;/&nbsp;&nbsp;JPEG&nbsp;&nbsp;/&nbsp;&nbsp;PNG&nbsp;&nbsp;/&nbsp;&nbsp;GIF';
$msg_javascript87          = 'Specify price adjustment. This can be a set amount or a percentage. ie: 9.99 or 10%. No currency symbol for price and NO commas. Note that for <b>fixed</b> adjustment type, price must be specified.';
$msg_javascript88          = 'Please choose:<br /><br /><b>Increase or Decrease</b> - Takes existing price/rate and increases or decreases price/rate by amount specified.<br /><br /><b>Fixed</b> - A new fixed price.';
$msg_javascript89          = 'Specify which category this applies to.';
$msg_javascript90          = 'Do you only want to apply the update to products that were added between a certain date? Both dates must be specified.';
$msg_javascript91          = 'If you set special offers for the products in the selected category, do you wish to clear these offers when you update the prices?';
$msg_javascript92          = 'Do you wish to omit prices between a certain range? Both prices must be set. No currency symbol. ie: 9.99. NO Commas';
$msg_javascript93          = 'Enter stock level adjustment amount. Must be integer. ie: 5,10,20';
$msg_javascript94          = 'Do you wish to decrease or increase the stock with the new amount or add a new fixed amount?';
$msg_javascript95          = 'Specify which category this applies to.';
$msg_javascript96          = 'Do you wish to omit products between a certain stock range? Both ranges must be set.';
$msg_javascript97          = 'Logout and terminate session..\n\nAre you sure?';
$msg_javascript98          = 'Other information you wish to appear at the footer of invoices and packing slips. This might be your V.A.T or Company number. HTML may be used here if you wish.';
$msg_javascript99          = 'Entry Log';
$msg_javascript100         = 'Services';
$msg_javascript101         = 'Enter new service name. Max 250 chars. UK examples:<br /><br />First Class Royal Mail<br />Second Class Royal Mail<br />Standard Parcels<br />International Signed For<br />City Link Parcel Courier';
$msg_javascript102         = 'This is the estimated delivery time. Examples:<br /><br />1 Day<br />3 Days<br />Next Day Delivery<br /><br />Max 250 chars.';
$msg_javascript103         = 'Specify whether a signature is required on delivery for this service. If you aren`t sure, check with your mail provider.';
$msg_javascript104         = 'Specify the zone(s) this services applies to. Use the checkboxes to batch add service to multiple zones if in add mode. If in edit mode, use select option.';
$msg_javascript105         = 'Do you wish to copy additional data from the original product to this new product?';
$msg_javascript106         = 'General Settings';
$msg_javascript107         = 'Enter tax rate for increase, decrease or fixed adjustment. NO percentage symbol.';
$msg_javascript108         = 'Search Log';
$msg_javascript109         = 'Do you wish to enable the admin entry log? Can be a useful security feature. You can omit specified users from being logged if you wish.';
$msg_javascript110         = 'If you have a related product video, specify the video file here. Video files must be uploaded into the <b>templates/video/</b> folder and be FLV (Flash Video) format ONLY!';
$msg_javascript111         = 'Search Sales';
$msg_javascript112         = 'For quickness, zone areas can be batch added from a text file. Text file must contain a single entry per line. UK example might be Counties:<br /><br />Derbyshire<br />Staffordshire<br />West Midlands';
$msg_javascript113         = 'Which Countries does this zone apply to?';
$msg_javascript114         = 'Enter the cost of this product. No currency symbol. NO Commas. Examples:<br /><br />9.99<br />220.99<br />2345.99<br /><br />If this is a downloadable item it can be a free product by specifying 0.00';
$msg_javascript115         = 'Error - A problem occured updating your basket. Please wait a few moments and then try again..';
$msg_javascript116         = 'Please select a shipping zone/area in "{country}"'.defineNewline().defineNewline().'If yours is not listed, please contact us.';
$msg_javascript117         = 'Sorry, there are currently no shipping options. Please contact us.';
$msg_javascript118         = 'Sorry, there are currently no shipping options for {region} in {country}. Please contact us.';
$msg_javascript119         = '<span class="change"><a href="#" title="Cancel" onclick="reloadShippingSelectors();return false">Change Selection</a></span>&lt; Shipping options available for: <span class="selection">{region} / {country}</span> &gt;';
$msg_javascript120         = 'Est Delivery Time: <b>{time}</b> / Signature Required: <b>{sig}</b>';
$msg_javascript121         = 'Delete Product from Basket?';
$msg_javascript122         = 'Are you sure you want to clear your basket?';
$msg_javascript123         = 'Error - Stock Level Exceeded!';
$msg_javascript124         = 'Loading';
$msg_javascript125         = 'Is this correct?\n\nClick "OK" to proceed"';
$msg_javascript126         = 'Error - Coupon code invalid or has expired!';
$msg_javascript127         = 'Error - You must spend a minimum of {amount} before using this code!';
$msg_javascript128         = 'Error - Cart total too low to apply this coupon code. Add more items!';
$msg_javascript129         = 'Export Sales';
$msg_javascript130         = 'Attach any file to this update. This is sent to the recipients mailbox along with the message as a standard e-mail attachment.<br /><br />Take into account that certain files are blocked by mail programs. PDF or ZIP format is recommended.';
$msg_javascript131         = 'Specify the new status for this order. Order would ideally be pending until all goods have been received or shipped.';
$msg_javascript132         = 'Do you wish to save the attached files (if any) to your server as a backup?';
$msg_javascript133         = 'If you have elected to save the attachments, specify which folder to save to. Create new folders inside the "admin/attachments" folder and give them write permissions.<br /><br />Or click the button to add a new folder! Note that folders must be removed manually.';
$msg_javascript134         = 'Export Buyers';
$msg_javascript135         = 'Specify export range';
$msg_javascript136         = 'Specify optional purchase date range. If left blank, all sales are exported.';
$msg_javascript137         = 'Specify data seperator. This is usually a comma, but can be any character type.';
$msg_javascript138         = 'If you only want to export buyers who bought from certain categories, specify category filter. Use the checkboxes to make your selections. If no selections are made, all buyers are exported.';
$msg_javascript139         = 'Enter export format. One entry is exported per line. Use %name% and %email% respectively for data and enter as required by your mail software. Examples:<br /><br />%name%,%email%<br />"%name%" <%email%><br /><br />Variables will be replaced with actual data on export.';
$msg_javascript140         = 'Statistics';
$msg_javascript141         = 'Close Window';
$msg_javascript142         = 'Re-activate Downloads..\n\nAre you sure?';
$msg_javascript143         = 'Do you wish to log payment system responses? This can be useful for debugging problems. Log folder directory must exist and be writeable.';
$msg_javascript144         = 'Do you wish to enable SSL? Enable this ONLY if you have a SSL certificate installed on your server.<br /><br />This prevents return urls from displaying an insecure connection error to visitors.';
$msg_javascript145         = 'Please select at least 1 download to re-activate';
$msg_javascript146         = 'If you only want to export buyers from certain countries use this filter. If no filter is specified, buyers from all countries are exported.';
$msg_javascript147         = 'This option enables you to include refunded buyers with your export.';
$msg_javascript148         = 'Use this option to only export sales for specified payment methods.';
$msg_javascript149         = 'If you only want to export sales where buyers bought from certain countries use this filter. If no filter is specified, buyers from all countries are exported.';
$msg_javascript150         = 'The header includes the field names for each column. ie: invoice,product,price..etc<br /><br />You can omit this during import if you wish.';
$msg_javascript151         = 'This is how many times this product has been viewed. Usually starts at 0, but can be reset to anything.';
$msg_javascript152         = 'Enter Alphanumeric Folder Name (Max 20)';
$msg_javascript153         = 'An error occured creating this folder. Check the "admin/attachments/" directory exists and has write permissions then try again. If this persists, create the folder manually!';
$msg_javascript154         = 'Folder Created!';
$msg_javascript155         = 'This attachment was not saved!';
$msg_javascript156         = 'Please include some update text and a email subject..';
$msg_javascript157         = 'Categories';
$msg_javascript158         = 'Brands';
$msg_javascript159         = 'Enter single new brand name. Max 250 chars. Or use the batch option for multiple names.';
$msg_javascript160         = 'Do you want to enable this brand? Note this doesn`t disable products attached to this brand.';
$msg_javascript161         = 'Specify the categories for this brand. If this brand applies to multiple categories, use the checkboxes to make your selections.<br /><br />Once brands are added, each brand is a separate entity in its relevant category.';
$msg_javascript162         = 'If applicable, specify product brands. Products can be in multiple brands for different categories. If you have the same brand for parent and children categories, the product should have both brands specified.';
$msg_javascript163         = 'Sales Overview';
$msg_javascript164         = 'Hit Count Overview';
$msg_javascript165         = 'Reset ALL hits for ALL categories..\n\nAre you sure?';
$msg_javascript166         = 'Reset ALL hits for selected category..\n\nAre you sure?';
$msg_javascript167         = 'Clear Currency';
$msg_javascript168         = 'Payment Methods';
$msg_javascript169         = 'Enter instructions to buyer for this payment method. This is shown to buyers after a purchase is completed.<br /><br />Use BB Code for formatting if enabled, HTML is not allowed.';
$msg_javascript170         = 'Please select a payment method..';
$msg_javascript171         = 'Click to Continue with Order';
$msg_javascript172         = 'No quantities specified. Use the buttons to change quantities, then click "Add to Basket".';
$msg_javascript173         = 'Batch Update Rates';
$msg_javascript174         = 'Specify rate adjustment. This can be a set amount or a percentage for increases or decreases OR a fixed amount. Examples:<br /><br /><b>9.99 or 10% (For Increase or Decrease)<br />9.99 (Fixed)</b><br /><br />No currency symbol for price and NO commas.<br /><br />Note that for percentage based adjustments, amount entered is ALWAYS a percent. For example, if your percentage based rates are 10% and you enter 5.55, this would mean 5.55% and not 5.55 as a price.';
$msg_javascript175         = 'Specify which zones to apply this adjustment to. Use the checkboxes to make your selections.';
$msg_javascript176         = 'Must be greater than the longest line (in characters) to be found in the CSV file (allowing for trailing line-end characters).<br /><br />It became optional in PHP 5. Omitting this parameter (or setting it to 0 in PHP 5.0.4 and later) the maximum line length is not limited, which is slightly slower.<br /><br /><b>NO</b> commas or period symbols. Examples: 1000, 2000, 3000 etc<br /><br />Text &copy;PHP.net';
$msg_javascript177         = 'Set the field delimiter and field enclosure character. If left blank delimiter defaults to a comma.<br /><br />Fields are enclosed if the delimiter is found in the string to prevent premature end of delimiter. Example on comma delimited string:<br /><br /><b>0,1,"The delimiter is , a comma",2,3</b><br /><br />If left blank defaults to quotes (").';
$msg_javascript178         = 'Enter instructions to buyer for this payment method. This is shown to buyers in their confirmation e-mail.<br /><br />HTML is not recommended here unless you are using HTML formatted e-mails.';
$msg_javascript179         = 'Locate CSV file. Any file extension should work providing the formatting is correct within the file. CSV file <b>MUST</b> have a header row of column/field names.';
$msg_javascript180         = 'Please be patient while the CSV import process is working..\n\nIf you have a large file, this may take awhile, depending on your server and the resources available.\n\nClick "OK" to continue..';
$msg_javascript181         = 'When you run this import, do you want to clear existing attributes already in the database for the selected product?<br /><br /><b>WARNING! THIS IS NOT REVERSIBLE!!</b>';
$msg_javascript182         = 'When you run this import, do you want to clear existing products already in the database for the selected categories?<br /><br /><b>WARNING! THIS IS NOT REVERSIBLE!!</b>';
$msg_javascript183         = 'Specify your 2Checkout secret word. This is set in your 2Checkout account area.';
$msg_javascript184         = 'Enter 2Checkout account number';
$msg_javascript185         = 'Enable test or live mode. Ideally you keep this set to test until you are ready to go live with your store.';
$msg_javascript186         = 'This is your processing currency and determines what currency your prices are displayed in and what currency you process in.<br /><br /><b>Important: This currency should be supported by ALL payment systems you have enabled.</b><br /><br />Check the payment system websites to see which currencies are supported for each option.';
$msg_javascript187         = 'Enter your Google Production or Sandbox Merchant ID';
$msg_javascript188         = 'Enter your Google Production or Sandbox Merchant Key';
$msg_javascript189         = 'On your homepage, do you wish to show the latest products or random products? If random, product display changes with each browser refresh. Enter total of products to display.';
$msg_javascript190         = 'If you wish to display latest or random products only in specific categories, use the checkboxes to make your selections. If no categories are specified, ALL categories are assumed.';
$msg_javascript191         = 'If you wish to ONLY display certain products, enter product IDs separated with a comma. You can find the product ID in the Url. NOTE that if any product ID is specified, this overwrites random or latest display option above. Example:<br /><br />12,456,788<br /><br />Alternatively, use the "Get Products" option to load product IDs.';
$msg_javascript192         = 'Order Statuses';
$msg_javascript193         = 'Specify a new name for your status. 3 statuses already exist and cannot be removed, these are "Completed", "Refunded" &amp; "Pending". Max 200 chars.';
$msg_javascript194         = 'Does this order status apply to a specific payment method? If no, specify all payment methods.';
$msg_javascript195         = 'Enter your address..';
$msg_javascript196         = 'Please use buttons to adjust quantities..';
$msg_javascript197         = 'Move Products';
$msg_javascript198         = 'Manage New Pages';
$msg_javascript199         = 'Specify which folder to save images to for this product. Create new folders inside the "templates/products" folder and give them write permissions.<br /><br />Or click the button to add a new folder! Note that folders must be removed manually.';
$msg_javascript200         = 'Full server path to store folder. NO trailing slash. Examples:<br /><br />/home/server_name/public_html/store (<b>Unix Server</b>)<br />C:/store (<b>Windows Server</b>)<br /><br />This is NOT a http web path. The script will attempt to complete this on installation.';
$msg_javascript201         = 'An error occured creating this folder. Check the "templates/products" directory exists and has write permissions then try again. If this persists, create the folder manually!';
$msg_javascript202         = 'Enter a name for your new page. Max 250 chars.';
$msg_javascript203         = 'Meta data appears in the head tags of your page and is useful for search engines. This is optional.';
$msg_javascript204         = 'Enter text to appear on new page. Use BB Code for formatting if enabled, HTML is not allowed. Alternatively, you can simply enter a web url starting http:// for an external url.';
$msg_javascript205         = 'Source is the category where the products currently reside.';
$msg_javascript206         = 'Destination is the category you would like to move the products to.';
$msg_javascript207         = 'Would you like to move the source category product images to the destination category images folder? This is optional. Images will load fine in their current location and do not need to be moved if not required.';
$msg_javascript208         = 'This option enables you to easily replace the default storefront logo. Use the button to select a file from your computer. <br /><br />If you click the "Clear &amp; Reset" button, this will revert the system back to the default logo.<br /><br />Optimal size for logo in default layout is 263 x 69 pixels.';
$msg_javascript209         = 'AddThis is a free bookmarking/sharing service. Its an easy way for people to be able to share your pages with some of the social networking and bookmarking sites. This is a free service.<br /><br />To enable this option, sign up at http://www.addthis.com/ to get your code and paste into the box.';
$msg_javascript210         = 'Enter your own admin footer data. This will replace the default admin footer. This option is available when a licence has been paid. HTML may be used here if required.';
$msg_javascript211         = 'Enter your own front end (public) footer data. This will replace the default public footer. This option is available when a licence has been paid. HTML may be used here if required.';
$msg_javascript212         = 'Enter your daytime phone number..';
$msg_javascript213         = 'Close';
$msg_javascript214         = 'Free Local Pickup';
$msg_javascript215         = 'In person from our store';
$msg_javascript216         = 'Enter offer price if applicable. This should be less than your main product price. No currency symbol. NO Commas. Examples:<br /><br />9.99<br />220.99<br />2345.99';
$msg_javascript217         = 'Specify expiry date for offer if applicable. Click box to show calendar.';
$msg_javascript218         = 'Do you wish to omit any products from this adjustment? Products checked will NOT be updated.';
$msg_javascript219         = 'Processing..';
$msg_javascript220         = 'Products with 0 Qty will be removed from sales purchase when sale is updated.\n\nSet Qty back to ignore.';
$msg_javascript221         = 'Live payment url for Paypal. Unless updated by Paypal, this should NOT be changed. Note that the question mark is important!';
$msg_javascript222         = 'Sandbox payment url for Paypal. Unless updated by Paypal, this should NOT be changed. Note that the question mark is important!';
$msg_javascript223         = 'Set Paypal Locale below if required. This may be required if you want to force a language display when users switch to Paypal to pay. Example: <b>EN</b> = English.<br /><br />Refer to Paypal for correct locale codes. This is optional.';
$msg_javascript224         = 'Live/test payment url for 2Checkout. Unless updated by 2Checkout, this should NOT be changed.';
$msg_javascript225         = 'Specify log folder directory name if logging payment system responses. This must be writeable. Max 50 chars.';
$msg_javascript226         = 'Do you want to enable pickup/collection as a delivery option? There is no charge for this in the cart. This only appears if at least one shipping option exists. If no shipping options exist, free shipping is shown with no other options.';
$msg_javascript227         = 'If enabled, the default shipping country loads first when viewing shipping options for shopping basket.';
$msg_javascript228         = 'If your cart is disabled, you can specify to auto re-enable it on a certain date. Enter date for this option or leave blank to keep permanently disabled.';
$msg_javascript229         = 'If your cart is disabled, specify reason for it being disabled. This will be seen by visitors. Use BB Code for formatting if enabled, HTML is not allowed.';
$msg_javascript230         = 'This option enables you to activate or de-activate emails. This can be useful if you are testing on localhost and don`t have a mail server installed. If set to "No", system will send no e-mails.<br /><br /><b>Important!</b> This should be set to "Yes" when store is live.';
$msg_javascript231         = 'For main processing currency. For example, for UK prices the &pound; symbol comes before the price. For Euros (&euro;) the symbol comes after.<br /><br />If no symbols are set, ISO code displays. ie: GBP, USD.<br /><br />Character symbols/entities are set in "control/currencies.php".';
$msg_javascript232         = 'How many products to show per page in your store.';
$msg_javascript233         = 'This is the PHP date format. For more information, click the heading to be taken to the PHP website.';
$msg_javascript234         = 'This is the MySQL date format. By default MySQL stores dates in YYYY-MM-DD format. Specify your preferred date format conversion. Must be parameters supported by DATE_FORMAT. Month, Day, Year only!<br /><br />Click the heading to be taken to the MySQL website.';
$msg_javascript235         = 'When date input form fields are clicked, a javascript calendar appears. When a date is clicked on the calendar, this transfers to the input box. Specify preferred date format.';
$msg_javascript236         = 'When date input form fields are clicked, a javascript calendar appears. When a date is clicked on the calendar, this transfers to the input box. Specify your preferred start day for the week. UK is Sunday.';
$msg_javascript237         = 'If you are running PHP5 or higher, the system automatically attempts to calculate your timezone. If you find your dates are incorrect (ie, you are in the UK, but your server is in the US), specify a time offset.<br /><br />Your current server time is:<br />'.date('j F Y').' @ '.date('H:iA').'<br /><br />With Offset:<br />{offset}';
$msg_javascript238         = 'If enabled, how many products do you want to display in the RSS feeds?';
$msg_javascript239         = 'If you have product videos, specify the display width in pixels. Recommended size is 425px.';
$msg_javascript240         = 'If you have product videos, specify the display height in pixels. Recommended size is 300px.';
$msg_javascript241         = 'This option displays items that have been purchased along with the product being displayed. In other words, "Customers who bought this, also bought that" etc.<br /><br />Set to 0 for no display or enter limit for maximum amount of products to display.';
$msg_javascript242         = 'If low stock is selected on advanced search, set the max for low stock value. Must be at least 1.';
$msg_javascript243         = 'Do you want to display the most popular products? If enabled, this appears in the left menu. Set to 0 to disable or enter amount greater to enable';
$msg_javascript244         = 'Specify product range for display on Latest Products page.';
$msg_javascript245         = 'If enabled, displays help tips in the admin area.';
$msg_javascript246         = 'If auto zipping is enabled, a link is provided to consolidate all downloads into a single zip file. For this to function your server must have the ZIP functions enabled and have access to the ZipArchive class.<br /><br />ZipArchive Class Status: <b>'.(class_exists('ZipArchive') ? 'Enabled' : 'Disabled').'</b><br /><br />IMPORTANT! This feature will NOT work for remote files. If any downloads in an order are remotely located, this is disabled.';
$msg_javascript247         = 'Do you want to pad invoice numbers with zeros? Invoice numbers correspond to database sale ids. The first sale will be 1, but you might want to specify the invoice as 000001. Set to 0 for invoice numbers to have no additional prefixed zeros or specify amount to add.';
$msg_javascript248         = 'Do you want to save this update?'.defineNewline().defineNewline().'Click "Yes" to update and create edit status or "No" to manually updated later.';
$msg_javascript249         = 'If you wish to copy this update to other e-mail addresses, enter addresses separated with a comma. Example:<br /><br /><b>email@email.com,email2@email.com</b><br /><br />Leave blank for no copies. If addresses are entered, the system will remember your selections for next time.';
$msg_javascript250         = 'Live/test payment url for AlertPay. Unless updated by AlertPay, this should NOT be changed.';
$msg_javascript251         = 'Your merchant e-mail address for IPN payments. This is set in your AlertPay account area.';
$msg_javascript252         = 'Your IPN security code. This is set in your AlertPay account area.';
$msg_javascript253         = 'Payment Method:';
$msg_javascript254         = 'User Management';
$msg_javascript255         = 'Locate an image file on your hard drive. Images should be a valid image format like jpg,jpeg,png,gif.<br /><br />Image sizes should ideally be 711px x 200px unless you have modified the main layout in any way.';
$msg_javascript256         = 'Url is optional. If specified, banner is clickable. This can be an internal or external site url. Examples:<br /><br /><b>http://www.somesite.com</b> (External to another site)<br /><br /><b>?pID=4</b> (Internal to store product page)<br /><br /><b>?pCat=9</b> (Internal to store category page)<br /><br /><b>http://www.yoursite.com/cart/?pID=4</b> (Also internal to store product page)';
$msg_javascript257         = 'Error, please select a group..';
$msg_javascript258         = 'Banner description is the text that appears in the images alt &amp; title fields, so for cursor hover only.';
$msg_javascript259         = 'Enter username. Max 100 Chars.';
$msg_javascript260         = 'Enter password. Using a combination of letters, numbers and special characters is recommended for better security. If editing, leave blank to keep same password.';
$msg_javascript261         = 'Specify user type. Adminstrators have FULL admin access. Restricted users can only access specified pages.';
$msg_javascript262         = 'If user is restricted, specify the pages they have access to. At least 1 page must be specified. Note that the "User Management" page is not accessible by default for restricted users.';
$msg_javascript263         = 'Does this user have delete privileges? If yes, any page they have access to will show delete options. If no, this user cannot execute deletions.';
$msg_javascript264         = 'Enable or disable this user. Disabled users cannot access the system. Useful if you need to disable a user without deleting them.';
$msg_javascript265         = 'Login';
$msg_javascript266         = 'Price Points';
$msg_javascript267         = 'Clear ALL log..\n\nAre you sure?';
$msg_javascript268         = 'Clear log for selected user ONLY..\n\nAre you sure?';
$msg_javascript269         = 'Enter Start Price. No currency symbol for price and NO commas. ie:<br /><br /><b>2.99</b>';
$msg_javascript270         = 'Enter End Price. No currency symbol for price and NO commas. ie:<br /><br /><b>2.99</b>';
$msg_javascript271         = 'Alternative text is optional. If no text is shown, the price point will simply say the from and to prices for the link. Example:<br /><br /><b>&pound;1.99 - &pound;3.99</b><br /><br />Lets say you enter &pound;0.00 &amp; &pound;5.00 as your prices, your alternative text may be:<br /><br /><b>Under &pound;5.00</b><br /><br />Leave blank if not sure. Max 200 chars.';
$msg_javascript272         = 'Which box type do you wish to display for this option? An input box is for single line entries (see instructions left for example), a textarea for multi line (see options left for example). If options are declared this is ignored.';
$msg_javascript273         = 'Re-Ordering Completed!';
$msg_javascript274         = 'Depending on the payment method used by the buyer, the payment status may be returned by the payment server as "Pending". This means that the payment has NOT yet been completed and the money is NOT in your account.<br /><br />If this happens, do you still want to process the sale as "Completed"? This is NOT recommended for downloadable items.';
$msg_javascript275         = 'Free Shipping';
$msg_javascript276         = 'No shipping to be applied to this order';
$msg_javascript277         = 'Zip file size creation threshold. Zip creation may struggle on some shared environments when trying to handle large files. If you wish you can have the zip option enabled only when the combined size of all downloads is less than a certain limit.<br /><br />Size in Bytes Only. Examples:<br /><br />1024 x 1024 = <b>1048576</b> (1MB)<br />1024 x 1024 x 1024 = <b>1073741824</b> (1GB)<br /><br />Set to 0 for no limit';
$msg_javascript278         = 'How many times can zip files be downloaded per order/sale? Set to 0 for unlimited';
$msg_javascript279         = 'Timeout in seconds for zip creation. Attempts to adjust timeout via ini_set<br /><br />Set to 0 to use server default.';
$msg_javascript280         = 'Memory limit allocated to zip creation. 8MB is usually standard set by server. Attempts to adjust limit via ini_set.<br /><br />Set to 0 to use server default.';
$msg_javascript281         = 'Folder name for additional zip files. By default located at "<b>templates/additional-zip</b>". Any files included in this folder will be added to zip file downloads.<br /><br />If you wish to call this folder something else, specify new name here and rename folder manually. Folder must exist in "<b>templates</b>" directory.';
$msg_javascript282         = 'If you want the system to send e-mails to additional e-mail addresses, enter them here. Separate multiple addresses with a comma.<br /><br />If an e-mail is sent to the main e-mail address it will also copy to these addresses.';
$msg_javascript283         = 'Batch Update Tax';
$msg_javascript284         = 'Enter Offer Price';
$msg_javascript285         = 'Do you wish to log search keywords? Can be useful if you want to see what visitors are searching for in your store.';
$msg_javascript286         = 'No enabled products to load!';
$msg_javascript287         = 'Is this a required field? If yes, the system will prompt a visitor if this personalisation option is not completed when adding product to cart.';
$msg_javascript288         = 'If enabled, the system will attempt to auto convert Microsoft Word&reg; smart quotes to apostrophes. Enable if you are copying and pasting from Microsoft Word&reg; as its formatting isn`t web compliant.<br /><br />Useful if you have clients who copy and paste from Word.';
$msg_javascript289         = 'Enable product hit counter? If disabled, count is not incremented. Note that if disabled, some of the templates may need updating to remove any reference to the hit counter.';
$msg_javascript290         = 'If enabled, sub categories appear beneath main categories in left menu when viewing main category/sub category or product pages.';
$msg_javascript291         = 'Specify logo to load on payment page if required. Must be FULL url starting https://<br /><br /><b>If you do not have a SSL certificate installed, this MUST be left blank or else logo will NOT be shown.</b>';
$msg_javascript292         = 'Live/test payment url for Moneybookers. Unless updated by Moneybookers, this should NOT be changed.';
$msg_javascript293         = 'Enter your Moneybookers merchant account email address.';
$msg_javascript294         = 'Secret word as set in Moneybookers account area.';
$msg_javascript295         = '2-letter code of the language used for Moneybookers pages. Can be any of: EN, DE, ES, FR, IT, PL, GR, RO, RU, TR, CN, CZ, NL, DA, SV or FI<br /><br />Check the Moneybookers site for further updates.';
$msg_javascript296         = 'Sorry, the selected item is currently "Out of Stock".';
$msg_javascript297         = 'Personalisation option highlighted is a required field. Thank you.';
$msg_javascript298         = 'Instructions for visitor. For example, if you are selling products that can be personalised with someones name, the instructions might be:<br /><br /><b>Enter Your Name</b><br /><br />You can also specify an alternative text to display in e-mails and on order pages, this is a second parameter separated with a pipe. Example:<br /><br /><b>Enter Your Name|Name</b><br /><br />If the second parameter isn`t used, the main text is used.';
$msg_javascript299         = 'If a maximum character limit applies, enter it here greater than 0. Enter 0 for no limit.';
$msg_javascript300         = 'If the personalisation can only be one of a set of options, list them here. One per line. If this is set, max character limit is ignored.';
$msg_javascript301         = 'Is an additional cost incurred for this personalisation? If yes, enter value. No commas. This is added to the product total.<br /><br />Leave blank, 0, or 0.00 for no costing.';
$msg_javascript302         = 'Are you sure you have mapped the correct fields?\n\nClick "OK" to continue..';
$msg_javascript303         = 'Enable or disable this personalisation option. Useful if you need to disable an option without deleting it.';
$msg_javascript304         = 'Please be patient while the import process completes. This may take a few moments if you are importing large files..\n\nClick "OK" to continue..';
$msg_javascript305         = 'Do you want to offer free shipping if the cart total hits a certain limit? This is the total before any tax or other discounts are applied. Set as 0.00 to disable.';
$msg_javascript306         = 'FREE Shipping';
$msg_javascript307         = 'Your cart total is eligible for our free shipping offer';
$msg_javascript308         = 'Where do you want this link to appear? Can be any or all of 3 options.<br /><br />Left Menu<br />Footer Left<br />Footer Middle<br /><br />If none are specified, defaults to Left Menu.';
$msg_javascript309         = 'Newsletter/Mailer';
$msg_javascript310         = 'Please enter valid e-mail address..';
$msg_javascript311         = 'E-Mail Address Updated!';
$msg_javascript312         = 'Please enter valid e-mail address..';
$msg_javascript313         = 'E-mail address already exists in our database, thank you!';
$msg_javascript314         = 'You have successfully signed up for our newsletter, thank you!';
$msg_javascript315         = 'You have successfully unsubscribed, thank you! You will receive no further mailings from us.';
$msg_javascript316         = 'Use this option to batch add names instead of entering a single one. Each name must be a max of 250 chars. Each name will inherit the specified categories.<br /><br />CSV file type with one name per line.';
$msg_javascript317         = 'For security it is recommended you change your "<b>admin</b>" folder name to something unique. Rename manually, then enter new name here. You should only use a combination of letters, numbers, hyphens or underscores.';
$msg_javascript318         = 'Enter Reference Text (Max 250 chars)';
$msg_javascript319         = 'Low Stock Export';
$msg_javascript320         = 'Specify which categories you want to export products from.';
$msg_javascript321         = 'Specify the stock export range. For example 0 to 10 would export all products/attributes that have between 0 and 10 as a stock level.';
$msg_javascript322         = 'If you have any products disabled, should these be included in the export?';
$msg_javascript323         = 'There are no statuses in the database. If you have just added a new status, this will be available on the next page refresh.';
$msg_javascript324         = 'Please enter some text..';
$msg_javascript325         = 'Please specify at least 1 product..';
$msg_javascript326         = 'This can be the long or short version of the invoice/sale number. For example, for sale 00001, you can enter 00001 or simply 1.';
$msg_javascript327         = 'If you have a facebook page for your store, enter the full url starting http://. This appears at the bottom of your store.<br /><br />Leave blank to disable.';
$msg_javascript328         = 'If you have a twitter page for your store, enter the full url starting http://. This appears at the bottom of your store.<br /><br />Leave blank to disable.';
$msg_javascript329         = 'Do you want to display the most recently viewed items for visitors? If enabled, this appears in the left menu. Note that this is session based and clears when the browser is closed.';
$msg_javascript330         = 'Do you want to apply a global product discount? If specified, this would add a discount rate to every product excluding special offer products. Discount is applied on checkout page.<br /><br />This is NOT used in conjunction with any other offers, so discount coupons are ignored during the offer period.';
$msg_javascript331         = 'If you have enabled a global discount and want it to expire, click box to specify date. On this date global discount is reset. Leave blank to continue promotion.';
$msg_javascript332         = 'If you have entered a web url above and want this simply as an external link, set this to yes.';
$msg_javascript333         = 'A global store discount is in place and during this time discount coupons cannot be used.';
$msg_javascript334         = 'Should this campaign have an expiry date? Leave blank for no expiry. If a usage amount is set and an expiry the campaign will stop once either has reached its limit.';
$msg_javascript335         = 'How many days do you want to keep saved searches? If you have a busy site, searches should be cleared regularly. Enter amount in days. 0 to disable.';
$msg_javascript336         = 'Live payment url for Google Checkout. Unless updated by Google, this should NOT be changed.';
$msg_javascript337         = 'Sandbox payment url for Google Checkout. Unless updated by Google, this should NOT be changed.';
$msg_javascript338         = 'Batch Enable / Disable';
$msg_javascript339         = 'Specify which categories this update applies to.';
$msg_javascript340         = 'Please choose what actions should apply to this update.';
$msg_javascript341         = 'What product types should this apply to? Tangible goods or physical goods are items you ship, downloads are items you don`t ship.';
$msg_javascript342         = 'Do you wish to enable the Disqus comments system? This is a free comments system that can enable visitors to comment on your products. For more information, click the heading to be taken to the disqus website.<br /><br />Entering a short name enables the comments system. Leave blank to disable.';
$msg_javascript343         = 'Activate developer mode if you are testing on a different domain to your registered Disqus website. Example: localhost. Make sure you disable for live server.';
$msg_javascript344         = 'If you have the disqus comments system enabled in the settings and for this product category, do you wish to enable it for this product?';
$msg_javascript345         = 'If you have the disqus comments system enabled in the settings, do you wish to enable it for this category?';
$msg_javascript346         = 'Enter new value if applicable. This will override the CSV value and apply to all products in the import. Field MUST be selected first.';
$msg_javascript347         = 'Enable Disqus comments system for imported products?';
$msg_javascript348         = 'What is the status of the imported items?';
$msg_javascript349         = 'Enter new value if applicable. This will override the CSV value and apply to all attributes in the import.<br /><br />Select "Not Mapped" to clear and reset.';
$msg_javascript350         = 'Enter new attribute group name. Max 100 chars.';
$msg_javascript351         = 'Do shipping rules apply to products in this category? Shipping rules are not applied to any downloadable products as default.';
$msg_javascript352         = 'Do shipping rules apply to this product? If this is a downloadable product, shipping rules are not applied anyway.';
$msg_javascript353         = 'Do shipping rules apply to products in this import? If any are downloadable products, shipping rules are not applied anyway.';
$msg_javascript354         = 'Select group to add attributes to.';
$msg_javascript355         = 'Add Sale';
$msg_javascript356         = 'Products with 0 Qty will NOT be added to sale.';
$msg_javascript357         = 'Global discounts do not apply to special offers. So that the global discount applies to all, do you wish to clear all current special offers?';
$msg_javascript358         = 'Coupon code ignored - There is no shipping cost for this order already!';
$msg_javascript359         = 'Coupon code ignored - There is no tax cost for this order already!';
$msg_javascript360         = 'Free Tax';
$msg_javascript361         = 'Free Shipping';
$msg_javascript362         = 'If you have free downloads in your system, do you want to force the purchase of paid products before someone can checkout with free products in their basket?<br /><br />Enter number of products or set as 0 for no restrictions.';
$msg_javascript363         = 'Sorry, to purchase FREE items you must purchase at least {count} paid item(s).'.defineNewline().defineNewline().'Please adjust quantities or add other items to basket, thank you.';
$msg_javascript364         = 'Coupons cannot be applied when the basket total is 0.00';
$msg_javascript365         = 'Thumbnail creation width. For auto thumbnail creation. Aspect ratio is taken into consideration, so creation size may not be exact. Max 9999.<br /><br />Actual display sizes can be controlled in the stylesheet.';
$msg_javascript366         = 'Thumbnail creation height. For auto thumbnail creation. Aspect ratio is taken into consideration, so creation size may not be exact. Max 9999.<br /><br />Actual display sizes can be controlled in the stylesheet.';
$msg_javascript367         = 'Thumbnail quality in dpi. Max 100.';
$msg_javascript368         = 'Page Disabled';
$msg_javascript369         = 'Page Enabled';
$msg_javascript370         = 'Do you wish to enable the checkout system? If yes, all checkout functions work as standard. If no, checkout link, basket and add to cart items are not available. Useful if you want to showcase your products, but not actually sell online.';
$msg_javascript371         = 'How do want to handle "Out of Stock" display if products are out of stock? Disable All totally disables items from cart. If shown in category, they are shown as "Out of Stock" unless the product page is enabled.';
$msg_javascript372         = 'Do you want to present buyers with a newsletter opt-in choice on the checkout page?<br /><br />If yes, buyer`s email is added to newsletter list, but ONLY on a successful checkout.';
$msg_javascript373         = 'Enter zone areas/regions. One per line. UK example might be Counties:<br /><br />Derbyshire<br />Staffordshire<br />West Midlands<br /><br /><b>OR</b> use batch upload option. If you enter text here AND batch upload, the text box is ignored in favour of the upload file.';
$msg_javascript374         = 'This is the amount of the product short description characters you want to display on the category pages. Ideally the short description won`t be too long, but if it is you can restrict the amount of text shown. Set to 0 for no limit.';
$msg_javascript375         = 'Please select a buy option, thank you..';
$msg_javascript376         = 'The main product image can be uploaded at the time of adding the product. This is optional as pictures can be added later. Recommended size is around 150KB. Images that are too big will take longer to upload and also take longer to load on your website.<br /><br />Additional images may also be uploaded, this is optional.';
$msg_javascript377         = 'Specify which folder to save main image to for this product. Create new folders inside the "templates/products" folder and give them write permissions.<br /><br />Or click the button to add a new folder! Note that folders must be removed manually.';
$msg_javascript378         = 'Do you want the system to reduce the stock on downloadable items? If no, stock is not reduced and the low stock notification will be ignored if set.';
$msg_javascript379         = 'Thumbnail quality. For PNG images its 0 to 9.';
$msg_javascript380         = 'If you prefer, you can load a custom template file. If this option is utilised any data entered in the textarea will not be rendered. This feature can be useful if you want to create your own .php page and add your own PHP code.<br /><br />Create new .tpl.php files in the "templates/customTemplates/" directory. Note this is NOT compatible with the contact page.';
$msg_javascript381         = 'If you mirror product relations, this would update across all selected products. For example if you mirror relations and product 4 related to products 1,2 &amp; 3, products 1,2 &amp; 3 would be updated to relate to 4.';
$msg_javascript382         = 'Please select an image file to upload for category icon. Appears for related categories or parent categories on homepage if enabled.<br /><br />Optimal size is 75 x 75 pixels.';
$msg_javascript383         = 'Specify the server path to the download folder left. This is a SERVER path and NOT a url. Path must NOT include the download folder name and have NO trailing slash.<br /><br />Example. Lets say your "Download Folder Name" is "downloads" located at:<br /><br /><b>/home/server_name/downloads</b><br /><br />The path you would set here is:<br /><br /><b>/home/server_name</b><br /><br />If you are not selling downloadable products, this can be ignored or left blank.';
$msg_javascript384         = 'Please enter a product name..';
$msg_javascript385         = 'BBCode or Bulletin Board Code is a lightweight markup language used to format data. The available tags are usually indicated by square brackets ([]) surrounding a keyword, and are parsed before being translated into a markup language that web browsers understand. Examples:<br /><br />[b]Bold Text[b] = <b>Bold Text</b><br />[link=http://www.google.co.uk]Google[/link] = <a href="http://www.google.co.uk">Google</a><br /><br />BBCode was devised to provide a safer, easier and more limited way of allowing users to format their messages.<br /><br />Text &copy;Wikipedia';
$msg_javascript386         = 'This is the product short description which appears on category pages. No formatting is allowed here and this can be alternative text to your full description or part of the same text.<br /><br />Use the copy option for quickness if you want to use some of the full description text if any exists.';
$msg_javascript387         = 'HTML version of email message. Default html template located in "admin/templates/language/{lang}/default-newsletter/" folder.';
$msg_javascript388         = 'Plain text version of above message. No formatting here, just plain text. Default plain text template located in "admin/templates/language/{lang}/default-newsletter/" folder.';
$msg_javascript389         = 'Optional attachments. This should not be any file type which might be rejected by mail programs or anti virus software. PDF or ZIP are recommended.<br /><br />"admin/import/" folder MUST be writeable for attachments.<br /><br /><b>Large attachments are NOT recommended</b>';
$msg_javascript390         = 'Enter new country name. Max 250 chars.';
$msg_javascript391         = 'Enter 3 digit country ISO code.';
$msg_javascript392         = 'Do you want to enable this as a shipping country? If yes, appears in the right list, if no appears in the left.';
$msg_javascript393         = 'Database Backup';
$msg_javascript394         = 'Do you wish to download a copy of this backup to your hard drive? This envokes the save-as dialogue box. If you set this as no and enter no e-mail addresses, this is default.';
$msg_javascript395         = 'Do you wish to compress the backup file? This is recommended for large databases.';
$msg_javascript396         = 'Do you want to copy the backup to other e-mail accounts? E-mail accounts should not be located on the same server. Add multiple e-mails if required separated with a comma.<br /><br /><b>SMTP must be enabled to send attachments. If its not this will be ignored.</b>';
$msg_javascript397         = 'Please be patient, this could take several minutes depending on the size of your database and your server speed..';
$msg_javascript398         = 'Download Manager';
$msg_javascript399         = 'Enter new alphanumeric folder name. Letters and numbers only.';
$msg_javascript400         = 'Specify base folder name for product downloads. This should exist outside of your web root to prevent being accessed by download managers. If you are using the download manager within this software, this folder must also be writeable.<br /><br />If you are not selling downloadable products, this can be ignored or left blank.';
$msg_javascript401         = 'Can this product be purchased in the store? If no, product still displays, but buy option is disabled. Useful if you want to advertise products available elsewhere and not sell them online.';
$msg_javascript402         = 'If yes, keeps you logged in for 30 days. This is <b>NOT</b> recommended for shared computers and cookies must be enabled.';
$msg_javascript403         = 'Can products be purchased in this import? If no, and product is enabled, products display in online store, but cannot be purchased.';
$msg_javascript404         = 'When an external link is opened, should this open the link in the same window/tab or a new window/tab? Note that some browser settings may cause this to default to a certain option.';
$msg_javascript405         = 'Do you only wish to enable the pickup option if the buyer is in a certain country? Bearing in mind, a buyer may want to order from abroad and pickup when he/she returns home.';
$msg_javascript406         = 'Your browser doesn`t appear to support this function. Please bookmark this page as you would a normal web page.';
$msg_javascript407         = 'Do you wish to display your parent categories on your store homepage?';
$msg_javascript408         = 'Do you wish to show related categories? If yes, related categories appear at top of category page. For parents and children, related categories are any other children or parents in the same category. For infants, related categories are infants and children in the same category.';
$msg_javascript409         = 'Enter name or option for this attribute. This might be a text description, or a size etc. Max 100 chars.';
$msg_javascript410         = 'Does this attribute incur an additional cost? Leave as 0 for no additional cost and to have attribute the same price as main product. If specified is added to product price.';
$msg_javascript411         = 'Does this attribute incur any additional weight? Leave as 0 for no additional weight and to have attribute the same weight as main product. If specified is added to product weight.';
$msg_javascript412         = 'Enter stock level for this attribute.';
$msg_javascript413         = 'Specify order position for this attribute.';
$msg_javascript414         = 'Do you want this update to apply to attributes and products or both? If none are specified, defaults to products.';
$msg_javascript415         = 'Sorry, we only currently have the following stock:'.defineNewline().defineNewline().'{attribute} ({count} available)'.defineNewline().defineNewline().'Please adjust quantity';
$msg_javascript416         = 'Please enter new attribute group name. Max 100 chars.';
$msg_javascript417         = 'How do you want to order most popular products? By sales or by hits. Note that hits doesn`t really give a good indicator of whats popular as it simply orders by page views. Views don`t mean sales.<br /><br />If ordering by sales, free products can be excluded via the checkbox.';
$msg_javascript418         = 'Do you want this page to be set as the new landing page? If yes, when a visitor clicks to go to the store homepage, this page displays instead.<br /><br />Only one page can be set as the landing page, so if a previous page was set, this will be unset. Leave as "no" to load default store homepage.<br /><br />Ignored if page is set as an external link.';
$msg_javascript419         = 'Do you wish to enable the ISBNDB api service? This can be useful if you are selling books. Click the heading to sign up for a new account or enter your API key below.';
$msg_javascript420         = 'Specify your product name. Max 250 chars.<br /><br />Alternatively, enter ISBN book number and click lookup.';
$msg_javascript421         = 'Latest News Ticker';
$msg_javascript422         = 'Enter news text. Your visible text should not exceed around 120 characters. HTML may be used here if required, but be careful as some HTML may break the ticker. Hyperlinks only are recommended.';
$msg_javascript423         = 'Do you wish to enable this news ticker text?';
$msg_javascript424         = 'Latest';
$msg_javascript425         = 'Sales Revenue';
$msg_javascript426         = 'Do you wish to bypass the option for buyers to enter their name/email etc if the cart order is 0.00 (ie, free downloads)? If yes, buyers go straight to download page. No emails are sent to buyer and sale is logged as a guest.';
$msg_javascript427         = 'No email address is associated with this order. Update order and enter email address before activating downloads!';
$msg_javascript428         = 'Can visitor select multiple options from this group? If yes, more than one option can be selected on product page when adding item to cart.';
$msg_javascript429         = 'If you have the Cash on Delivery (COD) option enabled as a payment method, can it be selected if this service is selected?';
$msg_javascript430         = 'You can add single email addresses or batch import addresses if you wish. If batch importing, file must contain one email address per line. Either batch file or single email address must be specified or a combination of both.<br /><br />Duplicates, if detected, will be ignored.';
$msg_javascript431         = 'Code Exists';
$msg_javascript432         = 'Code is Unique';
$msg_javascript433         = 'Error. Either this email is invalid or its already been removed.';
$msg_javascript434         = 'Is this a required selection? If yes, at least 1 option from this group must be selected by visitor';
$msg_javascript435         = 'Locate CSV file. Any file extension should work providing the formatting is correct within the file. If a header row is present it will be ignored.<br /><br />Format for file must be:<br /><b>Code,Offer Price,Product Price</b><br /><br />Offer price is optional.';
$msg_javascript436         = 'Please be patient while the CSV update process is working..\n\nIf you have a large file, this may take awhile, depending on your server and the resources available. Note that any code not found in the database will be ignored.\n\nClick "OK" to continue..';
$msg_javascript437         = 'Buy option highlighted is a required field. Thank you.';
$msg_javascript438         = 'Flat Rate';
$msg_javascript439         = 'Percentage Based';
$msg_javascript440         = 'Weight Based';
$msg_javascript441         = 'Specify which zones this rate applies to';
$msg_javascript442         = 'Enter new flat rate. No commas or period symbols. ie: 9.99';
$msg_javascript443         = 'Do you want to enable this rate?';
$msg_javascript444         = 'Specify cost range for this rate. No commas or period symbols. ie: 9.99';
$msg_javascript445         = 'Specify percentage to apply if cost of goods is between above range. NO percentage symbol, ie: 5, 10';
$msg_javascript446         = 'Upload CSV of remote images. CSV must NOT contain header row, only 3 columns. Image,Thumb (if applicable) and display image preference of yes or no. Paths must be the full http path to the remote images.';
$msg_javascript447         = 'Specify which rates to adjust:<br /><br /><b>Flat Rates</b> - Flat rates for selected zones<br /><b>Percentage Rates</b> - Percentage based rates for selected zones<br /><b>Weight Based Rates</b> - Weight based rates for selected zones<br /><br />At least 1 option MUST be specified. If none are specified, defaults to weight based ONLY.';
$msg_javascript448         = 'Locate CSV file. Any file extension should work providing the formatting is correct within the file. If a header row is present it will be ignored.<br /><br />Format for file must be:<br /><b>Code,Stock Level</b>';
$msg_javascript449         = 'If you prefer different text to appear in the browser title bar than the product name, enter the text here. Use the copy option to copy product name if required. This is optional. If left blank, product name appears in browser title bar.<br /><br />Max 250 Chars';
$msg_javascript450         = 'If you prefer different text to appear in the browser title bar than the category name, enter the text here. Use the copy option to copy category name if required. This is optional. If left blank, category name appears in browser title bar.<br /><br />Max 250 Chars';
$msg_javascript451         = 'Do you wish to hide the left hand column when this page displays? Note that if you choose to have the link in the left hand menu only and choose to hide the left column, the link will NOT be visible.<br /><br />Note: Column cannot be hidden for system contact page.';
$msg_javascript452         = 'Do you wish to offer buyers an insurance option at checkout? Ideal if you are shipping fragile goods. Note that no tax is applied to the insurance charge.';
$msg_javascript453         = 'If yes, how do you want to calculate the insurance charge? This can be a fixed amount or a percentage of the goods total, shipping cost or cart total. If specifying percentage, no percentage symbol required in box. ie: 9.99 or 20<br /><br />If required option is specified, this is automatically added to the total. If optional, buyer can choose to add insurance.';
$msg_javascript454         = 'If minimum purchase quantity is set, buyer must purchase this quantity before they can checkout. Set to 0 to disable, which defaults to standard of min 1 item. Useful if you only sell volume amounts.';
$msg_javascript455         = 'Error. The minimum purchase quantity for this product is {min}.'.defineNewline().defineNewline().'If you wish to add to the quantity, remove and re-add product.';
$msg_javascript456         = 'Display price preference for free products. If left blank, defaults to 0.00 price display. Or enter alternative text. Applies to category and product pages. Max 10 Characters.';
$msg_javascript457         = 'Alternative redirect url is the page a visitor will be directed to after a successful transaction. You should NOT use this option if you sell downloadable items as visitors will not be able to download their products immediately after purchase.<br /><br />Enter full url starting http://';
$msg_javascript458         = 'Optional additional text to appear beneath product price on product page. You may wish to include a message that prices exclude tax etc. Leave blank for no additional text. Max 100 Characters.';
$msg_javascript459         = 'Are there certain Countries that this product cannot be shipped to? If yes, check boxes against restricted Countries. Checkout won`t be available if a banned Country is selected.';
$msg_javascript460         = 'Optional text/instruction which appears beneath the product title on the checkout page. Leave blank for no text.';
$msg_javascript461         = 'Do you wish to enable the sitemap? A sitemap is an at a glance view of site links.';
$msg_javascript462         = 'If enabled, specify your display preference.<br /><br /><b>Product List View</b> - View of all categories, products and additional site pages. Not recommended for heavy databases.<br /><br /><b>Category View</b> - Simple view of categories and additional site pages.';

?>