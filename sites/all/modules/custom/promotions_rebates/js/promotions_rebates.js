(function ($) {
    $(document).ready(function($) {

        show_hide_distributor_program_details();

        setInterval(function () {
            show_hide_distributor_program_details();
        },100);
		
		
		var access = false;
		$('.page-promotion-upload .field-name-field-promotion-thumbnail .image-widget-data .form-submit').on('Click',function(){
				access = false;
		});
        function show_hide_distributor_program_details(){
			//console.log($('div[id*="promotion-rebates-node-form"]').find('div[id*="edit-field-promotion-excel"]').find('span .file-size').size());
			/* console.log($('.page-promotion-upload #edit-field-promotion-excel .form-item .form-managed-file').find('span.file-size').length);
			$('.page-promotion-upload #edit-field-promotion-excel .form-item .form-managed-file').find('span.file-size').css('border','1px solid red'); */
            if($('.page-promotion-upload #edit-field-promotion-excel .form-item .form-managed-file').find('span.file-size').length > 0){
                $('table[id*="field-distributor-promotion-deta-values"]').hide();
                $('table[id*="field-distributor-promotion-deta-values"]').hide();
                $('div[id*="edit-field-distributor-promotion-deta-und-add-more"]').hide();
                $('input.field-add-more-submit').hide();
				$('table[id*="field-distributor-promotion-deta-values"] td .form-text').val('');
				$('table[id*="field-distributor-promotion-deta-values"] td .option').prop( "checked", false );
				$('#field-distributor-promotion-deta-add-more-wrapper > .form-item  > .clearfix').css('border', '0px');
            }else{
                $('table[id*="#field-distributor-promotion-deta-values"]').show();
                $('table[id*="field-distributor-promotion-deta-values"]').show();
                $('input.field-add-more-submit').show();
                $('div[id*="edit-field-distributor-promotion-deta-und-add-more"]').show();
            }
			if($('#page-wrapper form.node-promotion_rebates-form div.messages').length > 0 && access == false){
			  $('.page-promotion-upload #promotion-information > .fieldset-wrapper').append($('#page-wrapper form.node-promotion_rebates-form div.messages'));			  
			  access = true;
			}
        }
		
        /*setInterval(function(){
            console.log($('select[id*="edit-field-distributor-promotion-deta]').attr('selected','selected').val());
            //gettermimage($('select[id*="edit-field-distributor-promotion-deta]').attr('selected','selected').val());
        },2000);*/


        /*termlength = 0;
        $.ajax({
            url: Drupal.settings.gigabyte.baseUrl + '/promotions/get/termlength',
            type: 'post',
            success: function (data) {
                termlength = data;
            }
        });
        setInterval(function() {
            var dis_selection = new Array();
            var dis_selection_value = new Array();
            var tr_counter = 0;

            dist_length = $(".node-promotion_rebates-form table[id*='field-distributor-promotion-deta-values'] > tbody > tr").length;

            $(".node-promotion_rebates-form table[id*='field-distributor-promotion-deta-values'] > tbody > tr").each(function (i) {
                if ($(this).find('select').find('option:selected').val() != '_none') {
                    option = $(this).find('select').find('option:selected');
                    dis_selection[i] = option.val();
                    dis_selection_value[i] = option.text();
                }
            });*/

            //console.log(dis_selection);
            /*if(dis_selection) {

             $(".node-promotion_rebates-form table[id*='field-distributor-promotion-deta-values'] > tbody > tr").each(function(i) {

             //if (dist_length <= termlength) {
             //$(this).find('select').css('border','1px solid red');
             //console.log($(this).find('select').find('option').val());
             for(k = 0; k < dis_selection.length; k++) {
             //console.log(dis_selection[k]);
             $(this).find('select').find('option').each(function(l,elem){
             if($(elem).val() == dis_selection[k]) {
             $(elem).remove();
             }
             });

             }
             //}

             /*console.log(dis_selection);
             readd_counter = false;
             //if(tr_counter > 0 ){
             $(this).find('select').find('option').each(function(k, elem){
             for(j=0;j<dis_selection.length;j++){
             if($(elem).val() == dis_selection[j] && i > j ) {
             $(elem).remove();
             }else{
             //console.log($(elem).val(dis_selection[j]).length);
             if(!readd_counter && !dis_selection[j]){
             $(elem).parent().append('<option value="'+dis_selection[j]+'" >'+dis_selection_value[dis_selection[j]]+'</option>')
             readd_counter = true;
             }
             }
             }

             });*/
            /*
             //}
             //tr_counter++;
             */
            /* }
             */
            /*    });*/
            /*
             }
             },500);*/
        //});

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
       /* termlength = 0;
            setInterval(function(){
                $.ajax({
                    url: Drupal.settings.gigabyte.baseUrl + '/promotions/get/termlength',
                    type: 'post',
                    success: function (data) {
                        termlength = data;
                    }
                });
                dist_length = $(".node-promotion_rebates-form table[id*='field-distributor-promotion-deta-values'] > tbody > tr").length;
                $(".node-promotion_rebates-form table[id*='field-distributor-promotion-deta-values'] > tbody > tr").each(function(i){
                    if(dist_length <= termlength){
                        console.log(i);
                    }
                });
        },500);*/




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
})(jQuery);