<?php /* Smarty version 2.6.0, created on 2013-03-07 11:18:35
         compiled from ./templates/tmpl1/index.tpl.html */ ?>
<html>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "head.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<body marginwidth="0" marginheight="0" leftmargin="0" topmargin="0" >




<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <tr>
    <td bgcolor="black"><table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr style="background: url(images/abc.png) repeat-x; height:180px;">
    <td valign="middle" width="10%">
		<a href="/bookstore/"><img src="images/bookstore.png" border="0" alt="<?php echo @constant('CONF_SHOP_NAME'); ?>
" hspace="100px"></a>
	</td>
	<td valign="middle" width="90%" align="right">
				<table id="tabnav" border="0" cellspacing="10px" cellpadding="0">
					<tr valign="middle" align="right"> 
					  <td><a href="index.php" class="menu"><?php echo @constant('LINK_TO_HOMEPAGE'); ?>
</a></div></td>
					  <td>&nbsp;</td>
					  <td><a href="index.php?show_price=yes" class="menu"><?php echo @constant('STRING_PRICELIST'); ?>
</a></div></td>
					  <td>&nbsp;</td>
					  <td><a href="index.php?aux_page=aux1" class="menu"><nobr><?php echo @constant('ADMIN_ABOUT_PAGE'); ?>
</nobr></a></div></td>
					  <td>&nbsp;</td>
					  <td><a href="index.php?aux_page=aux2" class="menu"><?php echo @constant('ADMIN_SHIPPING_PAGE'); ?>
</a></div></td>
					</tr>
				</table>
	</td>
    <td valign="top" align="right" >

				  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "language.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "search_form.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                  <a href="index.php?search_with_change_category_ability=yes" class="lightsmall"></a>
	</td>
  </tr>

  <tr> 
    <td width="220" valign="top" align="left">
	 <table cellspacing="0" cellpadding="0" border="0"><tr><td >

		<p style="padding:10px;">
        
		<table width="200" border="0" align="left" cellpadding="0" cellspacing="0" hspace="30px">
		  <?php if (@constant('CONF_SHOW_ADD2CART') == 1): ?>
          <tr> 
            <td align="left" valign="top" bgcolor="yellow" class="topcorners">
				<div style="padding:5px;font-size:130%;">
					<a href="index.php?shopping_cart=yes" class="menu"><?php echo @constant('CART_TITLE'); ?>
</a>
				</div>
			</td>
		  </tr>
		  <tr>  
            <td style="background: #E5B4C3; background-position: right; padding: 10px;" class="bottomcorners"> 
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "shopping_cart_info.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </td>
          </tr>
		  <tr>
			<td>&nbsp;</td>
		  </tr>
		  <?php endif; ?>
          <tr> 
            <td align="left" valign="top" bgcolor="#352060" class="topcorners">
				<div style="padding:5px;font-size:130%;">
					<a href="index.php#catalog" class="menu"><?php echo @constant('ADMIN_CATALOG'); ?>
</a>
				</div>
			</td>
          </tr>
          <tr> 
                  <td align="left" valign="top" style="background: #C3B4E5; background-position: right; padding: 10px;" class="bottomcorners"> 
                          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "category_tree.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                  </td>
          </tr>

		

         

		
        </table>
		</p>

		</td></tr>
		
		</table>
      </td>
      <td width="100%" align="left" valign="top" style="padding:10px;" colspan="2">

            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['main_content_template']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
       
	  </td>
  </tr>
  <tr>
	<td>&nbsp;</td>
	<td colspan="2" align="center">

				<hr width="300" align="center" size="1" style="margin-top:0px;">

				
				 
				  
					

	</td>
  </tr>
  </table></td>
 </tr>
</table>

<!--
	following javascript code creates rounded corners for top menu, shopping cart and categories section
	using Nifty library (http://www.html.it/articoli/niftycube/index.html)

<script type="text/javascript">
<?php echo '
	if ( ! (navigator.userAgent.indexOf(\'Opera\') != -1) )
	{
		Nifty("div.topmenu_notselected,div.topmenu_selected","top transparent");

		Nifty("td.topcorners","tl transparent");
		var tt_layers= getElementsBySelector("td.topcorners");
		for(var k=0, len=tt_layers.length; k<len; k++)
		{
			tt_layers[k].parentNode.style.backgroundColor = "#e0e7ff";
		}
		Nifty("td.topcorners","tr transparent");
		
		Nifty("td.bottomcorners","bl transparent");
		var tt_layers= getElementsBySelector("td.bottomcorners");
		for(var k=0, len=tt_layers.length; k<len; k++)
		{
			tt_layers[k].parentNode.style.backgroundColor = "#e0e7ff";
		}
		Nifty("td.bottomcorners","br transparent");
	}
'; ?>

</script>

	end of Nifty code
-->

</body>
</html>