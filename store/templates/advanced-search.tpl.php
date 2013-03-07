      <h1><?php echo $this->TEXT[0]; ?></h1>
      
      <p class="msg"><?php echo $this->TEXT[1]; ?>:</p>
      
      <form method="get" action="<?php echo $this->URL; ?>">
      
      <div class="advancedSearch">
        <h2 class="title">
         <span><?php echo $this->TEXT[11]; ?></span>
        </h2>
        
        <div class="searchWrapper">
        
          <div class="left">
            <label><?php echo $this->TEXT[2]; ?>:</label>
            <input type="text" class="box" name="keys" value="<?php echo $this->TEXT[12]; ?>" />
          </div>
          <div class="right">
            <label><?php echo $this->TEXT[3]; ?>:</label>
            <input type="text" class="box2" name="from" id="from" value="" <?php echo datePicker('from'); ?> /> - <input type="text" class="box2" name="to" value="" id="to" <?php echo datePicker('to'); ?> />
          </div>
          <div class="left">
            <label><?php echo $this->TEXT[4]; ?>:</label>
            <select name="cat">
              <option value="0">- - - - - -</option>
              <?php 
              // CATEGORIES
              // templates/html/html-option-tags.htm
              echo $this->CATEGORIES; 
              ?>
            </select>  
          </div>
          <div class="right">
            <label><?php echo $this->TEXT[5]; ?>:</label>
            <?php echo $this->TEXT[9]; ?> <input type="radio" name="download" value="yes" /> <?php echo $this->TEXT[10]; ?> <input type="radio" name="download" value="no" checked="checked" />
          </div>
          <div class="left">
            <label><?php echo $this->TEXT[6]; ?>:</label>
            <input type="text" class="box2" name="price1" id="price1" value="0.00" /> - <input id="price2" type="text" class="box2" name="price2" value="0.00" />
          </div>
          <div class="right">
            <label><?php echo $this->TEXT[7]; ?>:</label>
            <?php echo $this->TEXT[9]; ?> <input type="radio" name="stock" value="yes" /> <?php echo $this->TEXT[10]; ?> <input type="radio" name="stock" value="no" checked="checked" />
          </div>
          <p>
            <input type="hidden" name="adv" value="1" />
            <input type="submit" class="button" value="<?php echo $this->TEXT[8]; ?> &raquo;" title="<?php echo $this->TEXT[8]; ?>" />
          </p>
        </div>
        
        <p class="bottom"></p>
        
      </div>  
      </form>
