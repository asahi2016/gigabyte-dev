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

        if($('span.file').length > 0) {

        }else{
            $.post(
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


        /*$('#promotion-rebates-node-form').on('submit', function(e) {
            //prevent the default submithandling
            e.preventDefault();
            //send the data of 'this' (the matched form) to yourURL
            $(this).serialize());
        });*/

    });
})(jQuery);