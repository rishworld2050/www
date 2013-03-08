<?php
/*****************************************************************************
 *                                                                           *
 * Shop-Script FREE                                                          *
 * Copyright (c) 2005 WebAsyst LLC. All rights reserved.                     *
 *                                                                           *
 ****************************************************************************/



	//this file indicates listing of all available languages

class Language
{
	var $description; //language name
	var $filename; //language PHP constants file
	var $template; //template filename
}

	//a list of languages
	$lang_list = array();

	//to add new languages add similiar structures

	$lang_list[0] = new Language();
	$lang_list[0]->description = "English";
	$lang_list[0]->filename = "english.php";
	$lang_list[0]->template_path = "./templates/tmpl1/";

?>