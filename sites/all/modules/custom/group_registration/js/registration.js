(function ($) {
    $(document).ready(function(){
         $('#edit-autoassignrole-user legend').remove();
         var member_type = $('#edit-autoassignrole-user div.fieldset-wrapper').html();
         $( member_type ).insertAfter( "#edit-field-company-name" );
         $('#edit-autoassignrole-user').remove();

         $('#edit-field-other-programs input').attr('disabled','disabled');
         $('#edit-field-other-distributor input').attr('disabled','disabled');
         $('#edit-field-other-sub-distributor input').attr('disabled','disabled');

        $("#edit-field-rma-contact-und-same-as-above").change(function(){
            if($(this).is(':checked')){
                $('#edit-field-rma-first-name-und-0-value').val($('#edit-field-first-name-und-0-value').val());
                $('#edit-field-rma-last-name-und-0-value').val($('#edit-field-last-name-und-0-value').val());
                $('#edit-field-rma-contact-number-und-0-value').val($('#edit-field-contact-number-und-0-value').val());
                $('#edit-field-shipping-address-1-und-0-value').val($('#edit-field-business-address-1-und-0-value').val());
                $('#edit-field-shipping-address-2-und-0-value').val($('#edit-field-business-address-2-und-0-value').val());
                $('#edit-field-rma-city-und-0-value').val($('#edit-field-company-city-und-0-value').val());
                $('#edit-field-rma-state-und-0-value').val($('#edit-field-company-state-und-0-value').val());
                $('#edit-field-rma-zip-code-und-0-value').val($('#edit-field-company-zip-code-und-0-value').val());
                var eleText = $('#edit-field-country-und option:selected').text();
                var eleVal = $('#edit-field-country-und option:selected').val();
                $("#edit-field-rma-country-und").find('option').each(function( i, opt ) {
                    if( opt.value == eleVal ) {
                        $(opt).attr('selected', 'selected');
                        $(opt).text(eleText);
                    }
                });
            }else{
                $('.group-rma-information').find('div.form-type-textfield input[type="text"]').each(function(k){
                    $(this).val('');
                });
            }
        });

        $('div.form-checkboxes input[type="checkbox"]').click(function(){
            if($(this).parent('div').find('label').text().toLowerCase().trim() == 'other'){
                var disableElement =  $(this).parents('div.form-type-checkboxes')
                    .parent('div')
                    .next('div.field-type-text')
                    .find('input[type="text"]');

                var disable =  disableElement.attr('disabled');
                if(disable == true){
                    disableElement.removeAttr('disabled');
                }else{
                    disableElement.val('');
                    disableElement.attr('disabled','disabled');
                }
            }
        })
    });
})(jQuery);

