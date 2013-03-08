<?PHP
/*
Simfatic Forms Main Form processor script

This script does all the server side processing. 
(Displaying the form, processing form submissions,
displaying errors, making CAPTCHA image, and so on.) 

All pages (including the form page) are displayed using 
templates in the 'templ' sub folder. 

The overall structure is that of a list of modules. Depending on the 
arguments (POST/GET) passed to the script, the modules process in sequence. 

Please note that just appending  a header and footer to this script won't work.
To embed the form, use the 'Copy & Paste' code in the 'Take the Code' page. 
To extend the functionality, see 'Extension Modules' in the help.

*/

ini_set("display_errors", 1);//the error handler is added later in FormProc
error_reporting(E_ALL & ~((defined('E_STRICT')?E_STRICT:0)|E_NOTICE));

require_once(dirname(__FILE__)."/includes/contact-lib.php");
$formproc_obj =  new SFM_FormProcessor('contact');
$formproc_obj->initTimeZone('default');
$formproc_obj->setFormID('614a62e0-34fa-41be-8fac-364e75b5d550');
$formproc_obj->setFormKey('01e7e6a3-817c-4a55-a763-0b002e913515');
$formproc_obj->setLocale('en-US','yyyy-MM-dd');
$formproc_obj->setEmailFormatHTML(true);
$formproc_obj->EnableLogging(false);
$formproc_obj->SetDebugMode(false);
$formproc_obj->setIsInstalled(true);
$formproc_obj->SetPrintPreviewPage(sfm_readfile(dirname(__FILE__)."/templ/contact_print_preview_file.txt"));
$formproc_obj->SetSingleBoxErrorDisplay(true);
$formproc_obj->setFormPage(0,sfm_readfile(dirname(__FILE__)."/templ/contact_form_page_0.txt"));
$formproc_obj->AddElementInfo('user_name','text','');
$formproc_obj->AddElementInfo('email','text','');
$formproc_obj->AddElementInfo('password','text','');
$formproc_obj->AddElementInfo('cpassword','text','');
$formproc_obj->AddElementInfo('ph_no','text','');
$formproc_obj->setFormDBLogin('localhost','root','','hotels_in_metro');
$formproc_obj->DisableAntiSpammerSecurityChecks();
$formproc_obj->SetFromAddress('admin@localhost');
$formproc_obj->InitSMTP('localhost','','',25);
$page_renderer =  new FM_FormPageDisplayModule();
$formproc_obj->addModule($page_renderer);

$admin_page =  new FM_AdminPageHandler();
$admin_page->SetPageTemplate(sfm_readfile(dirname(__FILE__)."/templ/contact_admin_page_templ.txt"));
$admin_page->SetLogin('admin','B3293FE49F43F012');
$admin_page->SetLoginTemplate(sfm_readfile(dirname(__FILE__)."/templ/contact_admin_page_login.txt"));
$formproc_obj->addModule($admin_page);

$validator =  new FM_FormValidator();
$validator->addValidation("user_name","required","Please fill in user_name");
$validator->addValidation("user_name","alnum","The input for user_name should be a valid alpha-numeric value");
$validator->addValidation("user_name","unique","This value is already submitted");
$validator->addValidation("user_name","maxlen=30","The length of the input for user_name should not exceed 30");
$validator->addValidation("user_name","minlen=8","The length of the input for user_name should be at least 8.");
$validator->addValidation("email","required","Please fill in email");
$validator->addValidation("email","email","The input for email should be a valid email value");
$validator->addValidation("email","unique","This value is already submitted");
$validator->addValidation("password","required","Please fill in password");
$validator->addValidation("password","alnum","The input for password should be a valid alpha-numeric value");
$validator->addValidation("password","maxlen=30","The length of the input for password should not exceed 30");
$validator->addValidation("password","minlen=8","The length of the input for password should be at least 8.");
$validator->addValidation("password","eqelmnt=cpassword","password should be equal to cpassword");
$validator->addValidation("cpassword","required","Please fill in cpassword");
$validator->addValidation("cpassword","alnum","The input for cpassword should be a valid alpha-numeric value");
$validator->addValidation("cpassword","maxlen=30","The length of the input for cpassword should not exceed 30");
$validator->addValidation("cpassword","minlen=8","The length of the input for cpassword should be at least 8.");
$validator->addValidation("ph_no","numeric","The input for ph_no should be a valid numeric value");
$validator->addValidation("ph_no","maxlen=11","The length of the input for ph_no should not exceed 11");
$validator->addValidation("ph_no","minlen=10","The length of the input for ph_no should be at least 10.");
$validator->addValidation("ph_no","greaterthan=0.00","The value of ph_no should be greater than 0.00");
$formproc_obj->addModule($validator);

$data_email_sender =  new FM_FormDataSender(sfm_readfile(dirname(__FILE__)."/templ/contact_email_subj.txt"),sfm_readfile(dirname(__FILE__)."/templ/contact_email_body.txt"),'%email%');
$data_email_sender->AddToAddr('rishabh<rishabh@localhost>');
$formproc_obj->addModule($data_email_sender);

$autoresp =  new FM_AutoResponseSender(sfm_readfile(dirname(__FILE__)."/templ/contact_resp_subj.txt"),sfm_readfile(dirname(__FILE__)."/templ/contact_resp_body.txt"));
$autoresp->SetToVariables('user_name','email');
$formproc_obj->addModule($autoresp);

$s_db_handler =  new FM_SimpleDB('fgusers');
$s_db_handler->AddField('user_name','VARCHAR(250)');
$s_db_handler->AddField('email','VARCHAR(250)');
$s_db_handler->AddField('password','VARCHAR(250)');
$s_db_handler->AddField('cpassword','VARCHAR(250)');
$s_db_handler->AddField('ph_no','INT');
$s_db_handler->AddUniqueFields('user_name','email');
$formproc_obj->addModule($s_db_handler);

$tupage =  new FM_ThankYouPage();
$tupage->SetRedirURL('http://localhost/contact/thankyou.html');
$formproc_obj->addModule($tupage);

$validator->SetDatabase($s_db_handler);
$page_renderer->SetFormValidator($validator);
$formproc_obj->ProcessForm();

?>