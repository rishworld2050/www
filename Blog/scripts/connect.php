<?php 
//This code was written by Freddie Sherratt
//and has been lisenced under the creative commons act.
//See http://creativecommons.org/licenses/by/2.0/uk/ for licsencing agreement.
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

//This code can be included in any of your php pages to connect to your datebase
$db_host = "localhost"; //your host Database adress quite often localhost
$db_username = "root"; //your username
$db_pass = ""; //your password
$db_name = "blog"; //your database name
@mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
@mysql_select_db("$db_name") or die ("no database");
?>