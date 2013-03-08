<?php /* Smarty version 2.6.0, created on 2013-03-07 09:18:15
         compiled from shopping_cart_info.tpl.html */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'shopping_cart_info.tpl.html', 9, false),)), $this); ?>

<table cellpadding="0" cellspacing="0">
 <form name="shopping_cart_form">
 <tr><td>

 <?php if ($this->_tpl_vars['shopping_cart_value']): ?>
	<input class=cart type=text name=gc value="<?php echo $this->_tpl_vars['shopping_cart_items']; ?>
 <?php echo @constant('CART_CONTENT_NOT_EMPTY'); ?>
" readonly><br>
	<input type=text class=cart name=ca value="<?php echo ((is_array($_tmp=$this->_tpl_vars['shopping_cart_value_shown'])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
" readonly>
 <?php else: ?>
	<input class=cart type=text name=gc value="<?php echo @constant('CART_CONTENT_EMPTY'); ?>
" readonly><br>
	<input type=text class=cart name=ca value="" readonly>
 <?php endif; ?>

	<nobr><a href="index.php?shopping_cart=yes"><?php echo @constant('CART_PROCEED_TO_CHECKOUT'); ?>
</a></nobr>

 </td></tr>
 </form>
</table>