//============================================
// Maian Cart v2.0
// Javascript/Ajax Functions
// Written by David Ian Bennett
// http://www.maianscriptworld.co.uk
//
// Incorporating jQuery functions
// Copyright (c) John Resig
// http://jquery.com/
//============================================

// Reads XML tag data..
function xmlTag(xml,tag) {
  return $(xml).find(tag).text();
}

// Toggle child & infant categories
function toggleChildrenInfants() {
  $("#catArea .child").each(function(){
    $($(this)).toggle('slow');
  });
}

// Homepage slider..
function mc_homeSlider() {
  if ($('#slider').attr('src')=='templates/images/slide-up.png') {
    $('#slider').attr('src','templates/images/slide-down.png');
    $('#homeArea').hide('slow');
  } else {
    $('#slider').attr('src','templates/images/slide-up.png');
    $('#homeArea').show('slow');
  }
}

// Show input box or textarea..
function showNewValueImportBox(id) {
  if ($('#select_'+id).val()=='0') {
    return false;
  }
  switch ($('#select_'+id).val()) {
    case 'pDescription':
    case 'pMetaKeys':
    case 'pMetaDesc':
    case 'pTags':
    case 'vDetails':
    $('#alt_'+id).hide();
    $('#alt_box_'+id).val('');
    $('#alt_text_'+id).show('slow');
    break;
    default:
    $('#alt_text_'+id).hide();
    $('#alt_textarea_'+id).val('');
    $('#alt_'+id).show('slow');
    break;
  }
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

// Select only parents..
function parentsOnly() {
  $("#checkGrid input:checkbox").each(function() {
    if ($(this).attr('id').substring(0,4)=='pnt_') {
      if ($(this).is(':checked')) {
        $(this).removeAttr('checked');
      } else {
        $(this).attr('checked', 'checked');
      }
    }
  });
}

// Select only children for category list..
function selectCopyOptions(type) {
  switch (type) {
    case 'on':
    $("#copyOptionsArea input:checkbox").each(function() {
      $(this).attr('checked', 'checked');
    });
    break;
    case 'off':
    $("#copyOptionsArea input:checkbox").each(function() {
      $(this).removeAttr('checked');
    });
    break;
  }
}

// Select only children for category list..
function selectChildren(id,type) {
  switch (type) {
    case 'on':
    $("#"+id+" input:checkbox").each(function() {
      $(this).attr('checked', 'checked');
    });
    break;
    case 'off':
    $("#"+id+" input:checkbox").each(function() {
      $(this).removeAttr('checked');
    });
    break;
  }
}

// Select countries..
function selectCountries() {
  for (var i=0; i<document.forms['form'].elements.length; i++) {
    var e = document.forms['form'].elements[i];
    if ((e.name != 'log') && (e.name != 'clearLogo') && (e.type=='checkbox') && (e.name != 'yes[]')) {
      e.checked = document.forms['form'].log.checked;
    }
  }
}

// Close div..
function closeThisDiv(div) {
  $('#'+div).hide('slow');
}

// Check/uncheck array of checkboxes..
function selectAll(form) {
  for (var i=0; i<document.forms['form'].elements.length; i++) {
    var e = document.forms['form'].elements[i];
    if ((e.name != 'log') && (e.name != 'clearLogo') && (e.name != 'table[]') && (e.name != 'rpref[]') && (e.type=='checkbox')) {
      e.checked = document.forms['form'].log.checked;
    }
  }
}

// Select all contact box options..
function selectAllContact(type) {
  switch (type) {
    case 'on':
    $("#contactFields input:checkbox").each(function() {
      $(this).attr('checked', 'checked');
    });
    break;
    case 'off':
    $("#contactFields input:checkbox").each(function() {
      $(this).removeAttr('checked');
    });
    break;
  }
}

// Select countries..
function selectAllFlat(id,type) {
  switch (type) {
    case 'on':
    $("#flat_"+id+" input:checkbox").each(function() {
      $(this).attr('checked', 'checked');
    });
    break;
    case 'off':
    $("#flat_"+id+" input:checkbox").each(function() {
      $(this).removeAttr('checked');
    });
    break;
  }
}

// Select countries..
function selectAllCountries(type) {
  switch (type) {
    case 'on':
    $("#localCountries input:checkbox").each(function() {
      $(this).attr('checked', 'checked');
    });
    break;
    case 'off':
    $("#localCountries input:checkbox").each(function() {
      $(this).removeAttr('checked');
    });
    break;
  }
}

// Check/uncheck array of checkboxes (zones)..
function selectAllZones(id,type) {
  switch (type) {
    case 'on':
    $("#zA_"+id+" input:checkbox").each(function() {
      $(this).attr('checked', 'checked');
    });
    break;
    case 'off':
    $("#zA_"+id+" input:checkbox").each(function() {
      $(this).removeAttr('checked');
    });
    break;
  }
}

// Check/uncheck array of checkboxes (services)..
function selectAllServices(id,type) {
  switch (type) {
    case 'on':
    $("#sA_"+id+" input:checkbox").each(function() {
      $(this).attr('checked', 'checked');
    });
    break;
    case 'off':
    $("#sA_"+id+" input:checkbox").each(function() {
      $(this).removeAttr('checked');
    });
    break;
  }
}

// Check/uncheck array of checkboxes..
function selectAllCats(form) {
  for (var i=0; i<document.forms['form'].elements.length; i++) {
    var e = document.forms['form'].elements[i];
    if ((e.name != 'log') && (e.name != 'log2') && (e.name != 'pBrand[]') 
         && (e.name != 'clearLogo') && (e.type=='checkbox') && (e.name != 'copyPictures')
         && (e.name != 'copyAttributes') && (e.name != 'copyRelated') && (e.name != 'copyMP3')
         && (e.name != 'copyPersonalisation') && (e.name != 'checker')) {
      e.checked = document.forms['form'].log.checked;
    }
  }
}

// Check/uncheck array of checkboxes..
function selectAllBrands(form) {
  for (var i=0; i<document.forms['form'].elements.length; i++) {
    var e = document.forms['form'].elements[i];
    if ((e.name != 'log') && (e.name != 'log2') && (e.name != 'pCat[]') && (e.name != 'clearLogo') 
         && (e.type=='checkbox') && (e.name != 'copyPictures')
         && (e.name != 'copyAttributes') && (e.name != 'copyRelated') && (e.name != 'copyMP3')
         && (e.name != 'copyPersonalisation') && (e.name != 'checker')) {
      e.checked = document.forms['form'].log2.checked;
    }
  }
}

// Check/uncheck array of checkboxes..
function selectAll_Enable(form) {
  for (var i=0; i<document.forms['form'].elements.length; i++) {
    var e = document.forms['form'].elements[i];
    if ((e.name != 'log') && (e.type=='checkbox') && (e.name != 'action') && (e.name != 'type[]')) {
      e.checked = document.forms['form'].log.checked;
    }
  }
}

// Check/uncheck array of checkboxes..
function selectAllMP3(form) {
  for (var i=0; i<document.forms['form'].elements.length; i++) {
    var e = document.forms['form'].elements[i];
    if ((e.name != 'log') && (e.type=='checkbox')) {
      e.checked = document.forms['form'].log.checked;
    }
  }
}

// Check/uncheck array of checkboxes..
function selectBoxesList(type,field) {
  switch (type) {
    case 'on':
    $("#"+field+" input:checkbox").each(function() {
      $(this).attr('checked', 'checked');
    });
    break;
    case 'off':
    $("#"+field+" input:checkbox").each(function() {
      $(this).removeAttr('checked');
    });
    break;
  }
}

// Check/uncheck array of checkboxes..
function selectHomeAll(type) {
  switch (type) {
    case 'on':
    $("#homeProdCatsArea input:checkbox").each(function() {
      $(this).attr('checked', 'checked');
    });
    break;
    case 'off':
    $("#homeProdCatsArea input:checkbox").each(function() {
      $(this).removeAttr('checked');
    });
    break;
  }
}

// Toggles divs..
function toggle_box(id) {
  var e = document.getElementById(id);
  if(e.style.display == 'none') {
    e.style.display = 'block';
  } else {
    e.style.display = 'none';
  }
}

// These two functions add/remove code blocks..
function showBoxes(x,max) {
	for (var i=1; i<=x; i++) {
    $('#row'+i).show('slow');
		//document.getElementById('row'+i).style.display = '';
	}
	for (i=x+1; i<=max; i++) {
    $('#row'+i).hide('slow');
    //document.getElementById('row'+i).style.display = 'none';
	}
}
function addFieldBoxes(x,min,max) {
	val = parseInt(document.getElementById('num').value);
	val += x;
	if (x<0) {
		if (val<min) val = min;
	} else {
		if (val>max) val = max;
	}
	document.getElementById('num').value = val.toString();
	showBoxes(val,max);
}

// Renames button on click..
function renameButton(id,text) {
  document.getElementById(id).value = text;
}
