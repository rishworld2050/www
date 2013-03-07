<?php /* Smarty version 2.6.0, created on 2013-03-07 11:24:35
         compiled from default.tpl.html */ ?>
<div style="margin: 10px">

<p><?php echo @constant('ADMIN_WELCOME'); ?>

</p>

<?php if ($this->_tpl_vars['totals']): ?>

<table border="0" style="border: 1px solid #CCC; background-color: #EEE" cellpadding="10">

 <tr>

	<td valign="top">

		<table cellpadding="3">
		<tr>
		 <td><img src="images/backend/custord_new_orders_32.gif"></td>
		 <td class="big"><b><u>Orders</u></b></td>
		</tr>
		<tr>
		 <td>&nbsp;</td>
		 <td>

			<table style="margin-left: 5px;" cellpadding="0">
			<tr><td>Today:</td><td><?php echo $this->_tpl_vars['totals']['orders_today']; ?>
 order(s) (<?php echo $this->_tpl_vars['totals']['revenue_today']; ?>
)</td></tr>
			<tr><td>Yesterday:</td><td><?php echo $this->_tpl_vars['totals']['orders_yesterday']; ?>
 order(s) (<?php echo $this->_tpl_vars['totals']['revenue_yesterday']; ?>
)</td></tr>
			<tr><td>This month:</td><td><?php echo $this->_tpl_vars['totals']['orders_thismonth']; ?>
 order(s) (<?php echo $this->_tpl_vars['totals']['revenue_thismonth']; ?>
)</td></tr>
			<tr><td>All time:</td><td><?php echo $this->_tpl_vars['totals']['orders']; ?>
 order(s) (<?php echo $this->_tpl_vars['totals']['revenue']; ?>
)</td></tr>
			</table>

		 </td>
		</tr>
		</table>

	</td>

	<td valign="top">

		<table cellpadding="3">
		<tr>
		 <td><img src="images/backend/catalog_products_categories_32.gif"></td>
		 <td class="big"><b><u>Products</u></b></td>
		</tr>
		<tr>
		 <td>&nbsp;</td>
		 <td>

			Total number of products: <b><?php echo $this->_tpl_vars['totals']['products']; ?>
</b><br />
			Products on sale (active): <b><?php echo $this->_tpl_vars['totals']['products_enabled']; ?>
</b><br />
			Product categories: <b><?php echo $this->_tpl_vars['totals']['categories']; ?>
</b><br /><br />

		 </td>
		</tr>
		</table>

	</td>

 </tr>

</table>


<?php endif; ?>

</div>