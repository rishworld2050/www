<?php /* Smarty version 2.6.0, created on 2013-03-07 09:21:50
         compiled from product_detailed.tpl.html */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'product_detailed.tpl.html', 10, false),)), $this); ?>

<?php if ($this->_tpl_vars['product_info'] != NULL): ?>

<table cellpadding=3 border=0>
<tr>

<?php if ($this->_tpl_vars['selected_category'][3]): ?>
<td rowspan=2 valign=top>
	<img src="products_pictures/<?php echo $this->_tpl_vars['selected_category'][3]; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['selected_category'][1])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
">
</td>
<?php endif; ?>
<td>
	<b>
	<a href="index.php" class="cat"><?php echo @constant('LINK_TO_HOMEPAGE'); ?>
</a> :
	<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['product_category_path']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?>
	<a href="index.php?categoryID=<?php echo $this->_tpl_vars['product_category_path'][$this->_sections['i']['index']][0]; ?>
" class="cat"><?php echo $this->_tpl_vars['product_category_path'][$this->_sections['i']['index']][1]; ?>
</a> :
	<?php endfor; endif; ?></b>
</td>
</tr>
</table>


<p><table width=95% border=0 cellspacing=1 cellpadding=2>
<tr>
<td width=1% align=center valign=top>

<?php if ($this->_tpl_vars['product_info'][5]): ?>
  <?php if ($this->_tpl_vars['product_info'][9]): ?>
	<a href="javascript:open_window('products_pictures/<?php echo $this->_tpl_vars['product_info'][9]; ?>
',<?php echo $this->_tpl_vars['product_info'][16]; ?>
,<?php echo $this->_tpl_vars['product_info'][17]; ?>
);"><img border=0 src="products_pictures/<?php echo $this->_tpl_vars['product_info'][5]; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['product_info'][1])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
"><br>
	<font class=average><nobr><?php echo @constant('ENLARGE_PICTURE'); ?>
</nobr></font></a>
  <?php else: ?>
	<img src="products_pictures/<?php echo $this->_tpl_vars['product_info'][5]; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['product_info'][1])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
">
  <?php endif; ?>
<?php else: ?>
  <?php if ($this->_tpl_vars['product_info'][7]): ?>
    <?php if ($this->_tpl_vars['product_info'][9]): ?>
	  <a href="javascript:open_window('products_pictures/<?php echo $this->_tpl_vars['product_info'][9]; ?>
',<?php echo $this->_tpl_vars['product_info'][16]; ?>
,<?php echo $this->_tpl_vars['product_info'][17]; ?>
);"><img border=0 src="products_pictures/<?php echo $this->_tpl_vars['product_info'][7]; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['product_info'][1])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
"><br>
	  <font class=average><nobr><?php echo @constant('ENLARGE_PICTURE'); ?>
</nobr></font></a>
    <?php else: ?>
  	  <img src="products_pictures/<?php echo $this->_tpl_vars['product_info'][7]; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['product_info'][1])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
">
    <?php endif; ?>
  <?php endif; ?>
<?php endif; ?>

</td>

<td valign=top width=99%>

 <table width=100% border=0 cellpadding=4>

 <tr>
 <td valign=top>

  <table border=0>
  <tr>
  <td>


  <h1><?php echo $this->_tpl_vars['product_info'][1]; ?>
</h1>


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
	(<?php echo $this->_tpl_vars['product_info'][8]; ?>
 <?php echo @constant('VOTES_FOR_ITEM_STRING'); ?>
)


  <?php endif; ?>

	</td>

  </td>
  </tr>
  </table>
  <br>

 </td>
 <td align=right valign=top> 
	<?php if (@constant('CONF_SHOW_ADD2CART') == 1): ?>
	 <?php if ($this->_tpl_vars['product_info'][6] > 0 && $this->_tpl_vars['product_info'][4] > 0): ?>
			<a href="index.php?shopping_cart=yes&add2cart=<?php echo $this->_tpl_vars['product_info'][11]; ?>
"><img src="images/cart_big_navy.gif" border=0 alt="<?php echo @constant('ADD_TO_CART_STRING'); ?>
"></a>
	 <?php else: ?>&nbsp;
	 <?php endif; ?>
	<?php endif; ?>

 </td>
 </tr>

 <tr>
 <td colspan="2">

  <?php if ($this->_tpl_vars['product_info'][4] > 0): ?>
		<?php if ($this->_tpl_vars['product_info'][10] > 0 && $this->_tpl_vars['product_info'][10] > $this->_tpl_vars['product_info'][4] && $this->_tpl_vars['product_info'][4] > 0): ?> 
		<?php echo @constant('LIST_PRICE'); ?>
: <font color=brown><strike><?php echo $this->_tpl_vars['product_info'][13]; ?>
</strike></font><br>
	<?php endif; ?>

	<b><?php echo @constant('CURRENT_PRICE'); ?>
: <font class="cat" color="red" ><?php echo $this->_tpl_vars['product_info'][12]; ?>
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
 
				<?php if ($this->_tpl_vars['product_info']['product_code'] != ""): ?>
		<?php echo @constant('ADMIN_PRODUCT_CODE'); ?>
: <b>
		<?php echo $this->_tpl_vars['product_info']['product_code']; ?>

		</b>
		<?php endif; ?>

				<br><br>
		<?php echo @constant('IN_STOCK'); ?>
: <b>
		<?php if ($this->_tpl_vars['product_info'][6] > 0):  echo @constant('ANSWER_YES');  else: ?><font color=red><?php echo @constant('ANSWER_NO'); ?>
</font><?php endif; ?>
		</b>

 </td>
 </tr>

</table>

</td>

</tr>
<tr>
	<td colspan=2>

		<table border=0>


<tr>

<td width=99% valign=top>
<br><br>
<p><?php echo $this->_tpl_vars['product_info'][2]; ?>

</td>

<td width=1% valign=top align=right>

<center>
<form action="index.php" method=get>

<table border=0 cellspacing=1 cellpadding=2 bgcolor=#<?php echo @constant('CONF_MIDDLE_COLOR'); ?>
>
 <tr><td align="center" class="menu"><?php echo @constant('VOTING_FOR_ITEM_TITLE'); ?>
</td></tr>
 <tr bgcolor="white"><td>
 <input type="radio" name="mark" value="5" checked><?php echo @constant('MARK_EXCELLENT'); ?>
<br>
 <input type="radio" name="mark" value="3.8"><?php echo @constant('MARK_GOOD'); ?>
<br>
 <input type="radio" name="mark" value="2.5"><?php echo @constant('MARK_AVERAGE'); ?>
<br>
 <input type="radio" name="mark" value="1"><?php echo @constant('MARK_POOR'); ?>
<br>
 <input type="radio" name="mark" value="0.1"><?php echo @constant('MARK_PUNY'); ?>

 </td></tr>
</table><br>

<input type="hidden" name="productID" value="<?php echo $this->_tpl_vars['product_info'][11]; ?>
">
<input type="hidden" name="vote" value="yes">
<input type="submit" class="redbutton" value="<?php echo @constant('VOTE_BUTTON'); ?>
">

</form>
</center>

		</table>

	</td>
</tr>
</table>

<?php endif; ?>