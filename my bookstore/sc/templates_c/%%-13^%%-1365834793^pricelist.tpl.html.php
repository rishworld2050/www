<?php /* Smarty version 2.6.0, created on 2013-03-07 09:21:41
         compiled from pricelist.tpl.html */ ?>

<center><h1><?php echo @constant('STRING_PRICELIST'); ?>
 <?php echo $this->_tpl_vars['shopname']; ?>
</h1>
<table border=0 cellspacing=1 bgcolor=<?php echo @constant('CONF_MIDDLE_COLOR'); ?>
 cellpadding=3 width=95%>
 <?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['pricelist_elements']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<td <?php if ($this->_tpl_vars['pricelist_elements'][$this->_sections['i']['index']][4] != 1): ?>colspan=2<?php endif; ?> bgcolor=#<?php echo $this->_tpl_vars['pricelist_elements'][$this->_sections['i']['index']][3]; ?>
 width=100%>

	 <?php if (isset($this->_sections['j'])) unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['pricelist_elements']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['max'] = (int)"(".($this->_tpl_vars['pricelist_elements'][$this->_sections['i']['index']][2])."-2)";
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
?>&nbsp;&nbsp;&nbsp;<?php endfor; endif; ?>

	 <a href="index.php?<?php if ($this->_tpl_vars['pricelist_elements'][$this->_sections['i']['index']][4] == 1): ?>productID<?php else: ?>categoryID<?php endif; ?>=<?php echo $this->_tpl_vars['pricelist_elements'][$this->_sections['i']['index']][0]; ?>
"<?php if (( $this->_tpl_vars['pricelist_elements'][$this->_sections['i']['index']][4] == 1 )): ?> class=standard<?php endif; ?>><?php echo $this->_tpl_vars['pricelist_elements'][$this->_sections['i']['index']][1]; ?>
</a>

	</td>
	<?php if (( $this->_tpl_vars['pricelist_elements'][$this->_sections['i']['index']][4] == 1 )): ?>
	<td width=1% align=center><nobr><?php echo $this->_tpl_vars['pricelist_elements'][$this->_sections['i']['index']][5]; ?>
</nobr></td>
	<?php endif; ?>
	</tr>
 <?php endfor; endif; ?>
</table></center><br>