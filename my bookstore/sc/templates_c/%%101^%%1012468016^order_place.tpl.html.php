<?php /* Smarty version 2.6.0, created on 2013-03-08 05:01:45
         compiled from order_place.tpl.html */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'order_place.tpl.html', 14, false),)), $this); ?>

<?php if ($this->_tpl_vars['order_is_placed'] != 0): ?>

	<?php echo @constant('STRING_ORDER_PLACED'); ?>


	<?php if (@constant('CONF_PAYPAL_INTEGRATION') == 1): ?>
	<p>
	<center><form action="https://www.paypal.com/cgi-bin/webscr" method="POST">
                          To pay with PayPal now please click this icon: 
                          <p> 
                            <input type="hidden" name="cmd" value="_xclick">
							<input type="hidden" name="bn" value="webasyst">
                            <input type="hidden" name="business" value="<?php echo ((is_array($_tmp=@constant('CONF_PAYPAL_EMAIL'))) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
">
                            <input type="hidden" name="item_name" value="Order #<?php echo $this->_tpl_vars['order_id']; ?>
">
                            <input type="hidden" name="amount" value="<?php echo $this->_tpl_vars['order_amount']; ?>
">
                            <input type="hidden" name="currency_code" value="<?php echo $this->_tpl_vars['currency_iso_3']; ?>
">
                            <input type="image" name="submit" src="http://images.paypal.com/images/x-click-but01.gif" alt="Pay with PayPal">
    </form></center>
	<?php endif; ?>

<?php else: ?>
	<br><br><br><center><b><?php echo @constant('CART_EMPTY'); ?>
</b></center>
<?php endif; ?>