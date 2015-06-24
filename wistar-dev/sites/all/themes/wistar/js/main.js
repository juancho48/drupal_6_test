var $ = jQuery.noConflict();

$(document).ready(function(){
	initLinks();
	initViewsSeparatorLine();
	initGiveForms();
	initCufonPrintFix();
	/*initSelectForIE();*/
	validationAmountAndPhoneFields();
	initCookies();
	deleteCookies();
	fieldsetClass();
	initIeCSS();
	initBlogImageCapture();
  initFancybox();
	initContent();
//ECITY FIX - 04/2015
$("#slide_nav_container").css("background-color","#186b93");
$("#slide_nav_elements").css("height","200px");
});

function initIeCSS(){
	if($.browser.opera){
		$("#employment_elements iframe").addClass("opera");
	}
	if($.browser.msie){
		$("#employment_elements iframe").addClass("IE");
	}
	if ( $( 'body' ).hasClass( 'microsite-subpage-fullwidth' ) ) {
		var $micrositeElementsWidth = $( '#microsite_elements' ).width(),
				$micrositeMenuWidth = $( '#microsite_menu' ).width(),
				$micrositeContent = $( '#microsite_content' );

		var micrositeContentWidth = $micrositeElementsWidth - $micrositeMenuWidth - 5;
		$micrositeContent.width( micrositeContentWidth );
		$( window ).bind( 'resize', function() {
			$micrositeElementsWidth = $( '#microsite_elements' ).width(),
			$micrositeMenuWidth = $( '#microsite_menu' ).width()
			micrositeContentWidth = $micrositeElementsWidth - $micrositeMenuWidth - 5;
			$micrositeContent.width( micrositeContentWidth );
		});
	}
}

$(window).load(function(){
	initContentImageWrapper();
});

function initLinks(){
	$('a[rel=external]').attr('target','_blank');
	$('form[rel=external]').attr('target','_blank');
}

function initCufonPrintFix(){
	if($('#main_content div.node-press').get(0)){
		var press_title = '<h2 class="nocufon">'+$('#main_content div.node-press h2.press').text()+'</h2>';
		$(press_title).insertAfter($('#main_content div.node-press h2.press'));
	}
}

function initViewsSeparatorLine(){
	if($('#main_content div.newsletter').get(0)){
		var countRow = 0;
		$('#main_content div.newsletter div.views-row').each(function(e){
			countRow = countRow + 1;
			if(countRow == 2){
				$(this).addClass('views-row-last').after('<div class="clear-row"></div>');
				countRow = 0;
			}
			//<div class="clear-row"></div>
		});
		$('#main_content div.newsletter div.views-row div.views-field-field-newsletter-file-fid a').click(function(e){
			e.stopPropagation();
		});
		//$('#main_content div.newsletter div.views-row').click(function(e){
		//	var href = $(this).find('a.more').attr('href');
		//	window.location.href = href;
		//	return false;
		//});
	}
}

function initContentImageWrapper(){
	if($('#main_content div.node-article-page #content').get(0)){
		$('#main_content div.node-article-page #content img').each(function(){
			$(this).wrap('<div class="image-holder"></div>');
			var imageTitle = $(this).attr('title');
			var imageHolderWidth = $(this).parents('div.image-holder').width();
			if(imageTitle){
				$(this).after('<span class="image-title" style="width:'+imageHolderWidth+'px;">'+imageTitle+'</span>');
			}
		});
	}
}

function initGiveForms(){

	if($('#wistar-donation-confirmation-page').get(0)){
		var hashParams = getHashParams();
		$("div.form-item select").change(function(){
			var selectOptionValue = $(this).val();
			if($(this).attr('id') == 'edit-lab'){
				if($('#edit-lab').val()){
					$('#edit-program').val('');
					$('#edit-program-wrapper label').show();
					hashParams['program'] = '';
				}
				hashParams['lab'] = selectOptionValue;
				getHashQueryString(hashParams);
			}
			if($(this).attr('id') == 'edit-program'){
				if($('#edit-program').val()){
					$('#edit-lab').val('');
					$('#edit-lab-wrapper label').show();
					$('#edit-program-other-wrapper').slideUp(500);
					hashParams['lab'] = '';
				}
				hashParams['program'] = selectOptionValue;
				getHashQueryString(hashParams);
			}
		}).trigger('change');
		var programOtherValue=203;
		//#edit-program-other-wrapper
		var getCheckedSelectedProgram = $('#edit-program-wrapper select option:selected').val();
		if(getCheckedSelectedProgram == programOtherValue){
			$('#edit-program-other-wrapper').slideDown(500);
		} else {
			$('#edit-program-other-wrapper').slideUp(500);
		}
		$('#edit-program-wrapper select').change(function(){
			if($(this).val() == programOtherValue){
				$('#edit-program-other-wrapper').slideDown(500);
			} else {
				$('#edit-program-other-wrapper').slideUp(500);
				$('#edit-program-other-wrapper input').val('');
				hashParams['program-other'] = '';
				getHashQueryString(hashParams);
			}
		});
		$('#edit-lab-wrapper select').change(function(){
			$('#edit-program-other-wrapper').slideUp(500);
			$('#edit-program-other-wrapper input').val('');
			hashParams['program-other'] = '';
			getHashQueryString(hashParams);
		});

		return false;
	}

	if($('#init-give-forms')){
		var programOtherValue = 203;
		//Redirect on Change
		var hashParams = getHashParams();
		if(hashParams['program']){
			$('#edit-program-wrapper label').hide();
			$('#edit-program').val(hashParams['program']);
		}
		if(hashParams['program-other']){
			$('#edit-program-other-wrapper label').hide();
			$('#edit-program-wrapper label').hide();
			$('#edit-program').val(programOtherValue);
			var decodeUri = decodeURIComponent(hashParams['program-other']);
			$('#edit-program-other').val(decodeUri);
		}
		if(hashParams['lab']){
			$('#edit-lab-wrapper label').hide();
			$('#edit-lab').val(hashParams['lab']);
		}

		//style labels
		$('label').inFieldLabels();
		$('label').each(function() {
			$(this).html($(this).html().replace(':', ''));
		});
		$('div.form-radios').parent().addClass('form-radios-wrapper');

		//#edit-donation-amount-wrapper
		var getCheckedRadio = $("form div.form-radios input[type='radio']:checked").val();
		if(getCheckedRadio != 'edit-amount-custom-wrapper'){
			var amountField = $('#edit-amount-field-wrapper input').val();
			if(!amountField){
				$('#edit-amount-field-wrapper input').val('');
			}
		}
		$('div.form-radios div.form-item > label').click(function(){
			if($(this).parent().attr('id') != 'edit-amount-custom-wrapper' || $(this).parent().attr('id') != 'edit-amount-field-wrapper'){
				$('#edit-amount-field-wrapper input').val('');
			}
		});
		$('#edit-amount-field-wrapper input').click(function(){
			$('#edit-amount-custom').attr('checked', true);
		});

		// all select change event
		$("div.form-item select").change(function(){
			var selectOptionValue = $(this).val();
			if(selectOptionValue == ''){
				$(this).parents('div.form-item').find('label').show();
			}else{
				$(this).parents('div.form-item').find('label').hide();
			}
			if($('#wistar-donation-billing-research-form').get(0)){
				if($(this).attr('id') == 'edit-lab'){
					if($('#edit-lab').val()){
						$('#edit-program').val('');
						$('#edit-program-wrapper label').show();
						hashParams['program'] = '';
						$('#edit-program-other-wrapper').slideUp(500);
					}
					hashParams['lab'] = selectOptionValue;
					getHashQueryString(hashParams);
				}
				if($(this).attr('id') == 'edit-program'){
					if($('#edit-program').val()){
						$('#edit-lab').val('');
						$('#edit-lab-wrapper label').show();
						hashParams['lab'] = '';
					}
					hashParams['program'] = selectOptionValue;
					getHashQueryString(hashParams);
				}
			}
		}).trigger('change');

		// #edit-program-other-wrapper
		if($('#wistar-donation-billing-research-form').get(0)){
			$('#edit-program-other').change(function(){
				var inputValue = $(this).val();
				var encodeUri = encodeURIComponent(inputValue);
				hashParams['program-other'] = encodeUri;
				getHashQueryString(hashParams);
			}).trigger('change');
		}

		//#edit-program-other-wrapper
		var getCheckedSelectedProgram = $('#edit-program-wrapper select option:selected').val();
		if(getCheckedSelectedProgram == programOtherValue){
			$('#edit-program-other-wrapper').slideDown(500);
		} else {
			$('#edit-program-other-wrapper').slideUp(500);
		}
		$('#edit-program-wrapper select').change(function(){
			if($(this).val() == programOtherValue){
				$('#edit-program-other-wrapper').slideDown(500);
			} else {
				$('#edit-program-other-wrapper').slideUp(500);
				$('#edit-program-other-wrapper input').val('');
				hashParams['program-other'] = '';
				getHashQueryString(hashParams);
			}
		});

		// edit-card-country
		var getCheckedCardCountry = $('#edit-card-country-wrapper select option:selected').val();
		if(getCheckedCardCountry == 'CA' || getCheckedCardCountry == 'US'){
			$('#edit-card-state-wrapper').slideDown(500);
		} else {
			$('#edit-card-state-wrapper').slideUp(500);
		}
		$('#edit-card-country-wrapper select').change(function(){
			if($(this).val() == 'CA' || $(this).val() == 'US'){
				$('#edit-card-state-wrapper').slideDown(500);
			} else {
				$('#edit-card-state-wrapper').slideUp(500);
				$('#edit-card-state-wrapper select').val('');
			}
		});

		// edit-country
		var getCheckedCountry = $('#edit-country-wrapper select option:selected').val();
		if(getCheckedCountry == 'CA' || getCheckedCountry == 'US'){
			$('#edit-state-wrapper').slideDown(500);
		} else {
			$('#edit-state-wrapper').slideUp(500);
		}
		$('#edit-country-wrapper select').change(function(){
			if($(this).val() == 'CA' || $(this).val() == 'US'){
				$('#edit-state-wrapper').slideDown(500);
			} else {
				$('#edit-state-wrapper').slideUp(500);
				$('#edit-state-wrapper select').val('');
			}
		});
	}
}

getHashParams = function () {
	var hashParams = {};
	var e,
		a = /\+/g,  // Regex for replacing addition symbol with a space
		r = /([^&;=]+)=?([^&;]*)/g,
		d = function (s) { return decodeURIComponent(s.replace(a, " ")); },
		q = window.location.hash.substring(1);
	while (e = r.exec(q))
		hashParams[d(e[1])] = d(e[2]);
	return hashParams;
}

getHashQueryString = function (hashParams) {
	var hashQueryString = '';
	for(key in hashParams) {
		if(hashParams[key]){
			hashQueryString += key+'='+hashParams[key]+'&';
		}
	}
	hashQueryString = hashQueryString.substr(0, (hashQueryString.length-1));
	window.location.hash = hashQueryString;
}

function initSelectForIE(){
	if ($.browser.msie && $.browser.version == 7) {
	jQuery('select.form-select').wrap('<div class="form-select-wrapper"></div>');
	jQuery('div.form-select-wrapper').each(function(index, item) {
		var $input = jQuery(item).find('select.form-select');
		var width = $input.width();
		jQuery(item).width(width+15);
	});
	}
}

function validationAmountAndPhoneFields(){
	$('#edit-amount-field').numberMask({beforePoint:20});
	validateTextField($('#edit-phone'));
}

function validateTextField(select){
	select.keydown(function(event) {
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 ||
            (event.keyCode == 65 && event.ctrlKey === true) ||
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 return;
        }
        else {
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )&&(event.keyCode!=173)&&(event.keyCode!=32)) {
				 event.preventDefault();
            }
        }
    });
}
function initCookies(){
	if($('#edit-amount-field').get(0)) {
		if($('#edit-amount-field').attr('value').length>0){
			$('input[name=amount]:radio').attr('checked', 'checked');
		}
		else{
			var choiceRadio=$.cookie('choiceRadio');
			if(choiceRadio==null){
				document.getElementById('edit-amount-100').checked = true;
			}
			else document.getElementById(choiceRadio).checked = true;
		}
		$('div.billing-form-items .form-radio').click(function(){
			var radio=$('input[name=amount]:checked').attr('id');
			if(radio!='edit-amount-custom'){
				$.cookie('choiceRadio',radio);
			}
		});
		if($.cookie('anonymous')=='true'){
			$('#edit-anonymous').attr('checked','checked');
		}
		$('#edit-anonymous').click(function(){
			var anonymousButton=$('#edit-anonymous').attr("checked");
			$.cookie('anonymous',anonymousButton);
		});

		if(($.cookie('email')=='true')||($.cookie('isFirst')==null)){
			$('#edit-info-send').attr('checked','checked');
		}
		else document.getElementById('edit-info-send').checked = false;
		$('#edit-info-send').click(function(){
			var emailButton=$('#edit-info-send').attr("checked");
			$.cookie('email',emailButton);
			$.cookie('isFirst',true);
		});

	}
}

function deleteCookies(){
	var url=document.URL;
		if((url=='http://www.wistar.org/support-wistar/donate-online/thank-you')||(url=='http://www.wistar.org/support-wistar/donate-online?message=Donation+Cancelled')){
			$.cookie('email',null);
			$.cookie('isFirst',null);
			$.cookie('choiceRadio',null);
			$.cookie('anonymous',null);
			$.cookie('formCookie',null);
			$.cookie('selectCookie',null);
		}
}

function fieldsetClass(){
	$("#wistar-donation-billing-form fieldset").each(function(index){
		var fieldsetClass = "fieldsetClass" + index;
		$(this).addClass(fieldsetClass);
	});
}
function initBlogImageCapture(){
	if($('.node-type-post .node-post').get(0)){
		$('.node-post .field-content.wysiwyg  img').each(function() {
			var srcImage = $(this).attr('src');
			//$(this).bind("load",function(){
			$(this).bindImageLoad(function() {
				var isWraped = $(this).hasClass('nowrap');
				var elementFloat = $(this).css('float');
				var imageCapture = $(this).attr('alt');
				var imageOuterWidth =  $(this).outerWidth(true);
				var imageWidth =  $(this).width();
				if (!isWraped){
					$(this).addClass('nowrap').wrap('<div class="post-image im-' + elementFloat + '"></div>');
					$(this).parent('.post-image').css({'width': imageOuterWidth});
					if(imageCapture){
						$(this).parent().append('<div class="blog-image-alt">'+ imageCapture +'</div>');
						$(this).parent().find('.blog-image-alt').css({'width': imageWidth, 'margin':'0 auto' });

					};
				}
			});

		});
	}
};
function initFancybox(){
  if($('.view-field-field-post-image a.fancybox-image').get(0)){
    $('.view-field-field-post-image a.fancybox-image').fancybox({
      'transitionIn':'elastic',
      'transitionOut':'elastic',
      'speedIn':600,
      autoScale:false,
    });
  }
}



function initPopup(){
	$('a.nothanks').live('click',function(e){
		e.preventDefault();
		$('#TB_overlay').click();
	});
}
// Check load image
$.fn.bindImageLoad = function (callback) {
	function isImageLoaded(img) {
		if (!img.complete) {
			return false;
		}
		if (typeof img.naturalWidth !== "undefined" && img.naturalWidth === 0) {
			return false;
		}
			return true;
		}
	return this.each(function () {
		var ele = $(this);
		if (ele.is("img") && $.isFunction(callback)) {
			ele.one("load", callback);
			if (isImageLoaded(this)) {
				ele.trigger("load");
			}
		}
	});
};

function initContent(){
  var tableLength = $('#microsite_content .table-with-scroll').length;
  if(tableLength){
  	var elemTable = $('#microsite_content .table-with-scroll'),elemTableHeight, scrollTableHeight,
  	elemTh, thLenght, maxHeight, trHeight, tableOffset, timeoutTop, offsetTop, offsetLeft, fixedRow;
  	for (var y = 0; y < tableLength; y++) {
	    elemTable.eq(y).wrap('<div class="table-scroll"></div>');
	    elemTable.eq(y).wrap('<div class="table-wrapper"></div>');
	    elemTableHeight = elemTable.eq(y).css('height');
	    scrollTableHeight = elemTable.eq(y).parents('.table-scroll').css('height');
	    if(parseInt(elemTableHeight) < parseInt(scrollTableHeight)){
	    	elemTable.eq(y).parents('.table-scroll').css('height','auto');
	    }
			var fixed_elem = elemTable.eq(y).find('tr').eq(0).addClass('first-row').clone();
	    elemTable.eq(y).find('tbody').prepend(fixed_elem);
	    elemTable.eq(y).find('tr').eq(0).addClass('fixed-row').removeClass('first-row');
	    fixedRow = elemTable.eq(y).find('.fixed-row');
	    elemTh = fixedRow.children();
	    thLenght = elemTh.length;
			maxHeight ='';
		  for (var i = 0; i < thLenght; i++) {
	      thWidth = elemTh.eq(i).width();
	      if (i == 0 && detectIE() == true){
	        thWidth = thWidth-2;
	      }
	      thHeight = elemTh.eq(i).outerHeight(true);
	      if(thHeight > maxHeight) maxHeight = thHeight;
	      elemTh.eq(i).css('width', thWidth);
	    }
	    elemTh.css('height', maxHeight);
	    fixedRow.children().css('height', maxHeight-1);
	    fixedRow.css({'position':'absolute'});
	    fixedRow.children().css({'display':'block','float':'left'});
	    trHeight =  fixedRow.find('td').filter( ':first' ).outerHeight(true);
	    fixedRow.css('height',trHeight);
	    elemTable.eq(y).find('.first-row').css('height', trHeight-2);
	    tableOffset = elemTable.eq(y).offset().top;
	    var scroll = elemTable.eq(y).parent().parent();

	    scroll.bind("scroll", function() {
	      offsetTop = $(this).scrollTop();
	      offsetLeft = $(this).scrollLeft();
	      var scrollElem= $(this).find('.fixed-row');
	      if(offsetTop){
	      	if(detectIE() == false){
	    //console.log(fixedRow, y);
	        	scrollElem.css('top',offsetTop);

	      	}

	      }
	      if(timeoutTop ){
	        clearTimeout(timeoutTop );
	      }
	      timeoutTop = setTimeout(function(){
	        scrollElem.css('top', offsetTop);
	      }, 50);
	      if(offsetLeft){
	        scrollElem.scrollLeft(offsetLeft)

	      }
	    });
  	}
  }
}
function detectIE() {
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf('MSIE ');
    var trident = ua.indexOf('Trident/');

    if (msie > 0) {
        // IE 10 or older => return version number
        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    }

    if (trident > 0) {
        // IE 11 (or newer) => return version number
        var rv = ua.indexOf('rv:');
        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
    }

    // other browser
    return false;
}
