<?php
//This code was written by Freddie Sherratt
//and has been lisenced under the creative commons act.
//See http://creativecommons.org/licenses/by/2.0/uk/ for licsencing agreement.
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

//The line of code below runs the connect script, this allows you to connect to your sql datebase throughout the rest of the code.
include_once"scripts/connect.php";
//Tells the computer only to run this code if the form has been submited
if ($_POST['parse_var'] == "new"){
//The next 3 lines gather the information entered into form and turns them into php variables so they can be entered into the database
        $title = $_POST['title'];
	   $contents = $_POST['contents'];
	   $author = $_POST['author'];
//This bit places the php variables into the correct columns in your database
//Now() generates the current date
        $sqlcreate = mysql_query("INSERT INTO entries (date, title, contents, author)
		VALUES(now(),'$title','$contents','$author')");
//produces a message to let you know if the data has been successfully submited or not.
        if ($sqlcreate){
            $msg = '<font color="#009900">A new article has been created.</font>';
        } else {
			$msg = '<font color="#FF0000">Problems connecting to server, please try again later.</font>';
		}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Create</title>
<link href="style/main.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<style type="text/css">
<!--
.style1 {font-size: 12px}
-->
</style>
</head>

<body leftmargin="0">
<?php
//This adds the header page code to top of this page.
include_once"header.php"; ?>

<font face="Arial, Helvetica, sans-serif">
<table width="847">
<tr>
<td width="100">
</td>
<td width="735">
<table>
<tr>
<td colspan="2" valign="top" height="40">
<?php
//this is where the response message will be printed
 print"$msg";
 ?> </td>
 </tr>
 <tr>
 <td width="327">

<form action="create.php" method="post" name="new">
<table>
<tr>
<td colspan="2">
 <input name="title" type="text" value="Title" size="26"/>
<span class="small_print contents style1"> Article</span><span class="contents style1"> title<br />
<br /></span></td></tr>
<tr><td><textarea name="contents" rows="8" cols="24" >Content</textarea></td>
 <td valign="top"><p><span class="style1">Write your article, you will have to use html to make it look right.<br />  
   Some useful pieces of HTML are listed opposite.</span><br />
     </p>
   </td>
</tr>
<tr>
<td colspan="2">
<span class="contents style1">
<br />
 <input name="author" type="text" value="Author" size="26"/>
Authors name
</span><br />
<br />
</td>
</tr>
<tr>
<td colspan="2">
<input name="parse_var" type="hidden" value="new" />
<input type="submit" name="button3" id="button3" value="Submit" />
<input type="reset" name="Reset" id="button" value="Reset" />
</td>
</tr>
</table>
</form>
</td>
<td width="424" valign="top">
<table>
<tr>
<td>
<table width="406" cellpadding="3" cellspacing="3">
<tr>

</tr>
<tr>
<td width="107" height="146" valign="top"><span class="style1">Link Code: <br />
Image Code: <br />
New Line Code: <br />
Bold Code: <br />
Underline Code: <br />
Break Code: <br />
Font Size/Color: <br />
Paragraph: 
<br />
  </span>  </td>
<td width="276" valign="top"><span class="style1">&lt;a href=&quot;Link URL&quot;&gt;Link text&lt;/a&gt;<br />
&lt;img src=&quot;location of image&quot;/&gt;<br />
&lt;br /&gt;<br />
&lt;b&gt;Your text&lt;/b&gt;<br />
&lt;u&gt;Your text&lt;/u&gt;<br />
&lt;hr /&gt;<br />
&lt;font  size=&quot;+5&quot; color=&quot;#000000&quot;&gt;Your Text&lt;/font&gt; <br />
  &lt;p&gt;Your text&lt;/p&gt;</span></td>
</tr>
</table>
</td>
</tr>
<tr>
<td height="27"></td>
</tr>
<tr>
<td>
<table width="408">
<tr>
<td width="88">
<a rel="license" href="http://creativecommons.org/licenses/by/2.0/uk/"><img src="http://i.creativecommons.org/l/by/2.0/uk/88x31.png" alt="Creative Commons License" style="border-width:0" /></a><br />
</td>
<td width="308" class="style1">
    <span class="black" xmlns:dc="http://purl.org/dc/elements/1.1/" property="dc:title">The Blog Tutorial</span><span class="style6"> by <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.cuttingedgetech.wordpress.com" property="cc:attributionName" rel="cc:attributionURL">Freddie Sherratt</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/2.0/uk/">Creative Commons Attribution 2.0 UK: England &amp; Wales License</a>. 
  Based on a work at <a href="http://www.theblog.xtreemhost.com" rel="dc:source" xmlns:dc="http://purl.org/dc/elements/1.1/">www.theblog.xtreemhost.com</a>.
    </span>    </td>
    </tr>
    </table>
    </td>
    </tr>
    </table>
    
    </div></td>
</tr>
</table>
</td>
</tr>
</table>
</font>
</body>
</html>