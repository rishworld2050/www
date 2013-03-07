<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/


//frequently used functions


function show_price($price) //show a number and selected currency sign
		//$price is in universal currency
{

	//now show price
	$price = round(100*$price)/100;
	if (round($price*10) == $price*10 && round($price)!=$price) $price = "$price"."0"; //to avoid prices like 17.5 - write 17.50 instead
	if (round($price) == $price) //add .00
		$price  = "$price".".00";

	$csign_left  = (defined("CONF_CURRENCY_ID_LEFT")) ? CONF_CURRENCY_ID_LEFT : "US $";
	$csign_right = (defined("CONF_CURRENCY_ID_RIGHT")) ? CONF_CURRENCY_ID_RIGHT : "";

	return $csign_left.$price.$csign_right;
}

function get_current_time() //get current date and time as a string
{
	return strftime("%Y-%m-%d %H:%M:%S", time());
}

function ShowNavigator($a, $offset, $q, $path, &$out)
{ 	
		//shows navigator [prev] 1 2 3 4 … [next]
		//$a - count of elements in the array, which is being navigated
		//$offset - current offset in array (showing elements [$offset ... $offset+$q])
		//$q - quantity of items per page
		//$path - link to the page (f.e: "index.php?categoryID=1&")

		if ($a > $q) //if all elements couldn't be placed on the page
		{

			//[prev]
			if ($offset>0) $out .= "<a href=\"".$path."offset=".($offset-$q)."\">[".STRING_PREVIOUS."]</a> &nbsp;";

			//digital links
			$k = $offset / $q;

			//not more than 4 links to the left
			$min = $k - 5;
			if ($min < 0) { $min = 0; }
			else {
				if ($min >= 1)
				{ //link on the 1st page
					$out .= "<a href=\"".$path."offset=0\">[1-".$q."]</a> &nbsp;";
					if ($min != 1) { $out .= "... &nbsp;"; };
				}
			}

			for ($i = $min; $i<$k; $i++)
			{
				$m = $i*$q + $q;
				if ($m > $a) $m = $a;

				$out .= "<a href=\"".$path."offset=".($i*$q)."\">[".($i*$q+1)."-".$m."]</a> &nbsp;";
			}

			//# of current page
			if (strcmp($offset, "show_all"))
			{
				$min = $offset+$q;
				if ($min > $a) $min = $a;
				$out .= "[".($k*$q+1)."-".$min."] &nbsp;";
			}
			else
			{
				$min = $q;
				if ($min > $a) $min = $a;
				$out .= "<a href=\"".$path."offset=0\">[1-".$min."]</a> &nbsp;";
			}

			//not more than 5 links to the right
			$min = $k + 6;
			if ($min > $a/$q) { $min = $a/$q; };
			for ($i = $k+1; $i<$min; $i++)
			{
				$m = $i*$q+$q;
				if ($m > $a) $m = $a;

				$out .= "<a href=\"".$path."offset=".($i*$q)."\">[".($i*$q+1)."-".$m."]</a> &nbsp;";
			}

			if ($min*$q < $a) { //the last link
				if ($min*$q < $a-$q) $out .= " ... &nbsp;&nbsp;";
				if (!($a%$q == 0))
					$out .= "<a class=no_underline href=\"".$path."offset=".($a-$a%$q)."\">".(floor($a/$q)+1)."</a> &nbsp;&nbsp;";
				else //$a is divided by $q
					$out .= "<a class=no_underline href=\"".$path."offset=".($a-$q)."\">".(floor($a/$q))."</a> &nbsp;&nbsp;";
			}

			//[next]
			if ($offset<$a-$q) $out .= "<a href=\"".$path."offset=".($offset+$q)."\">[".STRING_NEXT."]</a>";

			//[show all]
			if (strcmp($offset, "show_all"))
				$out .= " <a href=\"".$path."show_all=yes\">[".STRING_SHOWALL."]</a>";
			else
				$out .= " [".STRING_SHOWALL."]";

		}
}

function validate_search_string($s) //validates $s - is it good as a search query
{
	//exclude special SQL symbols
	$s = str_replace("%","",$s);
	$s = str_replace("_","",$s);
	//",',\
	$s = stripslashes($s);
	$s = str_replace("'","\'",$s);
	return $s;

} //validate_search_string

function string_encode($s) // encodes a string with a simple algorythm
{
	$result = base64_encode($s);
	return $result;
}

function string_decode($s) // decodes a string encoded with string_encode()
{
	$result = base64_decode($s);
	return $result;
}

?>