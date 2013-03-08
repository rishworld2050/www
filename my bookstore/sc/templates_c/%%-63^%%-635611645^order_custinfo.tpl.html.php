<?php /* Smarty version 2.6.0, created on 2013-03-07 09:28:07
         compiled from order_custinfo.tpl.html */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'order_custinfo.tpl.html', 30, false),)), $this); ?>

<center>

<h3><u><?php echo @constant('CART_PROCEED_TO_CHECKOUT'); ?>
</u></h3>

<p>
<table width=70% border=0>

<tr><td align=center>

<form action="index.php" name=custinfo_form method=post onSubmit="return validate_custinfo(this);">

<table border=0>

<tr>
<td colspan="3" align="center">
<div width="100%" class="menu" style="background: #<?php echo @constant('CONF_MIDDLE_COLOR'); ?>
; padding: 5px;" align="center"><?php echo @constant('STRING_CONTACT_INFORMATION'); ?>
</div>
</td>
</tr>

<tr>
<td colspan=3 align=center>
 <?php echo @constant('STRING_REQUIRED'); ?>

</td>
</tr>

<tr>
<td colspan=2 align=right><font color=red>*</font> <?php echo @constant('CUSTOMER_FIRST_NAME'); ?>
</td>
<td><input type="text" name="first_name" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['reg_userinfo'][7])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
"></td>
</tr>
<tr>
<td colspan=2 align=right><font color=red>*</font> <?php echo @constant('CUSTOMER_LAST_NAME'); ?>
</td>
<td><input type="text" name="last_name" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['reg_userinfo'][11])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
"></td>
</tr>
<tr>
<td colspan=2 align=right><font color=red>*</font> <?php echo @constant('CUSTOMER_EMAIL'); ?>
</td>
<td><input type="text" name="email" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['reg_userinfo'][2])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
"></td>
</tr>
<tr>
<td colspan=2 align=right><?php echo @constant('CUSTOMER_PHONE_NUMBER'); ?>
</td>
<td><input type="text" name="phone" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['reg_userinfo'][6])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
"></td>
</tr>
<tr>
<td colspan=3>&nbsp;</td>
</tr>
<tr>
<td colspan=2 align=right><?php echo @constant('CUSTOMER_ADDRESS'); ?>
</td>
<td><textarea name="address" rows=4><?php echo ((is_array($_tmp=$this->_tpl_vars['reg_userinfo'][5])) ? $this->_run_mod_handler('replace', true, $_tmp, '<', '&lt;') : smarty_modifier_replace($_tmp, '<', '&lt;')); ?>
</textarea></td>
</tr>
<tr>
<td colspan=2 align=right><font color=red>*</font> <?php echo @constant('CUSTOMER_CITY'); ?>
</td>
<td><input type="text" name="city" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['reg_userinfo'][4])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
"></td>
</tr>
<tr>
<td colspan=2 align=right><font color=red>*</font> <?php echo @constant('CUSTOMER_STATE'); ?>
</td>
<td><input type="text" name="state" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['reg_userinfo'][10])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
"></td>
</tr>
<tr>
<td colspan=2 align=right><font color=red>*</font> <?php echo @constant('CUSTOMER_ZIP'); ?>
</td>
<td><input type="text" name="zip" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['reg_userinfo'][9])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
"></td>
</tr>
<tr>
<td colspan=2 align=right><font color=red>*</font> <?php echo @constant('CUSTOMER_COUNTRY'); ?>
</td>
<td><input type="text" name="country" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['reg_userinfo'][3])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
"></td>
</tr>

</table>

<p>
<input type="submit" value="<?php echo @constant('STRING_PLACE_ORDER'); ?>
" style="font-weight: bold; font-size: 120%;">

<input type=hidden name=complete_order value=1>
</p>

</form>

</td>

</tr>
</table>

</center>