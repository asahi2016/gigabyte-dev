(function ($) {
    $(document).ready(function($) {
         $('#edit-term-node-tid-depth-all').remove();

         if($('.content .node-page').attr('about').length > 0) {

             var uri = $('.content .node-page').attr('about');
             var class_node = $('.content .node-page').attr('id');

             if (uri.indexOf('admin/awards-reviews') > -1) {
                 $('#' + class_node + ' .group-page-us-content .field-label-hidden p').hide();
             }
         }

         $('#views-exposed-form-awards-reviews-page .description').remove();

         var uri =  $('#views-exposed-form-awards-reviews-page a:first-child').attr('href');

         getBannerImage(uri);

         $('#views-exposed-form-awards-reviews-page a').click(function () {
             getBannerImage($(this).attr('href'));
         });


        
         function getBannerImage(url){
            $('.awards-reviews-banner').remove();
            $.post(
                Drupal.settings.gigabyte.baseUrl + '/awards_and_reviews/banner',
                {
                    term_id : getParameterByName('term_node_tid_depth', url),
                    ajax: true
                },
                function (response) {
                    var data = JSON.parse(response);
                    if(data.banner){
                        $( data.banner ).insertAfter( "#block-views-exp-awards-reviews-page" );
                    }else{
                        $('.awards-reviews-banner').remove();
                    }
                }
            );

        }

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