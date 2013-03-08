<?php /* Smarty version 2.6.0, created on 2013-03-07 10:36:46
         compiled from aux_page.tpl.html */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'aux_page.tpl.html', 1, false),)), $this); ?>
<?php echo ((is_array($_tmp=@$this->_tpl_vars['auxiliary_page'])) ? $this->_run_mod_handler('default', true, $_tmp, @constant('ERROR_CANT_FIND_REQUIRED_PAGE')) : smarty_modifier_default($_tmp, @constant('ERROR_CANT_FIND_REQUIRED_PAGE'))); ?>