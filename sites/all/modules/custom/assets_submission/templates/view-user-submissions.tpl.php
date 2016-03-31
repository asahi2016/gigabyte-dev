<?php

//$img_url = $variables['data']->uc_product_image['und'][0]['uri'];
//$img_src = image_style_url("large", $img_url);
//$link = drupal_get_path_alias('node/' . $variables['data']->nid);
$date = date('m/d/Y', REQUEST_TIME);
?>

<?php
//Add custom js
$path = drupal_get_path('module', 'jquery_update');
drupal_add_css($path . '/replace/ui/themes/base/jquery-ui.css');
drupal_add_js($path . '/replace/jquery/1.8/jquery.js');
drupal_add_js($path . '/replace/ui/ui/jquery-ui.js');
//drupal_add_js(drupal_get_path('module', 'custom') . '/friends/js/search_friends.js');
//drupal_add_js(drupal_get_path('module', 'custom') . '/lend/js/lend.js');
?>

<script>
$(function() {

$('#new-submission').click(function(){
   $('#new-submission-form').toggle();


        //Render views by drupal ajax
        /*$.post(
            Drupal.settings.gigabyte.baseUrl + '/lend/status/update',
            {
                friend_id : $('#friendId').val(),
                node_id: node_id,
                order_id: order_id,
                lend_start: $("#lend-start-date").val(),
                lend_end: $("#lend-end-date").val(),
                lending_days : $('span.lending-days').text(),
                lend_status : 'pending'
            },
            function (response) {
                var data = JSON.parse(response);
                if(data.response.status == 'pending'){
                    $('span.success-message').text(data.response.msg);
                    setTimeout(function(){
                        $("#fancybox-close").trigger('click');
                        window.location.reload();
                    },1000);
                }else if(data.response.status == 'return') {
                    $('span.success-message').text(data.response.msg);
                    setTimeout(function(){
                        $("#fancybox-close").trigger('click');
                        window.location.reload();
                    },1000);
                }else if(data.response.status == 'cancel'){
                    $('span.user-error').text(data.response.msg);
                }

            }
        );*/
  });

});
</script>
<div class="subm_wrap"><a href="javascript:void(0);" class="submit" id="new-submission"><input id="button1" type="button" value="New Submission" /></a></div>
<div>
    <div id="new-submission-form" style="display: none;">
        <?php //print $new_submission_form;?>
    </div>
</div>
<table class="subm_wrap_s">
    <tbody>
    <tr>
        <td>Filter:</td>
        <td><input id="Checkbox1" type="checkbox" /> Awaiting Reply from Partner <input id="Checkbox1" type="checkbox" /> Approved</td>
    </tr>
    <tr>
        <td></td>
        <td>
            Submitted:
            <select id="Select1">
                <option>From New to Old</option>
                <option>From Old to New</option>
            </select>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            Updated:
            <select id="Select1">
                <option>From New to Old</option>
                <option>From Old to New</option>
            </select>
        </td>
    </tr>
    </tbody>
</table>

<table class="m_top30">
    <tbody>
    <tr>
        <td rowspan="4" class="w300"><a href="#CA1" class="inline"><img src="../../../../img/image icon.png" style="max-width:200px;" /></a></td>
        <td class="f_size20 f_w_700">Client Asset 1</td>
    </tr>
    <tr class="v_align">
        <td class="f_w_700">Status: <span class="f_w_400 cblue">Awaiting Reply from GIGABYTE</span></td>
        <td class="f_w_700">Submitted: <span class="f_w_400">December 1st, 2015</span><br />Updated: <span class="f_w_400">December 2nd, 2015</span></td>
    </tr>
    <tr class="v_align">
        <td colspan="2" class="f_w_700">Latest Comments:<br /><span class="f_w_400">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tempor iaculis purus, ut tincidunt est tincidunt vitae. Aliquam posuere efficitur nulla, eu sodales enim molestie non. Curabitur nec diam quis ipsum</span></td>
    </tr>
    <tr>
        <td><input id="Button1" type="button" value="Download" /></td>
    </tr>
    </tbody>
</table>

<table class="m_top30">
    <tbody>
    <tr>
        <td rowspan="4" class="w300"><a href="#CA2" class="inline"><img src="../../../../img/image icon.png" style="max-width:200px;" /></a></td>
        <td class="f_size20 f_w_700">Client Asset 2</td>
    </tr>
    <tr class="v_align">
        <td class="f_w_700">Status: <span class="f_w_400 cblue">Awaiting Reply from Partner</span></td>
        <td class="f_w_700">Submitted: <span class="f_w_400">December 1st, 2015</span><br />Updated: <span style="font-weight:400;">December 2nd, 2015</span></td>
    </tr>
    <tr class="v_align">
        <td colspan="2" class="f_w_700">Latest Comments:<br /><span style="font-weight:400;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tempor iaculis purus, ut tincidunt est tincidunt vitae. Aliquam posuere efficitur nulla, eu sodales enim molestie non. Curabitur nec diam quis ipsum</span></td>
    </tr>
    <tr>
        <td><input id="Button1" type="button" value="Download" /></td>
    </tr>
    </tbody>
</table>

<table class="m_top30">
    <tbody>
    <tr>
        <td rowspan="4" class="w300"><a href="#CA3" class="inline"><img src="../../../../img/image icon.png" style="max-width:200px;" /></a></td>
        <td class="f_size20 f_w_700">Client Asset 3</td>
    </tr>
    <tr style="vertical-align:baseline;">
        <td class="f_w_700">Status: <span class="green f_w_400">Approved</span></td>
        <td class="f_w_700">Submitted: <span class="f_w_400">December 1st, 2015</span><br />Updated: <span style="font-weight:400;">December 2nd, 2015</span></td>
    </tr>
    <tr style="vertical-align:baseline;">
        <td colspan="2" class="f_w_700">Latest Comments:<br /><span class="f_w_400">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tempor iaculis purus, ut tincidunt est tincidunt vitae. Aliquam posuere efficitur nulla, eu sodales enim molestie non. Curabitur nec diam quis ipsum</span></td>
    </tr>
    <tr>
        <td><input id="Button1" type="button" value="Download" /></td>
    </tr>
    </tbody>
</table>

