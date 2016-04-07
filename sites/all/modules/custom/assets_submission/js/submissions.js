(function ($) {
    $(document).ready(function($) {

        var new_submission = $('div.new-submission-form').html();
        $('form#submission-node-form').parents('div.content').prepend(new_submission);
        $('div.new-submission-form').remove();
        $('form#submission-node-form').hide();
        $('body.page-view-submissions h2').text('Submission');


        /*$('table#submission-filters input[type=checkbox]').click(function () {
            if($(this).is(':checked')) {
                $('table#submission-filters').trigger('click');
            }
        });*/


        $('table#submission-filters input[type="checkbox"]').click(function () {
            submission_filters();
        });

        $('table#submission-filters select').change(function () {
            submission_filters();
        });

        function submission_filters() {

            var partner = $('table#submission-filters #partner:checked').val();
            var approved = $('table#submission-filters #approved:checked').val();
            var filter = $('table#submission-filters #date-filter option:selected').val();
            var sort = $('table#submission-filters #date-sort option:selected').val();

            partner = (partner == undefined)?'':partner;
            approved = (approved == undefined)?'':approved;

            var query = 'filter='+filter+'&sort='+sort+'&partner='+partner+'&approved='+approved;


            query = encodeURIComponent(query);

            window.location.href = Drupal.settings.gigabyte.baseUrl + '/view/submissions?'+query;
        }


    });
})(jQuery);