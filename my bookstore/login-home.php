<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact Us</title>
<meta name="keywords" content="bookstore" />
<meta name="description" content="Bookstore" />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

<link rel="stylesheet" type="text/css" media="all" href="css/jquery.dualSlider.0.2.css" />

<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="js/jquery.timers-1.2.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="js/slimbox2.js"></script> 
      
</head>
<body>
<div id="templatemo_header_wrapper">
	<div id="templatemo_header">
    	<div id="site_title"><a href="#">Bookstore</a></div>
        <div id="templatemo_menu" class="ddsmoothmenu">
            <ul>
                <li><a href="index.html" class="selected"><b><u>Home</u></b></a></li>
                
                <li><a href="portfolio.html"><b><u>Gallery</u></b></a>
                    <ul>
                    	<li><span class="top"></span><span class="bottom"></span></li>
                        <li><a href="#">Fiction</a></li>
                        <li><a href="#">Horror</a></li>
                        <li><a href="#">Educational</a></li>
                        <li><a href="#">Romantic</a></li>
                        <li><a href="#">Comedy</a></li>
                  	</ul>
                </li>
                <li><a href="blog_post.html"><b><u>Discussion</u></b></a></li>
                <li><a href="contact.html"><b><u>Contact Us</u></b></a></li>
            </ul>
            <br style="clear: left" />
        </div> 
        <div class="clear"></div>       
    </div> 
</div> 

<div id="templatemo_main">
<h1>Home Page</h1>
<h2>Welcome back <?= $fgmembersite->UserFullName(); ?>! </h2>

<p><a href='change-pwd.php'>Change password</a></p>

<!--<p><a href='access-controlled.php'>A sample 'members-only' page</a></p>-->
<br><br><br>
<p><a href='logout.php'>Logout</a></p>
</div>
</body>
</html>
