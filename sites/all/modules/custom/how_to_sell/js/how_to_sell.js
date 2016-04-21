(function ($) {
    $(document).ready(function($) {

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


    });
})(jQuery);