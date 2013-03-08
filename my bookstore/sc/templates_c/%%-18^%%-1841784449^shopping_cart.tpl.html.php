<?php /* Smarty version 2.6.0, created on 2013-03-07 09:22:44
         compiled from shopping_cart.tpl.html */ ?>

<center>

<?php if ($this->_tpl_vars['cart_total'] != ""): ?>

	<table width=75% border=0><tr><td><b><?php echo @constant('CART_TITLE'); ?>
:</b></td>

	<td align=right><a href="index.php?shopping_cart=yes&clear_cart=yes"><img src="images/button_delete.gif" border=0 > <u><?php echo @constant('CART_CLEAR'); ?>
</u></a></td></table>



	<form action="index.php" method=post>

	<table width=75% border=0 cellspacing=0 cellpadding=5>

	 <tr align="center" bgcolor="#<?php echo @constant('CONF_MIDDLE_COLOR'); ?>
">
	 <td class="menu"><?php echo @constant('TABLE_PRODUCT_NAME'); ?>
</td>
	 <td class="menu"><?php echo @constant('TABLE_PRODUCT_QUANTITY'); ?>
</td>
	 <td class="menu"><?php echo @constant('TABLE_PRODUCT_COST'); ?>
</td>
	 <td width=20></td>
	 </tr>

	 <?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['cart_content']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['name'] = 'i';
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
		<tr bgcolor=white>
		 <td><a href="index.php?productID=<?php echo $this->_tpl_vars['cart_content'][$this->_sections['i']['index']]['id']; ?>
"><?php if ($this->_tpl_vars['cart_content'][$this->_sections['i']['index']]['product_code'] != ""): ?>[<?php echo $this->_tpl_vars['cart_content'][$this->_sections['i']['index']]['product_code']; ?>
] <?php endif;  echo $this->_tpl_vars['cart_content'][$this->_sections['i']['index']]['name']; ?>
</a></td>
		 <td align=center><input type="text" name="count_<?php echo $this->_tpl_vars['cart_content'][$this->_sections['i']['index']]['id']; ?>
" size=5 value="<?php echo $this->_tpl_vars['cart_content'][$this->_sections['i']['index']]['quantity']; ?>
"></td>
		 <td align=center><?php echo $this->_tpl_vars['cart_content'][$this->_sections['i']['index']]['cost']; ?>
</td>
		 <td align=center><a href="index.php?shopping_cart=yes&remove=<?php echo $this->_tpl_vars['cart_content'][$this->_sections['i']['index']]['id']; ?>
"><img src="images/button_delete.gif" border=0 alt="<?php echo @constant('DELETE_BUTTON'); ?>
"></a></td>
		</tr>
	 <?php endfor; endif; ?>

	 <tr bgcolor=white>
	 <td><font class=cat><b><?php echo @constant('TABLE_TOTAL'); ?>
</b></font></td>
	 <td><br><br></td><td bgcolor=#<?php echo @constant('CONF_LIGHT_COLOR'); ?>
 align=center><font class=cat><b><?php echo $this->_tpl_vars['cart_total']; ?>
</b></font></td>
	 <td></td>
	 </tr>
	</table>

	<input type=hidden name=update value=1>
	<input type=hidden name=shopping_cart value=1>

	<p>
	<table width=75% border=0>
	 <tr><td align=right><input type="submit" value="<?php echo @constant('UPDATE_BUTTON'); ?>
"></td></tr>
	</table>
	</form>

	<form action="index.php" method=get>
		<table width=75% border=0>
		<tr>
		 <td align=center><input type="button" value="<?php echo @constant('STRING_BACK_TO_SHOPPING'); ?>
" onClick="history.go(-1);"></td>
		 <td align=center><input type="submit" value="<?php echo @constant('CART_PROCEED_TO_CHECKOUT'); ?>
" style="font-weight: bold; font-size: 120%;"></td>
		</table>
		<input type=hidden name=order_custinfo value=yes>
	</form>

<?php else: ?>

<p><font><?php echo @constant('CART_EMPTY'); ?>
</font>

<?php endif; ?>

</center>