<?php /* Smarty version 2.6.0, created on 2013-03-07 11:18:04
         compiled from category.tpl.html */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'category.tpl.html', 49, false),)), $this); ?>

<p>

<table cellpadding=3 border=0>
<tr>

<?php if ($this->_tpl_vars['selected_category'][3]): ?>
<td rowspan=2 valign=top>
	<img src="products_pictures/<?php echo $this->_tpl_vars['selected_category'][3]; ?>
" alt="<?php echo $this->_tpl_vars['selected_category'][1]; ?>
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
	<a class="cat" href="index.php?categoryID=<?php echo $this->_tpl_vars['product_category_path'][$this->_sections['i']['index']][0]; ?>
"><?php echo $this->_tpl_vars['product_category_path'][$this->_sections['i']['index']][1]; ?>
</a> :
	<?php endfor; endif; ?></b>
</td>
</tr>
<tr>
<td>
		<?php echo $this->_tpl_vars['selected_category'][2]; ?>


	<p>
		<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['subcategories_to_be_shown']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	 <a class=standard href="index.php?categoryID=<?php echo $this->_tpl_vars['subcategories_to_be_shown'][$this->_sections['i']['index']][0]; ?>
"><?php echo $this->_tpl_vars['subcategories_to_be_shown'][$this->_sections['i']['index']][1]; ?>
</a>
	 (<?php echo $this->_tpl_vars['subcategories_to_be_shown'][$this->_sections['i']['index']][2]; ?>
)<br>
	<?php endfor; endif; ?>


</td>
</tr>

</table>


<?php if ($this->_tpl_vars['products_to_show_count'] != NULL): ?>

 <?php if ($this->_tpl_vars['products_to_show_best_choice'] != NULL):  echo @constant('PRODUCTS_BEST_CHOISE');  endif; ?>

 <center><?php echo $this->_tpl_vars['catalog_navigator']; ?>
</center>

 <table cellpadding=6 border=0 width=95%>
  <?php if (isset($this->_sections['i1'])) unset($this->_sections['i1']);
$this->_sections['i1']['name'] = 'i1';
$this->_sections['i1']['loop'] = is_array($_loop=$this->_tpl_vars['products_to_show']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i1']['max'] = (int)$this->_tpl_vars['products_to_show_count'];
$this->_sections['i1']['show'] = true;
if ($this->_sections['i1']['max'] < 0)
    $this->_sections['i1']['max'] = $this->_sections['i1']['loop'];
$this->_sections['i1']['step'] = 1;
$this->_sections['i1']['start'] = $this->_sections['i1']['step'] > 0 ? 0 : $this->_sections['i1']['loop']-1;
if ($this->_sections['i1']['show']) {
    $this->_sections['i1']['total'] = min(ceil(($this->_sections['i1']['step'] > 0 ? $this->_sections['i1']['loop'] - $this->_sections['i1']['start'] : $this->_sections['i1']['start']+1)/abs($this->_sections['i1']['step'])), $this->_sections['i1']['max']);
    if ($this->_sections['i1']['total'] == 0)
        $this->_sections['i1']['show'] = false;
} else
    $this->_sections['i1']['total'] = 0;
if ($this->_sections['i1']['show']):

            for ($this->_sections['i1']['index'] = $this->_sections['i1']['start'], $this->_sections['i1']['iteration'] = 1;
                 $this->_sections['i1']['iteration'] <= $this->_sections['i1']['total'];
                 $this->_sections['i1']['index'] += $this->_sections['i1']['step'], $this->_sections['i1']['iteration']++):
$this->_sections['i1']['rownum'] = $this->_sections['i1']['iteration'];
$this->_sections['i1']['index_prev'] = $this->_sections['i1']['index'] - $this->_sections['i1']['step'];
$this->_sections['i1']['index_next'] = $this->_sections['i1']['index'] + $this->_sections['i1']['step'];
$this->_sections['i1']['first']      = ($this->_sections['i1']['iteration'] == 1);
$this->_sections['i1']['last']       = ($this->_sections['i1']['iteration'] == $this->_sections['i1']['total']);
?>
	<?php if (!($this->_sections['i1']['index'] % @constant('CONF_COLUMNS_PER_PAGE'))): ?><tr><?php endif; ?>
	<td valign=top width="<?php echo smarty_function_math(array('equation' => "100 / x",'x' => @constant('CONF_COLUMNS_PER_PAGE')), $this);?>
%" format="%d">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "product_brief.tpl.html", 'smarty_include_vars' => array('product_info' => $this->_tpl_vars['products_to_show'][$this->_sections['i1']['index']])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</td>
	<?php if (!(( $this->_sections['i1']['index']+1 ) % @constant('CONF_COLUMNS_PER_PAGE'))): ?></tr><?php endif; ?>
  <?php endfor; endif; ?>
 </table>

 <center><?php echo $this->_tpl_vars['catalog_navigator']; ?>
</center>

<?php else: ?>
<p>
&nbsp;&nbsp;&nbsp;&nbsp;< <?php echo @constant('STRING_EMPTY_CATEGORY'); ?>
 >

<?php endif; ?>