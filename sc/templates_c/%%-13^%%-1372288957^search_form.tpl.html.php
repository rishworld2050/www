<?php /* Smarty version 2.6.0, created on 2013-03-07 09:18:15
         compiled from search_form.tpl.html */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'search_form.tpl.html', 8, false),array('modifier', 'default', 'search_form.tpl.html', 8, false),)), $this); ?>

<table cellspacing=0 cellpadding=1 border=0>

<form action="index.php" method=get>

<tr>
<td><input type="text" name="searchstring" size="15" style="color:<?php if ($this->_tpl_vars['searchstring'] != ""): ?>black<?php else: ?>#3E578F<?php endif; ?>;" value="<?php if ($this->_tpl_vars['searchstring'] != ""):  echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['searchstring'])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')))) ? $this->_run_mod_handler('replace', true, $_tmp, "\'", "'") : smarty_modifier_replace($_tmp, "\'", "'")))) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, ""));  else:  echo @constant('STRING_SEARCH');  endif; ?>" onclick="<?php if ($this->_tpl_vars['searchstring'] != ""):  else: ?>this.value='';this.style.color='#000000';<?php endif; ?>"></td>
<td><nobr>&nbsp;<input type="image" border=0 src="images/search.gif">&nbsp;&nbsp;&nbsp;</nobr></td>
</tr>

</form>
</table>
