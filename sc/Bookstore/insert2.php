<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("bookstore", $con);

$sql="INSERT INTO users (user_name, password, email, ph_no)
VALUES
('$_POST[user_name]','$_POST[password]','$_POST[email]','$_POST[ph_no]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

mysql_close($con);
?>