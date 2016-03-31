(function ($) {
    $(document).ready(function($) {

        var new_submission = $('div.new-submission-form');
        $('form#submission-node-form').parent('.content').prepend(new_submission);
        //$('div.new-submission-form').remove();
        $('form#submission-node-form').hide();

        $(document).on('click','input#new-submission', function () {
            $('form#submission-node-form').toggle();
        });
    });
})(jQuery);