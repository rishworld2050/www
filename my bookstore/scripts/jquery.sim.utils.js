(function($)
{
  $.jscPopup = function(url,options_param,hooks_param) 
  {
    var $dlg = $('<div></div>');
    var def_hooks ={ formatTxt:null,popupShown:null};
    var hooks = $.extend(def_hooks,hooks_param||{});
    var def_options={close: function(ev,ui){ $(this).remove(); } };
    var options = $.extend(def_options,options_param||{});
    $.get(url,{},
            function (responseText) 
            {
                if($.isFunction(hooks.formatTxt))
                {
                    responseText = hooks.formatTxt(responseText);
                }
                $dlg.html(responseText);
                $dlg.dialog(options);
                if($.isFunction(hooks.popupShown))
                {
                    responseText = hooks.popupShown($dlg);
                }
            });
  }
  $.parseJSONObj=function(jsontxt)
  {
    var objarr = $.parseJSON(jsontxt);
    if(null == objarr)
    {
        return null;
    }
    var obj = $.isArray(objarr) ? objarr[0]:objarr;
    return obj;
   }
  $.jscFormatToTable = function(json,tableid)
  {
    var obj ={};
    if($.type(json)=== 'string')
    {
        obj = $.parseJSONObj(json);
    }
    else
    {
        obj = json;
    }
    
    var allrows='';
    $.each(obj, function(name,val)
    {
        allrows += '<tr><td class="tdname">'+name+'</td><td class="tdvalue">'+val+'</td></tr>\n';
    });
    
    return '<table><tbody>'+allrows+'</tbody></table>';
  }
  
  $.jscIsSet = function(v)
  {
    return ($.type(v) == 'undefined') ? false: true;
    //return (typeof(v) == 'undefined')?false:true;
  }
  
  $.jscGetUrlVars = function(urlP)
  {
    var vars = [], hash;
    var url = $.jscIsSet(urlP)?urlP:window.location.href;
    
    var hashes = url.slice(url.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
      hash = hashes[i].split('=');
      vars.push(hash[0]);
      vars[hash[0]] = hash[1];
    }
    return vars;
  }
  $.jscComposeURL=function(url,params)
  {
    var bare_url = url.split('?')[0];
    var url_params='';
    
    $.extend(params,$.jscGetUrlVars(url),params)
    var ret_url = bare_url;
    $.each(params, function(k,v)
    {
        if(0 == k){return;}
        url_params += k+'='+v+'&';
    });
    
    if(url_params.length > 0)
    {
        ret_url += '?' + url_params.slice(0,-1);
    }
    return encodeURI(ret_url);
  }
  sfm_hyper_link_popup = function(anchor,url,p_width,p_height)
  {
    var iframeid = anchor.id+'_frame';
    var $dlg = $("<div class='sfm_popup_container'><iframe id='"+iframeid+"'  frameborder='0' src='"+url+"' width='100%' height='100%'></iframe></div>");
    $dlg.css({overflow:'hidden',margin:0});
    var pos = $(anchor).offset();
    
    var height = $(anchor).outerHeight();
            
    $dlg.dialog({draggable:true,resizable: false,position:[pos.left,pos.top+height+20],width:p_width,height:p_height});
    
    $dlg.parent().resizable(
    {
        start:function()
        {
            var $ifr = $('iframe',this);
			var $overlay = $("<div id='dlg_overlay_div'></div>")
                .css({position:'absolute',top:$ifr.position().top,left:0})
                .height($ifr.height())
                .width('100%');

			$ifr.after($overlay);
        },
        stop:function()
        {
            $('#dlg_overlay_div',this).remove();
        }
    });
    //$iframe.attr('src',url);
  }
  
  sfm_popup_form=function(url,p_width,p_height,options_param)
  {
    var $dlg = $("<div class='sfm_popup_container'><iframe frameborder='0' src='"+url+"' width='100%' height='100%'></iframe></div>");
    $dlg.css({position:'relative',overflow:'hidden',margin:0});
    
    if($(window).width() < p_width){ p_width = $(window).width()-20;}
    
    if($(window).height() < p_height){ p_height = $(window).height()-20;}
    
    var defaults = 
        {   
            draggable:true,modal:true, resizable: true,closeOnEscape: false,width:p_width,height:p_height,
            position:{my: "center",at: "center",of: window},
            resizeStart:function()
            {
                var $ifr = $('iframe',this);
                var $overlay = $("<div id='dlg_overlay_div'></div>")
                    .css({position:'absolute', top:$ifr.position().top,left:0})
                    .height($ifr.height())
                    .width('100%');
                
                $ifr.after($overlay);
            },
            resize:function()
            {
                var $ifr = $('iframe',this);
                $('#dlg_overlay_div',this).height($ifr.height());
            },
            resizeStop:function()
            {
                $('#dlg_overlay_div',this).remove();
            }
        };
        
    var options = $.extend(defaults, options_param||{});
    
    $dlg.dialog(options);
    
  }
   
  sfm_window_popup_form=function(url,p_width,p_height,options_param)
  {
       var defaults =
       {
        location:false,menubar:false,status:true,toolbar:false,scrollbars:true
       };
       var options = $.extend(defaults, options_param||{});
       
       var params='width='+p_width+',height='+p_height;
       
       params += ',location='+ (options.location?'yes':'no');
       params += ',menubar='+ (options.menubar?'yes':'no');
       params += ',status='+ (options.status?'yes':'no');
       params += ',toolbar='+ (options.toolbar?'yes':'no');
       params += ',scrollbars='+ (options.scrollbars?'yes':'no');
       
       window.open(url,'sfm_form_popup',params);
  }
  
  sfmFormObj=function(p_divid,p_url,p_height)
  {
    var options={divid:p_divid, url:p_url, height:p_height};
    $(function()
    {
        $ifr = $("<iframe frameborder='0' src='"+options.url+"' width='100%' height='"+options.height+"' allowtransparency='true'></iframe>");
        $('#'+options.divid).append($ifr);
    });
  }
  
  sfm_show_loading_on_formsubmit=function(formname,id)
  {
    var $form = $('form#'+formname);
    
    $('#'+id,$form).click(function()
    { 
        if(this.form.disable_onsubmit)
        {//for prev button, no validation_success is called. since there is no validation
            $(this).parent().addClass('loading_div');
            $(this).hide();
        }
        else
        {
            $(this.form).data('last_clicked_button',this.id); 
        }
        return true;
    });
    
    $form.bind('validation_success',function()
    {
        if($(this).data('last_clicked_button') === id)
        {
            $('#'+id,this).parent().addClass('loading_div');
            $('#'+id,this).remove();
        }
    });
    $('#'+id,$form).parent().removeClass('loading_div');
  }
  
  sfm_clear_form = function(formobj) 
  {
    var $formobj = $(formobj);
    if($formobj.get(0).validator)
    { 
        $formobj.get(0).validator.clearMessages(); 
    }
    
    $formobj.find(':input').each(function() 
    {
        switch(this.type) 
        {
            case 'password':
            case 'select-multiple':
            case 'select-one':
            case 'textarea':
            {
                $(this).val('');
                $(this).trigger('change');
                break;
            }
            case 'text':
            {
                if(this.sfm_num_obj)
                {
                    $(this).val('0');
                }
                else
                {
                    $(this).val('');
                }
                $(this).trigger('change');
                break;
            }
            case 'checkbox':
            case 'radio':
            {
                this.checked = false;
                $(this).trigger('change');
            }
        }
    });
    
  }
  
  //from http://bit.ly/QHgAP3
  $.fn.getStyleObject = function()
  {
        var dom = this.get(0);
        var style;
        var returns = {};
        if(window.getComputedStyle){
            var camelize = function(a,b){
                return b.toUpperCase();
            }
            style = window.getComputedStyle(dom, null);
            for(var i=0;i<style.length;i++){
                var prop = style[i];
                var camel = prop.replace(/\-([a-z])/g, camelize);
                var val = style.getPropertyValue(prop);
                returns[camel] = val;
            }
            return returns;
        }
        if(dom.currentStyle){
            style = dom.currentStyle;
            for(var prop in style){
                returns[prop] = style[prop];
            }
            return returns;
        }
        return this.css();
   }

  $.fn.sfm_getStyle = function(attrib)
  {
        var dom = this.get(0);
        var style;
        if(window.getComputedStyle)
        {
            style = window.getComputedStyle(dom, null);
            return style.getPropertyValue(attrib);
        }
        if(dom.currentStyle)
        {     
           style = dom.currentStyle;
           return style[attrib];
        }
        return this.css(attrib);
  };
  
   sfm_init_default_text = function(formname,id,def_txt)
   {
       var $form = $('form#'+formname);
       var $txt = $('#'+id,$form);
       if($txt.length <=0){ return; }
       
       var txtobj = $txt.get(0);
       
       txtobj.default_text = def_txt;
       function init()
       {
            var $div = $('<div></div>').text(txtobj.default_text);
            var divobj = $div.get(0);
            $div.css($txt.getStyleObject());
            $div.css(
            {
             position : 'absolute',
            left : $txt.position().left,
            top : $txt.position().top,
            'z-index' : $txt.css("z-index"),
            border:0,
            'background-color':'transparent',
            'background-image':'none'
            });
            
            $div.addClass('sfm_auto_hide_text');
            $txt.parent().append($div);
            txtobj.overlay_obj = divobj;
            $txt.val('');
            divobj.inputbelow = txtobj;
            divobj.hideself=function()
            {
                var inp = this.inputbelow;
                $(this).hide();
                $(inp).focus();
            };
            divobj.showself=function()
            {
                $(this).show();
                $(this.inputbelow).val('');
            };
            $div.bind('mouseup',function(event)
            {
                this.hideself();
                event.stopPropagation();
            });       
       }
       txtobj.make_empty=function()
       {
            if($(this.overlay_obj).is(":visible"))
            {
                this.overlay_obj.hideself();
            }
       }; 
       txtobj.restore_default=function()
       {
           if(this.default_text && ($(this).val() == ''||
                    $(this).val() == this.default_text))
           {
                this.overlay_obj.showself();
           }
       };
       
       $txt.focus(function() 
       {
            this.make_empty();
       });
       
       $txt.blur(function()
       {
            this.restore_default();
       });   
       init();
   }
})(jQuery);
