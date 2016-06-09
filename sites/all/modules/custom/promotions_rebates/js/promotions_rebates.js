(function ($) {
    $(document).ready(function($) {

        var access = true;
        $(window).on('load','form.node-form node-promotion_rebates-form',function(){
            alert('2');
            alert($('select[id*="edit-field-distributor-promotion-deta"]').attr('selected').val());
        });
            /*img_url = '';
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
            });*/

        /*setInterval(function () {

            if($('#promotion-rebates-node-form').find('#edit-field-promotion-excel').find('span.file').length > 0){

                if(access){

                    access = false;

                    $.post(
                        Drupal.settings.gigabyte.baseUrl + '/promotions/ajax',
                        {
                            ajax: true
                        },
                        function (response) {
                            alert(response);
                        }
                    );
                }
            }
        },100);*/
       // $("#edit-field-distributor-promotion-deta-und-add-more").trigger("click");


       /* if($('span.file').length > 0) {

        }else{
           /*  $.post(
                Drupal.settings.gigabyte.baseUrl + '/promotions/ajax',
                {
                    ajax: true

                },
                function (response) {
                    $('#edit-field-distributor-promotion-deta').html('');
                    $('#edit-field-distributor-promotion-deta').html(response);
                }

            );
        }

            );} */
        



        /*$('#promotion-rebates-node-form').on('submit', function(e) {
            //prevent the default submithandling
            e.preventDefault();
            //send the data of 'this' (the matched form) to yourURL
         $.post('url' , array('formval' => $(this).serialize()));
        });*/
        setInterval(function(){
            console.log($('select[id*="edit-field-distributor-promotion-deta]').attr('selected','selected').val());
            //gettermimage($('select[id*="edit-field-distributor-promotion-deta]').attr('selected','selected').val());
        },2000);
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
                    alert(data);
                    var html_content = '<span class="distributor-image" ><img src="'+img_url+'" /> </span>';
                    $('div.field-name-field-prmotion-distributors div.active-selected').find('span').remove();
                    $('div.field-name-field-prmotion-distributors div.active-selected').append(html_content);
                }
            });

        }
    });
})(jQuery);