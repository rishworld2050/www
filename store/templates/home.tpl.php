      <?php
      // HOMEPAGE BANNERS
      // templates/html/homepage-banners.htm
      // templates/html/homepage-banners-img.htm
      // templates/html/homepage-banners-pages.htm
      echo $this->BANNERS;
      
      // DISPLAY PARENT CATEGORIES ON HOMEPAGE
      // templates/html/categories/home-categories.htm
      // templates/html/categories/home-categories-link.htm
      echo $this->CATEGORIES;
      ?>
      
      <div id="homepageProductsHeader">
        <p><?php echo $this->TXT[0]; ?></p>
      </div>
      
      <div class="categoryProducts">
      
      <ul>
       <?php
       // FEATURED PRODUCTS
       // templates/html/categories/category-product.htm
       echo $this->PRODUCTS;
       ?>
      </ul>
      
      <br class="clear" />
     
     </div>
