     <h1><?php echo $this->TEXT[0]; ?></h1>
     
     <p class="catComments">
       <?php echo $this->MESSAGE; ?>
     </p>  
     
     <p class="productFilter">
       <?php 
       // Are the RSS feeds enabled?
       if ($this->SETTINGS->en_rss=='yes') {
       ?>
       <span class="catRss"><a href="<?php echo $this->FEED_URL; ?>" title="<?php echo $this->TEXT[1]; ?>"><img src="templates/images/rss.png" alt="<?php echo $this->TEXT[1]; ?>" title="<?php echo $this->TEXT[1]; ?>" /></a></span>
       <?php
       }
       ?>
       <select onchange="if(this.value!=0){location=this.options[this.selectedIndex].value}" style="margin-right:20px">
         <option value="0"><?php echo $this->TEXT[2]; ?></option>
         <option value="0">- - - - - -</option>
         <?php
         // CATEGORIES
         // templates/html/html-option-tags.htm
         echo $this->CATEGORIES;
         ?>
       </select>
       
       <select onchange="if(this.value!=0){location=this.options[this.selectedIndex].value}">
         <option value="0"><?php echo $this->TEXT[3]; ?></option>
         <option value="0">- - - - - -</option>
         <?php
         // CATEGORIES
         // templates/html/html-option-tags.htm
         echo $this->ORDER_BY_OPTIONS;
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
     // Skip pages if nothing found..
     if ($this->RESULTS>0) {
     ?> 
     <p class="pageNumbers">
       <?php echo $this->PAGINATION; ?>
     </p>
     <?php
     }
     ?>
