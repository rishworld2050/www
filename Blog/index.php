<?php 
//This code was written by Freddie Sherratt
//and has been lisenced under the creative commons act.
//See http://creativecommons.org/licenses/by/2.0/uk/ for licsencing agreement.
///////////////////////////////////////////////////////////////////////////////////////////////////////////////


//The line of code below runs the connect script, this allows you to connect to your sql database throughout 
//the rest of the code.
include_once"scripts/connect.php";

//This bit collects the id number from the URL and turns it into a php variable so ?id=1 would make $id = 1.
if ($_GET['id']) {
	
     $id = $_GET['id'];

} else {
//This section of code tells the computer to display the most recent article if the is no id number in the url, 
//by setting the $id variable as the id number for the most recent article
$sql1 = mysql_query("SELECT * FROM entries ORDER BY id DESC LIMIT 0,1 ");
while($row1 = mysql_fetch_array($sql1)){ 
$id = $row1["id"];
}
}
//The next 2 lines stop people from being able to hack our database, we do this by telling the computer to 
//remove all illegal characters
$id = mysql_real_escape_string($id);
$id = eregi_replace("`", "", $id);
//This line connects to our database and selects the data we want to display, we do this by telling it to SELECT
// data FROM entries (our database) Where the id number = $id
$sql = mysql_query("SELECT * FROM entries WHERE id='$id'");

while($row = mysql_fetch_array($sql)){ 
//This sections turns the data we've selected and want to use from our database and maked them into variables that we can use at any point in the code.
	$title = $row["title"];
	$contents = $row["contents"];
	$author = $row["author"];
	$date = $row["date"];
     $date = strftime("%b %d, %y", strtotime($date));	
	
     }
//The next 3 Lines of code connect to the database again and collect the ID of the most recent entry and set it
//as the PHP variable $id2, so we can change the controls on the last article.
$sql1 = mysql_query("SELECT * FROM entries ORDER BY id DESC LIMIT 0,1 ");
while($row1 = mysql_fetch_array($sql1)){ 
$id2 = $row1["id"];
}
//The next two lines of code are for the controls to view older and newer articles, the add or subtract 1 to the
//Id number.
$up_1 = $id+1;
$down_1 = $id-1;
//This if function will only be used when there is only one article. If this is the case there will be no
//need for controls to change article so they will not be displayed.
if ($id2==1) {
$Left_move1 = '';
$Left_move2 = '';
$right_Move1 = '';
$right_Move2 = '';
//The next line checks whether the article you are on is the Oldest and then generates the relevant controls. 
//For the purpose of this tutorial we will assume that you are not deleting articles, so the first article  
//has an ID of 1.
} else if ($id==1){
//This generates the Links to navigate the articles, only the relevant links will appear on the articles, so 
//for the first article only the Latest and next article links will appear.
$Left_move1 = '<a href="http://www.theblog.xtreemhost.com/?id=' . $id2 . '"><< Latest Article</a>';
$Left_move2 ='<a href="http://www.theblog.xtreemhost.com/?id=' . $up_1 . '">< Next Article</a>';
$right_Move1 = '';
$right_Move2 = '';
//The next line checks whether the article you are on is the Latest article and generates the correct controls.
} else if ($id==$id2){
//Only the relavnt controls again appear so only Previous Article and Oldest Article will be shown. 
$right_Move1 =' <a href="http://www.theblog.xtreemhost.com/?id=' . $down_1 . '">Previous Article ></a>';
$right_Move2 ='<a href="http://www.theblog.xtreemhost.com/?id=1">Oldest Article >></a>';
$Left_move1 = '';
$Left_move2 = '';
//The next line tells the computer to show all the controls if neither of the above apply
} else {
// So for every other article you need all the controls.
$Left_move1 = '<a href="http://www.theblog.xtreemhost.com/?id=' . $id2 . '"><< Latest Article</a>';
$Left_move2 ='<a href="http://www.theblog.xtreemhost.com/?id=' . $up_1 . '">< Next Article</a>';
$right_Move1 =' <a href="http://www.theblog.xtreemhost.com/?id=' . $down_1 . '">Previous Article ></a>';
$right_Move2 ='<a href="http://www.theblog.xtreemhost.com/?id=1">Oldest Article >></a>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link href="style/main.css" rel="stylesheet" type="text/css" />
<title><?php 
//This prints the name of the article as the title of the page (the bit of text that appears at the top of your browser window).
print"$title"; ?></title>
<style type="text/css">
<!--
.style1 {font-size: 35px}
.style3 {font-size: 20px}
.style4 {font-size: 15px}
.style5 {font-size: 30px}
.style6 {font-size: 12px}
-->
</style>
</head>

<body leftmargin="0">
<font face="Arial, Helvetica, sans-serif">
<div align="center">
<?php 
//This adds the header page code to top of this page.
include_once"header.php"; ?><br />

<table width="650">
<tr>
<td colspan="5" >
  <span class="style1"><?php 
//This prints the title of the article.
  print"$title"; ?><br />
  </span>
  <span class="style3"><?php
//This prints the date the article was created.
   print"$date"; ?>
  </span><p></p></td>
</tr>
<tr>
<td colspan="5">
  <img src="images/divide.png" width="643" height="15" /><br /><br /></td>
</tr>
<tr>
<td colspan="5">
  <p><span class="style6"><?php 
//This prints the article contents.
  print"$contents"; ?>
  </span></p></td>
</tr>
<tr>
<td colspan="5">
  <p><span class="style5"><?php 
//This printsthe article's author.
  print"$author"; ?>
  </span></p></td>
</tr>
<tr>
<td colspan="5">
<img src="images/divide.png" /><br /><br /></td>
</tr>
<tr>
<td width="160" align="left"><span class="style4 black"><?php 
//This prints the Newest article link if it is required  
print"$Left_move1"; ?></span><br /><br /></td>
  <td width="160" align="right"><span class="style4 black"><?php 
//This prints the Newer article link if it is required    
print"$Left_move2"; ?></span><br /><br /></td>
  <td width="10" align="right"><br /><br /></td>
  <td width="160" align="left"><span class="style4 black"><?php 
//This prints the Older article link if it is required  
print"$right_Move1"; ?></span><br /><br /></td>
  <td width="160" align="right"><span class="style4 black"><?php 
//This prints the Oldest article link if it is required  
print"$right_Move2"; ?></span><br /><br /></td>
</tr>
  <tr>
  <td height="75" colspan="5">

<div align="left" class="style1">
<table>
<tr>
<td>
<a rel="license" href="http://creativecommons.org/licenses/by/2.0/uk/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by/2.0/uk/88x31.png" /></a><br />
</td>
<td>
    <span class="style6 black" xmlns:dc="http://purl.org/dc/elements/1.1/" property="dc:title">The Blog Tutorial</span><span class="style6"> by <a xmlns:cc="http://creativecommons.org/ns#" href="http://www.cuttingedgetech.wordpress.com" property="cc:attributionName" rel="cc:attributionURL">Freddie Sherratt</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/2.0/uk/">Creative Commons Attribution 2.0 UK: England &amp; Wales License</a>. 
  Based on a work at <a href="http://www.theblog.xtreemhost.com" rel="dc:source" xmlns:dc="http://purl.org/dc/elements/1.1/">www.theblog.xtreemhost.com</a>.
    </span>
    </td>
    </tr>
    </table>
    </div> </td>
  </tr>
</table>
</div>
</font>
</body>
</html>