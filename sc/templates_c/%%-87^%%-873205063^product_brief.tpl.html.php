<?php /* Smarty version 2.6.0, created on 2013-03-07 09:22:32
         compiled from product_brief.tpl.html */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'product_brief.tpl.html', 12, false),)), $this); ?>

<?php if ($this->_tpl_vars['product_info'] != NULL): ?>


<p><table width=95% border=0 cellspacing=1 cellpadding=2>
<tr>
<td width=1% align=center valign=top>

<?php if ($this->_tpl_vars['product_info'][7]): ?>
	<a href="index.php?productID=<?php echo $this->_tpl_vars['product_info'][11]; ?>
">
	 <img src="products_pictures/<?php echo $this->_tpl_vars['product_info'][7]; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['product_info'][1])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
" border=0><br>
	 <?php echo @constant('MORE_INFO_ON_PRODUCT'); ?>

	</a>
<?php else: ?>
  <?php if ($this->_tpl_vars['product_info'][5]): ?>
	<a href="index.php?productID=<?php echo $this->_tpl_vars['product_info'][11]; ?>
">
	 <img src="products_pictures/<?php echo $this->_tpl_vars['product_info'][5]; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['product_info'][1])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
" border=0>
	 <?php echo @constant('MORE_INFO_ON_PRODUCT'); ?>

	</a>
  <?php endif; ?>
<?php endif; ?>

</td>

<td valign=top width=99%>

 <table width=100% border=0 cellpadding=2>

 <tr>
 <td valign=top>

  <table border=0 cellpadding=0 cellspacing=0>
  <tr>
  <td>


  <a class=cat href="index.php?productID=<?php echo $this->_tpl_vars['product_info'][11]; ?>
"><?php echo $this->_tpl_vars['product_info'][1]; ?>
</a><br>


  <?php if ($this->_tpl_vars['product_info'][8] > 0): ?> 
	<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=5) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
 if ($this->_sections['i']['index'] < $this->_tpl_vars['product_info'][3]): ?><img src="images/redstar_big.gif"><?php else: ?><img src="images/blackstar_big.gif"><?php endif;  endfor; endif; ?>


  <?php endif; ?>

	</td>

  </td>
  </tr>
  </table>

 </td>
 <td align=right valign=top> 
	<?php if (@constant('CONF_SHOW_ADD2CART') == 1): ?>
	 <?php if ($this->_tpl_vars['product_info'][6] > 0 && $this->_tpl_vars['product_info'][4] > 0): ?>
			<a href="index.php?shopping_cart=yes&add2cart=<?php echo $this->_tpl_vars['product_info'][11]; ?>
"><img src="images/cart_navy.gif" border=0 alt="<?php echo @constant('ADD_TO_CART_STRING'); ?>
"></a>
	 <?php else: ?>&nbsp;
	 <?php endif; ?>
	<?php endif; ?>

 </td>
 </tr>

 <tr>
 <td colspan=2>

  <?php if ($this->_tpl_vars['product_info'][4] > 0): ?>
		<?php if ($this->_tpl_vars['product_info'][10] > 0 && $this->_tpl_vars['product_info'][10] > $this->_tpl_vars['product_info'][4] && $this->_tpl_vars['product_info'][4] > 0): ?> 
		<?php echo @constant('LIST_PRICE'); ?>
: <font color=brown><strike><?php echo $this->_tpl_vars['product_info'][13]; ?>
</strike></font><br>
	<?php endif; ?>

	<b><?php echo @constant('CURRENT_PRICE'); ?>
: <font class="cat" color="red"><?php echo $this->_tpl_vars['product_info'][12]; ?>
</font></b>

		<?php if ($this->_tpl_vars['product_info'][10] > 0 && $this->_tpl_vars['product_info'][10] > $this->_tpl_vars['product_info'][4] && $this->_tpl_vars['product_info'][4] > 0): ?> 
		<br>
		<?php echo @constant('YOU_SAVE'); ?>
:
		<font color=brown><?php echo $this->_tpl_vars['product_info'][14]; ?>
 (<?php echo $this->_tpl_vars['product_info'][15]; ?>
%)
		</font><br>
	<?php endif; ?>
  <?php endif; ?>

 </td>
 </tr>

 <tr>
 <td colspan=2>
 
	<?php echo $this->_tpl_vars['product_info'][2]; ?>

 </td>
 </tr>

</table>


</td>

</tr>

</table>

<?php endif; ?>