<?php /* Smarty version 2.6.0, created on 2013-03-07 11:24:35
         compiled from ./templates/tmpl1/admin/index.tpl.html */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', './templates/tmpl1/admin/index.tpl.html', 33, false),array('modifier', 'replace', './templates/tmpl1/admin/index.tpl.html', 71, false),)), $this); ?>
<html>
<head>

<script>
	function confirmDelete(id, ask, url) //confirm order delete
	<?php echo '{'; ?>

		temp = window.confirm(ask);
		if (temp) //delete
		<?php echo '{'; ?>

			window.location=url+id;
		}
	}
	function open_window(link,w,h)
	<?php echo '{'; ?>

		var win = "width="+w+",height="+h+",menubar=no,location=no,resizable=yes,scrollbars=yes";
		newWin = window.open(link,'newWin',win);
	}
</script>

<link rel=STYLESHEET href="images/backend/style-backend.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo @constant('DEFAULT_CHARSET'); ?>
">
<title><?php echo @constant('ADMIN_TITLE'); ?>
</title>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<table width="100%" border="0" cellpadding="0" cellspacing="0" height="100%">

<tr style="background: white url(images/backend/header_bg_downup.gif) repeat-x; background-position: bottom;height:1%;width:100%;text-align:center;">
 <td width="70%" align="left" style="padding: 10px;">
	<p>
		<span class="headertext"><?php echo ((is_array($_tmp=@constant('ADMIN_TITLE'))) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</span>
		(<a href="index.php"><?php echo ((is_array($_tmp=@constant('ADMIN_BACK_TO_SHOP'))) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</a>)
	</p>
 </td>
 <td width="30%" align="right" valign="middle">

	<?php if ($this->_tpl_vars['totals'] != ""): ?>
	 
	 <small>
	 <B><?php echo $this->_tpl_vars['totals']['products']; ?>
</B> products in <B><?php echo $this->_tpl_vars['totals']['categories']; ?>
</B> categories<br />
	 <B><?php echo $this->_tpl_vars['totals']['orders']; ?>
</B> orders so far<br />
	 Total revenue: <B><?php echo $this->_tpl_vars['totals']['revenue']; ?>
</B>
	 </small>

	<?php else: ?>

	 &nbsp;

	<?php endif; ?>
 
 </td>
</tr>

<tr>

	<td colspan="2">

	  <div class="mainmenu_gradient">

		<TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0">
		  <TR>
			<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['admin_departments']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

			 <TD>
			 <?php if ($this->_tpl_vars['admin_departments'][$this->_sections['i']['index']]['id'] != $this->_tpl_vars['current_dpt']): ?>
				
					<table cellpadding="4" border="0" style="margin-left: 5px; margin-right: 5px;">
						<tr>
							<td><a href="admin.php?dpt=<?php echo $this->_tpl_vars['admin_departments'][$this->_sections['i']['index']]['id']; ?>
"><img src="images/backend/<?php echo $this->_tpl_vars['admin_departments'][$this->_sections['i']['index']]['id']; ?>
.gif" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['admin_departments'][$this->_sections['i']['index']]['name'])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
" width="32" height="32" border="0"></A></td>
							<td><a href="admin.php?dpt=<?php echo $this->_tpl_vars['admin_departments'][$this->_sections['i']['index']]['id']; ?>
" class="mainsection"><?php echo $this->_tpl_vars['admin_departments'][$this->_sections['i']['index']]['name']; ?>
</a></td>
						</tr>
					</table>

			 <?php else: ?>

				<div class="mainmenu_selected_<?php echo $this->_tpl_vars['admin_departments'][$this->_sections['i']['index']]['id']; ?>
">
					<table cellpadding="4" border="0" style="margin-left: 5px; margin-right: 13px;">
						<tr>
							<td><img src="images/backend/<?php echo $this->_tpl_vars['admin_departments'][$this->_sections['i']['index']]['id']; ?>
.gif" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['admin_departments'][$this->_sections['i']['index']]['name'])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
" width="32" height="32" border="0"></td>
							<td><div class="menufont_core_light"><?php echo $this->_tpl_vars['admin_departments'][$this->_sections['i']['index']]['name']; ?>
</div></td>
						</tr>
					</table>
				</div>
			 <?php endif; ?>
			 </TD>

			<?php endfor; endif; ?>

			</TD>
		  </TR>
		</TABLE>

	  </div>

	</td>

</tr>

<?php if ($this->_tpl_vars['current_dpt'] && $this->_tpl_vars['current_dpt'] != 'custord'): ?>

<tr>
 <td colspan="2">

 <div class="mainmenu_selected_<?php echo $this->_tpl_vars['current_dpt']; ?>
" style="text-align:left">

	<table cellpadding="0" border="0" cellspacing="0" height="32">
	 
	 <tr>
	 <?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['admin_sub_departments']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	   <td>
	   <?php if ($this->_tpl_vars['current_sub'] != $this->_tpl_vars['admin_sub_departments'][$this->_sections['i']['index']]['id']): ?>

	    <div style="margin-right:10px;margin-left:5px">

			<table>
			<tr>
			<?php if ($this->_tpl_vars['current_dpt'] != 'reports'): ?><td><img src="images/backend/<?php echo $this->_tpl_vars['current_dpt']; ?>
_<?php echo $this->_tpl_vars['admin_sub_departments'][$this->_sections['i']['index']]['id']; ?>
.gif" alt="<?php echo $this->_tpl_vars['admin_sub_departments'][$this->_sections['i']['index']]['name']; ?>
" width="24" height="24"></td><?php endif; ?>
			<td><a href="admin.php?dpt=<?php echo $this->_tpl_vars['current_dpt']; ?>
&sub=<?php echo $this->_tpl_vars['admin_sub_departments'][$this->_sections['i']['index']]['id']; ?>
" class="menufont_sub_light"><?php echo $this->_tpl_vars['admin_sub_departments'][$this->_sections['i']['index']]['name']; ?>
</a></td>
			</tr>
			</table>

		 </div>
	   <?php else: ?>
		 <div class="menufont_sub_light" style="margin:5px;margin-right:10px;padding:5px; background-color:black"><?php echo $this->_tpl_vars['admin_sub_departments'][$this->_sections['i']['index']]['name']; ?>
</div>
	   <?php endif; ?>
	   </td>
	 <?php endfor; endif; ?>
	 </tr>
	 
	</table>

 </div>

 </td>
</tr>

<?php endif; ?>

<tr>
 <td colspan="2" height="100%" valign="top" style="background: white url(images/backend/header_bg_updown.gif) repeat-x; background-position: top; border-top:1px solid #999">

	<?php if (isset($this->_sections['i'])) unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['admin_sub_departments']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
 if ($this->_tpl_vars['current_sub'] == $this->_tpl_vars['admin_sub_departments'][$this->_sections['i']['index']]['id']): ?>
	
	<table style="margin:10px;" cellpadding="5">
	 <tr>
	  <?php if ($this->_tpl_vars['current_dpt'] != 'reports'): ?><td><img src="images/backend/<?php echo $this->_tpl_vars['current_dpt']; ?>
_<?php echo $this->_tpl_vars['current_sub']; ?>
_32.gif" width="32" height="32" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['admin_sub_departments'][$this->_sections['i']['index']]['name'])) ? $this->_run_mod_handler('replace', true, $_tmp, '"', '&quot;') : smarty_modifier_replace($_tmp, '"', '&quot;')); ?>
"></td><?php endif; ?>
	  <td class="big"><b><?php echo $this->_tpl_vars['admin_sub_departments'][$this->_sections['i']['index']]['name']; ?>
</b></td>
	 </tr>
	</table>
	
	<?php endif;  endfor; endif; ?>

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['admin_main_content_template']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

 </td>
</tr>


</table>

</body>

</html>