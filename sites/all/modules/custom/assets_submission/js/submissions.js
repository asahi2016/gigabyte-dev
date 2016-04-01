(function ($) {
    $(document).ready(function($) {

        var new_submission = $('div.new-submission-form').html();
        $('form#submission-node-form').parents('div.content').prepend(new_submission);
        $('div.new-submission-form').remove();
        $('form#submission-node-form').hide();
        $('body.page-view-submissions h2').text('Submission');

    });
})(jQuery);