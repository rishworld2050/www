<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=<?php echo $this->CHARSET; ?>" />
<title></title>
<base href="<?php echo $this->BASE_PATH; ?>/" />
<link rel="stylesheet" href="stylesheet.css" type="text/css" />
<!--[if lt IE 7]>
<link rel="stylesheet" href="ie6.css" type="text/css" />
<![endif]-->
<script type="text/javascript" src="templates/js/jquery.js"></script>
<script type="text/javascript" src="templates/js/charCounter.js"></script>
<script type="text/javascript" src="templates/js/cart-functions.js"></script>
<style type="text/css">
  body { border:0 }
</style>
</head>

<body>      

<h1 class="prodDesc"><span style="background:url(templates/images/personalised.png) no-repeat top center;float:right;width:16px;height:16px">&nbsp;</span><?php echo $this->TEXT[0]; ?></h1>
      
<div id="personalisationWindow">

<form id="form" method="post" onsubmit="return updateProductPersonalisation('<?php echo $_GET['ppCE']; ?>')" action="<?php echo $this->URL; ?>">      
<?php 
// PERSONALISATION OPTIONS
// templates/html/products/product-personalisation-input.htm
// templates/html/products/product-personalisation-script.htm
// templates/html/products/product-personalisation-select.htm
// templates/html/products/product-personalisation-select-option.htm
// templates/html/products/product-personalisation-textarea.htm
// templates/html/products/product-personalisation-wrapper.htm
echo $this->OPTIONS;
?>

<div class="baseWrapper">
  <p class="message" id="message"><?php echo $this->TEXT[2]; ?></p>
  <p class="update" id="update_spinner"><input type="hidden" name="psUpdate" value="yes" /><input class="button" type="submit" title="<?php echo $this->TEXT[1]; ?>" value="<?php echo $this->TEXT[1]; ?>" /></p>
</div>

</form>

</div>

</body>
</html>
