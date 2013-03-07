      <h1><?php echo $this->H1; ?></h1>
      
      <p class="msg"><?php echo $this->P_MSG; ?></p>
      
      <script type="text/javascript">
      //<![CDATA[
      function checkform() {
        var message = '';
        var spam    = '';
        var mail    = '';
        if ($('#name').val()=='') {
          $('#name').addClass('errorbox');
          message = 'yes';
        }
        if ($('#ctct').val()=='') {
          $('#ctct').addClass('errorbox');
          message = 'yes';
        } else {
          if (isValidEmailAddress($('#ctct').val())==false) {
            $('#ctct').addClass('errorbox');
            mail = 'yes';
          }
        }
        if ($('#subject').val()=='') {
          $('#subject').addClass('errorbox');
          message = 'yes';
        }
        if ($('#comments').val()=='') {
          $('#comments').addClass('textarea_error');
          message = 'yes';
        }
        if ($('#sum').val()=='') {
          $('#sum').addClass('errorbox');
          message = 'yes';
        } else {
          if (($('#sum').val()<=0) || (parseInt($('#sum').val())!=parseInt($('#sm_<?php echo $this->SECRET; ?>_1').val())+parseInt($('#sm_<?php echo $this->SECRET; ?>_2').val()))) {
            $('#sum').addClass('errorbox');
            spam = 'yes';
          }
        }
        if (message) {
          alert('<?php echo $this->ERROR_JS[0]; ?>');
          return false;
        }
        if (mail) {
          alert('<?php echo $this->ERROR_JS[2]; ?>');
          return false;
        }
        if (spam) {
          alert('<?php echo $this->ERROR_JS[1]; ?>');
          return false;
        }
      }
      //]]>
      </script>
      
      <form method="post" action="<?php echo $this->URL; ?>" onsubmit="return checkform()">
      
      <div class="contactUs"<?php echo $this->DISPLAY_FORM; ?>>
        <h2 class="title">
         <span><?php echo $this->TEXT[6]; ?></span>
        </h2>
        
        <div class="formFieldWrapper">
          <div class="boxes">
           
           <div class="left">
            <label><?php echo $this->TEXT[0]; ?>:</label>
            <input onkeyup="$(this).removeClass('errorbox').addClass('box')" type="text" class="box" name="name" id="name" value="<?php echo (isset($this->VALUES[0]) ? $this->VALUES[0] : ''); ?>" />
            <?php echo (in_array('name',$this->E_ARRAY) ? '<span class="error">'.$this->ERRORS[0].'</span>' : ''); ?>
           </div>
          
           <div class="right">
            <label><?php echo $this->TEXT[1]; ?>:</label>
            <input onkeyup="$(this).removeClass('errorbox').addClass('box')" type="text" class="box" name="ctct" id="ctct" value="<?php echo (isset($this->VALUES[1]) ? $this->VALUES[1] : ''); ?>" />
            <?php echo (in_array('ctct',$this->E_ARRAY) ? '<span class="error">'.$this->ERRORS[1].'</span>' : ''); ?>
           </div>
          
           <br class="clear" />
          </div>
          
          <div class="boxes">
          
           <label><?php echo $this->TEXT[2]; ?>:</label>
            <input onkeyup="$(this).removeClass('errorbox').addClass('box')" type="text" class="box" name="subject" id="subject" value="<?php echo (isset($this->VALUES[2]) ? $this->VALUES[2] : ''); ?>" />
            <?php echo (in_array('subject',$this->E_ARRAY) ? '<span class="error">'.$this->ERRORS[2].'</span>' : ''); ?>
          
           <label><?php echo $this->TEXT[3]; ?>:</label>
            <textarea onkeyup="$(this).removeClass('textarea_error').addClass('textarea')" name="comments" rows="5" id="comments" cols="30"><?php echo (isset($this->VALUES[3]) ? $this->VALUES[3] : ''); ?></textarea>
            <?php echo (in_array('comments',$this->E_ARRAY) ? '<span class="error">'.$this->ERRORS[3].'</span>' : ''); ?>
          
           <label><?php echo $this->TEXT[4]; ?>:</label>
            <span class="sum"><?php echo $this->RAND[0]; ?> &#043; <?php echo $this->RAND[1]; ?></span> &#061; <input onkeyup="$(this).removeClass('errorbox').addClass('box')" id="sum" type="text" class="sumbox" name="sum" value="" />
            <?php echo (in_array('sum',$this->E_ARRAY) ? '<span class="error">'.$this->ERRORS[4].'</span>' : ''); ?>
          
          </div>
          <p>
            <input type="hidden" name="process" value="1" />
            <input type="hidden" id="sm_<?php echo $this->SECRET; ?>_1" name="<?php echo $this->SECRET; ?>_1" value="<?php echo $this->RAND[0]; ?>" />
            <input type="hidden" id="sm_<?php echo $this->SECRET; ?>_2" name="<?php echo $this->SECRET; ?>_2" value="<?php echo $this->RAND[1]; ?>" />
            <input type="submit" class="button" value="<?php echo $this->TEXT[5]; ?> &raquo;" title="<?php echo $this->TEXT[5]; ?>" />
          </p>
        </div>
      
        <p class="bottom"></p>
      </div>
      </form>
      
      <?php
      // As set in admin..
      // System > General Settings > Company Information..
      if ($this->OTHER_DATA) {
      ?>
      <div id="contactOther">
      <p>
      <?php
      echo $this->OTHER_DATA;
      ?>
      </p>
      </div>
      <?php
      }
      ?>
