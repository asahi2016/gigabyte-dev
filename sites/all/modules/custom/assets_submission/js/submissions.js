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


        $('table#submission-filters input[type="radio"]').click(function () {
            submission_filters();
        });

        $('table#submission-filters select').change(function () {
            submission_filters();
        });

        function submission_filters() {

            var status = $('table#submission-filters input[name="status-option"]:checked').val();
            var filter = $('table#submission-filters #date-filter option:selected').val();
            var sort = $('table#submission-filters #date-sort option:selected').val();

            var company = '';
            if($('table#submission-filters #company-filter').length > 0){
                var cid = $('table#submission-filters #company-filter option:selected').val();
                company = '&cid='+cid;
            }

            var query = 'filter='+filter+'&sort='+sort+'&status='+status+company;

            query = encodeURIComponent(query);

            window.location.href = Drupal.settings.gigabyte.baseUrl + '/partner/submissions?'+query;
        }


    });
})(jQuery);