/**
 * Created by Bui on 11/06/2017.
 */
jQuery(document).ready(function () {
    HOME.goback();
    HOME.setupOptionSelectDate();
    HOME.scrolltoTop();
});
HOME = {
    setupOptionSelectDate: function () {
        var dateToday = new Date();
        jQuery('.date').datetimepicker({
            timepicker: false,
            format: 'd-m-Y',
            lang: 'vi',
            minDate: dateToday,
        });
    },
    goback: function () {
        jQuery(document).on('click', '#goback', function () {
            window.history.back();
        });
    },
    scrolltoTop: function () {
        jQuery("#app").on('scroll', function () {
            var e = jQuery("#app").scrollTop();
            if (e > 300) {
                jQuery(".navbar-default").addClass("navbar-fixed-top");
                jQuery(".btn-top").show();
            } else {
                jQuery(".navbar-default").removeClass("navbar-fixed-top");
                jQuery(".btn-top").hide();
            }
        });
        jQuery(".btn-top").on('click',function () {
            jQuery("#app").animate({
                scrollTop: 0
            })
        });
    },
};

