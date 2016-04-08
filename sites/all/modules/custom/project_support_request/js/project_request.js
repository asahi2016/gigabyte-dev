(function ($) {
    $(document).ready(function($){

        //Reset the form field after submission fails
        $('#edit-reset').click(function(){
            $('#webform-client-form-76').each(function(){
                $('input#edit-submitted-first-name').val('');
                $('input#edit-submitted-last-name').val('');
                $('input#edit-submitted-company-name').val('');
                $('input#edit-submitted-job-title').val('');
                $('input#edit-submitted-contact-number').val('');
                $('input#edit-submitted-email-address').val('');
                $('input#edit-submitted-address-1').val('');
                $('input#edit-submitted-address-2').val('');
                $('input#edit-submitted-city').val('');
                $('input#edit-submitted-state').val('');
                $('input#edit-submitted-zip-code').val('');
                $('select#edit-submitted-project-type').val('');
                $('select#edit-submitted-unit-price-range').val('');
                $('input#edit-submitted-preferred-motherboard-model').val('');
                $('textarea#edit-submitted-project-details').val('');
                $('span.custom-error').text('');
                $('input').removeClass('error');
                $('select').removeClass('error');
                $('textarea').removeClass('error');
                $('#edit-submitted-country-1').attr('checked',true);
                $('.webform-component--zip-code label').html('Zip Code <span class="form-required" title="This field is required.">*</span>');
            });
        });

        $('#edit-submitted-country .edit-submitted-country-1').hide();
        $('.edit-submitted-country').hide();

        //change the zip code and postal code based on country selection
        $("input#edit-submitted-country-1").click(function() {
            $('.webform-component--zip-code label').html('Zip Code <span class="form-required" title="This field is required.">*</span>');
        });
        $("input#edit-submitted-country-2").click(function() {
            $('.webform-component--zip-code label').html('Postal Code <span class="form-required" title="This field is required.">*</span>');
        });
        var country_selected_ca = $('#edit-submitted-country input:checked').val();
        if(country_selected_ca == 2){
            $('.webform-component--zip-code label').html('Postal Code <span class="form-required" title="This field is required.">*</span>');
        }else{
            $('.webform-component--zip-code label').html('Zip Code <span class="form-required" title="This field is required.">*</span>');
        }

        //adding mailto link to webform submission table email field.
        $('.views-table tr').each(function() {
            var email = $(this).find("td").eq(9).html();
            $(this).find("td").eq(9).html('<a href="mailto:' + email + '">' + email + '</a>');
        });

    });
})(jQuery);
