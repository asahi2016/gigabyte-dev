(function ($) {
    $(document).ready(function($) {

        show_hide_distributor_program_details();

        setInterval(function () {
            show_hide_distributor_program_details();
        },100);

        function show_hide_distributor_program_details(){
			//console.log($('div[id*="promotion-rebates-node-form"]').find('div[id*="edit-field-promotion-excel"]').find('span .file-size').size());
			// console.log($('.page-promotion-upload #edit-field-promotion-excel .form-item .form-managed-file').find('span.file-size').length);
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