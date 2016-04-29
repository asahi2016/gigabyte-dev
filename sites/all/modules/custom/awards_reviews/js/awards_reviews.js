(function ($) {
    $(document).ready(function($) {

         $('#views-exposed-form-awards-reviews-page a').click(function () {
             $.post(
                 Drupal.settings.gigabyte.baseUrl + '/get/awards_and_reviews/banner',
                 {
                     term_id : getParameterByName('term_node_tid_depth', $(this).attr('href')),
                     ajax: true
                 },
                 function (response) {

                 }
             );
         });

        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }

    });
})(jQuery);