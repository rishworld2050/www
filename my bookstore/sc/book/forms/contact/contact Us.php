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
$formproc_obj->setFormID('9ad313fb-d894-4e41-85e5-0b383e8d7027');
$formproc_obj->setFormKey('9f602fbb-69cd-4287-af03-d5018d2e0a74');
$formproc_obj->setLocale('en-US','yyyy-MM-dd');
$formproc_obj->setEmailFormatHTML(true);
$formproc_obj->EnableLogging(false);
$formproc_obj->SetDebugMode(false);
$formproc_obj->setIsInstalled(true);
$formproc_obj->SetPrintPreviewPage(sfm_readfile(dirname(__FILE__)."/templ/contact_print_preview_file.txt"));
$formproc_obj->SetSingleBoxErrorDisplay(true);
$formproc_obj->setFormPage(0,sfm_readfile(dirname(__FILE__)."/templ/contact_form_page_0.txt"));
$formproc_obj->AddElementInfo('name','text','');
$formproc_obj->AddElementInfo('email','text','');
$formproc_obj->AddElementInfo('address','text','');
$formproc_obj->AddElementInfo('ph_no','text','');
$formproc_obj->AddElementInfo('feedback','multiline','');
$formproc_obj->DisableAntiSpammerSecurityChecks();
$formproc_obj->SetFromAddress('admin@localhost');
$formproc_obj->InitSMTP('localhost','','',25);
$page_renderer =  new FM_FormPageDisplayModule();
$formproc_obj->addModule($page_renderer);

$admin_page =  new FM_AdminPageHandler();
$admin_page->SetPageTemplate(sfm_readfile(dirname(__FILE__)."/templ/contact_admin_page_templ.txt"));
$admin_page->SetLogin('','');
$admin_page->SetLoginTemplate(sfm_readfile(dirname(__FILE__)."/templ/contact_admin_page_login.txt"));
$formproc_obj->addModule($admin_page);

$validator =  new FM_FormValidator();
$validator->addValidation("name","required","Please fill in name");
$validator->addValidation("name","alpha_s","The input for name should be a valid alphabetic value");
$validator->addValidation("email","required","Please fill in email");
$validator->addValidation("email","email","The input for email should be a valid email value");
$validator->addValidation("address","required","Please fill in address");
$validator->addValidation("address","alnum_s","The input for address should be a valid alpha-numeric value");
$validator->addValidation("ph_no","numeric","The input for Mobile should be a valid numeric value");
$validator->addValidation("ph_no","maxlen=11","The length of the input for Mobile should not exceed 11");
$validator->addValidation("ph_no","minlen=10","The length of the input for Mobile should be at least 10.");
$validator->addValidation("ph_no","greaterthan=0.00","The value of Mobile should be greater than 0.00");
$validator->addValidation("feedback","required","Please fill in feedback");
$formproc_obj->addModule($validator);

$data_email_sender =  new FM_FormDataSender(sfm_readfile(dirname(__FILE__)."/templ/contact_email_subj.txt"),sfm_readfile(dirname(__FILE__)."/templ/contact_email_body.txt"),'%email%');
$data_email_sender->AddToAddr('Administrator<admin@bookstore.com>');
$formproc_obj->addModule($data_email_sender);

$tupage =  new FM_ThankYouPage();
$tupage->SetRedirURL('http://localhost/my bookstore/sc/book/thankyouf.html');
$formproc_obj->addModule($tupage);

$page_renderer->SetFormValidator($validator);
$formproc_obj->ProcessForm();

?>