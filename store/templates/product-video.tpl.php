<?php
// PRODUCT VIDEO TEMPLATE FILE
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
<script type="text/javascript" src="templates/js/flowplayer.js"></script>
<style type="text/css">
  body { border:0 }
</style>
</head>

<body>      

<h1 class="prodDesc"><span style="background:url(templates/images/video.png) no-repeat top center;float:right;width:16px;height:16px">&nbsp;</span><?php echo $this->TEXT[0]; ?></h1>
      
<div id="videoWrapper">
<?php
// If there is a product video specified, display it..
if ($this->PRODUCT_VIDEO) {
?>
<p style="text-align:center;margin: 0px auto">
<a href="<?php echo $this->BASE_PATH; ?>/templates/video/<?php echo $this->PRODUCT_VIDEO; ?>" style="margin:0px auto;display:block;width:<?php echo $this->VIDEO_PARAMS[0]; ?>px;height:<?php echo $this->VIDEO_PARAMS[1]; ?>px" id="player"></a> 
</p>

<!--
For configuration options for FlowPlayer visit:
http://flowplayer.org/
-->


<script type="text/javascript">
//<![CDATA[
flowplayer("player", "templates/flowPlayer/flowplayer-3.2.2.swf", {
           plugins: { 
              controls: {
                autoHide: false
              }
            }
});
//]]>
</script>

<p class="desc">
  <?php echo $this->PRODUCT_DESC; ?>
</p>
<?php
// Else show message about no product video..
} else {
?>
<img src="templates/images/no-product-video.gif" alt="<?php echo $this->TEXT[1]; ?>" title="<?php echo $this->TEXT[1]; ?>" /><br /><br />
<?php echo $this->TEXT[1]; ?>
<?php
}
?>
</div>

</body>
</html>
