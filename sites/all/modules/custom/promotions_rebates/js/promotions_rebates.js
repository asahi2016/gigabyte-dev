(function ($) {
    $(document).ready(function($) {

        show_hide_distributor_program_details();

        function show_hide_distributor_program_details(){

			$('.page-promotion-upload #edit-field-promotion-excel .form-item .form-managed-file').find('span.file-size').css('border','1px solid red');
            if($('.page-promotion-upload #edit-field-promotion-excel .form-item .form-managed-file').find('span.file-size').length > 0){
                $('table[id*="field-distributor-promotion-deta-values"]').hide();
                $('table[id*="field-distributor-promotion-deta-values"]').hide();
                $('div[id*="edit-field-distributor-promotion-deta-und-add-more"]').hide();
                $('input.field-add-more-submit').hide();
				$('table[id*="field-distributor-promotion-deta-values"] td .form-text').val('');
				$('table[id*="field-distributor-promotion-deta-values"] td .option').prop( "checked", false );
				$('table[id*="field-distributor-promotion-deta-values"] td .form-select').prop('selectedIndex',0);
				$('table[id*="field-distributor-promotion-deta-values"] td .distributor-image img').remove();
				$('#field-distributor-promotion-deta-add-more-wrapper > .form-item  > .clearfix').css('border', '0px');
            }else{
                $('table[id*="#field-distributor-promotion-deta-values"]').show();
                $('table[id*="field-distributor-promotion-deta-values"]').show();
                $('input.field-add-more-submit').show();
                $('div[id*="edit-field-distributor-promotion-deta-und-add-more"]').show();
            }
        }

        var distributor_option = new Array();
        var distributor_option_name = new Array();
        var root_tr = $(".node-promotion_rebates-form table[id*='field-distributor-promotion-deta-values'] > tbody > tr");
        root_tr.each(function(i) {
            var ele = $(this).find('select[id*="field-prmotion-distributors-und"]').find('option');
            var j = 0;
            ele.each(function () {
                if($(this).val() != '_none'){
                    distributor_option[j] = $(this).val();
                    distributor_option_name[$(this).val()] = $(this).text();
                    j=j+1;
                }
            });
        });

        var counter = 0;
        var loopcheck = 0;

        setInterval(function(){

           show_hide_distributor_program_details();

           $('div#edit-field-distributor-promotion-deta').find('div.field-name-field-prmotion-distributors').find('select.form-select').each(function (loop) {
               loopcheck = loop;
           });

           counter = $.cookie("loopcheck");

           if(loopcheck < counter ) {
                resetAllDistributors();
           }

           if(loopcheck > counter) {
               resetAllDistributors();
           }

           $.cookie("loopcheck", loopcheck);

           if(loopcheck >= distributor_option.length){
               $('input[id*="edit-field-distributor-promotion-deta-und-add-more"]').hide();
           }else{
               $('input[id*="edit-field-distributor-promotion-deta-und-add-more"]').show();
           }

        },2000);


        var unique = function(origArr) {
            var newArr = [],
                origLen = origArr.length,
                found, x, y;

            for (x = 0; x < origLen; x++) {
                found = undefined;
                for (y = 0; y < newArr.length; y++) {
                    if (origArr[x] === newArr[y]) {
                        found = true;
                        break;
                    }
                }
                if (!found) {
                    newArr.push(origArr[x]);
                }
            }
            return newArr;
        }

        function resetAllDistributors() {

            var all_selection = new Array;

            $('div#edit-field-distributor-promotion-deta').find('div.field-name-field-prmotion-distributors').find('select.form-select').each(function (g) {
                var all_select_option_val = $(this).find('option:selected').val();
                if(all_select_option_val != '_none' && all_select_option_val && all_select_option_val != 0){
                    all_selection[g] = all_select_option_val;
                }
            });

            $('div#edit-field-distributor-promotion-deta').find('div.field-name-field-prmotion-distributors').find('select.form-select').each(function (j) {

                $(this).find('option').each(function (loop , ele) {

                    $.each(all_selection, function(key, value){
                        if(all_selection[j] != value){
                            if($(ele).val() == value) {
                                $(ele).remove();
                            }
                        }
                    });
                });
            });

            $('div#edit-field-distributor-promotion-deta').find('div.field-name-field-prmotion-distributors').find('select.form-select').each(function (a , sle) {

                if(all_selection.length > 0) {

                    var individual_option = new Array;
                    var lp = 0;

                    $(sle).find('option').each(function (aloop, aele) {

                        if ($(aele).val() != '_none') {
                            individual_option[lp] = $(aele).val();
                            lp = lp + 1;
                        }
                    });

                    var total_array = new Array;
                    total_array = individual_option.concat(all_selection);
                    total_array = unique(total_array);

                    var remain_array = new Array;

                    $.each(distributor_option, function (akey, avalue) {

                        var present = 0;

                        $.each(total_array, function (atkey, atvalue) {
                            if(atvalue == avalue){
                                present = 1;
                            }
                        });

                        if(!present){
                            remain_array[akey] = avalue;
                        }
                    });

                    remain_array = unique(remain_array);

                    if(remain_array.length > 0) {

                        $.each(remain_array, function (addkey, addvalue) {
                            if($(sle).find('option:selected').val() != addvalue  &&  typeof addvalue != 'undefined') {
                                $(sle).append('<option value="' + addvalue + '">' + distributor_option_name[addvalue] + '</option>');
                            }
                        });
                    }

                }

            });

        }

        $(document).on('change','div#edit-field-distributor-promotion-deta select.form-select',function(){
            resetAllDistributors();
        });

        //Display distributor image on selection from dropdown
        termlength = 0;
        elem_array = new Array();
        single_counter = 0;
        original_dist = new Array();
        $(this).find('select[id*="field-prmotion-distributors-und"]').find('option').each(function(m,el){
            if(single_counter == 0){
                original_dist[m] = [el,$(this).val()];
            }
        });single_counter = 1;
        $(document).on('change','select[id*="edit-field-distributor-promotion-deta"]',function(){
            img_url = '';
            $('select[id*="edit-field-distributor-promotion-deta"]').parent('div').removeClass('active-selected');
            $(this).parent('div').addClass('active-selected');
            $.ajax({
                url:Drupal.settings.gigabyte.baseUrl+'/promotions/get/termdata',
                type:'post',
                data:{termid:$(this).val()},
                success:function(data){
                    img_url = data;
                    var html_content = '<span class="distributor-image" ><img src="'+img_url+'" /> </span>';
                    $('div.field-name-field-prmotion-distributors div.active-selected').find('span').remove();
                    $('div.field-name-field-prmotion-distributors div.active-selected').append(html_content);
                }
            });
        });

        function gettermimage(termid){
            img_url = '';
            $('select[id*="edit-field-distributor-promotion-deta"]').parent('div').removeClass('active-selected');
            $(this).parent('div').addClass('active-selected');
            $.ajax({
                url:Drupal.settings.gigabyte.baseUrl+'/promotions/get/termdata',
                type:'post',
                data:{termid:termid},
                success:function(data){
                    img_url = data;
                    var html_content = '<span class="distributor-image" ><img src="'+img_url+'" /> </span>';
                    $('div.field-name-field-prmotion-distributors div.active-selected').find('span').remove();
                    $('div.field-name-field-prmotion-distributors div.active-selected').append(html_content);
                }
            });

        }
    });

	$('.node-type-promotion-rebates.page-node-edit #content .section').addClass('promotion');
	$('.views-field-field-promotion-thumbnail a').attr('target','_blank');
})(jQuery);