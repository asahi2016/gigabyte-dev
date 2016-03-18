(function ($) {
    $(document).ready(function($){
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
        });

       $(document).on('click','#autocomplete ul li', function(){
           var company_id = $('#edit-field-company-name-und-0-target-id').val();
           company_info_ajax_load(company_id);
       });


       function company_info_ajax_load(company_id) {


            $.post(
                Drupal.settings.gigabyte.baseUrl + '/get/company_info',
                {
                    company_name : company_id,
                    ajax: true
                },
                function (response) {

                    var data = JSON.parse(response);

                    $.each(data.response.roles, function(key,val) {
                        if(key != 2) {
                            $('select#edit-user-roles option').each(function(){
                                if( $(this).text() == '- Select -' ) {
                                    $(this).removeAttr("selected");
                                }

                                if($(this).val() == key){
                                    $(this).attr('selected','selected');
                                }
                            });

                            $('select#edit-user-roles').attr('disabled','disabled');
                            $('select#edit-field-country-und').attr('disabled','disabled');
                        }
                    });

                    var group_user = data.response.group_info;
                    if(group_user){
                        $('#edit-field-business-address-1-und-0-value').val(group_user.business_address_1);
                        $('#edit-field-business-address-2-und-0-value').val(group_user.business_address_2);
                        $('#edit-field-company-city-und-0-value').val(group_user.city);
                        $('#edit-field-company-state-und-0-value').val(group_user.state);
                        $('#edit-field-company-zip-code-und-0-value').val(group_user.zip);

                        $('select#edit-field-country-und option').each(function() {
                            if($(this).val() == group_user.country){
                                $(this).attr('selected','selected');
                            }
                        });

                        $('fieldset').each(function(i){
                            if(i == 1) {
                                $(this).find('input[type="text"]').attr('readonly','readonly');
                            }
                        });

                    }
                }
            );
       }

       $('#edit-field-company-name-und-0-target-id').focus(function(){
           $('fieldset').each(function(i){
              if(i == 1) {
                  $(this).find('input[type="text"]').val('');
                  $(this).find('input[type="text"]').removeAttr('readonly');
              }
           });

           $('select#edit-user-roles').removeAttr('disabled');
           $("select#edit-user-roles option").each(function () {
               if ($(this).text() == '- Select -') {
                   $(this).attr("selected", "selected");
               }else{
                   $(this).removeAttr("selected");
               }
           });

           $('select#edit-field-country-und').removeAttr('disabled');

           $('select#edit-field-country-und option').each(function() {
               if ($(this).val() == 1) {
                   $(this).attr("selected", "selected");
               }else{
                   $(this).removeAttr("selected");
               }
           });

       });

    });
})(jQuery);

