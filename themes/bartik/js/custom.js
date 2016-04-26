
jQuery(document).ready(function($) {
    //Node option publish option enable
    $('.block-system .vertical-tabs ul.vertical-tabs-list li').removeClass('selected');
    var last_eq = $('.block-system .vertical-tabs-panes fieldset.vertical-tabs-pane').size();
    $('.block-system .vertical-tabs-panes fieldset.vertical-tabs-pane').hide();
    $('.block-system .vertical-tabs ul.vertical-tabs-list li:last-child').addClass('selected');
    $('.block-system .vertical-tabs-panes fieldset.vertical-tabs-pane').eq(last_eq - 1).show();

    // Switch between back to business center and partner portal
    curr_url = document.URL.split('/');
    var found = curr_url.indexOf("partner") > -1;
    if(found){
        $('#header-wrapper-right #block-system-user-menu li:nth-child(2).leaf').find('a').text( 'Back to Business Center');
    }else{
        $('#header-wrapper-right #block-system-user-menu li:nth-child(2).leaf').find('a').text('Back to Partner Portal');
        $('#header-wrapper-right #block-system-user-menu li:nth-child(2).leaf').find('a').attr('href','/gigabyte/gigabyte/partner');

    }
    /*if(url_last == 'partner'){

        // $('#header-wrapper-right #block-system-user-menu li:nth-child(3).leaf').find('a').attr('href','/gigabyte/partner');
    }else{
       }
    console.log($("div#field-canada-content-add-more-wrapper .text-summary-wrapper"));*/
    $("div#field-canada-content-add-more-wrapper .text-summary-wrapper").text('If this page requires separate content for Canadian users, this version of the page can be added here.  Any content in this text field will be displayed by default for all users registered in Canada, or for users who select Canada as their country of preference upon visiting the site.');

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

    $('#scrol-top').click(function() {
        $("html,body").animate({scrollTop: 0}, 1000, 'swing');
    });
    scrolltop()
    $(window).scroll(function (event) {
        scrolltop()
    });
    function scrolltop(){
        var scroll = $(window).scrollTop();
        if(scroll > '400')
        {
            $('#scrol-top').show();
        }
        else{
            $('#scrol-top').hide();
        }
    }
    var txt_val = $('.make_a_request_ptag').text();
    $('<p>'+txt_val+'</p>').insertBefore($("#webform-client-form-18724"));
    $('.make_a_request_ptag').text('');
    $('.feed-icon').prependTo('.view-make-a-request-submission-view .view-content');
    $('.feed-icon a').text('Export Request Review to Excel');
	$('.view-clone-of-entityforms .views-table tr td.file-size-column .file a').attr('href','javascript:;');
	$('.views-exposed-form .views-exposed-widgets').prepend('<h3>Filters</h3>');
    $('#node-90 h2').hide();
	$('.views-exposed-form .views-exposed-widgets').prepend('<h3>Filters </h3>');
	$('table.gsm_benefit td > br').remove();
	$('.page-partner-upload-assets .views-row .field-content li li:empty').remove();
});

