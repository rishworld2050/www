      <h1><?php echo $this->H1; ?></h1>
      
      <p class="msg"><?php echo $this->P_MSG; ?></p>
      
      <script type="text/javascript">
      //<![CDATA[
      function checkform() {
        var message = '';
        if ($('#name').val()=='') {
          $('#name').css('border','1px solid #ff0000');
          message = 'yes';
        }
        if ($('#ctct').val()=='') {
          $('#ctct').css('border','1px solid #ff0000');
          message = 'yes';
        } else {
          if (isValidEmailAddress($('#ctct').val())==false) {
            $('#ctct').css('border','1px solid #ff0000');
            message = 'yes';
          }
        }
        if ($('#address').val()=='') {
          $('#address').css('border','1px solid #ff0000');
          message = 'yes';
        }
        if ($('input[name="phone"]') && $('#phone').val()=='') {
          $('#phone').css('border','1px solid #ff0000');
          message = 'yes';
        }
        if (message) {
          alert('<?php echo $this->ERROR_JS[0]; ?>');
          return false;
        }
      }
      //]]>
      </script>
      
      <form method="post" action="<?php echo $this->URL; ?>" onsubmit="return checkform()">
        
        <div class="noGateway">
        <h2 class="title">
         <span><?php echo $this->TEXT[4]; ?></span>
        </h2>
        
        <?php
        if ($this->ORDER_COMPLETED=='yes') {
        ?>
        <div class="formFieldWrapper">
        <?php
        // As specified in settings. Loads only after form is submitted..
        // Do not move this.. 
        echo $this->PAY_INSTRUCTIONS; 
        ?>
        </div>
        <?php
        } else {
        ?>
        <div class="formFieldWrapper">
        
          <div class="boxes">
           
           <div class="left">
            <label><?php echo $this->TEXT[0]; ?>:</label>
            <input type="text" class="box" id="name" name="name" value="<?php echo (isset($this->VALUES[0]) ? $this->VALUES[0] : ''); ?>" />
            <?php echo (in_array('name',$this->E_ARRAY) ? '<span class="error">'.$this->ERRORS[0].'</span>' : ''); ?>
           </div>
          
           <div class="right">
            <label><?php echo $this->TEXT[1]; ?>:</label>
            <input type="text" class="box" id="ctct" name="ctct" value="<?php echo (isset($this->VALUES[1]) ? $this->VALUES[1] : ''); ?>" />
            <?php echo (in_array('ctct',$this->E_ARRAY) ? '<span class="error">'.$this->ERRORS[1].'</span>' : ''); ?>
           </div>
          
           <br class="clear" />
          </div>
          
          <div class="boxes">
           
           <div class="left" style="width:95%">
            <label><?php echo $this->TEXT[2]; ?>:</label>
            <textarea name="address" rows="5" id="address" cols="10" style="height:60px"><?php echo (isset($this->VALUES[2]) ? $this->VALUES[2] : ''); ?></textarea>
            <?php echo (in_array('address',$this->E_ARRAY) ? '<span class="error">'.$this->ERRORS[2].'</span>' : ''); ?>
           </div>
          
           <div class="left" style="width:95%">
            <label><?php echo $this->TEXT[5]; ?>:</label>
            <input type="text" class="box" name="phone" id="phone" style="width:40%" value="<?php echo (isset($this->VALUES[3]) ? $this->VALUES[3] : ''); ?>" />
            <?php echo (in_array('phone',$this->E_ARRAY) ? '<span class="error">'.$this->ERRORS[3].'</span>' : ''); ?>
           </div>
          
           <br class="clear" />
          </div>
          
          <p>
            <input type="hidden" name="process" value="1" />
            <input type="submit" class="button" id="button" value="<?php echo $this->TEXT[3]; ?> &raquo;" title="<?php echo $this->TEXT[3]; ?>" />
          </p>
        </div>
        <?php
        }
        ?>
      
        <p class="bottom"></p>
      </div>
      </form>
