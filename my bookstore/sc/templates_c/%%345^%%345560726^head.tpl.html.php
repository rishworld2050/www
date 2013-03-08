<?php /* Smarty version 2.6.0, created on 2013-03-08 17:15:39
         compiled from head.tpl.html */ ?>
<head>
<title>Shopping</title>
<link rel=STYLESHEET href="style1.css" type="text/css">




<script>
<!--
<?php echo '
	function open_window(link,w,h) //opens new window
	{
		var win = "width="+w+",height="+h+",menubar=no,location=no,resizable=yes,scrollbars=yes";
		newWin = window.open(link,\'newWin\',win);
		newWin.focus();
	}

	function confirmDelete() //unsubscription confirmation
	{
		temp = window.confirm(\'';  echo @constant('QUESTION_UNSUBSCRIBE');  echo '\');
		if (temp) //delete
		{
			window.location="index.php?killuser=yes";
		}
	}

	function validate_custinfo() //validate customer information
	{
		if (document.custinfo_form.first_name.value=="" || document.custinfo_form.last_name.value=="")
		{
			alert("';  echo @constant('ERROR_INPUT_NAME');  echo '");
			return false;
		}
		if (document.custinfo_form.email.value=="")
		{
			alert("';  echo @constant('ERROR_INPUT_EMAIL');  echo '");
			return false;
		}
		if (document.custinfo_form.country.value=="")
		{
			alert("';  echo @constant('ERROR_INPUT_COUNTRY');  echo '");
			return false;
		}
		if (document.custinfo_form.state.value=="")
		{
			alert("';  echo @constant('ERROR_INPUT_STATE');  echo '");
			return false;
		}
		if (document.custinfo_form.zip.value=="")
		{
			alert("';  echo @constant('ERROR_INPUT_ZIP');  echo '");
			return false;
		}
		if (document.custinfo_form.city.value=="")
		{
			alert("';  echo @constant('ERROR_INPUT_CITY');  echo '");
			return false;
		}


		return true;
	}
'; ?>

-->
</script>

</head>