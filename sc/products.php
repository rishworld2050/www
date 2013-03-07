<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/


	//ADMIN :: products managment

	ini_set("display_errors", "1");

	include("./cfg/connect.inc.php");
	include("./includes/database/mysql.php");
	include("./cfg/category_functions.php");
	include("./cfg/general.inc.php");

	//connect 2 database
	db_connect(DB_HOST,DB_USER,DB_PASS) or die (db_error());
	db_select_db(DB_NAME) or die (db_error());

	session_start();
	include("./checklogin.php");
	if (!isset($_SESSION["log"]) || strcmp($_SESSION["log"],ADMIN_LOGIN)) //unauthorized
	{
		die ("You are not authorized to view this page");
	}

	//get currency ISO 3 code
	$currency_iso_3 = (defined('CONF_CURRENCY_ISO3')) ? CONF_CURRENCY_ISO3 : "USD" ;

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

	if (!isset($_GET["productID"])) $_GET["productID"] = 0;

	if (isset($_POST["save_product"])) //save item to the database
	{

		if (!isset($_POST["price"]) || !$_POST["price"] || $_POST["price"] < 0)
			$_POST["price"] = 0; //price can not be negative

		if (!isset($_POST["name"]) || trim($_POST["name"])=="") $_POST["name"] = "not defined";

		$instock = (isset($_POST["in_stock"])) ? 1 : 0;

		if ($_POST["save_product"]) { //if $_POST["save_product"] != 0 then update item

			//delete old product photos if they're being replaced
			$q = db_query("SELECT picture, big_picture, thumbnail FROM ".PRODUCTS_TABLE." WHERE productID='".$_POST["save_product"]."'") or die (db_error());
			$row = db_fetch_row($q);

			//generating query

			$s = "UPDATE ".PRODUCTS_TABLE." SET categoryID='".$_POST["categoryID"]."', name='".$_POST["name"]."', Price='".$_POST["price"]."', description='".$_POST["description"]."', in_stock=".$instock.", customers_rating='".$_POST["rating"]."', brief_description='".$_POST["brief_description"]."', list_price='".$_POST["list_price"]."', product_code='".$_POST["product_code"]."'";

			$s1 = "";

			//old pictures?
			if (isset($_FILES["picture"]) && $_FILES["picture"]["name"])
			{
				//delete old picture
				if ($row[0] && file_exists("./products_pictures/".$row[0]))
					unlink("./products_pictures/".$row[0]);
			}
			if (isset($_FILES["big_picture"]) && $_FILES["big_picture"]["name"])
			{
				//delete old picture
				if ($row[1] && file_exists("./products_pictures/".$row[1]))
					unlink("./products_pictures/".$row[1]);
			}
			if (isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]["name"])
			{
				//delete old picture
				if ($row[2] && file_exists("./products_pictures/".$row[2]))
					unlink("./products_pictures/".$row[2]);
			}

			$pid = $_POST["save_product"];

		}
		else
		{
			//add new product
			db_query("INSERT INTO ".PRODUCTS_TABLE." (categoryID, name, description, customers_rating, Price, in_stock, customer_votes, items_sold, enabled, brief_description, list_price, product_code, picture, thumbnail, big_picture) VALUES ('".$_POST["categoryID"]."','".$_POST["name"]."','".$_POST["description"]."', 0, '".$_POST["price"]."', ".$instock.", 0, 0, 1, '".$_POST["brief_description"]."', '".$_POST["list_price"]."', '".$_POST["product_code"]."','','','');") or die (db_error());
			$pid = db_insert_id();

			$dont_update = 1; //don't update product

			$s  = "";
			$s1 = "UPDATE ".PRODUCTS_TABLE." SET categoryID=categoryID";
		}

		//add pictures?
		//regular photo
		if (isset($_FILES["picture"]) && $_FILES["picture"]["name"] && preg_match('/\.(jpg|jpeg|gif|jpe|pcx|bmp)$/i', $_FILES["picture"]["name"])) //upload
		{
			$_FILES["picture"]["name"] = str_replace(" ","_",$_FILES["picture"]["name"]);
			$r = move_uploaded_file($_FILES["picture"]["tmp_name"], "./products_pictures/".$_FILES["picture"]["name"]);
			if (!$r) //failed 2 upload
			{
				echo "<center><font color=red>".ERROR_FAILED_TO_UPLOAD_FILE."</font>\n<br><br>\n";
				echo "<a href=\"javascript:window.close();\">".CLOSE_BUTTON."</a></center></body>\n</html>";
				exit;
			}

			SetRightsToUploadedFile( "./products_pictures/".$_FILES["picture"]["name"] );

			$s .= ", picture='".$_FILES["picture"]["name"]."'";
			$s1.= ", picture='".$_FILES["picture"]["name"]."'";
		}
		//enlarged photo
		if (isset($_FILES["big_picture"]) && $_FILES["big_picture"]["name"] && preg_match('/\.(jpg|jpeg|gif|jpe|pcx|bmp)$/i', $_FILES["big_picture"]["name"]))
		{ 
			$_FILES["big_picture"]["name"] = str_replace(" ","_",$_FILES["big_picture"]["name"]);
			$r = move_uploaded_file($_FILES["big_picture"]["tmp_name"], "./products_pictures/".$_FILES["big_picture"]["name"]);
			if (!$r) //failed 2 upload
			{
				echo "<center><font color=red>".ERROR_FAILED_TO_UPLOAD_FILE."</font>\n<br><br>\n";
				echo "<a href=\"javascript:window.close();\">".CLOSE_BUTTON."</a></center></body>\n</html>";
				exit;
			}

			SetRightsToUploadedFile( "./products_pictures/".$_FILES["big_picture"]["name"] );

			$s .= ", big_picture='".$_FILES["big_picture"]["name"]."'";
			$s1.= ", big_picture='".$_FILES["big_picture"]["name"]."'";
		}
		//thumbnail
		if (isset($_FILES["thumbnail"]) && $_FILES["thumbnail"]["name"] && preg_match('/\.(jpg|jpeg|gif|jpe|pcx|bmp)$/i', $_FILES["thumbnail"]["name"]))
		{
			$_FILES["thumbnail"]["name"] = str_replace(" ","_",$_FILES["thumbnail"]["name"]);
			$r = move_uploaded_file($_FILES["thumbnail"]["tmp_name"], "./products_pictures/".$_FILES["thumbnail"]["name"]);
			if (!$r) //failed 2 upload
			{
				echo "<center><font color=red>".ERROR_FAILED_TO_UPLOAD_FILE."</font>\n<br><br>\n";
				echo "<a href=\"javascript:window.close();\">".CLOSE_BUTTON."</a></center></body>\n</html>";
				exit;
			}

			SetRightsToUploadedFile( "./products_pictures/".$_FILES["thumbnail"]["name"] );

			$s .= ", thumbnail='".$_FILES["thumbnail"]["name"]."'";
			$s1.= ", thumbnail='".$_FILES["thumbnail"]["name"]."'";
		}

		if (!isset($dont_update)) //update product info
		{
			$s .= " WHERE productID='".$_POST["save_product"]."'";
			db_query($s) or die (db_error());
			$productID = $_POST["save_product"];
		}
		else //don't update (insert query is already completed)
		{
			$s1.= " WHERE productID=$pid";
			db_query($s1) or die (db_error());
			$productID = $pid;
		}

		update_products_Count_Value_For_Categories(0);

		//close window
		echo "<script>\n";
		echo "window.opener.location.reload();\n";
		echo "window.close();\n";
		echo "</script>\n</body>\n</html>";
		exit;
	}
	else //get product from db
	{
		if ($_GET["productID"])
		{

			$q = db_query("SELECT categoryID, name, description, customers_rating, Price, picture, in_stock, thumbnail, big_picture, brief_description, list_price, product_code FROM ".PRODUCTS_TABLE." WHERE productID='".$_GET["productID"]."'") or die (db_error());
			$row = db_fetch_row($q);
 			if (!$row) //product wasn't found
			{
				echo "<center><font color=red>".ERROR_CANT_FIND_REQUIRED_PAGE."</font>\n<br><br>\n";
				echo "<a href=\"javascript:window.close();\">".CLOSE_BUTTON."</a></center></body>\n</html>";
				exit;
			}

			if (isset($_GET["picture_remove"])) //delete items picture from server if requested
			{
				if ($_GET["picture_remove"] && file_exists("./products_pictures/".$row[$_GET["picture_remove"]]))
					unlink("./products_pictures/".$row[$_GET["picture_remove"]]);
				$picture = "none";
			}

			if (isset($_GET["delete"])) //delete product
			{
				//at first photos...
				if ($row[5] != "none" && $row[5] != "" && file_exists("./products_pictures/".$row[5]))
					unlink("./products_pictures/".$row[5]);
				if ($row[7] != "none" && $row[7] != "" && file_exists("./products_pictures/".$row[7]))
					unlink("./products_pictures/".$row[7]);
				if ($row[8] != "none" && $row[8] != "" && file_exists("./products_pictures/".$row[8]))
					unlink("./products_pictures/".$row[8]);

				$q = db_query("DELETE FROM ".PRODUCTS_TABLE." WHERE productID='".$_GET["productID"]."'") or die (db_error());

				//close window
				echo "<script>\n";
				echo "window.opener.location.reload();\n";
				echo "window.close();\n";
				echo "</script>\n</body>\n</html>";
				exit;
			}

			$title = $row[1];

		}
		else //creating new item
		{
			$title = ADMIN_PRODUCT_NEW;
			$cat = isset($_GET["categoryID"]) ? $_GET["categoryID"] : 0;
			$row = array($cat,"","","",0,"",1,"","","",0,"");
		}
	}



?>

<html>

<head>
<link rel=STYLESHEET href="images/backend/style-backend.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo DEFAULT_CHARSET;?>">
<title><?php echo ADMIN_PRODUCT_TITLE;?></title>
<script>
function confirmDelete(question, where)
{
	temp = window.confirm(question);
	if (temp) //delete
	{
		window.location=where;
	}
}
function open_window(link,w,h) //opens new window
{
	var win = "width="+w+",height="+h+",menubar=no,location=no,resizable=yes,scrollbars=yes";
	wishWin = window.open(link,'wishWin',win);
}
</script>
</head>

<body bgcolor=#FFFFE2>
<center>
<p>
<b><?php echo $title; ?></b>

<form enctype="multipart/form-data" action="products.php" method=post>

<table width=100% border=0 cellpadding=3 cellspacing=0>

<tr>
<td align=right><?php echo ADMIN_CATEGORY_PARENT;?></td>
<td>
<select name="categoryID">
<option value="0"><?php echo ADMIN_CATEGORY_ROOT;?></option>
<?php
	//show categories select element
	$cats = fillTheCList(0,0);
	for ($i=0; $i<count($cats); $i++)
	{
		echo "<option value=\"".$cats[$i][0]."\"";
		if ($row[0] == $cats[$i][0]) //select category
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
<td align=right><?php echo ADMIN_PRODUCT_NAME;?></td>
<td><input type="text" name="name" value="<?php echo str_replace("\"","&quot;",$row[1]); ?>"></td>
</tr>

<tr>
<td align=right><?php echo ADMIN_PRODUCT_CODE;?></td>
<td><input type="text" name="product_code" value="<?php echo str_replace("\"","&quot;",$row[11]); ?>"></td>
</tr>

<?php	if ($_GET["productID"]) { ?>
<tr>
<td align=right><?php echo ADMIN_PRODUCT_RATING;?>:</td>
<td><input type=text name="rating" value="<?php echo str_replace("\"","&quot;",$row[3]); ?>"></b></td>
</tr>

<?php }; ?>

<tr>
<td align=right><?php echo ADMIN_PRODUCT_PRICE;?>, <?php echo $currency_iso_3; ?><br>(<?php echo STRING_NUMBER_ONLY;?>):</td>
<td><input type="text" name="price" value=<?php echo $row[4]; ?>></td>
</tr>

<tr>
<td align=right><?php echo ADMIN_PRODUCT_LISTPRICE;?>, <?php echo $currency_iso_3; ?><br>(<?php echo STRING_NUMBER_ONLY;?>):</td>
<td><input type="text" name="list_price" value=<?php echo $row[10]; ?>></td>
</tr>

<?php
	if ($row[6]<0) $is = 0;
	else $is = $row[6];

?>
<tr>
<td align=right><?php echo ADMIN_PRODUCT_INSTOCK;?>:</td>
<td><input type="checkbox" name="in_stock"<?php if ($is > 0) echo " checked"; ?>></td>
</tr>


<tr><td>&nbsp;</td></tr>

<tr>
<td align=right><?php echo ADMIN_PRODUCT_PICTURE;?></td>
<td><input type="file" name="picture"></td>
<tr><td></td><td>
<?php
	if ($row[5]!="" && file_exists("./products_pictures/".$row[5]))
	{
		echo "<a class=small href=\"products_pictures/".$row[5]."\">$row[5]</a>\n";
		echo "<br><a href=\"javascript:confirmDelete('".QUESTION_DELETE_PICTURE."','products.php?productID=".$_GET["productID"]."&picture_remove=5');\">".DELETE_BUTTON."</a>\n";
	}
	else echo "<font class=average color=brown>".ADMIN_PICTURE_NOT_UPLOADED."</font>";
?>
</td>
</tr>
<tr>
<td align=right><?php echo ADMIN_PRODUCT_THUMBNAIL;?></td>
<td><input type="file" name="thumbnail"></td>
<tr><td></td><td>
<?php
	if ($row[7]!="" && file_exists("./products_pictures/".$row[7]))
	{
		echo "<a class=small href=\"products_pictures/".$row[7]."\">$row[7]</a>\n";
		echo "<br><a href=\"javascript:confirmDelete('".QUESTION_DELETE_PICTURE."','products.php?productID=".$_GET["productID"]."&picture_remove=7');\">".DELETE_BUTTON."</a>\n";
	}
	else echo "<font class=average color=brown>".ADMIN_PICTURE_NOT_UPLOADED."</font>";
?>
</td>
</tr>
<tr>
<td align=right><?php echo ADMIN_PRODUCT_BIGPICTURE;?></td>
<td valign=top><input type="file" name="big_picture"></td>
<tr><td></td><td valign=top>
<?php
	if ($row[8] && file_exists("./products_pictures/".$row[8]))
	{
		echo "<a class=small href=\"products_pictures/".$row[8]."\">$row[8]</a>\n";
		echo "<br><a href=\"javascript:confirmDelete('".QUESTION_DELETE_PICTURE."','products.php?productID=".$_GET["productID"]."&picture_remove=8');\">".DELETE_BUTTON."</a>\n";
	}
	else echo "<font class=average color=brown>".ADMIN_PICTURE_NOT_UPLOADED."</font>";
?>
</td>
</tr>


<tr>
<td align=right><?php echo ADMIN_PRODUCT_DESC;?><br>(HTML):</td>
<td><textarea name="description" rows=15 cols=40><?php echo str_replace("<","&lt;",$row[2]); ?></textarea></td>
</tr>

<tr>
<td align=right><?php echo ADMIN_PRODUCT_BRIEF_DESC;?><br>(HTML):</td>
<td><textarea name="brief_description" rows=7 cols=40><?php echo str_replace("<","&lt;",$row[9]); ?></textarea></td>
</tr>

</table>


<p><center>
<input type="submit" value="<?php echo SAVE_BUTTON;?>" width=5>
<input type="hidden" name="save_product" value=<?php echo $_GET["productID"]; ?>>
<input type="button" value="<?php echo CANCEL_BUTTON;?>" onClick="window.close();">
<?php	if ($_GET["productID"]) echo "<input type=button value=\"".DELETE_BUTTON."\" onClick=\"confirmDelete('".QUESTION_DELETE_CONFIRMATION."','products.php?productID=".$_GET["productID"]."&delete=1');\">"; ?>
</center></p>
</form>


</center>
</body>

</html>