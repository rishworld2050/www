/************************************************************************************************************
Ajax chained select
Copyright (C) 2006  DTHMLGoodies.com, Alf Magne Kalleland

This library is free software; you can redistribute it and/or
modify it under the terms of the GNU Lesser General Public
License as published by the Free Software Foundation; either
version 2.1 of the License, or (at your option) any later version.

This library is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public
License along with this library; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA

Dhtmlgoodies.com., hereby disclaims all copyright interest in this script
written by Alf Magne Kalleland.

Alf Magne Kalleland, 2006
Owner of DHTMLgoodies.com

Additional Modifications:
David Ian Bennett

************************************************************************************************************/	

var ajax = new Array();

// Gets brands list based on category selection..
function getBrandList(sel) {
	var categoryCode = sel.options[sel.selectedIndex].value;
	document.getElementById('brandList').options.length = 0;	
	if(categoryCode.length>0){
		var index = ajax.length;
		ajax[index] = new sack();
		ajax[index].requestFile = 'index.php?p=manlist&cat='+categoryCode;	
		ajax[index].onCompletion = function(){ displayBrands(index) };	
		ajax[index].runAJAX();		
	}
}

function displayBrands(index) {
	var obj = document.getElementById('brandList');
	eval(ajax[index].response);		
}

// Gets products based on category selection..
function getCategoryList(sel) {
	var categoryCode = sel.options[sel.selectedIndex].value;
	document.getElementById('maian_cart_products').options.length = 0;	
	if(categoryCode.length>0){
		var index = ajax.length;
		ajax[index] = new sack();
		ajax[index].requestFile = 'index.php?p=switch&cat='+categoryCode;	
		ajax[index].onCompletion = function(){ displayProducts(index) };	
		ajax[index].runAJAX();		
	}
}

function displayProducts(index) {
	var obj = document.getElementById('maian_cart_products');
	eval(ajax[index].response);		
}

// Refreshes attachment folder list..
function getFolderList(folder) {
	document.getElementById('folderList').options.length = 0;
	if(folder!=''){
		var index = ajax.length;
		ajax[index] = new sack();
		ajax[index].requestFile = 'index.php?p=refresh-folders&folder='+folder;
		ajax[index].onCompletion = function(){ displayFolderList(index) };	
		ajax[index].runAJAX();
	}
}

// Refreshes category product images folder list..
function getProdImageFolderList(folder) {
	document.getElementById('folderList').options.length = 0;
	if(folder!=''){
		var index = ajax.length;
		ajax[index] = new sack();
		ajax[index].requestFile = 'index.php?p=refresh-folders-cats&folder='+folder;
		ajax[index].onCompletion = function(){ displayFolderList(index) };	
		ajax[index].runAJAX();
	}
}

function displayFolderList(index) {
	var obj = document.getElementById('folderList');
	eval(ajax[index].response);	
}
