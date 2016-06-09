(function ($) {
    $(document).ready(function($) {

        show_hide_distributor_program_details();

        setInterval(function () {
            show_hide_distributor_program_details();
        },100);

        function show_hide_distributor_program_details(){

            if($('#promotion-rebates-node-form').find('#edit-field-promotion-excel').find('span.file').length > 0){
                $('table#field-distributor-promotion-deta-values').hide();
                $('table[id*="field-distributor-promotion-deta-values"]').hide();
                $('#edit-field-distributor-promotion-deta-und-add-more').hide();
            }else{
                $('table#field-distributor-promotion-deta-values').show();
                $('table[id*="field-distributor-promotion-deta-values"]').show();
                $('#edit-field-distributor-promotion-deta-und-add-more').show();
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