
jQuery(document).ready(function($) {
   var li_count = $('#main-menu-nav > ul > li').length;
    //alert(li_count);
        var menu_width = $('#header div.section').width();
        var li_width = (menu_width/li_count);
        var pad_s = (li_width/(li_count*2));
        var f_width = (li_width-(pad_s*2));
        $('#main-menu-nav > ul > li').css('width',f_width + 'px');
        $('#main-menu-nav > ul > li').css('padding-left',pad_s + 'px');
        $('#main-menu-nav > ul > li').css('padding-right',pad_s + 'px');

    $("a.register-account-link").parents('div.item-list').css('position','absolute');
    $("a.register-account-link").parents('div.item-list').css('bottom',35);
    $("a.register-account-link").parents('div.item-list').css('left',110);

    /**
     * Country Flag click event
     */

    $('#country-menu li').click(function (){
        var curr_url = document.URL.split('?',0);
        $('#country-menu li').removeClass('active');
        $(this).addClass('active');
        if($(this).index()){
           location.href = curr_url + '?country=ca';
        }else{
            location.href = curr_url + '?country=us';
        }
    });
});