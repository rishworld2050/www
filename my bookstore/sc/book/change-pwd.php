<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

if(isset($_POST['submitted']))
{
   if($fgmembersite->ChangePassword())
   {
        $fgmembersite->RedirectToURL("changed-pwd.html");
   }
}



?>

<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Change password</title>
      <link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>

      <script src="scripts/pwdwidget.js" type="text/javascript"></script>  
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
	  
</head>
<body>

<!-- Form Code Start -->
<div id="templatemo_main">

    	 <div id="contact_form">
<form id='changepwd' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
Change Password

<input type='hidden' name='submitted' id='submitted' value='1'/>
<div class='short_explanation'><font color="red">* required fields</font></div>
<div class="cleaner h10"></div>
<div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
<div class="cleaner h10"></div>
<div class='container'>
    <label for="oldpwd" >Old Password<font color="red">*</font>&nbsp;:</label>
	 <input type="password" id="oldpwd" name="oldpwd" class="required input_field" />
   
	<span id='changepwd_oldpwd_errorloc' class='error'></span>
	<div class="cleaner h10"></div>
    <label for="newpwd">New Password<font color="red">*</font>&nbsp;:</label>
	
    <input type="password" name="newpwd" id="newpwd" class="required input_field" /><br/>

    <span id='changepwd_newpwd_errorloc' class='error'></span>
</div>
<div class='container'>
    <input type='submit' name='Submit' value='Submit' />
</div>

</form>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[
    var pwdwidget = new PasswordWidget('oldpwddiv','oldpwd');
    pwdwidget.enableGenerate = false;
    pwdwidget.enableShowStrength=false;
    pwdwidget.enableShowStrengthStr =false;
    pwdwidget.MakePWDWidget();
    
    var pwdwidget = new PasswordWidget('newpwddiv','newpwd');
    pwdwidget.MakePWDWidget();
    
    
    var frmvalidator  = new Validator("changepwd");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();

    frmvalidator.addValidation("oldpwd","req","Please provide your old password");
    
    frmvalidator.addValidation("newpwd","req","Please provide your new password");

// ]]>
</script>

<p><br>
<a href='login-home.php'>Home</a>
</p>

</div>
</div>
<!--
Form Code End (see html-form-guide.com for more info.)
-->

</body>
</html>