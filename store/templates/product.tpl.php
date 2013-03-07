      <?php
      // PRODUCT TEMPLATE FILE
      // If required you can recall any value from the product/product category table via the $this->PRODUCT array..
      // This is for advanced users only..to see the contents of the array use print_r.
      // print_r($this->PRODUCT)
      ?>
      <h1><?php echo $this->NAME; ?></h1>
      
      <div class="viewProduct">
        <h2 class="productTitle">
         <span><?php echo $this->TXT[0]; ?></span>
        </h2>
        
        <div class="productInfo">
        
          <div class="left">
            <p class="img">     
             <a href="<?php echo $this->IMG_URL; ?>" class="cloud-zoom" id="zoom1">
              <img src="<?php echo $this->IMG; ?>" id="displayImg" alt="<?php echo $this->NAME; ?>" title="<?php echo $this->NAME; ?>" />
             </a>  
             <span class="imgZoom"><a onclick="$(this).colorbox({iframe:true,title: '&nbsp;'})" href="<?php echo $this->IMG_URL_LINK; ?>" id="imgLink" title="<?php echo $this->TXT[7]; ?>"><?php echo $this->TXT[7]; ?></a></span>
            </p>
            <?php
            // PRODUCT PICTURES
            // templates/html/products/product-pictures.htm
            // templates/html/products/product-pictures-img.htm
            echo $this->PICTURES;
            ?>
            <br class="clear" />
          </div>
          
          <div class="right">
            
            <div class="text">
              <ul>
                <li><?php echo $this->TXT[8]; ?>:<span><?php echo $this->AVAILABILITY; ?></span></li>
                <li><?php echo $this->TXT[10]; ?>:<span><?php echo ($this->PRODUCT_CODE ? $this->PRODUCT_CODE : 'N/A'); ?></span></li>
              </ul>
              <ul class="options">
                <?php
                // MP3 Preview and Video links are only shown if they exist..
                // Use inline style to determine widths..adjust if required..
                if ($this->IS_MP3_PREVIEW=='yes' && $this->IS_PRODUCT_VIDEO=='yes') { // Video & mp3..
                ?>
                <li class="contact" style="width:130px"><a href="<?php echo $this->ASKURL; ?>" title="<?php echo $this->TXT[5]; ?>"><?php echo $this->TXT[5]; ?></a></li>
                <li class="video" style="width:130px" id="video"><a href="<?php echo $this->VIDEO_URL; ?>" onclick="$(this).colorbox({iframe:true})" title="<?php echo $this->TXT[4]; ?>"><?php echo $this->TXT[4]; ?></a></li>
                <li class="mp3" style="width:130px" id="mp3"><a href="<?php echo $this->MP3_URL; ?>" onclick="$(this).colorbox({iframe:true})" title="<?php echo $this->TXT[14]; ?>"><?php echo $this->TXT[14]; ?></a></li>
                <?php
                } elseif ($this->IS_MP3_PREVIEW=='no' && $this->IS_PRODUCT_VIDEO=='yes') { // Video, no mp3..
                ?>
                <li class="contact" style="width:180px"><a href="<?php echo $this->ASKURL; ?>" title="<?php echo $this->TXT[5]; ?>"><?php echo $this->TXT[5]; ?></a></li>
                <li class="video" style="width:170px" id="video"><a href="<?php echo $this->VIDEO_URL; ?>" onclick="$(this).colorbox({iframe:true})" title="<?php echo $this->TXT[4]; ?>"><?php echo $this->TXT[4]; ?></a></li>
                <?php
                } elseif ($this->IS_MP3_PREVIEW=='yes' && $this->IS_PRODUCT_VIDEO=='no') { // MP3, no video..
                ?>
                <li class="contact" style="width:180px"><a href="<?php echo $this->ASKURL; ?>" title="<?php echo $this->TXT[5]; ?>"><?php echo $this->TXT[5]; ?></a></li>
                <li class="mp3" style="width:170px" id="mp3"><a href="<?php echo $this->MP3_URL; ?>" onclick="$(this).colorbox({iframe:true})" title="<?php echo $this->TXT[14]; ?>"><?php echo $this->TXT[14]; ?></a></li>
                <?php
                } else { // Neither..
                ?>
                <li class="contact" style="width:180px"><a href="<?php echo $this->ASKURL; ?>" title="<?php echo $this->TXT[5]; ?>"><?php echo $this->TXT[5]; ?></a></li>
                <li style="width:170px" id="video">&nbsp;</li>
                <?php
                }
                ?>
              </ul>  
              <br class="clear" />
            </div>
            
            <div class="<?php echo ($this->PRODUCT['pOffer']>0 ? 'addtocart_sale' : 'addtocart'); ?>">
              <p>
                <span class="price"><?php echo $this->PRICE; ?></span>
                <?php
                echo $this->TXT[15]; 
                ?>:
              </p>
              <?php
              // Additional text below product price..
              // Defined in admin general settings..
              if ($this->PRODUCT_ADD_TEXT) {
              ?>
              <div class="baseText"><?php echo $this->PRODUCT_ADD_TEXT; ?></div>
              <?php
              }
              ?>
            </div>  
            
            <div id="addToBasket">
            
            <form id="form" method="post" onsubmit="return addToBasket('<?php echo $_GET['pID']; ?>')" action="?pID=<?php echo $_GET['pID']; ?>">
            
            <?php
            // BUY OPTIONS/ATTRIBUTES
            // templates/html/products/product-attribute-wrapper.htm
            // templates/html/products/product-attribute.htm
            // templates/html/products/product-attributes.htm
            if ($this->BUY_OPTIONS) {
            ?>
            <div id="buyOptions">
            
              <fieldset>
                <legend><?php echo $this->TXT[6]; ?></legend>
                <?php
                echo $this->BUY_OPTIONS;
                ?>
              </fieldset>
            
            </div>
            
            <?php
            }
            
            // PERSONALISATION OPTIONS
            // templates/html/products/product-personalisation-input.htm
            // templates/html/products/product-personalisation-script.htm
            // templates/html/products/product-personalisation-select.htm
            // templates/html/products/product-personalisation-select-option.htm
            // templates/html/products/product-personalisation-textarea.htm
            // templates/html/products/product-personalisation-wrapper.htm
            echo $this->PERSONALISATION;
            
            // SHOW ADD TO CART BUTTON
            // Only show add to cart button if something is in stock, checkout is enabled and cart purchase is enabled..
            if ($this->STOCK_STATUS>0 && $this->ENABLE_CHECKOUT=='yes' && $this->ENABLE_CART_PURCHASE=='yes') {
            ?>
            <div id="quantity">
            
              <p><span class="qty">Qty: <select name="qty" id="qty">
              <?php
              if ($this->PRODUCT_STOCK>0) {
                // Qty totals..auto adjusts if radio buttons are clicked..
                foreach (range(0,($this->PRODUCT_STOCK-1)) AS $num) {
                ?>
                <option value="<?php echo ($num+1); ?>"><?php echo ($num+1); ?></option>
                <?php
                }
              } else {
              ?>
              <option value="0">0</option>
              <?php
              }
              ?>
              </select></span>
              <span class="span"><span id="spinner">&nbsp;</span><input type="submit" name="add" value="<?php echo $this->TXT[16]; ?>" title="<?php echo $this->TXT[16]; ?>" class="button" /></span>
              </p>
            
            </div>
            <?php
            }
            ?>
            </form>
            
            <?php
            // Show country restrictions if set...
            if ($this->PRODUCT['countryRestrictions']) {
            ?>
            <div class="countryRestrictions">
              <h2><?php echo $this->TXT[18]; ?></h2>
              <p><?php echo $this->RESTRICTED_COUNTRIES; ?></p>
            </div>
            <?php            
            }
            ?>
            
            </div>
            
            <br class="clear" />
          </div>
          
          <br class="clear" />
          
          <?php
          // ADDTHIS BOOKMARKING OPTION
          // Add code in settings..
          if ($this->ADDTHIS) {
          ?>
          <div class="addthis">
          <p><?php echo $this->TXT[17]; ?></p>
          <?php
          echo $this->ADDTHIS; 
          ?>
          </div>
          <?php
          }
          ?>
          
        </div>
        <p class="bottom"></p>
      
      </div>
      
      <div class="productDescription">
        <h2>
         <span><?php echo $this->TXT[3]; ?></span>
        </h2>
        <div class="productComments"><?php echo $this->DESC; ?></div>
        <p class="bottom"></p>
      </div>
      
      <?php
      // DISQUS COMMENTS SYSTEM
      // templates/html/products/disqus.htm
      echo $this->DISQUS;
      
      // RELATED PRODUCTS
      // templates/html/products/product-related-wrapper.htm
      // templates/html/products/product-related-item.htm
      echo $this->RELATED_PRODUCTS;
      
      // CUSTOMERS WHO BOUGHT THIS ALSO BOUGHT THAT
      // templates/html/products/product-comparison-wrapper.htm
      // templates/html/products/product-comparison-item.htm
      echo $this->SALE_COMPARISON;
      
      // PRODUCT TAGS
      // templates/html/products/product-tags.htm
      echo $this->TAGS;
      ?> 
      
      <p class="inventory">
        <?php echo $this->TXT[13]; ?>
      </p>
