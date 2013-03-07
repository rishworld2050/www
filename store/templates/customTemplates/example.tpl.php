      <h1>Example Page</h1>
      
      This page is loading from a custom template file.<br /><br />
      
      See the <a href="docs/system-4.html">docs</a> for more info on new pages and custom templates. Or view the notes in the following file:<br /><br />
      
      templates/customTemplates/example.tpl.php<br /><br />
      
      <?php
      //----------------------------------------------------------------------------------------------
      // UNCOMMENT TO LOAD HOMEPAGE BANNER ROTATOR..
      //----------------------------------------------------------------------------------------------
      
      //echo $this->BANNERS;
      
      //----------------------------------------------------------------------------------------------
      // UNCOMMENT BELOW TO LOAD CATEGORY PAGE. SPECIFY CORRECT CATEGORY NUMBER BELOW..
      //----------------------------------------------------------------------------------------------
      
      /*
      ?>
      <div class="categoryProducts">
       <ul>
       <?php
       // Specify category id number to load..
       // Filter is optional..
       $_GET['category'] = 9;
       $_GET['filter']   = 'title-az'; // Any value in category drop down. View source code..
       echo $this->CATEGORY->buildCategoryProducts();
       ?>
       </ul>
       <br class="clear" />
      </div>
      
      <p class="pageNumbers">
        <?php echo $this->CATEGORY->pageNumbers(); ?>
      </p>
      <?php
      */
      
      //----------------------------------------------------------------------------------------------
      // UNCOMMENT BELOW TO LOAD SPECIALS PAGE.. 
      //----------------------------------------------------------------------------------------------
      
      /*
      ?>
      <div class="categoryProducts">
       <ul>
       <?php
       echo $this->CATEGORY->buildSpecialOfferProducts();
       ?>
       </ul>
       <br class="clear" />
      </div>
      
      <p class="pageNumbers">
        <?php echo $this->CATEGORY->specialsPageNumbers(); ?>
      </p>
      <?php
      */
      ?>
