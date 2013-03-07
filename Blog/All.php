<?php
include_once"scripts/connect.php";

$sql4 = mysql_query("SELECT * FROM entries ORDER BY id DESC");
while($row = mysql_fetch_array($sql4)){ 

	$title = $row["title"];
	$id = $row["id"];
	$author = $row["author"];

	
$result .= '<tr><td width="100"><td width="40" align="left">' . $id . '</td>
<td width="50" align="center"> <div align="center">-</div></td> <td width="150" align="left">
' . $title . '
<td width="50" align="center"> <div align="center">-</div></td>
<td width="150" align="left"> ' . $author . '<br /> </td></tr>';

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>All Entries</title>
<link href="style/main.css" rel="stylesheet" type="text/css" />
</head>

<body leftmargin="0">
<?php include_once"header.php"; ?>
<br />
<div align="left">
<table>
<?php print"$result"; ?>
</table>
</div>
</body>
</html>
