(function ($) {
    $(document).ready(function($){
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
                $('input#edit-submitted-country-1').val('');
                $('select#edit-submitted-project-type').val('');
                $('select#edit-submitted-unit-price-range').val('');
                $('input#edit-submitted-preferred-motherboard-model').val('');
                $('input#edit-submitted-project-details').val('');
            });
        });
    });
})(jQuery);
