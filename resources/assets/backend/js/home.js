/**
 * Created by Bui on 13/06/2017.
 */
jQuery(document).ready(function ($) {
    INDEX.slider($);
    INDEX.LoadProduct($);
    INDEX.showIMGDetails($);
});
INDEX = {
    slider: function () {
        var totalItem = jQuery(document).find('.slider').find('.item').length > 0 ? jQuery(document).find('.slider').find('.item').length : 0;
        var withs = jQuery(window).width();
        var c = 0;
        if(withs<768){
            c=2;
        }
        if(withs>767&&withs<920){
            c=3;
        }
        if(withs>=920){
            c=4;
        }
        if (totalItem > c) {
            jQuery(document).find('.item').each(function (index) {
                if (index < c) {
                    jQuery(this).attr('rel', 1);
                    jQuery(this).show();
                } else {
                    jQuery(this).attr('rel', 0);
                    jQuery(this).hide();
                }
                jQuery(this).attr('id', index + 1);
            });
            jQuery(document).on('click', '#previous', function () {
                var id = jQuery(document).find('.slider').find('.item').length;
                var item = jQuery('#'+id);
                jQuery('.slider').prepend('<a class="'+item.attr('class')+'" href="'+item.attr('href')+'" title="'+item.attr('title')+'">'+item.html()+'</a>');
                jQuery('#'+c).fadeOut();
                jQuery('#'+id).remove();
                jQuery(document).find('.item').each(function (index) {
                    if (index < c) {
                        jQuery(this).attr('rel', 1);
                        jQuery(this).fadeIn();
                    } else {
                        jQuery(this).attr('rel', 0);
                        jQuery(this).hide();
                    }
                    jQuery(this).attr('id', index + 1);
                });
            });
            jQuery(document).on('click', '#next', function () {
                var id = jQuery(document).find('.slider').find('.item').attr('id');
                var item = jQuery('#' +id);
                jQuery('.slider').append('<a class="'+item.attr('class')+'" href="'+item.attr('href')+'" title="'+item.attr('title')+'">'+item.html()+'</a>');
                jQuery('#' + id).fadeOut();
                jQuery('#' + id).remove();
                jQuery('#' + (id + c-1)).fadeIn();
                jQuery(document).find('.item').each(function (index) {
                    if (index < c) {
                        jQuery(this).attr('rel', 1);
                        jQuery(this).fadeIn();
                    } else {
                        jQuery(this).attr('rel', 0);
                        jQuery(this).hide();
                    }
                    jQuery(this).attr('id', index + 1);
                });
            });
        }
        jQuery(window).resize(function () {
            INDEX.slider();
        });
    },
    LoadProduct:function () {
        jQuery(document).on('click','#load',function () {
            var url = BASE_URL+'ajax-index-product';
            var type = jQuery(this).attr('data');
            var page = jQuery(this).attr('page');
            jQuery.ajax({
                type: "POST",
                url: url,
                data: "type="+encodeURI(type)+"page="+encodeURI(page),
                success: function(data){
                    if(data != ''){
                        data = jQuery.parseJSON(data);
                        if(data != ''){
                            jQuery(this).parent('.tab-pane').find('.lisproduct').append(data);
                            jQuery(this).attr('page',page+1);
                        }else{
                            jQuery(this).text('đã đến trang cuối');
                            jQuery(this).css('color','red');
                        }
                        return false;
                    }
                }
            });
        })
    },
    showIMGDetails:function ($) {
        jQuery(document).on('click','#itemimgproduct',function () {
            jQuery('.show-one-img').find('#imgProduct').attr('src',jQuery(this).attr('src'));
            jQuery(document).find('.listimg').find('li').each(function () {
               if(jQuery(this).attr('class')=='active'){
                   jQuery(this).removeClass('active');
               }
            });
            jQuery(this).parent('li').addClass('active');
        });
        var hdt = jQuery(document).find('.details-content').height;
        if(hdt>100){
            jQuery('#show-collapse').show();
            jQuery('#show-more').hide();
        }else{
            jQuery('#show-collapse').hide();
            jQuery('#show-more').show();
        }
        jQuery(document).on('click','#show-collapse',function () {
            jQuery('.details-content').css('height','65px');
            jQuery('#show-more').show();
            jQuery('#show-collapse').hide();
        });
        jQuery(document).on('click','#show-more',function () {
            jQuery('.details-content').css('height','auto');
            jQuery('#show-collapse').show();
            jQuery('#show-more').hide();
        });		
    },
	
	
	}