//============================================
// Maian Cart v2.0
// General Javascript Functions
// Written by David Ian Bennett
// http://www.maianscriptworld.co.uk
//============================================

// Load product image into viewer..
function productImageViewer(thumb,picture,url) {
  $('#displayImg').attr('src','templates/products/'+thumb);
  $('#imgLink').attr('href',url);
  $('#zoom1').attr('href','templates/products/'+picture);
}

// Toggle children..
function toggleChildren(id) {
  $('#cat_sub_'+id).toggle('slow');
  // Change image..
  if ($('#click_img_'+id).attr('src')=='templates/images/children.png') {
    $('#click_img_'+id).attr('src','templates/images/children-close.png');
  } else {
    $('#click_img_'+id).attr('src','templates/images/children.png');
  }
}

// Toggle infants..
function toggleInfants(id) {
  $('#cat_sub_child_'+id).toggle('slow');
  // Change image..
  if ($('#click_img_inf_'+id).attr('src')=='templates/images/infants.png') {
    $('#click_img_inf_'+id).attr('src','templates/images/infants-close.png');
  } else {
    $('#click_img_inf_'+id).attr('src','templates/images/infants.png');
  }
}

// Save search..
function saveSearch(article,page,text) {
  if (window.sidebar) {
    window.sidebar.addPanel(article,page,"");
  } else if (document.all) {
    window.external.AddFavorite(page,article);
  } else {
    alert(text);
    return false;
  }
}
// Refresh qty boxes..
function refreshQtyOptions(stock,threshold) {
  var newstock = parseInt(stock);
  var thresh   = parseInt(threshold);
  if (newstock>thresh) {
    var newstock = thresh;
  }
  // Do nothing if the quantity drop down doesn`t exist..
  if ($('#qty').length < 0 || document.getElementById('qty')==null || document.getElementById('qty')=='undefined') {
    return false;
  }
  document.getElementById('qty').options.length = 0;
  if (newstock==0) {
    $('#qty').html('<option value="0">0</option>');
  } else {
    var select = '';
    for (var i=0; i<newstock; i++) {
      select += '<option value="'+(i+1)+'">'+(i+1)+'</option>';
    } 
    $('#qty').html(select);
  }
}

// Loads mp3 flash player for mp3 preview track..
function playMP3(mp3,id) {
  var flashvars   = {
	mp3: ''+mp3+'',
  width: '20',
  height: '20',
  showslider: 0,
  buttonwidth: 20,
  loadingcolor: 'ffffff',
  bgcolor: 'fbfbfb',
  bgcolor1: 'dd3647',
  bgcolor2: '0e644e',
  buttoncolor: 'ffffff',
  buttonovercolor: 'e5e5e5',
  textcolor: 'ffffff'
  };
	var params      = {
  wmode: 'transparent',
  movie: 'music_player.swf',
  bgcolor: '#fbfbfb'
  };
	var attributes  = {};
  swfobject.embedSWF('music_player.swf','musicPlayer'+id,'20','20','9.0.0','expressInstall.swf',flashvars,params,attributes);
}

// Reads XML tag data..
function xmlTag(xml,tag) {
  return $(xml).find(tag).text();
}

// Valid e-mail..
function isValidEmailAddress(email) {
  var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
  return pattern.test(email);
}

// Confirm message..
function confirmMessage(txt) {
  var confirmSub = confirm(txt);
  if (confirmSub) { 
    return true;
  } else {
    return false;
  }
}
