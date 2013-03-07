    </div>
   
   </div>
 
   <br class="clear" />
 </div>
 
</div>

<div id="footerBar">

  <div class="innerFooterBar">

    <div class="left">
      <?php
      // NEW PAGE FOOTER BAR LINKS
      // templates/html/footer-bar-link.htm
      echo $this->LEFT_LINKS;
      ?>
    </div>
  
    <div class="middle">
      <?php
      // NEW PAGE FOOTER BAR LINKS
      // templates/html/footer-bar-link.htm
      echo $this->MIDDLE_LINKS;
      ?>
    </div>
  
    <div class="right">
  
      <h3><?php echo $this->TEXT[1]; ?>:</h3>
      <p>
      <span class="inputbox"><input type="text" name="newsletter" value="" id="newsletter" class="box" /> <input type="button" title="<?php echo $this->TEXT[2]; ?>" value="&gt;" class="button" onclick="newsletterSignup()" /></span>
      <span class="inputradio"><?php echo $this->TEXT[3]; ?>: <input checked="checked" type="radio" name="newstype" value="sub" /> <?php echo $this->TEXT[4]; ?>: <input type="radio" name="newstype" value="unsub" /></span>
      </p>
      
      <?php
      // FACEBOOK LINK
      // templates/html/footer-facebook-link.htm
      echo $this->FACEBOOK;
      // TWITTER LINK
      // templates/html/footer-twitter-link.htm
      echo $this->TWITTER;
      ?>
  
    </div>
  
    <br class="clear" />
  
  </div>

</div>

<?php
// FLOATING VIEW BASKET LINK
// Remove div if you don`t want it to appear..
// Doesn`t appear if cart count is 0 or if visitor is on checkout related pages..
// Does NOT work in IE6..
if ($this->DISABLE_FLOATING_LINK=='yes') {
?>
<div class="footerBasket" id="footerBasket"<?php echo ($this->CART_COUNT==0 ? ' style="display:none"' : ''); ?>>
 <a href="<?php echo $this->CHECKOUT_URL; ?>"><img src="templates/images/footer-basket.png" alt="<?php echo $this->TEXT[5]; ?>" title="<?php echo $this->TEXT[5]; ?>" /></a>
 <p><a href="<?php echo $this->CHECKOUT_URL; ?>" title="<?php echo $this->TEXT[5]; ?>"><?php echo $this->TEXT[5]; ?></a></p>
</div>
<?php
}

/* 
  GOOGLE ANALYTICS FOOTER CODE
  If you have code that is required on the footer of all pages, such as Google Analytics,
  add it to the following template file:
  
  // templates/html/footer-google-analytics.htm 
*/
?>
