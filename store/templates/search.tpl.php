     <h1><?php echo $this->TEXT[0]; ?></h1>
     
     <?php
     // Only show filter bar if at least 1 result was found..
     if ($this->SEARCH_COUNT>0) {
     ?>
     <p class="searchFilter">
       
       <span class="left">
        <span class="link">
         <a href="#" title="<?php echo $this->TEXT[3]; ?>" onclick="saveSearch('<?php echo $this->TEXT[4]; ?>','<?php echo $this->URL; ?>','<?php echo $this->ERROR_JS[0]; ?>');return false"><?php echo $this->TEXT[3]; ?></a>
        </span> 
       </span>
       
       <span class="right">
        <select name="cats" onchange="if(this.value!=0){location=this.options[this.selectedIndex].value}" style="margin-right:20px">
        <option value="0"><?php echo $this->TEXT[1]; ?></option>
        <option value="0">- - - - - -</option>
         <?php
         // CATEGORIES
         // templates/html/html-option-tags.htm
         echo $this->CATEGORIES;
         ?>
        </select>
        
        <select name="filters" onchange="if(this.value!=0){location=this.options[this.selectedIndex].value}">
         <option value="0"><?php echo $this->TEXT[2]; ?></option>
         <option value="0">- - - - - -</option>
         <?php
         // FILTER OPTIONS
         // templates/html/html-option-tags.htm
         echo $this->FILTER_OPTIONS;
         ?>
        </select>
       </span>
       
       <br class="clear" />
     
     </p>
     <?php
     }
     ?>
     
     <div class="categoryProducts">
      <ul>
      <?php
      // SEARCH_RESULTS
      // templates/html/categories/category-product.htm
      echo $this->SEARCH_RESULTS;
      ?>
      </ul>
      <br class="clear" />
     </div>
     
     <?php
     // Displays page numbers..
     // templates/html/page-numbers.htm
     echo $this->PAGINATION;
     ?>
