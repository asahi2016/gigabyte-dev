(function ($) {
    $(document).ready(function($) {

        show_hide_distributor_program_details();

        setInterval(function () {
            show_hide_distributor_program_details();
			//console.log($('#promotion-rebates-node-form').find('#edit-field-promotion-excel').find('span.file').length);
        },100);

        function show_hide_distributor_program_details(){
			//console.log($('div[id*="promotion-rebates-node-form"]').find('div[id*="edit-field-promotion-excel"]').find('span .file-size').size());
			/* console.log($('.page-promotion-upload #edit-field-promotion-excel .form-item .form-managed-file').find('span.file-size').length);
			$('.page-promotion-upload #edit-field-promotion-excel .form-item .form-managed-file').find('span.file-size').css('border','1px solid red'); */
            if($('.page-promotion-upload #edit-field-promotion-excel .form-item .form-managed-file').find('span.file-size').length > 0){
                $('table[id*="field-distributor-promotion-deta-values"]').hide();
                $('table[id*="field-distributor-promotion-deta-values"]').hide();
                $('div[id*="edit-field-distributor-promotion-deta-und-add-more"]').hide();
                $('input.field-add-more-submit').hide();
				$('#field-distributor-promotion-deta-add-more-wrapper > .form-item  > .clearfix').css('border', '0px');
            }else{
                $('table[id*="#field-distributor-promotion-deta-values"]').show();
                $('table[id*="field-distributor-promotion-deta-values"]').show();
                $('input.field-add-more-submit').show();
                $('div[id*="edit-field-distributor-promotion-deta-und-add-more"]').show();
            }
        }
		
        /*setInterval(function(){
            console.log($('select[id*="edit-field-distributor-promotion-deta]').attr('selected','selected').val());
            //gettermimage($('select[id*="edit-field-distributor-promotion-deta]').attr('selected','selected').val());
        },2000);*/

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
                    //console.log(i);
                }
            });
        },500);




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
		/*$('form.node-promotion_rebates-form input[value="Add Another Distributor"]').on('click',function(){
		alert('hi');
			tr_added();
		});*/		
		
    });
})(jQuery);