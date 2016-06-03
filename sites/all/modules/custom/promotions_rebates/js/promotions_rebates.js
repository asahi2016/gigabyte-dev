(function ($) {
    $(document).ready(function($) {

        var access = true;

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

        $(document).on('change','select[id*="edit-field-distributor-promotion-deta-und-0-field-prmotion-distributors-und"]',function(){
            img_url = '';
            $.ajax({
                url:Drupal.settings.gigabyte.baseUrl+'/promotions/get/termdata',
                type:'post',
                data:{termid:$(this).val()},
                success:function(data){
                    img_url = data;
                    var html_content = '<span class="distributor-image" ><img src="'+img_url+'" /> </span>';
                    $('select[id*="edit-field-distributor-promotion-deta-und-0-field-prmotion-distributors-und"]').parent('div').find('span').remove();
                    $('select[id*="edit-field-distributor-promotion-deta-und-0-field-prmotion-distributors-und"]').parent('div').append(html_content);
                }
            });

        });
    });
})(jQuery);