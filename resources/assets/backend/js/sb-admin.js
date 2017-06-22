/**
 * Created by Bui on 05/06/2017.
 */
jQuery(document).ready(function () {
    ADMIN.deleteItem();
    ADMIN.checkAllItem();
    ADMIN.additemActionModul();
    ADMIN.showImgIsSelect();
    ADMIN.restoreItem();
    ADMIN.additemLink();
    ADMIN.showModalIMG();
	ADMIN.scrolltoTop();
});
ADMIN = {
    deleteItem: function () {
        jQuery(document).on('click', '#deleteMoreItem', function () {
            var total = jQuery("input:checked").length;
            if (total == 0) {
                jAlert('Vui lòng chọn ít nhất 1 bản ghi để xóa!', 'Thông báo');
                return false;
            } else {
                jConfirm('Bạn muốn xóa [OK]:Đồng ý [Cancel]:Bỏ qua?)', 'Xác nhận', function (r) {
                    if (r) {
                        jQuery('form#formListItem').submit();
                        return true;
                    }
                });
                return false;
            }
        });
    },
    checkAllItem: function () {
        jQuery(document).on('click', "input#checkAll", function () {
            var checkedStatus = this.checked;
            jQuery("input.checkItem").each(function () {
                this.checked = checkedStatus;
            });
        });
    },
    additemActionModul: function () {
        jQuery(document).on('click', '#themAction', function () {
            var rel = Number(jQuery(this).attr('rel'));
            rel = rel + 1;
            jQuery('#sys_drag_sort_action').append("<li id='sys_div_sort_other_" + rel + "' ><div class='itemAction div_sort_order'>" +
                "<input type='checkbox' checked name='module_action[]' value='' id='valueAction" + rel + "'/>" +
                "<input type='text'  id='nameAction'  class='form-control ' rel='" + rel + "'>" +
                "<i id='xoa' class='fa fa-remove fa-admin red'  rel='" + rel + "'> </i></div></li>");
            jQuery(this).attr('rel', rel);
        });
        jQuery('#sys_drag_sort_action').on('keyup', '#nameAction', function () {
            var txt = jQuery(this).val();
            var rel = jQuery(this).attr('rel');
            jQuery('#valueAction' + rel).val(txt);
        });
        jQuery('#sys_drag_sort_action').on('click', '#xoa', function () {
            var rel = Number(jQuery(this).attr('rel'));
            jQuery("ul").children().remove('#sys_div_sort_other_' + rel);
            rel = rel - 1;
            if (rel <= 0) rel = 0;
            jQuery('#themdapan').attr('rel', rel);
        });
    },
    additemLink: function () {
        jQuery(document).on('click', '#themLinkVideo', function () {
            jQuery('#listLinkVideo').append('<li><input id="product_video" type="url" class="form-control" name="product_video[]" value="" autofocus placeholder="link video intro"><i class="fa fa-remove red fa-admin" id="xoa-link"></i> </li>')
        });
        jQuery(document).on('click', '#xoa-link', function () {
            jQuery(this).parent('li').remove();
        })
    },
    showImgIsSelect: function () {
        jQuery(document).on('change', '#category_media,#product_media,#news_media,#banner_media', function () {
            var tt = jQuery(this)[0].files.length > 0 ? jQuery(this)[0].files.length : '';
            jQuery('#fileName').text(tt + ' ảnh đã được chọn');
            jQuery('#privewIMG').empty();
            if (jQuery('#privewIMG').attr('rel') == 1) {
                jQuery('#remove_media').val('1');
            }
            jQuery('#privewIMG').append('<img src="' + window.URL.createObjectURL(jQuery(this)[0].files[0]) + '" width="100%"/>');
        });
        jQuery(document).on('change', '#category_media_banner', function () {
            var tt = jQuery(this)[0].files.length > 0 ? jQuery(this)[0].files.length : '';
            jQuery('#fileNameBanner').text(tt + ' ảnh đã được chọn');
            jQuery('#privewIMGBanner').empty();
            if (jQuery('#privewIMGBanner').attr('rel') == 1) {
                jQuery('#remove_media_banner').val('1');
            }
            jQuery('#privewIMGBanner').append('<img src="' + window.URL.createObjectURL(jQuery(this)[0].files[0]) + '" width="100%"/>');
        });
        jQuery(document).on('click', '#xoa-media', function () {
            jQuery('#remove_media').val('1');
            jQuery(this).parent('#privewIMG').empty();
        });
        jQuery(document).on('click', '#xoa-media-banner', function () {
            jQuery('#remove_media_banner').val('1');
            jQuery(this).parent('#privewIMGBanner').empty();
        });
        jQuery(document).on('change', '#product_multi_media', function () {
            var f = document.getElementById("product_multi_media");
            var tt = jQuery(this)[0].files.length;
            jQuery('#totalList').text(tt + ' ảnh đã được chọn');
            var listIMG = jQuery('#showListIMG');
            listIMG.find('li').each(function () {
                if (jQuery(this).attr('rel') == -1) {
                    jQuery(this).remove();
                }
            });
            if (tt > 0) {
                for (var i = 0; i < tt; i++) {
                    listIMG.append("<li class='col-md-3 col-sm-4' rel='-1'><img src='" + window.URL.createObjectURL(f.files[i]) + "' height='150px'></li>");
                }
            }
        });
        jQuery(document).on('click', '#xoa-multi-media', function () {
            jQuery(this).parent('li').remove();
            jQuery('.btn-option').append('<input type="hidden" id="remove_multi_media" name="remove_multi_media[]" value="' + jQuery(this).attr('rel') + '"/>');
        })
    },
    restoreItem: function () {
        jQuery(document).on('click', '#restoreMoreItem', function () {
            var total = jQuery("input:checked").length;
            if (total == 0) {
                jAlert('Vui lòng chọn ít nhất 1 bản ghi để khôi phục!', 'Thông báo');
                return false;
            } else {
                jConfirm('Bạn muốn khôi phục [OK]:Đồng ý [Cancel]:Bỏ qua?)', 'Xác nhận', function (r) {
                    if (r) {
                        jQuery('#formListItem').attr("action", BASE_URL + "admin/trash/restore");
                        jQuery('#formListItem').submit();
                        return true;
                    }
                });
                return false;
            }
        });
    },
    showModalIMG: function () {
        jQuery('#Modal-IMG').hide();
        jQuery(document).on('click', '#showIMG', function () {
            jQuery('#Modal-IMG').show();
            var src = '';
            if (jQuery(this).is('img')) {
                src = jQuery(this).attr('src');
            } else {
                src = jQuery(this).attr('rel');
            }
            jQuery('#img01').attr('src', src);
            jQuery('#modal-img-caption').text(jQuery(this).attr('title'));
        });
        jQuery('.close').on('click', function () {
            jQuery('#Modal-IMG').hide();
        });
        jQuery(document).on('click', '#Modal-IMG', function () {
            jQuery(this).hide();
        })
    },
	scrolltoTop: function () {
        jQuery(window).scroll(function () {
            var e = jQuery("body").scrollTop();
            if (e > 300) {
                jQuery(".btn-top").show();
            } else {
                jQuery(".btn-top").hide();
            }
        });
        jQuery(".btn-top").on('click',function () {
            jQuery('body').animate({
                scrollTop: 0
            })
        });
    },
}