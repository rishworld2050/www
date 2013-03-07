      <?php
      /*
        CHECKOUT ROUTINES WITH SHIPPING/ZONES/TAX
        IMPORTANT!! Treat this template file with care. Div IDs are VERY important to the Ajax cart
         routines and should not be changed or renamed in any way.
      */
      ?>
      <h1><?php echo $this->TEXT[0]; ?></h1>
      
      <?php
      // Only show message if cart count is greater than 0..
      if ($this->CART_COUNT>0) {
      ?>
      <p class="basket_msg"><?php echo $this->TEXT[1]; ?></p>
      <?php
      }
      ?>

      <form method="post" id="form" action="<?php echo $this->URL[0]; ?>">
      <?php
      // BASKET ITEMS
      // templates/html/basket-checkout/basket-wrapper.htm
      // templates/html/basket-checkout/basket-item.htm
      // templates/html/basket-checkout/basket-personalisation-wrapper.htm
      // templates/html/basket-checkout/basket-personalisation-wrap-rebuild.htm
      // templates/html/basket-checkout/basket-personalisation-option.htm
      // templates/html/basket-checkout/basket-personalisation-add.htm
      // templates/html/basket-checkout/basket-personalisation-add-rebuild.htm
      echo $this->BASKET_ITEMS;
      
      // SHIPPING OPTIONS
      // templates/html/basket-checkout/basket-shipping.htm
      // templates/html/basket-checkout/basket-shipping-wrapper.htm
      echo $this->SHIPPING_OPTIONS;
      
      // DISCOUNT COUPON
      // templates/html/basket-checkout/basket-discount-coupon.htm
      echo $this->DISCOUNT_COUPON;
      
      // Only show buttons/payment methods and notes box if cart count is greater than 0..
      if ($this->CART_COUNT>0) {
      ?>
      <div class="notesWrapper" id="notesWrapper">
        
        <h2 class="title">
          <span><?php echo $this->TEXT[6]; ?>:</span>
        </h2>  
        
        <div class="notes">
         <p><textarea name="notes" id="notes" rows="4" cols="20"></textarea></p>
        </div>
        
        <p class="bottom"></p>
      </div>
      
      <?php
      // NEWSLETTER OPT IN
      // templates/html/basket-checkout/basket-newsletter-opt-in.htm
      echo $this->NEWSLETTER_OPT_IN;
      
      // This div displays initially, but auto disappears if shipping is selected..
      ?>
      <div id="loadBlock">
      
      <?php
      // TOTALS..
      ?>
      <div class="totalsWrapper" id="totalsWrapper">
        
        <h2 class="title">
          <span><?php echo $this->TEXT[7]; ?>:</span>
        </h2>  
        
        <div id="totals">
         <?php
         // BASKET TOTALS
         // templates/html/basket-checkout/basket-total.htm
         echo $this->TOTALS;
         ?>
         <div class="payment_grand" id="basket-total-t-total">
          <span class="payment_amount_grand" id="price-t-total"><?php echo $this->BASKET_TOTAL; ?></span>
          <span class="text_grand"><?php echo $this->TEXT[9]; ?>:</span>
          <input type="hidden" name="t-total" id="t-total" value="<?php echo $this->BASKET_TOTAL_NO_SYMBOL; ?>" />
          
          <br class="clear" />
         </div>
        </div>
         
        <p class="bottom"></p>
      </div> 
         
      <?php
      // PAYMENT METHODS..
      ?>
      <div class="paymentMethods" id="paymentMethods">
        
        <h2 class="title">
          <span><?php echo $this->TEXT[10]; ?>:</span>
        </h2>
           
        <div class="methods">
        <ul<?php echo $this->HIDE_UL_TAG; ?>>
           <?php
           // Paypal..
           if ($this->PAYMENT_METHODS->enablePP=='yes') {
           ?>
           <li>
            <span><?php echo $this->TEXT[18]; ?></span>
            <input name="payment-type" type="radio" value="paypal" id="paypal"<?php echo ($this->CHECKED_METHOD=='paypal' ? ' checked="checked"' : ''); ?> />
           </li>
           <?php
           }
           // 2Checkout..
           if ($this->PAYMENT_METHODS->enableTwoCheckout=='yes') {
           ?>
           <li>
            <span><?php echo $this->TEXT[19]; ?></span>
            <input name="payment-type" type="radio" value="twocheckout" id="twocheckout"<?php echo ($this->CHECKED_METHOD=='twoco' ? ' checked="checked"' : ''); ?>  />
           </li>
           <?php
           }
           // Google..
           if ($this->PAYMENT_METHODS->enableGoogleCheckout=='yes') {
           ?>
           <li>
            <span><?php echo $this->TEXT[20]; ?></span>
            <input name="payment-type" type="radio" value="google" id="google"<?php echo ($this->CHECKED_METHOD=='google' ? ' checked="checked"' : ''); ?>  />
           </li>
           <?php
           }
           // Alert Pay..
           if ($this->PAYMENT_METHODS->enableAlertPay=='yes') {
           ?>
           <li>
            <span><?php echo $this->TEXT[21]; ?></span>
            <input name="payment-type" type="radio" value="alertpay" id="alertpay"<?php echo ($this->CHECKED_METHOD=='alertpay' ? ' checked="checked"' : ''); ?>  />
           </li>
           <?php
           }
           // Moneybookers..
           if ($this->PAYMENT_METHODS->enableMoneyBookers=='yes') {
           ?>
           <li>
            <span><?php echo $this->TEXT[27]; ?></span>
            <input name="payment-type" type="radio" value="moneybookers" id="moneybookers"<?php echo ($this->CHECKED_METHOD=='moneybookers' ? ' checked="checked"' : ''); ?>  />
           </li>
           <?php
           }
           // Bank transfer..
           if ($this->PAYMENT_METHODS->enableBank=='yes') {
           ?>
           <li>
            <span><?php echo $this->TEXT[26]; ?></span>
            <input name="payment-type" type="radio" value="bank" id="bank"<?php echo ($this->CHECKED_METHOD=='bank' ? ' checked="checked"' : ''); ?>  />
           </li>
           <?php
           }
           // Phone Order..
           if ($this->PAYMENT_METHODS->enablePhone=='yes') {
           ?>
           <li>
            <span><?php echo $this->TEXT[22]; ?></span>
            <input name="payment-type" type="radio" value="phone" id="phone"<?php echo ($this->CHECKED_METHOD=='phone' ? ' checked="checked"' : ''); ?>  />
           </li>
           <?php
           }
           // Cheque/Check..
           if ($this->PAYMENT_METHODS->enableCheque=='yes') {
           ?>
           <li>
            <span><?php echo $this->TEXT[23]; ?></span>
            <input name="payment-type" type="radio" value="cheque" id="cheque"<?php echo ($this->CHECKED_METHOD=='cheque' ? ' checked="checked"' : ''); ?>  />
           </li>
           <?php
           }
           // C.O.D..
           // Do NOT rename cashOnDelivery div id..
           if ($this->PAYMENT_METHODS->enableCash=='yes') {
           ?>
           <li id="cashOnDelivery">
            <span><?php echo $this->TEXT[24]; ?></span>
            <input name="payment-type" type="radio" value="cod" id="cod"<?php echo ($this->CHECKED_METHOD=='cod' ? ' checked="checked"' : ''); ?>  />
           </li>
           <?php
           }
           ?>
        </ul>
        <p class="inputbutton">
          <input type="hidden" name="process" value="1" />
          <input type="submit" class="button" value="<?php echo $this->TEXT[28]; ?>" title="<?php echo $this->TEXT[28]; ?>" />
        </p>
        </div>
           
        <p class="bottom"></p>
      </div>
      
      </div>
      
      <?php
      // The 'totals' div is not shown by default until shipping has been selected..
      ?>
      <div class="totals" id="no-shipping">
        <p id="textInstructions"><?php echo $this->TEXT[8]; ?></p>
      </div>
      <?php
      
      // ..else show message about empty basket..
      } else {
      ?>
      <p class="empty_basket_img"><img src="templates/images/empty-basket.png" alt="<?php echo $this->TEXT[5]; ?>" title="<?php echo $this->TEXT[5]; ?>" /></p>
      <p class="empty_basket"><?php echo $this->TEXT[5]; ?></p>
      <?php
      }
      ?>
      </form>
