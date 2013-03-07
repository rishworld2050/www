//============================================
// Maian Cart v2.0
// Javascript/Ajax Functions
// Written by David Ian Bennett
// http://www.maianscriptworld.co.uk
//
// Incorporating jQuery functions
// Copyright (c) John Resig
// http://jquery.com/
//
// Incorporating jQuery Impromptu
// Copyright (c) Trent Richardson
// http://trentrichardson.com
//
//============================================

//--------------------------------------------
// Batch Updating Product
//--------------------------------------------

function batchAddField(type,id,field) {
  $(document).ready(function() {
    $.ajax({
      url: 'index.php',
      data: 'p=add-product&batchRoutines='+type+'||'+id+'||'+field,
      dataType: 'html',
      success: function (data) {
        switch (data) {
          case 'include':
          $('#'+id).show('slow');
          break;
          case 'exclude':
          $('#'+id).hide('slow');
          break;
        }
      },
      complete: function () {
      },
      error: function(xml,status,error) {
        //alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
      }
    });
  });
  return false;
}

//--------------------------------------------
// ISBN Lookup
//--------------------------------------------

function isbnLookup() {
  if ($('#pName').val()=='') {
    $('#pName').focus();
    return false;
  }
  $('#pName').css('background','#fff url(templates/images/loading-box.gif) no-repeat 99% 50%');
  $(document).ready(function() {
    $.ajax({
      url: 'index.php',
      data: 'p=add-product&isbnLookup='+$('#pName').val(),
      dataType: 'xml',
      success: function (data) {
        $('#pName').css('background-image','none');
        switch (xmlTag(data,'name')) {
          case 'key-error':
          alert(xmlTag(data,'text'));
          break;
          case 'unavailable':
          alert(xmlTag(data,'text'));
          break;
          case 'none':
          alert(xmlTag(data,'text'));
          break;
          default:
          if (xmlTag(data,'name')!='none') {
            $('#pName').val(xmlTag(data,'name'));
          } else {
            $('#pName').val('');
          }
          if (xmlTag(data,'full_desc')!='none') {
            $('#desc').val(xmlTag(data,'full_desc'));
          } else {
            $('#desc').val('');
          }
          if (xmlTag(data,'short_desc')!='none') {
            $('#short_desc').val(xmlTag(data,'short_desc'));
          } else {
            $('#short_desc').val('');
          }
          break;
        }
      },
      complete: function () {
      },
      error: function(xml,status,error) {
        //alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
      }
    });
  });
  return false;   
}

//--------------------------------------------
// Attribute boxes
//--------------------------------------------

function manageAttributeBoxes(option) {
  var optionSelects = parseInt($('#attrBoxSet p').length);
  if (option=='add') {
    // Adjust select boxes for all elements..
    // Here we increase the options in the select elements..
    var opt   = '';
    var count = 0;
    for (var i=1; i<parseInt(optionSelects+2); i++) {
      opt += '<option value="'+i+'">'+i+'</option>';
      ++count;
    }
    // Append new option to all current select elements..
    if (count>0) {
      $("#attrBoxSet select").each(function(){
        $(this).last().append('<option value="'+count+'">'+count+'</option>');
      });
    }
    var html = '<span class="text"><input type="text" maxlength="100" name="name[]" class="box" /></span>'+
               '<span class="cost"><input type="text" name="cost[]" class="box" value="0.00" /></span>'+
               '<span class="weight"><input type="text" name="weight[]" class="box" value="0" /></span>'+
               '<span class="stock"><input type="text" name="stock[]" class="box" value="1" /></span>'+
               '<span class="order"><select name="order[]">'+opt+'</select></span><br class="clear" />';
    $('#attrBoxSet').append('<p style=\'margin:5px 0 0 0\'>'+html+'</p>');
  } else {
    if (optionSelects==1) {
      return false;
    }
    $('#attrBoxSet p').last().remove();
    // Remove last option from other drop downs..
    $("#attrBoxSet p select").each(function(){
      $(this).find('[value="'+optionSelects+'"]').remove();
    });
  }
}

//--------------------------------------------
// Loads preview window via jquery post
//--------------------------------------------

function mc_loadPreviewWindow(box,page) {
  $(document).ready(function() {
    $.post('index.php?prevTxtBox='+page, { 
       boxdata: $('#'+box).val()
      }, function(data) {
       var string = data.split('|||||');
       $.GB_hide();
       $.GB_show('index.php?prevTxtBox='+page, {
         height: 600,
         width: 900,
         caption: string[0],
         close_text: string[1]
       });
       return false;
    }); 
  });  
  return false;
}

//--------------------------------------------
// Load local files
//--------------------------------------------

function mc_loadLocalFiles() {
  $('#pDownloadPath').css('background','url(templates/images/loading-box.gif) no-repeat 99% 50%');
  $(document).ready(function() {
    $.ajax({
      url: 'index.php',
      data: 'p=add-product&showLocalFiles=yes',
      dataType: 'html',
      success: function (data) {
        if (data!='ERR') {
          $('#pDownloadPath').css('background-image','none');
          $('#pathlocator').html(data);
          $('#localFile').show('slow');
        } else {
          $('#pDownloadPath').css('background-image','none');
          $('#fileError').show();
          $('#fileList').hide();
          $('#localFile').show('slow');
        }
      },
      complete: function () {
      },
      error: function(xml,status,error) {
        //alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
      }
    });
  });
  return false;   
}

//--------------------------------------------
// Clear and reset store logo
//--------------------------------------------

function mc_resetStoreLogo(img) {
  $(document).ready(function() { 
    $.ajax({
     url: 'index.php',
     data: 'p=settings&removeLogo='+img,
     dataType: 'html',
     success: function (data) {
       $('#logolink').hide();
       $('#logoimg').attr('src','../templates/images/logo.gif');
       alert(data);
     },
     complete: function () {
     },
     error: function(xml,status,error) {
       //alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
     }
   }); 
  });
  return false;
}

//--------------------------------------------
// Delete category icon
//--------------------------------------------

function mc_deleteCategoryIcon(icon,id) {
  $(document).ready(function() { 
    $.ajax({
     url: 'index.php',
     data: 'p=categories&removeIcon='+id+'&icon='+icon,
     dataType: 'html',
     success: function (data) {
       $('#resetArea').hide();
       $('#iconImg').attr('src','templates/images/products/no-thumb-image.gif');
       alert(data);
     },
     complete: function () {
     },
     error: function(xml,status,error) {
       //alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
     }
   }); 
  });
  return false;
}

//--------------------------------------------
// ONE CLICK ENABLE/DISABLE PRODUCT
//--------------------------------------------

function mc_enableDisableProduct(id) {
  $(document).ready(function() { 
    $.ajax({
      url: 'index.php',
      data: 'p=manage-products&changeStatus='+id,
      dataType: 'xml',
      cache: false,
      success: function (data) {
        $('#endis_'+id).html(xmlTag(data,'status'));
        alert(xmlTag(data,'newstatus'));
      },
      complete: function () {
      },
      error: function(xml,status,error) {
        //alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
      }
    }); 
  });
  return false;
}

//--------------------------------------------
// PAGE MANAGEMENT
//--------------------------------------------

function pageManagement(id) {
  $(document).ready(function() { 
    $.ajax({
      url: 'index.php',
      data: 'p=newpages&changeStatus='+id,
      dataType: 'xml',
      cache: false,
      success: function (data) {
        $('#img_'+xmlTag(data,'id')).attr('src', 'templates/images/'+xmlTag(data,'flag'));
        alert(xmlTag(data,'status'));
      },
      complete: function () {
      },
      error: function(xml,status,error) {
        //alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
      }
    }); 
  });
  return false;
}

//--------------------------------------------
// EDIT STATUS MANAGEMENT
//--------------------------------------------

function loadStatusEditBox(id) {
  $(document).ready(function() { 
    $.ajax({
      url: 'index.php',
      data: 'p=sales-update&loadEditText='+id,
      dataType: 'html',
      cache: false,
      success: function (data) {
        $('#notes_'+id).hide('slow');
        $('#notes_text_'+id).val(data);
        $('#notes_edit_'+id).show('slow');
      },
      complete: function () {
      },
      error: function(xml,status,error) {
        //alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
      }
    }); 
  });
  return false;
}

function updateStatusEditBox(id) {
  $('#notes_text_'+id).css('background','#fff url(templates/images/loading-box.gif) no-repeat 99% 10%');
  $(document).ready(function() { 
    $.ajax({
      type: 'POST',
      url: 'index.php?p=sales-update&statedit=yes&status='+id,
      data: $("#stat_form_area_"+id+" > form").serialize(),
      cache: false,
      dataType: 'html',
      success: function (data) {
        $('#notes_text_'+id).css('background-image','none');
        $('#notes_edit_'+id).hide('slow');
        $('#notes_text_'+id).val('');
        $('#notes_'+id).html(data).show('slow');
      },
      complete: function () {
      },
      error: function(xml,status,error) {
        //alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
      }
    }); 
  });
  return false;
}

function closeStatusEdit(id) {
  $('#notes_text_'+id).val('');
  $('#notes_edit_'+id).hide();
  $('#notes_'+id).show('slow');
  return false;
}

//--------------------------------------------
// SHOW/HIDE ATTRIBUTES/PERSONALISATION
//--------------------------------------------

function mc_showBlock(link,obj) {
  if ($(obj).attr('class')=='show'){
    $(obj).addClass('hide');
    $('#'+link).show('slow');
  } else {
    $(obj).removeClass('hide');
    $(obj).addClass('show');
    $('#'+link).hide('slow');
  }
}

//--------------------------------------------
// MARK PRODUCT FOR DELETION
//--------------------------------------------

function mc_MarkForDeletion(id) {
  $('#price_'+id).val('0.00');
  $('#pers_'+id).val('0.00');
  $('#attr_'+id).val('0.00');
  $('#highlight_'+id).html('0.00');
  $('#purchase_'+id).css('border','1px solid #800000');
}

//--------------------------------------------
// RELOAD PRICES ON QTY CHANGE
//--------------------------------------------

function displayPurchaseProductPrices(id,url) {  
  $('#purchase_'+id).css('border','1px solid #e5e5e5');
  $(document).ready(function() { 
    $.ajax({
      url: 'index.php',
      data: 'p='+url+'&rpp=yes&price='+$('#price_'+id).val()+'&qty='+$('#qty_'+id).val()+'&attr='+$('#attr_'+id).val()+'&pers='+$('#pers_'+id).val(),
      dataType: 'xml',
      success: function (data) {
        $('#price_'+id).val(xmlTag(data,'price'));
        $('#highlight_'+id).html(xmlTag(data,'highlight'));
      },
      complete: function () {
      },
      error: function(xml,status,error) {
        //alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
      }
    });
  }); 
}

//--------------------------------------------
// STATUS TEXT MANAGEMENT
//--------------------------------------------

function addNewStatus(txt) {
  var box = txt+':<br /><input type="text" class="impbox" id="status" name="status" maxlength="250" value="" />';
  $.prompt(box, { 
    buttons: { OK: true, Close: false },
    focus: 2,
    callback: function(v,m,f) { if (v) { addNewStatusDB(f.status); } },
    top: '30%'
  });
  return false;
}

function addNewStatusDB(txt) {
  if (txt) {
    $(document).ready(function() { 
      $.ajax({
        type: 'POST',
        url:  'index.php?p=sales-update&status_text='+txt,
        data: $("#form_field > form").serialize(),
        cache: false,
        dataType: 'xml',
        success: function (data) {
          $.prompt(xmlTag(data,'message'), { 
            buttons: { Close: true },
            top: '30%' 
          });
        },
        complete: function () {
        },
        error: function(xml,status,error) {
          //alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
        }
      }); 
    });
  }
  return false;
}

function loadStatusText(id) {
  $(document).ready(function() {  
    $.ajax({
      url: 'index.php',
      data: 'p=sales-update&load_status='+id,
      dataType: 'html',
      success: function (data) {
        $('#text').val('');
        $('#text').val(data);
      },
      complete: function () {
      },
      error: function(xml,status,error) {
        //alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
      }
    });
  });
  return false;
}

//--------------------------------------------
// UPDATES E-MAIL ON NEWSLETTER PAGE
//--------------------------------------------

function updateEmail(email,id) {
  $(document).ready(function() {  
    if (email=='') {
      $('#eboxw_'+id).hide();
      $('#email_'+id).show('slow');
      return false;
    }
    $.ajax({
      url: 'index.php',
      data: 'p=newsletter&email='+email+'&id='+id,
      dataType: 'xml',
      success: function (data) {
        switch (xmlTag(data,'type')) {
          case 'error':
          alert(xmlTag(data,'message'));
          break;
          case 'ok':
          alert(xmlTag(data,'message'));
          $('#eboxw_'+id).hide();
          $('#email_'+id).html(xmlTag(data,'email')).show('slow');
          break;
        }
      },
      complete: function () {
      },
      error: function(xml,status,error) {
        //alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
      }
    }); 
  }); 
}

//--------------------------------------------------
// RE-CALCULATE TOTALS
// Recalculates totals when viewing or adding sale
//--------------------------------------------------

function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i=0; i<1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}

function recalculateManualTotals() {
  $('#subTotal').css('background','#fff url(templates/images/loading-box.gif) no-repeat 99% 50%');
  $('#taxPaid').css('background','#fff url(templates/images/loading-box.gif) no-repeat 99% 50%');
  $('#grandTotal').css('background','#fff url(templates/images/loading-box.gif) no-repeat 99% 50%');
  $('#cartWeight').css('background','#fff url(templates/images/loading-box.gif) no-repeat 99% 50%');
  $('#process_add_sale').val('refresh-prices');
  $(document).ready(function() { 
    $.ajax({
      type: 'POST',
      url: 'index.php?p=sales-add',
      data: $("#form_field > form").serialize(),
      cache: false,
      dataType: 'xml',
      success: function (data) {
        $('#subTotal').css('background-image','none').val(xmlTag(data,'sub'));
        $('#taxPaid').css('background-image','none').val(xmlTag(data,'tax'));
        $('#grandTotal').css('background-image','none').val(xmlTag(data,'grand'));
        $('#cartWeight').css('background-image','none').val(xmlTag(data,'weight'));
        $('#process_add_sale').val('yes');
      },
      complete: function () {
      },
      error: function(xml,status,error) {
        //alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
      }
    }); 
  });
  return false;
}

function recalculateTotals(id) {
  $('#subTotal').css('background','#fff url(templates/images/loading-box.gif) no-repeat 2% 50%');
  $('#taxPaid').css('background','#fff url(templates/images/loading-box.gif) no-repeat 2% 50%');
  $('#grandTotal').css('background','#fff url(templates/images/loading-box.gif) no-repeat 2% 50%');
  $('#shipTotal').css('background','#fff url(templates/images/loading-box.gif) no-repeat 2% 50%');
  $('#globalTotal').css('background','#fff url(templates/images/loading-box.gif) no-repeat 2% 50%');
  $('#couponTotal').css('background','#fff url(templates/images/loading-box.gif) no-repeat 2% 50%');
  $('#manualDiscount').css('background','#fff url(templates/images/loading-box.gif) no-repeat 2% 50%');
  $('#cartWeight').css('background','#fff url(templates/images/loading-box.gif) no-repeat 99% 50%');
  $('#process_load').val('refresh-prices');
  $(document).ready(function() { 
    $.ajax({
      type: 'POST',
      url: 'index.php?p=sales-view&sale='+id,
      data: $("#form_field > form").serialize(),
      cache: false,
      dataType: 'xml',
      success: function (data) {
        $('#subTotal').css('background-image','none').val(xmlTag(data,'sub'));
        $('#taxPaid').css('background-image','none').val(xmlTag(data,'tax'));
        $('#grandTotal').css('background-image','none').val(xmlTag(data,'grand'));
        $('#shipTotal').css('background-image','none');
        $('#globalTotal').css('background-image','none').val(xmlTag(data,'global'));
        $('#manualDiscount').css('background-image','none').val(xmlTag(data,'manual'));
        $('#couponTotal').css('background-image','none').val(xmlTag(data,'coupon'));
        $('#cartWeight').css('background-image','none').val(xmlTag(data,'weight'));
        $('#process_load').val('yes');
      },
      complete: function () {
      },
      error: function(xml,status,error) {
        //alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
      }
    });    
  }); 
  return false;
}

//--------------------------------------------
// LOAD SHIPPING PRICE
// Loads shipping service price into box
//--------------------------------------------

function loadShippingPrice(sub_total) {
  $(document).ready(function() {
    if ($('#setShipRateID').val()=='pickup') {
      $('#shipTotal').val('0.00');
      return false
    }
    $.get('index.php', {
           p: 'sales-view',
           service: $('#setShipRateID').val(),
           price: sub_total
           },
           function(data) {
             $('#shipTotal').val(xmlTag(data,'price'));
           }
    );
  });
}

//--------------------------------------------
// SET ZONE TAX
// Updates zone tax rate if area/zone changed
//--------------------------------------------

function setZoneTax() {
  $(document).ready(function() {
    $.get('index.php', {
           p: 'sales-view',
           z: $('#shipSetArea').val()
           },
           function(data) {
             $('#tax-span').html(xmlTag(data,'taxrate'));
             $('#taxRate').val(xmlTag(data,'taxrate'));
           }
    );
  });
}

//--------------------------------------------
// RELOAD COUNTRIES 
// Reloads countries on sales page
//--------------------------------------------

function reloadCountry() {
  $(document).ready(function() {
    $('#loader').html('<img src="templates/images/loading.gif" alt="" title="" />');
    $('#loader2').html('<img src="templates/images/loading.gif" alt="" title="" />');
    $.get('index.php', {
           p: 'sales-view',
           c: $('#shipSetCountry').val()
           },
           function(data) {
             $('#loader').html('');
             $('#loader2').html('');
             $('#shipSetArea').html('');
             $('#setShipRateID').html('');
             $('#tax-span').html(xmlTag(data,'taxrate'));
             $('#taxRate').val(xmlTag(data,'taxrate'));
             $('#shipSetArea').html(xmlTag(data,'areas'));
             $('#setShipRateID').html(xmlTag(data,'services'));
           }
    );
  });
}


//--------------------------------------------
// CREATE TAGS FROM FIELDS
// Auto creates tags from product fields
//--------------------------------------------

function createTagsFromField(field) {
  $(document).ready(function() {  
    if ($('#'+field).val()=='') {
      return false;
    }
    $('#tags').css('background','#fff url(templates/images/loading-box.gif) no-repeat 99% 5%');
    $.post('index.php', {
            p: 'load-related-products',
            'create-tags': $('#'+field).val(),
            field: field
            },
            function(data) {
              $('#tags').css('background-image','none');
              $('#tags').val(xmlTag(data,'text'))
            }
    );
  }); 
}

//--------------------------------------------
// CREATE PICTURE FOLDER
// Creates picture folders
//--------------------------------------------

function createPictureFolder(txt) {
  $('#folderName').focus();
  var box = txt+':<br /><input type="text" class="impbox" id="folderName" name="folderName" maxlength="20" value="" />';
  $.prompt(box, { 
    buttons: { OK: true, Close: false },
    focus: 2,
    callback: function(v,m,f) { if (v) { createPicFolder(f.folderName); } },
    top: '30%'
  });
}

function createPicFolder(folder) {
  $(document).ready(function() {  
    if (folder=='') {
      return false;
    }
    $.get('index.php', {
           p: 'product-pictures',
           'create-folder': folder
           },
           function(data) {
             status      = xmlTag(data,'status');
             error       = xmlTag(data,'error');
             ok          = xmlTag(data,'ok');
             folder      = xmlTag(data,'folder');
             if (status=='error') {
               $.prompt(error, { 
                 buttons: { Close: true },
                 top: '30%' 
               });
               return false;
             } else {
               getProdImageFolderList(folder);
               $.prompt(ok, { 
                 buttons: { Close: true },
                 top: '30%' 
               });
               return false;
             }
           }
    );
  });  
}

//--------------------------------------------
// CREATE ATTACHMENTS FOLDERS
// Creates attachment folders
//--------------------------------------------

function createAttachmentFolder(txt) {
  var box = txt+':<br /><input type="text" class="impbox" id="folderName" name="folderName" maxlength="20" value="" />';
  $.prompt(box, { 
    buttons: { OK: true, Close: false },
    focus: 2,
    callback: function(v,m,f) { if (v) { createFolder(f.folderName); } },
    top: '30%'
  });
}

function createFolder(folder) {
  $(document).ready(function() {  
    if (folder=='') {
      return;
    }
    $.get('index.php', {
           p: 'sales-update',
           'create-folder': folder
           },
           function(data) {
             status      = xmlTag(data,'status');
             error       = xmlTag(data,'error');
             ok          = xmlTag(data,'ok');
             folder      = xmlTag(data,'folder');
             if (status=='error') {
               $.prompt(error, { 
                 buttons: { Close: true },
                 top: '30%' 
               });
               return false;
             } else {
               getFolderList(folder);
               $.prompt(ok, { 
                 buttons: { Close: true },
                 top: '30%' 
               });
               return false;
             }
           }
    );
  });
}

//--------------------------------------------
// LOAD PRODUCTS
// Loads category products
//--------------------------------------------

function loadProducts(product,current,page) {
  $(document).ready(function() { 
    $('#products').html('<img src="templates/images/loading.gif" alt="" title="" />');
    $.ajax({
      url: 'index.php',
      data: 'p=load-related-products&cur='+current+'&pg='+page+'&pr='+product+'&sale='+(page=='sale' || page=='saled' ? current : '0')+'&dl='+(page=='saled' ? 'yes' : 'no'),
      dataType: 'html',
      success: function (data) {
        $('#products').hide();
        $('#products').html(data);
        $('#products').slideDown('slow');
      },
      complete: function () {
      },
      error: function(xml,status,error) {
        //alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
      }
    }); 
  });  
}

function loadSaleProducts(cat,sale,type) {
  $(document).ready(function() { 
    $('#products').html('<img src="templates/images/loading.gif" alt="" title="" />');
    $.ajax({
      url: 'index.php',
      data: 'p=sales-view&id='+sale+'&cat='+cat+'&type='+type+'&reload=yes',
      dataType: 'html',
      success: function (data) {
        $('#products').hide();
        $('#products').html(data);
        $('#products').slideDown('slow');
      },
      complete: function () {
      },
      error: function(xml,status,error) {
        //alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
      }
    }); 
  });  
}

function loadHomeProducts(product) {
  $(document).ready(function() { 
    $('#products').html('<img src="templates/images/loading.gif" alt="" title="" />');
    $.ajax({
      url: 'index.php',
      data: 'p=settings&s=4&reload=yes&pr='+product,
      dataType: 'html',
      success: function (data) {
        $('#products').hide();
        $('#products').html(data);
        $('#products').slideDown('slow');
      },
      complete: function () {
      },
      error: function(xml,status,error) {
        //alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
      }
    }); 
  });  
}

//--------------------------------------------
// ALTERNATIVE ALERT BOX
// via Impromptu
//--------------------------------------------

function alternativeAlertBox(text) {
  $.prompt(text, { 
    buttons: { Close: true },
    focus: 2,
    top: '30%' 
  });
}
