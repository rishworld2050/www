<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/

	ini_set("display_errors", "1");

	//ADMIN :: categories managment

	include("./cfg/connect.inc.php");
	include("./includes/database/mysql.php");
	include("./cfg/category_functions.php");
	include("./cfg/general.inc.php");

	//connect to database
	db_connect(DB_HOST,DB_USER,DB_PASS) or die (db_error());
	db_select_db(DB_NAME) or die (db_error());

	//checking for authorized access
	session_start();

	//current language
	include("./cfg/language_list.php");
	if (!isset($_SESSION["current_language"]) ||
		$_SESSION["current_language"] < 0 || $_SESSION["current_language"] > count($lang_list))
			$_SESSION["current_language"] = 0; //set default language

	if (isset($lang_list[$_SESSION["current_language"]]) && file_exists("./languages/".$lang_list[$_SESSION["current_language"]]->filename))
		include("./languages/".$lang_list[$_SESSION["current_language"]]->filename); //include current language file
	else
	{
		die("<font color=red><b>ERROR: Couldn't find language file!</b></font>");
	}

	include("./checklogin.php");
	if (!isset($_SESSION["log"]) || strcmp($_SESSION["log"],ADMIN_LOGIN)) //unauthorized
	{
		die ("You are not authorized to view this page");
	}

?><html>

<head>
<link rel=STYLESHEET href="images/backend/style-backend.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo DEFAULT_CHARSET;?>">
<title><?php echo ADMIN_CATEGORY_TITLE;?></title>
<script>
function confirmDelete(text,url)
{
	temp = window.confirm(text);
	if (temp) //delete
	{
		window.location=url;
	}
}
</script>
</head>

<body bgcolor=#D2D2FF>

<?php
	function deleteSubCategories($parent) //deletes all subcategories of category with categoryID=$parent
	{

		//subcategories
		$q = db_query("SELECT categoryID FROM ".CATEGORIES_TABLE." WHERE parent=$parent and categoryID<>0") or die (db_error());
		while ($row = db_fetch_row($q))
		{
			deleteSubCategories($row[0]); //recurrent call
		}
		$q = db_query("DELETE FROM ".CATEGORIES_TABLE." WHERE parent=$parent and categoryID<>0") or die (db_error());

		//move all product of this category to the root category
		$q = db_query("UPDATE ".PRODUCTS_TABLE." SET categoryID=0 WHERE categoryID=$parent") or die (db_error());
	}

	function category_Moves_To_Its_SubDirectories($cid, $new_parent)
	{
		//return true/false

		

		$a = false;
		$q = db_query("SELECT categoryID FROM ".CATEGORIES_TABLE." WHERE parent=$cid and categoryID<>0") or die (db_error());
		while ($row = db_fetch_row($q))
		{
			if ($row[0] == $new_parent) $a = true;
			else
			  $a = category_Moves_To_Its_SubDirectories($row[0],$new_parent);
		}
		return $a;
	}

	if (!isset($w)) $w=-1; //parent

	if (isset($_GET["picture_remove"])) //delete category thumbnail from server
	{
		$q = db_query("SELECT picture FROM ".CATEGORIES_TABLE." WHERE categoryID='".$_GET["c_id"]."' and categoryID<>0") or die (db_error());
		$r = db_fetch_row($q);
		if ($r[0] && file_exists("./products_pictures/$r[0]")) unlink("./products_pictures/$r[0]");
		db_query("UPDATE ".CATEGORIES_TABLE." SET picture='' WHERE categoryID='".$_GET["c_id"]."'") or die (db_error());
	}

	if (isset($_POST["save"]) && $_POST["name"]) { //save changes

		if (!isset($_POST["must_delete"])) //add new category
		{
			$q = db_query("INSERT INTO ".CATEGORIES_TABLE." (name, parent, products_count, description, picture, products_count_admin) VALUES ('".$_POST["name"]."',".$_POST["parent"].",0,'".$_POST["desc"]."','',0)") or die (db_error());
			$pid = db_insert_id();
		}
		else //update existing category
		{
			if ($_POST["must_delete"] != $_POST["parent"]) //if not moving category to itself
			{

				//if category is being moved to any of it's subcategories - it's
				//neccessary to 'lift up' all it's subcategories

				if (category_Moves_To_Its_SubDirectories($_POST["must_delete"], $_POST["parent"]))
				{
					//lift up is required

					//get parent
					$q = db_query("SELECT parent FROM ".CATEGORIES_TABLE." WHERE categoryID<>0 and categoryID='".$_POST["must_delete"]."'") or die (db_error());
					$r = db_fetch_row($q);

					//lift up
					db_query("UPDATE ".CATEGORIES_TABLE." SET parent='$r[0]' WHERE parent='".$_POST["must_delete"]."'") or die (db_error());

					//move edited category
					db_query("UPDATE ".CATEGORIES_TABLE." SET name='".str_replace("<","&lt;",$_POST["name"])."', description='".$_POST["desc"]."', parent='".$_POST["parent"]."' WHERE categoryID='".$_POST["must_delete"]."'") or die (db_error());

				}
				else //just move category
					db_query("UPDATE ".CATEGORIES_TABLE." SET name='".str_replace("<","&lt;",$_POST["name"])."', description='".$_POST["desc"]."', parent='".$_POST["parent"]."' WHERE categoryID='".$_POST["must_delete"]."'") or die (db_error());
			}
			$pid = $_POST["must_delete"];

			update_products_Count_Value_For_Categories(0);

		}

		if (isset($_FILES["picture"]) && $_FILES["picture"]["name"] && preg_match('/\.(jpg|jpeg|gif|jpe|pcx|bmp)$/i', $_FILES["picture"]["name"])) //upload category thumbnail
		{

			//old picture
			$q = db_query("SELECT picture FROM ".CATEGORIES_TABLE." WHERE categoryID='$pid' and categoryID<>0") or die (db_error());
			$row = db_fetch_row($q);

			//upload new photo
			$picture_name = str_replace(" ","_", $_FILES["picture"]["name"]);
			if (!move_uploaded_file($_FILES["picture"]["tmp_name"], "./products_pictures/$picture_name")) //failed to upload
			{
				echo "<center><font color=red>".ERROR_FAILED_TO_UPLOAD_FILE."</font>\n<br><br>\n";
				echo "<a href=\"javascript:window.close();\">".CLOSE_BUTTON."</a></center></body>\n</html>";
				exit;
			}
			else //update db
			{
				db_query("UPDATE ".CATEGORIES_TABLE." SET picture='$picture_name' WHERE categoryID='$pid'") or die (db_error());
				SetRightsToUploadedFile( "./products_pictures/".$picture_name );
			}

			//remove old picture...
			if ($row[0] && strcmp($row[0], $picture_name) && file_exists("./products_pictures/$row[0]"))
				unlink("./products_pictures/$row[0]");

		}

		//now close the window (in case of success)
		echo "<script>\n";
		echo "window.opener.location.reload();\n";
		echo "window.close();\n";
		echo "</script>\n</body>\n</html>";
	}
	else { //category edition from

		if (isset($_GET["c_id"])) //edit existing category
		{
			$q = db_query("SELECT name, description, picture FROM ".CATEGORIES_TABLE." WHERE categoryID='".$_GET["c_id"]."' and categoryID<>0") or die (db_error());
			$row = db_fetch_row($q);
			if (!$row) //can't find category....
			{
				echo "<center><font color=red>".ERROR_CANT_FIND_REQUIRED_PAGE."</font>\n<br><br>\n";
				echo "<a href=\"javascript:window.close();\">".CLOSE_BUTTON."</a></center></body>\n</html>";
				exit;
			}
			$title = "<b>$row[0]</b>";
			$n = $row[0];
			$d = $row[1];
			$picture = $row[2];

			if (isset($_GET["del"])) //delete category
			{

				//photo
				$q = db_query("SELECT picture FROM ".CATEGORIES_TABLE." WHERE categoryID='".$_GET["c_id"]."' and categoryID<>0") or die (db_error());
				$r = db_fetch_row($q);
				if ($r[0] && file_exists("./products_pictures/$r[0]")) unlink("./products_pictures/$r[0]");

				//delete from db
				$q = db_query("DELETE FROM ".CATEGORIES_TABLE." WHERE categoryID='".$_GET["c_id"]."' and categoryID<>0") or die (db_error());

				deleteSubCategories($_GET["c_id"]);

				update_products_Count_Value_For_Categories(0);

				//close window
				echo "<script>\n";
				echo "window.opener.location.reload();\n";
				echo "window.close();";
				echo "</script>\n</body>\n</html>";
			}
		}
		else //create new
		{
			$title = ADMIN_CATEGORY_NEW;
			$n = "";
			$d = "";
			$picture = "";
		}

?>

<center><font color=purple><?php echo $title; ?></font></center>
<form enctype="multipart/form-data" action="category.php" method=post>

<table width=100% border=0>

<tr>
<td align=right>
<?php
	if (!isset($_GET["c_id"])) echo ADMIN_CATEGORY_PARENT;
	else echo ADMIN_CATEGORY_MOVE_TO;
?>
</td>
<td width=5%>&nbsp;</td>
<td>
<select name="parent">
<option value="0"><?php echo ADMIN_CATEGORY_ROOT;?></option>
<?php
	//fill the category combobox
	$tmp = isset($_GET["w"]) ? $_GET["w"] : $_POST["parent"];
	$cats = fillTheCList(0,0);
	for ($i=0; $i<count($cats); $i++)
	{
		echo "<option value=\"".$cats[$i][0]."\"";
		if ($tmp == $cats[$i][0]) //select category
			echo " selected";
		echo ">";
		for ($j=0;$j<$cats[$i][5];$j++) echo "&nbsp;&nbsp;";
		echo $cats[$i][1];
		echo "</option>";
	}
?>
</select>
</td>
</tr>

<tr>
<td align=right><?php echo ADMIN_CATEGORY_NAME;?></td>
<td>&nbsp;</td>
<td><input type="text" name="name" value="<?php echo str_replace("\"","&quot;",$n); ?>" size=13></td>
</tr>

<tr>
<td align=right><?php echo ADMIN_CATEGORY_LOGO;?></td>
<td>&nbsp;</td>
<td><input type="file" name="picture"></td>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>
<?php
	if ($picture != "" && file_exists("./products_pictures/".$picture))
	{
		echo "<font class=average></font> <a class=small href=\"products_pictures/".$picture."\">$picture</a>\n";
		echo "<br><a href=\"javascript:confirmDelete('".QUESTION_DELETE_PICTURE."','category.php?c_id=".$_GET["c_id"]."&w=".$_GET["w"]."&picture_remove=yes');\">".DELETE_BUTTON."</a>\n";
	}
	else echo "<font class=average>".ADMIN_PICTURE_NOT_UPLOADED."</font>";
?>
</td>
</tr>

<tr>
<td align=right><?php echo ADMIN_CATEGORY_DESC;?><br>(HTML)</td>
<td></td>
<td><textarea name="desc" rows=7 cols=22><?php echo str_replace("\"","&quot;",$d); ?></textarea></td>
</tr>

</table>
<p><center>
<input type="submit" value="<?php echo SAVE_BUTTON;?>" width=5>
<input type="hidden" name="save" value="yes">
<input type="button" value="<?php echo CANCEL_BUTTON;?>" onClick="window.close();">
<?php
	//$must_delete indicated which query should be made: insert/update
	if (isset($_GET["c_id"]))
	{
		echo "<input type=\"hidden\" name=\"must_delete\" value=\"".str_replace("\"","",$_GET["c_id"])."\">\n";
		echo "<input type=\"button\" value=\"".DELETE_BUTTON."\" onClick=\"confirmDelete('".QUESTION_DELETE_CONFIRMATION."','category.php?c_id=".str_replace("\"","",$_GET["c_id"])."&del=1');\"";
	}
?>
</center></p>
</form>

</body>

</html>
<?php }; ?>