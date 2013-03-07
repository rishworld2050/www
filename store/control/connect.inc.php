<?php

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

  Script: Maian Cart v2.0
  Programmed & Designed by: David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Software Website: http://www.maiancart.com
  Script Portal: http://www.maianscriptworld.co.uk

  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  
  This File: connect.inc.php
  Description: MySQL Connection File

  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

/*============================================================================================================
  DATABASE CONNECTION PARAMETERS
  ==============================
  
  Enter your database connection parameters. If you are not sure of this, please contact
  your web host. If you get a message along the lines of 'Access denied for user..', then 
  your connection information is not correct.
  
  Important: The table prefix is for people with only a single database. If you aren`t bothered
  about the prefix, do NOT comment it out. Leave it blank if no prefix is required.

==============================================================================================================*/  

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'test1');
define('DB_PREFIX', 'mc_');

/*============================================================================================================
  MYSQL CHARACTER SET
  ===================
  
  Enter character set if foreign characters are not displaying. This MUST be supported by MySQL.
  For example, utf-8 is actually utf8 in MySQL. Leave blank for no character set.
  
  For more info visit:
  http://dev.mysql.com/doc/refman/5.0/en/charset.html
  
  utf8 should be fine in most cases.
  
============================================================================================================*/

define('DB_CHAR_SET', 'utf8');

/*============================================================================================================
  MYSQL LOCALE
  ============
  
  Specify the locale for your database. Where date_format is used to convert dates, this will convert the
  date your own locale. If you aren`t sure, leave as is.
  
  For more info visit:
  http://dev.mysql.com/doc/refman/5.0/en/locale-support.html (MySQL5)
  http://dev.mysql.com/doc/refman/4.1/en/locale-support.html (MySQL4)
  
  Examples:
  define('DB_LOCALE', 'en_US'); = English/United States
  define('DB_LOCALE', 'en_AU'); = English/Australia
  define('DB_LOCALE', 'fi_FI'); = Finnish/Finland
  
============================================================================================================*/

define('DB_LOCALE', 'en_GB');

/*============================================================================================================
  SECRET KEY
  ==========
  
  Specify secret key (also known as salt). This is for security and is encrypted during script execution.
  DO NOT change this value at a later date. Change ONLY before a clean install.
  
  This should ideally be a mix of random numbers, letters and characters. You can use sha1 and md5 for added
  security. You should not use something that changes with each page load.
  
  GOOD examples:
  define('SECRET_KEY', 'jh7sghe[]]0gjhfger');
  define('SECRET_KEY', md5('jh7sghe[]]0gjhfger'));
  define('SECRET_KEY', sha1('jh7sghe[]]0gjhfger'));
  
  BAD examples:
  define('SECRET_KEY', rand(1111,9999));
  define('SECRET_KEY', sha1(rand(1111,9999)));
  
  If you are using the cart system on multiple domains, set a different key for each

============================================================================================================
*/  

define('SECRET_KEY', 'abc12345');

/*============================================================================================================
  MYSQL ERRORS
  ============
  
  By default MySQL errors are NOT shown onscreen. This can be a security issue as it reveals server paths
  and sensitive data to visitors. If you are sure the system is working fine, this value should be set
  to 0 to disable mysql errors. If set to 0, specify friendly message in MYSQL_DEFAULT_ERROR.
  
  Note: HTML mey be used in the default error, but apostrophes MUST be escaped with a backslash. ie: \'

============================================================================================================*/
  
define('ENABLE_MYSQL_ERRORS', 0);
define('MYSQL_DEFAULT_ERROR', 'Database Error - Check Back Later (If you are the site developer, enable "ENABLE_MYSQL_ERRORS" in the "control/connect.inc.php" file)');

?>
