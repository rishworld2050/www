<?php
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

  Script: Maian Cart v2.0
  Programmed & Designed by: David Ian Bennett
  E-Mail: support@maianscriptworld.co.uk
  Software Website: http://www.maiancart.com
  Script Portal: http://www.maianscriptworld.co.uk

  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  
  This File: header-top-bar.php
  Description: Top Bar Display

  ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

?>
<div id="header">
  
  <div class="left">
   <p>
    <?php
    // Loads top bar left text/links. Includes version check.
    // You can remove this if you wish or add addtional links here..
    include(PATH.'templates/system/menu/left-bar.php');
    ?>
   </p>
  </div>
  
  <div class="right">
   <p>
   <?php
   // Loads top bar right links..
   // You can remove this if you wish or add addtional links here..
   include(PATH.'templates/system/menu/right-bar.php');
   ?>
   </p>
  </div>
  
  <br class="clear" />
   
</div>