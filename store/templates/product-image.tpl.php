<?php
// PRODUCT IMAGE TEMPLATE FILE
// If required you can recall any value from the product table via the $this->PDATA array..
// This is for advanced users only..to see the contents of the array use print_r.
// print_r($this->PDATA)
?>
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
<style type="text/css">
  body { border:0 }
</style>
</head>

<body>      

<h1 class="imageDesc"><span style="background:url(templates/images/picture.png) no-repeat top center;float:right;width:16px;height:16px">&nbsp;</span><?php echo $this->TEXT[0]; ?></h1>
      
<div id="imageWrapper">
   
  <?php
  // Loading remote image..
  if ($this->REMOTE=='yes') {
  ?> 
  <p><img src="<?php echo $this->IMG; ?>" alt="<?php echo $this->TEXT[1]; ?>" title="<?php echo $this->TEXT[1]; ?>" /></p>
  <?php
  } else {
  ?> 
  <p><img src="templates/products/<?php echo $this->IMG; ?>" alt="<?php echo $this->TEXT[1]; ?>" title="<?php echo $this->TEXT[1]; ?>" /></p>
  <?php
  }
  ?>

</div>

</body>
</html>
