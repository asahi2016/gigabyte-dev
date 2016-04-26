(function ($) {
    $(document).ready(function($) {

        //platform based series display
        var current_val = $('#edit-field-platform-und').val();
        if (current_val == 32) {
            $("#edit-field-series-und").html("<option value='34'>100 Series</option>" +
            "<option value='35'>X99 Series</option>" +
            "<option value='36'>9 Series</option>" +
            "<option value='37'>8 Series</option>");
        }

        $('#edit-field-platform-und').change(function(){
            var current_val = $(this).val();
            if (current_val == 32) {
                $("#edit-field-series-und").html("<option value='34'>100 Series</option>" +
                "<option value='35'>X99 Series</option>" +
                "<option value='36'>9 Series</option>" +
                "<option value='37'>8 Series</option>");
        }
            else if (current_val == 33) {
                $("#edit-field-series-und").html("<option value='39'>900 Series</option>");
            }

        });

        $('.filter-tab a').on('click', function(e) {
            e.preventDefault();

            // Get ID of clicked item

            var id = $(e.target).attr('id');


            // Set the new value in the SELECT element
          var filter = $('#views-exposed-form-how-to-sell-view-page select[name="term_node_tid_depth"]');
            filter.val(id);

            // Unset and then set the active class
            $('.filter-tab a').removeClass('active');
            $(e.target).addClass('active');
            // Do it! Trigger the select box
            //filter.trigger('change');
            $('#views-exposed-form-how-to-sell-view-page select[name="term_node_tid_depth"]').trigger('change');
            $('#views-exposed-form-how-to-sell-view-page input.form-submit').trigger('click');




        });
        jQuery(document).ajaxComplete(function(event, xhr, settings) {

            switch(settings.extraData.view_name){

                case "how_to_sell_view":
                    var filter_id = $('#views-exposed-form-how-to-sell-view-page select[name="term_node_tid_depth"]').find(":selected").val();

                    $('.filter-tab a').removeClass('active');
                    $('.filter-tab').find('#' + filter_id).addClass('active');

                    break;

            };
        });

        $('.view-how-to-sell-view .field-content a .cke_colorbox').colorbox({ iframe: true, width: "90%", height: "95%" });


        /*var pdf = $('.views-field-field-file-pdf .content').wrap('<a href=""');
        //alert(pdf);
        $('.views-field-field-file-image .field-content a')
*/









    });
})(jQuery);