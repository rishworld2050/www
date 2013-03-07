<?php /* Smarty version 2.6.0, created on 2013-03-07 11:24:41
         compiled from catalog_products_categories.tpl.html */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'catalog_products_categories.tpl.html', 58, false),)), $this); ?>

<p>
<table border="0" cellspacing="0" cellpadding="10" width="100%">

<tr>
 <td width="25%" bgcolor="#D2D2FF" align="center"><b><?php echo @constant('ADMIN_CATEGORY_TITLE'); ?>
</b></td>
 <td width="75%" bgcolor="#F5F5B2" align="center"><b><?php echo @constant('ADMIN_PRODUCT_TITLE'); ?>
</b></td>
</tr>


<tr>
<td valign="top" bgcolor="#E2E2FF" width="25%">

	<table width="100%" border="0">
	 <tr>
	 <td colspan=3><a href="admin.php?dpt=catalog&sub=products_categories&categoryID=0" style="font-weight: bold;"><?php echo @constant('ADMIN_CATEGORY_ROOT'); ?>
</a> (<?php echo $this->_tpl_vars['products_in_root_category']; ?>
)</td>
	 </tr>
	 <?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['categories']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	 <tr>
	 <td><?php if (isset($this->_sections['j'])) unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['categories'][$this->_sections['i']['index']][5]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['max'] = (int)$this->_tpl_vars['categories'][$this->_sections['i']['index']][5];
$this->_sections['j']['show'] = true;
if ($this->_sections['j']['max'] < 0)
    $this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = min(ceil(($this->_sections['j']['step'] > 0 ? $this->_sections['j']['loop'] - $this->_sections['j']['start'] : $this->_sections['j']['start']+1)/abs($this->_sections['j']['step'])), $this->_sections['j']['max']);
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>&nbsp;&nbsp;&nbsp;&nbsp;<?php endfor; endif; ?><a href="admin.php?dpt=catalog&sub=products_categories&categoryID=<?php echo $this->_tpl_vars['categories'][$this->_sections['i']['index']][0]; ?>
"<?php if ($this->_tpl_vars['categories'][$this->_sections['i']['index']][5] == 0): ?> style="font-weight: bold;"<?php endif; ?>><?php echo $this->_tpl_vars['categories'][$this->_sections['i']['index']][1]; ?>
</a></td>
	 <td>(<?php echo $this->_tpl_vars['categories'][$this->_sections['i']['index']][3]; ?>
)</td>
	 <td align="right"><font color="red">[</font><a class="small" href="javascript:open_window('category.php?c_id=<?php echo $this->_tpl_vars['categories'][$this->_sections['i']['index']][0]; ?>
&w=<?php echo $this->_tpl_vars['categories'][$this->_sections['i']['index']][4]; ?>
',400,400);">edit</a><font color=red>]</font></td>
	 </tr>
	 <?php endfor; endif; ?>
	</table>

	<br><center>[ <a href="javascript:open_window('category.php?w=-1',400,400);"><?php echo @constant('ADD_BUTTON'); ?>
</a> ]</center><br>

</td>


<td valign="top" bgcolor="#FFFFE2" align="center" width="75%">

	<br><center><b><?php echo $this->_tpl_vars['category_name']; ?>
:</b></center><br>

	  <?php if ($this->_tpl_vars['categoryID'] == 0): ?>

		<p><?php echo @constant('ADMIN_ROOT_WARNING'); ?>


	  <?php endif; ?>

	  <?php if ($this->_tpl_vars['products_count'] == 0): ?>

		<p><center><?php echo @constant('STRING_EMPTY_CATEGORY'); ?>
</center>

	  <?php else: ?>
		<form action="admin.php" method="POST">
		<table border="0" cellspacing="0" cellpadding="5" width="90%">
		<tr bgcolor="#DAD5A3" align="center"><td width="1%"><?php echo @constant('ADMIN_ENABLED'); ?>
</td><td><?php echo @constant('ADMIN_PRODUCT_CODE'); ?>
</td><td><?php echo @constant('ADMIN_PRODUCT_NAME'); ?>
</td><td><?php echo @constant('ADMIN_PRODUCT_RATING'); ?>
</td><td><?php echo @constant('ADMIN_PRODUCT_PRICE'); ?>
, <?php echo $this->_tpl_vars['currency_iso_3']; ?>
</td>
		<td><?php echo @constant('ADMIN_PRODUCT_INSTOCK'); ?>
</td><td><?php echo @constant('ADMIN_PRODUCT_PICTURE'); ?>
</td><td><?php echo @constant('ADMIN_PRODUCT_BIGPICTURE'); ?>
</td>
		<td><?php echo @constant('ADMIN_PRODUCT_THUMBNAIL'); ?>
</td><td width=1%>&nbsp;</td><td width=1%>&nbsp;</td></tr>

		<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['products']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

			<tr bgcolor="#<?php echo smarty_function_cycle(array('values' => "FFFFE2,F5F5C5"), $this);?>
">

			<td align=center>
			 <input type=checkbox name=enable_<?php echo $this->_tpl_vars['products'][$this->_sections['i']['index']][0]; ?>
 <?php if ($this->_tpl_vars['products'][$this->_sections['i']['index']][9] == 1): ?>value=on checked<?php else: ?>value=off<?php endif; ?>>
			</td>

			<td>
			 <a href="javascript:open_window('products.php?productID=<?php echo $this->_tpl_vars['products'][$this->_sections['i']['index']][0]; ?>
',550,600);"><?php echo $this->_tpl_vars['products'][$this->_sections['i']['index']][10]; ?>
</a>
			&nbsp;
			</td>

			<td>
			<a href="javascript:open_window('products.php?productID=<?php echo $this->_tpl_vars['products'][$this->_sections['i']['index']][0]; ?>
',550,600);"><?php echo $this->_tpl_vars['products'][$this->_sections['i']['index']][1]; ?>
</a>&nbsp;
			</td>

			<td align=right><?php echo $this->_tpl_vars['products'][$this->_sections['i']['index']][2]; ?>
&nbsp;</td>

			<td align=center>
			<input type=text name=price_<?php echo $this->_tpl_vars['products'][$this->_sections['i']['index']][0]; ?>
 size=5 value=<?php echo $this->_tpl_vars['products'][$this->_sections['i']['index']][3]; ?>
>
			</td>

			<td align=center>
			<input type=checkbox name=instock_<?php echo $this->_tpl_vars['products'][$this->_sections['i']['index']][0]; ?>
 size=5<?php if ($this->_tpl_vars['products'][$this->_sections['i']['index']][4] > 0): ?> checked<?php endif; ?>>
			</td>

			<td align=center>
			<?php if ($this->_tpl_vars['products'][$this->_sections['i']['index']][5] != ""):  echo @constant('ANSWER_YES');  else: ?><font color=red><?php echo @constant('ANSWER_NO'); ?>
</font><?php endif; ?>
			</td>
			<td align=center>
			<?php if ($this->_tpl_vars['products'][$this->_sections['i']['index']][6] != ""):  echo @constant('ANSWER_YES');  else: ?><font color=red><?php echo @constant('ANSWER_NO'); ?>
</font><?php endif; ?>
			</td>
			<td align=center>
			<?php if ($this->_tpl_vars['products'][$this->_sections['i']['index']][7] != ""):  echo @constant('ANSWER_YES');  else: ?><font color=red><?php echo @constant('ANSWER_NO'); ?>
</font><?php endif; ?>
			</td>

			<td align=center>
			 <?php if ($this->_tpl_vars['products'][$this->_sections['i']['index']][5] != ""): ?>
				<a href="admin.php?dpt=catalog&sub=special&new_offer=<?php echo $this->_tpl_vars['products'][$this->_sections['i']['index']][0]; ?>
"><img src="images/admin_special_offer.gif" border=0 alt="<?php echo @constant('ADMIN_ADD_SPECIAL_OFFERS'); ?>
"></a>
			 <?php else: ?>&nbsp;
			 <?php endif; ?>
			</td>

			<td><a href="javascript:confirmDelete(<?php echo $this->_tpl_vars['products'][$this->_sections['i']['index']][0]; ?>
,'<?php echo @constant('QUESTION_DELETE_CONFIRMATION'); ?>
','admin.php?dpt=catalog&sub=products_categories&categoryID=<?php echo $this->_tpl_vars['categoryID']; ?>
&terminate=');"><img src="images/backend/button_delete.gif" border=0 alt="<?php echo @constant('DELETE_BUTTON'); ?>
"></a></td>

			</tr>

		<?php endfor; endif; ?>

		</table>
		<input type=hidden name=products_update value=1>
		<input type=hidden name=dpt value="catalog">
		<input type=hidden name=sub value="products_categories">
		<input type=hidden name=categoryID value="<?php echo $this->_tpl_vars['categoryID']; ?>
">
		<br><input type=submit value="<?php echo @constant('SAVE_BUTTON'); ?>
">
		</form>

	  <?php endif; ?>


	<p><center>[ <a href="javascript:open_window('products.php',550,600);"><?php echo @constant('ADD_BUTTON'); ?>
</a> ]</center><br>

</td>


</tr>
</table>