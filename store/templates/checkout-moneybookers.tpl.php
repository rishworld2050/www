      <h1><?php echo $this->H1; ?></h1>
      
      <p class="msg"><?php echo $this->P_MSG; ?></p>
      
      <script type="text/javascript">
      //<![CDATA[
      function checkform() {
        var message = '';
        var fields  = new Array('firstname','lastname','ctct','country','address','city','state','postal_code');
        for (var i=0; i<fields.length; i++) {
          switch (fields[i]) {
            case 'country':
            if ($('#country').val()=='' || $('#country').val()=='0') {
              $('#country').css('border','1px solid #ff0000');
              message = 'yes';
            }
            break;
            case 'ctct':
            if ($('#ctct').val()=='') {
              $('#ctct').css('border','1px solid #ff0000');
              message = 'yes';
            } else {
              if (isValidEmailAddress($('#ctct').val())==false) {
                $('#ctct').css('border','1px solid #ff0000');
                message = 'yes';
              }
            }
            break;
            default:
            if ($('#'+fields[i]).val()=='') {
              $('#'+fields[i]).css('border','1px solid #ff0000');
              message = 'yes';
            }
            break;
          }
        }  
        if (message) {
          alert('<?php echo $this->ERROR_JS[0]; ?>');
          return false;
        }
      }
      //]]>
      </script>
      
      <form method="post" action="<?php echo $this->URL; ?>"  onsubmit="return checkform()">
        
        <div class="moneyBookers">
        <h2 class="title">
         <span><?php echo $this->TEXT[8]; ?></span>
        </h2>
        
        <div class="formFieldWrapper">
          
          <div class="boxes">
           
           <div class="left">
            <label><?php echo $this->TEXT[0]; ?>:</label>
            <input type="text" class="box" id="firstname" name="firstname" value="<?php echo (isset($this->VALUES[0]) ? $this->VALUES[0] : ''); ?>" />
            <?php echo (in_array('firstname',$this->E_ARRAY) ? '<span class="error">'.$this->ERRORS[0].'</span>' : ''); ?>
           </div>
          
           <div class="right">
            <label><?php echo $this->TEXT[1]; ?>:</label>
            <input type="text" class="box" id="lastname" name="lastname" value="<?php echo (isset($this->VALUES[1]) ? $this->VALUES[1] : ''); ?>" />
            <?php echo (in_array('lastname',$this->E_ARRAY) ? '<span class="error">'.$this->ERRORS[1].'</span>' : ''); ?>
           </div>
          
           <br class="clear" />
          </div>
          
          <div class="boxes">
           
           <div class="left">
            <label><?php echo $this->TEXT[2]; ?>:</label>
            <input type="text" class="box" id="ctct" name="ctct" value="<?php echo (isset($this->VALUES[2]) ? $this->VALUES[2] : ''); ?>" />
            <?php echo (in_array('ctct',$this->E_ARRAY) ? '<span class="error">'.$this->ERRORS[2].'</span>' : ''); ?>
           </div>
          
           <div class="right">
            <label><?php echo $this->TEXT[3]; ?>:</label>
            <select name="country" id="country">
            <option value="0">- - - - -</option>
            <?php
            echo $this->COUNTRIES;
            ?>
            </select>
            <?php echo (in_array('country',$this->E_ARRAY) ? '<span class="error">'.$this->ERRORS[3].'</span>' : ''); ?>
           </div>
          
           <br class="clear" />
          </div>
          
          <div class="boxes">
           
           <div class="left">
            <label><?php echo $this->TEXT[4]; ?>:</label>
            <input type="text" class="box" id="address" name="address" value="<?php echo (isset($this->VALUES[4]) ? $this->VALUES[4] : ''); ?>" />
            <?php echo (in_array('address',$this->E_ARRAY) ? '<span class="error">'.$this->ERRORS[4].'</span>' : ''); ?>
           </div>
          
           <div class="right">
            <label><?php echo $this->TEXT[5]; ?>:</label>
            <input type="text" class="box" id="address2" name="address2" value="<?php echo (isset($this->VALUES[5]) ? $this->VALUES[5] : ''); ?>" />
           </div>
           
           <br class="clear" />
          </div>
          
          <div class="boxes">
           
           <div class="left">
            <label><?php echo $this->TEXT[6]; ?>:</label>
            <input type="text" class="box" id="city" name="city" value="<?php echo (isset($this->VALUES[6]) ? $this->VALUES[6] : ''); ?>" />
            <?php echo (in_array('city',$this->E_ARRAY) ? '<span class="error">'.$this->ERRORS[6].'</span>' : ''); ?>
           </div>
          
           <div class="right">
            <label><?php echo $this->TEXT[7]; ?>:</label>
            <input type="text" class="box" id="state" name="state" value="<?php echo (isset($this->VALUES[7]) ? $this->VALUES[7] : ''); ?>" />
            <?php echo (in_array('state',$this->E_ARRAY) ? '<span class="error">'.$this->ERRORS[7].'</span>' : ''); ?>
           </div>
          
           <br class="clear" />
          </div>
          
          <div class="boxes">
           
           <div class="left">
            <label><?php echo $this->TEXT[9]; ?>:</label>
            <input type="text" class="box" id="postal_code" name="postal_code" value="<?php echo (isset($this->VALUES[8]) ? $this->VALUES[8] : ''); ?>" />
            <?php echo (in_array('postal_code',$this->E_ARRAY) ? '<span class="error">'.$this->ERRORS[8].'</span>' : ''); ?>
           </div>
          
           <br class="clear" />
          </div>
          
          <p>
            <input type="hidden" name="process" value="1" />
            <input type="submit" class="button" id="button" value="<?php echo $this->TEXT[10]; ?> &raquo;" title="<?php echo $this->TEXT[10]; ?>" />
          </p>
        </div>
      
        <p class="bottom"></p>
      </div>
      </form>
