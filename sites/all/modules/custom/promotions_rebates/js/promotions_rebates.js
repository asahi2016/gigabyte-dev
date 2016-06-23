(function ($) {
    $(document).ready(function($) {

        show_hide_distributor_program_details();

        setInterval(function () {
            show_hide_distributor_program_details();
        },100);

        function show_hide_distributor_program_details(){
			//console.log($('div[id*="promotion-rebates-node-form"]').find('div[id*="edit-field-promotion-excel"]').find('span .file-size').size());
			 console.log($('.page-promotion-upload #edit-field-promotion-excel .form-item .form-managed-file').find('span.file-size').length);
			$('.page-promotion-upload #edit-field-promotion-excel .form-item .form-managed-file').find('span.file-size').css('border','1px solid red'); *//*
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

        setInterval(function(){
            //console.log($('select[id*="edit-field-distributor-promotion-deta]').attr('selected','selected').val());
            //gettermimage($('select[id*="edit-field-distributor-promotion-deta]').attr('selected','selected').val());
        },2000);


        //Display distributor image on selection from dropdown
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

        termlength = 0;
        elem_array = new Array();
        single_counter = 0;
        original_dist = new Array();
            setInterval(function(){
                var dis_selection = new Array();
                var dis_selection_value = new Array();

                var tr_counter = 0;
                $.ajax({
                    url: Drupal.settings.gigabyte.baseUrl + '/promotions/get/termlength',
                    type: 'post',
                    success: function (data) {
                        termlength = data;
                    }
                });
                dist_length = $(".node-promotion_rebates-form table[id*='field-distributor-promotion-deta-values'] > tbody > tr").length;
                $(".node-promotion_rebates-form table[id*='field-distributor-promotion-deta-values'] > tbody > tr").each(function(i){
                    if ($(this).find('select[id*="field-prmotion-distributors-und"]').find('option:selected').val() != '_none') {
                        option = $(this).find('select[id*="field-prmotion-distributors-und"]').find('option:selected');
                        dis_selection[i] = option.val();
                        dis_selection_value[i] = option.text();
                    }
                    $(this).find('select[id*="field-prmotion-distributors-und"]').find('option').each(function(m,el){
                           if(single_counter == 0){
                               original_dist[m] = [el,$(this).val()];
                           }
                    });single_counter = 1;
                    if(dist_length < termlength){
                        //console.log(dist_length+"--"+termlength);
                        $('input[id*="edit-field-distributor-promotion-deta-und-add-more"]').show()
                        for (k = 0; k < dis_selection.length; k++) {
                            readd_counter = false;
                            $(this).find('select[id*="field-prmotion-distributors-und"]').find('option').each(function (k, elem) {
                                for (j = i-1; j < i; j++) {
                                    //console.log(dis_selection[j+1]+",i="+i +", j="+j);
                                    if ($(elem).val() == dis_selection[j] && i > j && j >= 0) {
                                        //console.log(elem);
                                        if(elem_array.indexOf(i) === -1){
                                            //elem_array.push({value:elem,label:dis_selection_value[j]});
                                            elem_array[i] = [elem, $(this).val()] ;
                                        }
                                        $(elem).remove();
                                    }
                                }
                            });
                        }
                        console.log(i);
                        switch(i){
                            case 1:
                                for(l=0;l<i;l++){
                                    console.log(original_dist);
                                    console.log(elem_array);
                                }
                                break;
                            case 2:
                                for(l=1;l<i;l++){
                                    console.log(elem_array[l]);
                                }
                                break;
                            case 3:
                                for(l=1;l<i;l++){
                                    console.log(elem_array[l]);
                                }
                                break;
                            case 4:
                                for(l=1;l<i;l++){
                                    console.log(elem_array[l]);
                                }
                                break;
                            case 5:
                                for(l=1;l<i;l++){
                                    console.log(elem_array[l]);
                                }
                                break;
                            case 6:
                                for(l=1;l<i;l++){
                                    console.log(elem_array[l]);
                                }
                                break;
                            case 7:
                                for(l=1;l<i;l++){
                                    console.log(elem_array[l]);
                                }
                                break;
                        }


                    }else{
                       $('input[id*="edit-field-distributor-promotion-deta-und-add-more"]').hide();
                    }
                });
        },1000);




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
})(jQuery);