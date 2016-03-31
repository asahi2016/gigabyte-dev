/**
 * Created by asahi-qa2 on 31/3/16.
 */
(function ($) {
    $(document).ready(function($) {
            var new_submission = $('div#new-submission');
            $('div#new-submission').remove();
            $('form#submission-node-form').prepend(new_submission);
            $('form#submission-node-form').hide();

            $(document).on('click','div#new-submission', function () {
                $('form#submission-node-form').toggle();
            });
    });
})(jQuery);