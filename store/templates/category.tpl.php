     <?php
      // CATEGORY TEMPLATE FILE
      // If required you can recall any value from the category table via the $this->CDATA array..
      // This is for advanced users only..to see the contents of the array use print_r.
      // print_r($this->CDATA)
      ?>
      <h1><?php echo $this->CATNAME; ?></h1>
     
     <?php
     // RELATED/SUB CATEGORIES
     // templates/html/categories/related-categories.htm
     // templates/html/categories/related-categories-link.htm
     echo $this->CATEGORIES;
     ?>
     
     <div class="catComments">
       <?php echo $this->MESSAGE; ?>
     </div>  
     
     <p class="productFilter">
       <?php 
       // Are the RSS feeds enabled?
       if ($this->SETTINGS->en_rss=='yes') {
       ?>
       <span class="catRss"><a href="<?php echo $this->FEED_URL; ?>" title="<?php echo $this->TEXT[1]; ?>"><img src="templates/images/rss.png" alt="<?php echo $this->TEXT[1]; ?>" title="<?php echo $this->TEXT[1]; ?>" /></a></span>
       <?php
       }
       // Show brands filter option if applicable..
       // Moved to left menu from 2.05. To keep drop down on category listing, uncomment below..
       /*if ($this->BRANDS) {
       ?> 
       <select name="brands" onchange="location=this.options[this.selectedIndex].value" style="margin-right:30px">
         <option value="<?php echo $this->PAGE_URL; ?>"><?php echo $this->TEXT[2]; ?></option>
         <?php
         // BRANDS
         // templates/html/html-option-tags.htm
         echo $this->BRANDS;
         ?>
       </select>
       <?php
       }*/
       ?>
       <select name="cat" onchange="location=this.options[this.selectedIndex].value">
         <?php
         // CATEGORY FILTER OPTIONS
         // templates/html/html-option-tags.htm
         echo $this->FILTER_OPTIONS;
         ?>
       </select>
     </p>
     
     <div class="categoryProducts">
      <ul>
      <?php
      // CATEGORY PRODUCTS
      // templates/html/categories/category-product.htm
      echo $this->PRODUCTS;
      ?>
      </ul>
      <br class="clear" />
     </div>
     
     <?php
     /// Only show page numbers if products exist for category..
     if ($this->PAGINATION) {
     ?>
     <p class="pageNumbers">
       <?php echo $this->PAGINATION; ?>
     </p>
     <?php
     }
     ?>
