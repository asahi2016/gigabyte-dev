(function ($) {
    $(document).ready(function($){
         $('#edit-autoassignrole-user legend').remove();
         var member_type = $('#edit-autoassignrole-user div.fieldset-wrapper').html();
         $( member_type ).insertAfter( "#edit-field-company-name" );
         $('#edit-autoassignrole-user').remove();
        var pwd_desc = $('.form-type-password-confirm .description');
        $('.form-type-password-confirm .password-parent').append(pwd_desc);

        var pwd_err_msg = $('#edit-account span.custom-error.edit-pass');

        $(pwd_err_msg).insertAfter(pwd_desc);
        $('.password-parent .custom-error').eq(1).remove();

        var other_err1 = $('#edit-field-participating-programs .custom-error').text();
        var other_err2 = $('#edit-field-choose-distributor .custom-error').text();
        var other_err3 = $('#edit-field-choose-sub-distributor .custom-error').text();

        $('#edit-field-participating-programs .form-required').append(other_err1);
        $('#edit-field-choose-distributor .form-required').append(other_err2);
        $('#edit-field-choose-sub-distributor .form-required').append(other_err3);
        $('#edit-field-participating-programs .custom-error').text('');
        $('#edit-field-choose-distributor .custom-error').text('');
        $('#edit-field-choose-sub-distributor .custom-error').text('');

        var other_programs =  $('#edit-field-other-programs').html();
        $('div#edit-field-participating-programs-und').find('div.form-type-checkbox:last-child').append(other_programs);
        $('#edit-field-other-programs').remove();

        var other_distributor =  $('#edit-field-other-distributor').html();
        $('div#edit-field-choose-distributor-und').find('div.form-type-checkbox:last-child').append(other_distributor);
        $('#edit-field-other-distributor').remove();

        var other_sub_distributor =  $('#edit-field-other-sub-distributor').html();
        $('div#edit-field-choose-sub-distributor-und').find('div.form-type-checkbox:last-child').append(other_sub_distributor);
        $('#edit-field-other-sub-distributor').remove();


        $('form').submit(function(){
            $('select#edit-user-roles').removeAttr('disabled');
            $('select#edit-field-country-und').removeAttr('disabled');
        });

        var company_name = $('#edit-field-company-name-und-0-target-id').val();

        if(company_name != '') {
            $('#edit-field-business-address-1-und-0-value').attr('readonly','readonly');
            $('#edit-field-business-address-2-und-0-value').attr('readonly','readonly');
            $('#edit-field-company-city-und-0-value').attr('readonly','readonly');
            $('#edit-field-company-state-und-0-value').attr('readonly','readonly');
            $('#edit-field-company-zip-code-und-0-value').attr('readonly','readonly');
            $('select#edit-user-roles').attr('disabled','disabled');
            $('select#edit-field-country-und').attr('disabled','disabled');
        }

         /*$('#edit-field-other-programs input').attr('disabled','disabled');
         $('#edit-field-other-distributor input').attr('disabled','disabled');
         $('#edit-field-other-sub-distributor input').attr('disabled','disabled');*/

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

        $('div.form-checkboxes input[type="checkbox"]').change(function(){
            if($(this).is(':checked')) {
                if ($(this).parent('div').find('label').text().toLowerCase().trim() == 'other') {
                    var activeElement = $(this).parents('div.form-type-checkboxes')
                        .parent('div')
                        .next('div.field-type-text')
                        .find('input[type="text"]');
                    activeElement.removeAttr('disabled');
                }
            }else{
                if ($(this).parent('div').find('label').text().toLowerCase().trim() == 'other') {
                    var disableElement = $(this).parents('div.form-type-checkboxes')
                        .parent('div')
                        .next('div.field-type-text')
                        .find('input[type="text"]');
                    disableElement.val('');
                    disableElement.attr('disabled','disabled');
                }
            }
        });


        $('div.form-checkboxes input[type="checkbox"]:checked').each(function(e){
                if ($(this).parent('div').find('label').text().toLowerCase().trim() == 'other') {
                    var activeElement = $(this).parents('div.form-type-checkboxes')
                        .parent('div')
                        .next('span.custom-error');
                    $(this).parents('div.form-type-checkboxes').parent('div').find('.form-required').text('');
                    $(this).parents('div.form-type-checkboxes').parent('div').find('.form-required').text('* '+$(activeElement).text());
                    $(activeElement).text('');
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

