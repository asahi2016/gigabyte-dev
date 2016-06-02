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


        $.post(
            Drupal.settings.gigabyte.baseUrl + '/promotions/ajax',
            {
                ajax: true,
                data: $('#promotion-rebates-node-form').serialize()
            },
            function (response) {
                $('#edit-field-distributor-promotion-deta').append(response);
            }
        );
    });
})(jQuery);