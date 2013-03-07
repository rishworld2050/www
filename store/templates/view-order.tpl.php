      <h1><?php echo $this->TEXT[0]; ?></h1>
      
      <p class="msg">
        <?php echo ($this->ORDER_DOWNLOADS_COUNT>0 ? $this->TEXT[1] : $this->TEXT[3]); ?>
      </p>
      
      <?php
      // Only show downloads if there are any..
      if ($this->ORDER_DOWNLOADS_COUNT>0) {
      ?>
      <div class="productDownloadHeader">
        <h2>
         <span><?php echo $this->TEXT[2]; ?>:</span>
        </h2> 
        
        <div class="downloadWrapper">
        <?php
        // DISPLAYS PRODUCT DOWNLOADS..
        // templates/html/product-downloads.html
        echo $this->PRODUCT_DOWNLOADS; 
        ?>
        </div>
        
        <p class="bottom"></p>
      </div>
      <?php
      }
      
      // DISPLAYS LINK TO DOWNLOAD ALL FILES IN SINGLE ZIP FILE
      // This is enabled/disabled in the settings
      // templates/html/product-downloads-zip.html
      echo $this->ZIP_DOWNLOAD;
      ?>
