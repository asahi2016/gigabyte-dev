(function ($) {
    $(document).ready(function($){

         $('form').submit(function(){
            $('select#edit-user-roles').removeAttr('disabled');
            $('select#edit-field-country-und').removeAttr('disabled');
             make_enabled_fields();
         });

         //Member type move to company information section

         $('#edit-autoassignrole-user legend').remove();
         var member_type = $('#edit-autoassignrole-user div.fieldset-wrapper').html();
         $( member_type ).insertAfter( "#edit-field-company-name" );
         $('#edit-autoassignrole-user').remove();


         //Password field custom error message and description field position changes

         var pwd_desc = $('.form-type-password-confirm .description');
         $('.form-type-password-confirm .password-parent').append(pwd_desc);
         var pwd_err_msg = $('#edit-account span.custom-error.edit-pass');
         $(pwd_err_msg).insertAfter(pwd_desc);
         $('.password-parent .custom-error').eq(1).remove();

         //Services section error message field position changes and removed error field html

         var other_err1 = $('#edit-field-participating-programs .custom-error').text();
         $('#edit-field-participating-programs .form-required').append(other_err1);
         $('#edit-field-participating-programs .custom-error').text('');
         $('#edit-field-participating-programs .custom-error').css('width','0');

         var other_err2 = $('#edit-field-choose-distributor .custom-error').text();
         $('#edit-field-choose-distributor .form-required').append(other_err2);
         $('#edit-field-choose-distributor .custom-error').text('');
         $('#edit-field-choose-distributor .custom-error').css('width','0');

         var other_err3 = $('#edit-field-choose-sub-distributor .custom-error').text();
         $('#edit-field-choose-sub-distributor .form-required').append(other_err3);
         $('#edit-field-choose-sub-distributor .custom-error').text('');



        //Services section other field position changes and removed error field html
         var other_programs =  $('#edit-field-other-programs').html();
         $('div#edit-field-participating-programs-und').find('div.form-type-checkbox:last-child').append(other_programs);
         $('#edit-field-other-programs').remove();

         var other_distributor =  $('#edit-field-other-distributor').html();
         $('div#edit-field-choose-distributor-und').find('div.form-type-checkbox:last-child').append(other_distributor);
         $('#edit-field-other-distributor').remove();

         var other_sub_distributor =  $('#edit-field-other-sub-distributor').html();
         $('div#edit-field-choose-sub-distributor-und').find('div.form-type-checkbox:last-child').append(other_sub_distributor);
         $('#edit-field-other-sub-distributor').remove();


         //Disabled and make readonly text field defaultly, When html document loaded

         var company_name = $.trim($('#edit-field-company-name-und-0-target-id').val());
         var company_id = '';
         if(company_name) {
             company_id = company_name.match(/\d+/);
         }
         if(company_name != '' && $.isNumeric(company_id)) {
            $('#edit-field-business-address-1-und-0-value').attr('readonly','readonly');
            $('#edit-field-business-address-2-und-0-value').attr('readonly','readonly');
            $('#edit-field-company-city-und-0-value').attr('readonly','readonly');
            $('#edit-field-company-state-und-0-value').attr('readonly','readonly');
            $('#edit-field-company-zip-code-und-0-value').attr('readonly','readonly');
            $('select#edit-user-roles').attr('disabled','disabled');
            $('select#edit-field-country-und').attr('disabled','disabled');
            make_disabled_and_readonly_fields();

         }
         $('#edit-field-participating-programs input[type="text"]').attr('disabled','disabled');
         $('#edit-field-choose-distributor input[type="text"]').attr('disabled','disabled');
         $('#edit-field-choose-sub-distributor input[type="text"]').attr('disabled','disabled');


         //Same us Above - Put company information to RMA contact information
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
                        if(eleText.toLowerCase().trim() == 'canada'){
                            $('#field-rma-zip-code-add-more-wrapper label').html('Postal Code');
                        }else{
                            $('#field-rma-zip-code-add-more-wrapper label').html('Zip Code');
                        }
                    }
                });
            }else{
                $('.group-rma-information').find('div.form-type-textfield input[type="text"]').each(function(k){
                    $(this).val('');
                });
            }
        });


        //Other field change event for clear textfield value to specific other

        $('div.form-checkboxes input[type="checkbox"]').change(function(){
            if($(this).is(':checked')) {
                if ($(this).parent('div').find('label').text().toLowerCase().trim() == 'other') {
                    $(this).parent('div').find('input[type="text"]').removeAttr('disabled');
                }
            }else{
                if ($(this).parent('div').find('label').text().toLowerCase().trim() == 'other') {
                    $(this).parent('div').find('input[type="text"]').attr('disabled','disabled');
                    $(this).parent('div').find('input[type="text"]').val('');
                }
            }
        });

        //Other field make disabled -when page refresh

        $('div.form-checkboxes input[type="checkbox"]:checked').each(function(e){
                if ($(this).parent('div').find('label').text().toLowerCase().trim() == 'other') {
                    var activeElement = $(this).parents('div.form-type-checkboxes')
                        .parent('div')
                        .next('span.custom-error');
                    $(this).parents('div.form-type-checkboxes').parent('div').find('.form-required').text('');
                    $(this).parents('div.form-type-checkboxes').parent('div').find('.form-required').text('* '+$(activeElement).text());
                    $(activeElement).text('');
                    $(this).parent('div').find('input[type="text"]').removeAttr('disabled');
                }
        });
        $('span.edit-field-other-sub-distributor').hide();


        var country_selected = $('#edit-field-country-und option:selected').text();
        var rma_country_selected = $('#edit-field-rma-country-und option:selected').text();

        if(country_selected.toLowerCase().trim() == 'canada'){
            $('#field-company-zip-code-add-more-wrapper label').html('Postal Code <span class="form-required" title="This field is required.">*</span>');
        }else{
            $('#field-company-zip-code-add-more-wrapper label').html('Zip Code <span class="form-required" title="This field is required.">*</span>');
        }

        if(rma_country_selected.toLowerCase().trim() == 'canada'){
            $('#field-rma-zip-code-add-more-wrapper label').html('Postal Code');
        }else{
            $('#field-rma-zip-code-add-more-wrapper label').html('Zip Code');
        }


        $('#edit-field-rma-country-und option:first-child').remove();

        $('#edit-field-country-und , #edit-field-rma-country-und').change(function () {
            var label = $('option:selected', this).text();
            var eleId = $(this).attr('id');
            var html = '';
            if(eleId == 'edit-field-country-und'){
                html = '<span class="form-required" title="This field is required.">*</span>';
            }
            if (label == "Canada") {
                $(this).parents('div.fieldset-wrapper').find('div.field-type-text:last-child label').html('Postal Code '+html);
            } else {
                $(this).parents('div.fieldset-wrapper').find('div.field-type-text:last-child label').html('Zip Code '+html);
            }
        });

       $(document).on('click','#autocomplete ul li', function(){
           var company_id = $('#edit-field-company-name-und-0-target-id').val();
           company_info_ajax_load(company_id);
       });

       (function ($) {
           $.prototype.enterPressed = function (fn) {
                $(this).keyup(function (e) {
                    if ((e.keyCode || e.which) == 13) {
                        fn();
                    }
               });
           };
       }(jQuery || {}));

        $(".form-autocomplete").enterPressed(function() {
            var company_id = $('#edit-field-company-name-und-0-target-id').val();
            company_info_ajax_load(company_id);

        });


       function company_info_ajax_load(company_id) {

            $('select#edit-user-roles').removeAttr('disabled');
            $('select#edit-field-country-und').removeAttr('disabled');

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
                                if($(this).val() == key){
                                    $(this).prop( 'selected', 'selected' );
                                }
                            });
                            $('select#edit-user-roles').attr('disabled','disabled');
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
                                var country_selected = $(this).text();
                                if(country_selected.toLowerCase().trim() == 'canada'){
                                    $('#field-company-zip-code-add-more-wrapper label').html('Postal Code <span class="form-required" title="This field is required.">*</span>');
                                }
                                if(country_selected.toLowerCase().trim() != 'canada'){
                                    $('#field-company-zip-code-add-more-wrapper label').html('Zip Code <span class="form-required" title="This field is required.">*</span>');
                                }
                                $(this).prop( 'selected', 'selected' );
                                $('select#edit-field-country-und').attr('disabled','disabled');
                            }
                        });

                        $('fieldset').each(function(i){
                            if(i == 1) {
                                $(this).find('input[type="text"]').attr('readonly','readonly');
                            }
                        });

                        $.each(group_user.programs.ids , function(i, val) {
                            $('#edit-field-participating-programs-und-'+val).attr('checked','checked')
                        });

                        $.each(group_user.distributor.ids , function(i, val) {
                            $('#edit-field-choose-distributor-und-'+val).attr('checked','checked')
                        });

                        $.each(group_user.sub_distributor.ids , function(i, val) {
                            $('#edit-field-choose-sub-distributor-und-'+val).attr('checked','checked')
                        });

                        $('#edit-field-receive-newsletter-und input[type="radio"]').each(function () {
                            $('#edit-field-receive-newsletter-und-'+group_user.newsletter).attr('checked','checked')
                        });

                        $('#edit-field-membership-account-und-0-value').val(group_user.membership);
                        $('#edit-field-motherboard-qty-und-0-value').val(group_user.motherboard_qty);
                        $('#edit-field-other-programs-und-0-value').val(group_user.programs.others);
                        $('#edit-field-other-distributor-und-0-value').val(group_user.distributor.others);
                        $('#edit-field-other-sub-distributor-und-0-value').val(group_user.sub_distributor.others);

                        make_disabled_and_readonly_fields();

                    }
                }
            );
       }

       function make_disabled_and_readonly_fields() {

           $('#edit-field-participating-programs-und input[type="checkbox"]').each(function () {
               $(this).attr('disabled','disabled');
           });

           $('#edit-field-choose-distributor-und input[type="checkbox"]').each(function () {
               $(this).attr('disabled','disabled');
           });

           $('#edit-field-choose-sub-distributor-und input[type="checkbox"]').each(function () {
               $(this).attr('disabled','disabled');
           });

           $('#edit-field-receive-newsletter-und input[type="radio"]').each(function () {
               $(this).attr('disabled','disabled');
           });
           $('#edit-field-membership-account-und-0-value').attr('readonly','readonly');
           $('#edit-field-motherboard-qty-und-0-value').attr('readonly','readonly');

           $('#edit-field-other-programs-und-0-value').attr('readonly','readonly');
           $('#edit-field-other-distributor-und-0-value').attr('readonly','readonly');
           $('#edit-field-other-sub-distributor-und-0-value').attr('readonly','readonly');

       }

       function make_enabled_fields() {

           $('#edit-field-participating-programs-und input[type="checkbox"]').each(function () {
               $(this).removeAttr('disabled');
           });

           $('#edit-field-choose-distributor-und input[type="checkbox"]').each(function () {
               $(this).removeAttr('disabled');
           });

           $('#edit-field-choose-sub-distributor-und input[type="checkbox"]').each(function () {
               $(this).removeAttr('disabled');
           });

           $('#edit-field-receive-newsletter-und input[type="radio"]').each(function () {
               $(this).removeAttr('disabled');
           });

           $('#edit-field-other-programs-und-0-value').removeAttr('disabled');
           $('#edit-field-other-distributor-und-0-value').removeAttr('disabled');
           $('#edit-field-other-sub-distributor-und-0-value').removeAttr('disabled');

       }


       $('#edit-field-company-name-und-0-target-id').click(function(){
           $('fieldset').each(function(i){
              if(i == 1) {
                  $(this).find('input[type="text"]').val('');
                  $(this).find('input[type="text"]').removeAttr('readonly');
              }
           });

           $('select#edit-field-country-und').removeAttr('disabled');
           $("select#edit-field-country-und option").each(function () {
                if ($(this).text() == 'United States') {
                    $(this).prop("selected", "selected");
                    $('#field-company-zip-code-add-more-wrapper label').html('Zip Code <span class="form-required" title="This field is required.">*</span>');
                }else{
                    $(this).removeAttr("selected");
                }
           });

           $('select#edit-user-roles').removeAttr('disabled');
           $("select#edit-user-roles option").each(function () {
               if ($(this).text() == '- Select -') {
                   $(this).prop("selected", "selected");
               }else{
                   $(this).removeAttr("selected");
               }
           });

       });

    });
})(jQuery);

