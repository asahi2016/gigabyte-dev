(function ($) {
    $(document).ready(function($) {
        $('table#submission').click(function(){
            var ref = $(this).html();
            $.colorbox({ html: ref });
            $.colorbox.resize();
        });

        $('input#new-submission').click(function(){
            $('form#submission-node-form').show();
            var submission_form = $('form#submission-node-form').parent('div.submission-form').html();
            $.colorbox({ html: submission_form,
                onClosed: function () {
                    $('form#submission-node-form').hide();
                    window.location.href = gigabyte.baseUrl + '/view/submissions'
                }
            });
            $.colorbox.resize();
        });
    });
})(jQuery);
