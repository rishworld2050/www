<?PHP
require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($fgmembersite->Login())
   {
        $fgmembersite->RedirectToURL("login-home.php");
   }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
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
			<li><a href="http://localhost/my bookstore/sc/book/index.html" class="selected"><b><u>Home</u></b></a></li>
                
                <li><a href="http://localhost/my bookstore/sc/book/portfolio.html"><b><u>Gallery</u></b></a>
                    <ul>
                    	<li><span class="top"></span><span class="bottom"></span></li>
                        <li><a href="http://localhost/my bookstore/sc/book/fiction.html">Fiction</a></li>
                        <li><a href="http://localhost/my bookstore/sc/book/horror.html">Horror</a></li>
                        <li><a href="http://localhost/my bookstore/sc/book/edu.html">Educational</a></li>
                        <li><a href="http://localhost/my bookstore/sc/book/romantic.html">Romantic</a></li>
                        <li><a href="http://localhost/my bookstore/sc/book/comedy.html">Comedy</a></li>
						<li><a href="http://localhost/my bookstore/sc/book/politics.html">Politics</a></li>
						<li><a href="http://localhost/my bookstore/sc/book/sci-fi.html">Sci-Fi</a></li>
                  	</ul>
                </li>
                <li><a href="http://localhost/my bookstore/sc/book/blog_post.html"><b><u>Discussion</u></b></a></li>
                <li><a href="http://localhost/my bookstore/sc/book/forms/contact/Contact Us.php"><b><u>Contact Us</u></b></a></li>
				<li><a href="http://localhost/my bookstore/sc/book/login.php"><b><u>Register/Login</u></b></a></li>
				<li><a href="http://localhost/my bookstore/sc/"><b><u>Shopping</u></b></a></li>
            </ul>
            <br style="clear: left" />
        </div> 
        <div class="clear"></div>       
    </div> 
</div> 

<!-- Form Code Start -->
<div id="templatemo_main">

    	 <div id="contact_form">
		 <div class="half right">
<h2>Not Registerd!</h2>
<p><a href="http://localhost/my bookstore/sc/book/Contact.php">Click Here To Register!</a></font></p>
</div>
		 
<form id='login' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>

<h1>Login:</h1>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<div class='short_explanation'><font color="red">* required fields</font></div>
<div class="cleaner h10"></div>
<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
<div class="cleaner h10"></div>
<div class='container'>
    <label for="username" >UserName<font color="red">*</font>&nbsp;:</label>
    <input type="text" id="username" name="username" class="required input_field" />
    <span id="login_username_errorloc" class="error"</span>
	<div class="cleaner h10"></div>
    <label for="password">Password<font color="red">*</font>&nbsp;:</label>
    <input type="password" name="password" id="password" class="required input_field" /><br/>
    <span id='login_password_errorloc' class='error'></span>
	
</div>

<div class='container'>
   <input type="submit" value="submit" id="submit" name="submit" class="submit_btn left" />
  
</div>


</form>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("login");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

   frmvalidator.addValidation("username","req","");
    
    frmvalidator.addValidation("password","req","");

// ]]>
</script>
</div>
<div class="cleaner h10"></div>
<div class="cleaner h10"></div>
<div class="cleaner h10"></div>
<div class="cleaner h10"></div>
<div class="cleaner h10"></div>
<p align="left"><a href="http://localhost/my bookstore/sc/book/reset-pwd-req.php">Forgot Password?</a></p>
</div>
<!--
Form Code End (see html-form-guide.com for more info.)
-->

</body>
</html>