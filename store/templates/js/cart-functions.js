//============================================
// Maian Cart v2.0
// Javascript/Ajax/XML Functions
// Written by David Ian Bennett
// http://www.maianscriptworld.co.uk
//
// Incorporating jQuery functions
// Copyright (c) John Resig
// http://jquery.com/
//
//============================================

//--------------------------------------------
// IE6 Detection
//--------------------------------------------

function isIE6() {
  return (document.all && !window.XMLHttpRequest ? 'yes' : 'no');
}

//--------------------------------------------
// CLEAR RECENT ITEMS
//--------------------------------------------

function clearRecentView(text) {
  var confirmSub = confirm(text);
  if (confirmSub) { 
    $(document).ready(function() { 
      $.ajax({
        url: 'index.php',
        data: 'clearView=yes',
        dataType: 'html',
        success: function (data) {
          $('#recentView').hide('slow');
        },
        complete: function () {
        },
        error: function(xml,status,error) {
          //alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
        }
      });
    });  
  } else {
    return false;
  } 
}

//--------------------------------------------
// NEWSLETTER SUBSCRIBE / UNSUBSCRIBE
//--------------------------------------------

function newsletterSignup() {
  var type = $('input[name=newstype]:checked').val();
  $(document).ready(function() {  
    if ($('#newsletter').val()=='') {
      $('#newsletter').focus();
      return false;
    }
    $.ajax({
      url: 'index.php',
      data: 'news='+$('#newsletter').val()+'&todo='+(type=='sub' || type=='unsub' ? type : 'sub'),
      dataType: 'xml',
      success: function (data) {
        // Read incoming xml and update html elements..
        switch (xmlTag(data,'type')) {
          case 'error':
          alert(xmlTag(data,'message'));
          break;
          case 'ok':
          alert(xmlTag(data,'message'));
          $('#newsletter').val('');
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

//-----------------------------------------------------------------------
// SHIPPING COUNTRY & REGION
// The following relate to the shipping options on the checkout page
//-----------------------------------------------------------------------

function reloadRegions(def_country) {
  if (def_country>0) {
    var country = def_country;
    $('#countries').val(def_country);
  } else {
    if ($('#countries').val()==0) {
      $('#loader').html('<img src="templates/images/adding.gif" id="gimage" alt="" title="" />');
      $('#areas').html('<option value="0">- - - - - - - - - -</option>');
      $('#loader').html('');
      return false;
    }
    var country = $('#countries').val();
  }
  $('#loader').html('<img src="templates/images/adding.gif" id="gimage" alt="" title="" />');
  $(document).ready(function() { 
    $.ajax({
      url: 'index.php',
      data: 'p=update-regions&c='+country,
      dataType: 'xml',
      success: function(data) {
        var resCount = 0;
        // Clear previous restriction blocks..
        $(".cartWrapper .restricted").each(function(){
          $(this).remove();
          ++resCount;
        });
        // Now make product images visible again..
        if (resCount>0) {
          $(".cartWrapper .preview a").each(function(){
            $(this).css('display','inline');
          });
        }
        switch (xmlTag(data,'html')) {
          case 'restriction-block':
          $('#loader').html('');
          $('#areas').html('<option value="0">- - - - - - - - - -</option>');
          // Highlight products as restricted..
          var products = xmlTag(data,'html_no').split('#####');
          for (var i=0; i<products.length; i++) {
            $('#'+products[i]+' .preview a').css('display','none');
            $('#'+products[i]+' .preview').append('<div class="restricted"><img src="templates/images/restricted.png" alt="" title="" /><br />'+xmlTag(data,'areas')+'</div>');
          }
          alert(xmlTag(data,'text'));
          break;
          default:
          $('#areas').html('');
          $('#loader').html('');
          $('#sysMsgShip').hide('slow');
          // Only show alert message if an area is found..
          if (xmlTag(data,'areas')>0) {
            $('#areas').html(xmlTag(data,'html'));
            // Don`t show the selection message if default is set..
            if (def_country>0) {
              return false;
            }
            //alert(xmlTag(data,'text'));
          } else {
            $('#areas').html(xmlTag(data,'html'));
            $('#sysMsgShip').html(xmlTag(data,'html_no'));
            $('#sysMsgShip').show('slow');
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
}

function loadShipOptions() {
  $('#loader').html('<img src="templates/images/adding.gif" id="gimage" alt="" title="" />');
  var countries = $('#countries').val();
  var areas     = $('#areas').val();
  $(document).ready(function() { 
    $.ajax({
      url: 'index.php',
      data: 'p=load-ship-options&c='+countries+'&a='+areas,
      dataType: 'xml',
      success: function(data) {
        switch (xmlTag(data,'options')) {
          case 'yes':
          $('#loader').html('');
          $('#selectors').hide();
          $('#ship_options').hide();
          $('#ship_options').html(xmlTag(data,'html'));
          $('#ship_options').show('slow');
          $('#textInstructions').html(xmlTag(data,'instr'));
          // Show totals if shipping count is 1..
          if (xmlTag(data,'count')=='1') {
            showTotals(xmlTag(data,'selection'),xmlTag(data,'cod'));
          }
          break;
          case 'no':
          $('#loader').html('');
          $('#ship_options').hide();
          $('#sysMsgShip').html(xmlTag(data,'text'));
          $('#sysMsgShip').show('slow');
          break;
          case 'invalid':
          alert(xmlTag(data,'text'));
          $('#loader').html('');
          reloadShippingSelectors();
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

function closeShippingMessage() {
  $(document).ready(function() {
    $('#sysMsgShip').hide('slow');
  });
}

function reloadShippingSelectorsOff(ts_switch) {
  $(document).ready(function() { 
    $.ajax({
      url: 'index.php',
      data: 'reloadTotalCoupons=yes',
      dataType: 'xml',
      success: function (data) {
        $('#couponimage').html('');
        $('#couponprice').html('0.00');
        $('#basket-total-t-coupon').hide();
        $('#price-t-total').html(xmlTag(data,'total'));
        $('#t-total').val(xmlTag(data,'rawtotal'));
        $('#totals').html(xmlTag(data,'buildtotals')+xmlTag(data,'gtotals'));
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

function reloadShippingSelectors() {
  $(document).ready(function() { 
    $.ajax({
      url: 'index.php',
      data: 'clearDiscountCoupon=yes',
      dataType: 'html',
      success: function (data) {
        $('#couponimage').html('');
        $('#couponprice').html('0.00');
        $('#ship_options').hide();
        $('#loadBlock').hide();
        $('#notesWrapper').hide();
        $('#newsletterOptInWrapper').hide();
        $('#couponWrapper').hide();
        $('#areas').val('0');
        $('#selectors').show();
        $('#no-shipping').show();
        $('#textInstructions').html(data);
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

function loadGrandTotal(raw,total,rawtax,tax,rawship,ship) {
  $(document).ready(function() {
    $('#price-t-tax').html(tax);
    $('#t-tax').val(rawtax);
    $('#price-t-total').html(total);
    $('#t-total').val(raw);
    $('#price-t-shipping').html(ship);
    $('#t-shipping').val(rawship);
  });
}

function showTotals(id,cod) {
  $(document).ready(function() { 
    $.ajax({
      url: 'index.php',
      data: 'p=set-shipping&id='+id,
      dataType: 'xml',
      success: function(data) {
        $('#no-shipping').hide();
        var methods = $('#paymentMethods').html();
        $('#totals').html(xmlTag(data,'buildtotals')+xmlTag(data,'gtotals'));
        var wrapper = $('#totalsWrapper').html();
        $('#loadBlock').html('<div class="totalsWrapper" id="totalsWrapper">'+wrapper+'</div><div class="paymentMethods" id="paymentMethods">'+methods+'</div>');
        // If COD isn`t available, hide it..
        // If it was hidden before, show it..
        if (cod=='no') {
          $('#cashOnDelivery').hide();
        } else {
          $('#cashOnDelivery').show();
        }
        $('#notesWrapper').show();
        $('#newsletterOptInWrapper').show();
        $('#couponWrapper').show();
        $('#loadBlock').show();
      },
      complete: function () {
      },
      error: function(xml,status,error) {
        //alert('Data Returned: '+xml+'\n\nStatus: '+status+'\n\nError: '+error);
      }
    }); 
  }); 
}

//-----------------------------------------------------------------------------
// REMOVE INSURANCE
// Removes insurance if option available
//-----------------------------------------------------------------------------

function removeInsuranceCharge() {
  var action = $('#inslink').attr('rel');
  $(document).ready(function() {
    $.ajax({
      url: 'index.php',
      data: 'p=insurance&action='+action,
      dataType: 'xml',
      success: function (data) {
        $('#price-t-total').html(xmlTag(data,'total'));
        $('#t-total').val(xmlTag(data,'rawtotal'));
        $('#totals').html(xmlTag(data,'buildtotals')+xmlTag(data,'gtotals'));
        // Hide shipping if 0.00..
        if ($('#t-shipping').val()=='0.00') {
          $('#basket-total-t-shipping').remove();
        }
        $('#inslink').attr('title',xmlTag(data,'text'));
        $('#inslink').html(xmlTag(data,'text'));
        switch (action) {
          case 'add':
          $('#inslink').attr('rel','rem');
          break;
          case 'rem':
          $('#inslink').attr('rel','add');
          break;
        }
      },
      complete: function () {
      },
      error: function(xml,status,error) {
      }
    });
  });
  return false;
}

//-----------------------------------------------------------------------------
// DISCOUNT COUPONS
// The following relate to the discount coupon option on the checkout page
//-----------------------------------------------------------------------------

function addDiscountCoupon() {
  var coupon = $('#coupon_code').val();
  if (coupon=='') {
    $('#coupon_code').focus();  
    return false;
  }
  $('#image').html('<img src="templates/images/adding.gif" id="gimage" alt="" title="" />');
  $(document).ready(function() { 
    $.ajax({ 
      url: 'index.php',
      data: 'p=add-discount-coupon&coupon='+encodeURIComponent(coupon),
      dataType: 'xml',
      success: function (data) {
        // Read incoming xml and update html elements..
        switch (xmlTag(data,'action')) {
          case 'ok':
          $('#coupon_code').val('');
          $('#couponprice').hide();
          $('#couponprice').html(xmlTag(data,'discount')+xmlTag(data,'remove'));
          $('#couponprice').slideDown('slow');
          $('#couponimage').html('<img src="templates/images/discount-ok.png" id="gimage" alt="" title="" />');
          if (xmlTag(data,'rebuild')!='none') {
            $('#basket-total-t-coupon').hide();
            $('#basket-total-t-sub').after(xmlTag(data,'rebuild'));
          }
          $('#sysMsg').hide('slow');
          loadGrandTotal(xmlTag(data,'rawtotal'),
                         xmlTag(data,'total'),
                         xmlTag(data,'taxrawtotal'),
                         xmlTag(data,'taxtotal'),
                         xmlTag(data,'rawship'),
                         xmlTag(data,'ship')
                         );
          break;
          default:
          $('#couponimage').html('<img src="templates/images/discount-error.png" id="gimage" alt="" title="" />');
          $('#sysMsg').html(xmlTag(data,'message'));
          $('#sysMsg').show('slow');
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

function deleteDiscountCoupon() {
  $(document).ready(function() { 
    $.ajax({
      url: 'index.php',
      data: 'p=delete-discount-coupon',
      dataType: 'xml',
      success: function (data) {
        $('#couponimage').html('');
        $('#price-t-total').hide();
        $('#basket-total-t-coupon').hide('slow');
        $('#couponprice').hide();
        $('#couponprice').html(xmlTag(data,'price'));
        $('#price-t-total').html(xmlTag(data,'total'));
        $('#couponprice').slideDown('slow');
        $('#price-t-total').slideDown('slow');
        adjustHiddenBoxPrice('t-total',xmlTag(data,'rawtotal'));
        loadGrandTotal(xmlTag(data,'rawtotal'),
                       xmlTag(data,'total'),
                       xmlTag(data,'taxrawtotal'),
                       xmlTag(data,'taxtotal'),
                       xmlTag(data,'rawship'),
                       xmlTag(data,'ship')                     
                       );
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

function closeDiscountCouponMessage() {
  $(document).ready(function() {
    $('#coupon_code').val('');
    $('#couponimage').html('<img src="templates/images/discount-blank.gif" id="gimage" alt="" title="" />');
    $('#sysMsg').hide('slow');
  });  
}

//-----------------------------------------------------------------
// CHECKOUT BASKET
// The following relates to the basket items on the checkout page
//-----------------------------------------------------------------

function adjustHiddenBoxPrice(box,value) {
  $(document).ready(function() {
    $(box).val(value);
  });
}

function deleteBasketItem(box,text,which,ts_switch) {
  if (which=='link') {
    var conDel = confirm(text);
    if (!conDel) { 
      return false;
    }
  }
  $(document).ready(function() { 
    $.ajax({ 
      url: 'index.php',
      data: 'p=delete-item&id='+box,
      dataType: 'xml',
      success: function (data) {
        // If the cart count is greater than 0, we remove cart item. If 0, we redirect to checkout page to clear all..
        if (xmlTag(data,'count')>0) {
          $('#bsk-'+xmlTag(data,'box')).hide('slow');
          // Does this trigger a refresh? This only happens if mixed tangible/downloads are in basket and tangible are removed..
          // Refresh removes shipping selectors..
          if (xmlTag(data,'trigger')=='yes') {
            window.location = xmlTag(data,'url');
            return false;
          }
        } else {
          window.location = xmlTag(data,'url');
          return false;
        }
        if (document.getElementById('topCartCount')!='undefined') {
          $('#topCartCount').html(xmlTag(data,'count'));
        }
        // Reset shipping if options were available..
        // If global switch is off, shipping/tax rules are disabled..
        switch (ts_switch) {
          case 'on':
          if (xmlTag(data,'clearship')=='yes') {
            reloadShippingSelectors();
          } else {
            reloadShippingSelectors();
          }
          break;
          case 'off':
          reloadShippingSelectorsOff();
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

function updateBasketQty(box,qty,ts_switch) {
  $(document).ready(function() { 
    $.ajax({
      url: 'index.php',
      data: 'p=update-basket&id='+box+'&qty='+qty,
      dataType: 'xml',
      success: function (data) {
        // Did anything exceed stock levels..
        if (xmlTag(data,'box')=='attr-exceed-stock') {
          alert(xmlTag(data,'message'));
          return false;
        }
        // Was minimum purchase quantity set..
        if (xmlTag(data,'box')=='min-purchase-qty') {
          $('#box-'+box).val(parseInt(qty+1));
          $('#qtyarea-'+box).html(parseInt(qty+1));
          alert(xmlTag(data,'message'));
          return false;
        }
        // Read incoming xml and update html elements..
        $('#pb-'+xmlTag(data,'box')).hide();
        $('#pb-'+xmlTag(data,'box')).html(xmlTag(data,'html'));
        $('#pb-'+xmlTag(data,'box')).show();
        if (document.getElementById('topCartCount')!='undefined') {
          $('#topCartCount').html(xmlTag(data,'count'));
        }
        // Reset shipping if options were available..
        // If global switch is off, shipping/tax rules are disabled..s
        switch (ts_switch) {
          case 'on':
          if (xmlTag(data,'clearship')=='yes') {
            reloadShippingSelectors();
          } else {
            reloadShippingSelectors();
          }
          break;
          case 'off':
          reloadShippingSelectorsOff();
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

function updateQTY(type,action,max,text,text2,ts_switch) {
  $(document).ready(function() {
    var qty = parseInt($('#box-'+type).val());
    switch (action) {
      case 'add':
      var qty = parseInt(qty+1);
      if (qty<=max) {
        updateBasketQty(type,qty,ts_switch);
        $('#box-'+type).val(qty);
        $('#qtyarea-'+type).html(qty);
      } else {
        alert(text2);
        return false;
      }
      break;
      case 'reduce':
      var qty = parseInt(qty-1);
      if (qty>=1) {
        updateBasketQty(type,qty,ts_switch);
        $('#box-'+type).val(qty);
        $('#qtyarea-'+type).html(qty);
      }
      if (qty==0) {
        $('#box-'+type).val(qty);
        $('#qtyarea-'+type).html(qty);
        var conDel = confirm(text);
        if (conDel) { 
          deleteBasketItem(type,text,'zero',ts_switch);
          return true;
        } else {
          $('#box-'+type).val('1');
          $('#qtyarea-'+type).html('1');
          return false;
        }
      }
      break;
    }
  });  
}

function refreshPersonalisation(div,price,ts_switch) {
  $('#'+div).css('background','url(templates/images/pers_spinner.gif) no-repeat 98% 95%');
  $(document).ready(function() { 
    $.ajax({
      url: 'index.php',
      data: 'ppRebuild='+div,
      dataType: 'json',
      success: function (data) {
        // Incoming is array, update based on slot..
        $.each(data, function (i, msg) {
          switch (i) {
            // Div refresh..
            case 0:
            if (msg=='reload') {
              window.location = '?p=checkout';
              return false;
            }
            $('#'+div).html(msg).slideDown('slow');
            $('#'+div).css('background-image','none');
            break;
            // Price reload..
            case 1:
            $('#'+price).html(msg).slideDown('slow');
            $('#'+div).css('background-image','none');
            break;
          }
        });
        switch (ts_switch) {
          case 'on':
          reloadShippingSelectors();
          break;
          case 'off':
          reloadShippingSelectorsOff();
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

function updateProductPersonalisation(code) {
  // Transmit data to server using jquery/ajax..
  $('#update_spinner').css('background','url(templates/images/pers_spinner.gif) no-repeat 2% 50%');
  $(document).ready(function() { 
    $.ajax({
      type: 'POST',
      url: 'index.php?ppCE='+code,
      data: $("#personalisationWindow > form").serialize(),
      cache: false,
      dataType: 'html',
      success: function (data) {
        if (data=='') {
          // Reset personalisation fields back to their original colour..
          resPBoxValues();
          $('#update_spinner').css('background-image','none');
          $('#message').slideDown('slow');
        } else {
          var string = data.split('#######');
          $('#update_spinner').css('background-image','none');
          $('#'+string[1]).addClass('error_highlight');
          $('#'+string[1]).focus();
          alert(string[0]);
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
// MENU BASKET
// The following relate to the menu basket
//--------------------------------------------

function removeBasketItem(product) {
  // Transmit data to server using jquery/ajax..
  $(document).ready(function() { 
    $.ajax({
      url: 'index.php',
      data: 'p=delete-menuitem&id='+product,
      dataType: 'xml',
      success: function (data) {
        // Read incoming xml and update html elements..
        switch (xmlTag(data,'loadtype')) {
          case 'empty':
          $('#shoppingBasket').hide();
          $('#shoppingBasket').html(xmlTag(data,'html'));
          $('#shoppingBasket').show('slow');
          // Hide floating basket..
          if (isIE6()=='no') {
            $('#footerBasket').hide('slow');
          }
          break;
          case 'items':
          $('#mb-'+xmlTag(data,'box')).hide('slow');
          $('#menu-basket-total').html(xmlTag(data,'total'));
          break;
        }
        if (xmlTag(data,'id')>0 && document.getElementById('img'+xmlTag(data,'id'))!='undefined' &&
            document.getElementById('img'+xmlTag(data,'id'))!=null) {
          document.getElementById('img'+xmlTag(data,'id')).src='templates/images/addtocart.gif';
        }
        if (document.getElementById('topCartCount')!='undefined') {
          $('#topCartCount').html(xmlTag(data,'count'));
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

function addToBasket(id) {
  // Transmit data to server using jquery/ajax..
  $('#spinner').html('<img src="templates/images/addtobasket.gif" alt="" title="" />&nbsp;&nbsp;').fadeIn(500);
  $(document).ready(function() { 
    $.ajax({
      type: 'POST',
      url: 'index.php?pID='+id,
      data: $("#addToBasket > form").serialize(),
      cache: false,
      dataType: 'xml',
      success: function (data) {
        $('#spinner').html('&nbsp;');
        // Was anything selected..
        if (xmlTag(data,'message')=='no-items-set') {
          alert(xmlTag(data,'msg'));
          return false;
        }
        // Do we refresh menu basket..
        if (xmlTag(data,'refresh')=='li-refresh' || xmlTag(data,'refresh')=='new-item') {
          if (xmlTag(data,'previous')!='0') {
            if (document.getElementById('topCartCount')!='undefined') {
              $('#topCartCount').html(xmlTag(data,'count'));
            }
            switch (xmlTag(data,'refresh')) {
              case 'li-refresh':
              $('#'+xmlTag(data,'id')).html(xmlTag(data,'litag'));
              $('#menu-basket-total').html(xmlTag(data,'total'));
              $('#'+xmlTag(data,'id')).hide('slow');
              $('#'+xmlTag(data,'id')).slideDown('slow');
              $('#spinner').html('<img src="templates/images/addedtobasket.png" alt="" title="" />&nbsp;&nbsp;').fadeOut(3000);
              break;
              case 'new-item':
              $('#menu-basket-total').html(xmlTag(data,'total'));
              $('#'+xmlTag(data,'previous')).after(xmlTag(data,'append'));
              $('#'+xmlTag(data,'id')).css('display','none');
              $('#'+xmlTag(data,'id')).show('slow');
              $('#spinner').html('<img src="templates/images/addedtobasket.png" alt="" title="" />&nbsp;&nbsp;').fadeOut(3000);
              break;
              default:
              // Debugging..
              //alert(xmlTag(data,'refresh')+'\n\n'+xmlTag(data,'message'));
              break;
            }
            // Reset personalisation fields back to their original colour..
            resPBoxes();
          } else {
            $('#shoppingBasket').hide();
            $('#shoppingBasket').html(xmlTag(data,'html'));
            if (document.getElementById('topCartCount')!='undefined') {
              $('#topCartCount').html(xmlTag(data,'count'));
            }
            $('#shoppingBasket').show('slow');
            $('#spinner').html('<img src="templates/images/addedtobasket.png" alt="" title="" />&nbsp;&nbsp;').fadeOut(3000);
            // Reset personalisation fields back to their original state..
            resPBoxes();
            // Show floating basket..
            if (isIE6()=='no') {
              $('#footerBasket').show('slow');
            }
          }
        } else {
          if (xmlTag(data,'refresh')=='blank-per-field' || xmlTag(data,'refresh')=='blank-attr-field') {
            $('#'+xmlTag(data,'field')).addClass('error_highlight');
            $('#'+xmlTag(data,'field')).focus();
          }
          if (xmlTag(data,'refresh')=='min-purchase-qty') {
            // Custom code if required..
          }
          alert(xmlTag(data,'message'));
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

function resPBoxValues() {
  $(document).ready(function() { 
    $("#personalisation textarea").each(function(){
      $('#'+$(this).attr('id')).removeClass('error_highlight');
    });
    $("#personalisation input").each(function(){
      $('#'+$(this).attr('id')).removeClass('error_highlight');
    });
    $("#personalisation select").each(function(){
      $('#'+$(this).attr('id')).removeClass('error_highlight');
    });
  });
}

function resPBoxes() {
  $(document).ready(function() { 
    $("#personalisation textarea").each(function(){
      $('#'+$(this).attr('id')).removeClass('error_highlight').val('');
    });
    $("#personalisation input").each(function(){
      $('#'+$(this).attr('id')).removeClass('error_highlight').val('');
    });
    $("#personalisation select").each(function(){
      $('#'+$(this).attr('id')).removeClass('error_highlight').val('no-option-selected');
    });
  });  
}
