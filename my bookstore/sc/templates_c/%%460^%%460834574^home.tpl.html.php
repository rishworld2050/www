<?php /* Smarty version 2.6.0, created on 2013-03-09 06:15:05
         compiled from home.tpl.html */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'home.tpl.html', 17, false),)), $this); ?>

<?php echo @constant('STRING_GREETINGS'); ?>


<h1 align="center"><?php echo @constant('ADMIN_SPECIAL_OFFERS'); ?>
</h1>


<p>
<center>
<table border=0 cellspacing=0 cellpadding=10>
<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['special_offers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php if (!($this->_sections['i']['index'] % 2)): ?><tr><?php endif; ?>
<td valign="top" align="center">


 <a href="index.php?productID=<?php echo $this->_tpl_vars['special_offers'][$this->_sections['i']['index']][0]; ?>
"><img src="products_pictures/<?php echo $this->_tpl_vars['special_offers'][$this->_sections['i']['index']][2]; ?>
" border="0" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['special_offers'][$this->_sections['i']['index']][1])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
"></a><br />
 <a href="index.php?productID=<?php echo $this->_tpl_vars['special_offers'][$this->_sections['i']['index']][0]; ?>
"><?php echo $this->_tpl_vars['special_offers'][$this->_sections['i']['index']][1]; ?>
</a><br />
   <font color=red><b><?php echo $this->_tpl_vars['special_offers'][$this->_sections['i']['index']][3]; ?>
</b></font>

</td>
<?php if (!(( $this->_sections['i']['index']+1 ) % 2)): ?></tr><?php endif; ?>
<?php endfor; endif; ?>
</table>
</center>


