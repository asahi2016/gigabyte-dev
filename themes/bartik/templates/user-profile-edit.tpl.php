<style>
    .messages.status{
        display: block !important;
    }
    td.description{
        color:black;
        opacity: 0.5;
        font-style: italic;
        text-align: center;
        text-size:10px;
        padding:5px !important;
    }
</style>
<?php
$errors = array();
if(isset($variables['account']['errors']) && !empty($variables['account']['errors']))
    $errors = $variables['account']['errors'];

?>
<div id="account-setting">
<table>
    <tbody>
    <tr>
        <td colspan="8"><p style="font-weight:900; font-size:27px; margin-top:30px; margin-bottom:30px; color:#12406a;">Account Management</p></td>
    </tr>
    </tbody>
</table>
<div class="border" style="width:1100px; margin:0 auto 0 auto; float: left;">
    <div style="text-align:center; font-size:20px; font-weight:700; padding-top:10px; padding-bottom:10px;color:#333">Personal Information</div>
    <table class="full-wrap">
        <tbody>
        <tr>
            <td width="380" valign="top">First Name: <?= $account['firstname']['value']?></td>
            <td width="380" valign="top">Last Name: <?= $account['lastname']['value']?></td>
            <td width="340" valign="top">Job Title: <?= $account['job_title']['value']?></td>
        </tr>
        <tr>
            <td>Email Address (Login ID): <?=$account['mail']?></td>
            <td>
                <?= $account['contact_number']['form'] ?>
            </td>
            <td align="left"><?php echo (isset($errors['field_contact_number']))? '<span class="custom-error">' . $errors['field_contact_number'].'</span>' : ''; ?></td>
        </tr>
        <tr>
            <td colspan="3"><hr /></td>
        </tr>
        </tbody>
    </table>
    <?php echo (isset($errors['current_pass']))? '<span class="custom-error password-error">' . $errors['current_pass'].'</span>' : ''; ?>
    <table id="password" style="width:940px; margin:0 30px 0 30px;">
        <tbody>
        <tr>
            <td valign="top" style="width:380px;"><?= $account['current_pass']['form'] ?> </td>
            <td valign="top" width="720"><?= $account['pass']['form'] ?></td>
        </tr>
        <tr>
            <td colspan="3" class="description">(The password should be at least 8 letters including 1 uppercase, 1 lowercase.)</td>
        </tr>
        </tbody>
    </table>
    <div style="text-align:center; padding-bottom:10px;">
        <input id="password_hide" type="button" value="Change Password" />
    </div>
</div>
<div style="width:1100px;float:left;margin:20px 0px 20px;">
<table class="company-details">
    <tbody>
    <tr>
        <td width="535" valign="top" style="min-height:480px;float: left;" class="border">
            <div>
                <div style="text-align:center; font-size:20px; font-weight:700; padding-top:10px; padding-bottom:10px;color:#333">Company Information</div>
                <div style="padding-left:30px; padding-right:30px; padding-bottom:10px;font-size: 14px;">
                    Company Name: <?= $account['company']['name']?><br /><br />
                    Member Type: <?= $account['company']['roles']->name?><br /><br />
                    Country: <?= $account['company']['country']->name?> <br /><br />
                    Business Address 1: <?= $account['company']['business_address_1']?><br /><br />
                    Business Address 2: <?= $account['company']['business_address_2']?><br /><br />
                    City: <?= $account['company']['city']?><br /><br />
                    State: <?= $account['company']['state']?><br /><br />
                    <?= ($account['company']['country']->name == 'Canada')?'Postal':'Zip'?> Code: <?= $account['company']['zip']?>
                </div>
            </div>
        </td>
        <td width="30"></td>
        <td width="535" valign="top" style="min-height:480px;float: left;" class="border">
            <div>
                <div style="text-align:center; font-size:20px; font-weight:700; padding-top:10px; padding-bottom:10px;color:#333">RMA Contact</div>
                <div style="padding-left:30px; padding-right:30px; padding-bottom:10px;font-size: 14px;margin-top: 0px;" class="fieldset-wrapper">
                    RMA First Name: <?= $account['rma_first_name']['value']?><br /><br />
                    RMA Last Name: <?= $account['rma_last_name']['value']?><br /><br />
                    <?= $account['rma_contact_number']['form']?>
                    <?= $account['rma_country']['form']?>
                    <?= $account['shipping_address_1']['form']?>
                    <?= $account['shipping_address_2']['form']?>
                    <?= $account['rma_city']['form']?>
                    <?= $account['rma_state']['form']?>
                    <?= $account['rma_zip_code']['form']?>
                </div>
            </div>
        </td>
    </tr>
    </tbody>
</table>
</div>

<div class="border" style="width:1060px;float:left;padding: 20px;margin:0 0 20px 0;">
    <table cellpadding="0" cellspacing="0" border="0">
        <tbody>
        <tr>
            <td><?= $account['participating_programs']['form']?>
                <?= $account['other_programs']['form']?></td>
        </tr>
        <tr>
            <td><?= $account['membership_account']['form']?></td>
        </tr>
        <tr>
            <td><?= $account['motherboard_qty']['form']?></td>
        </tr>
        <tr>
            <td><?= $account['choose_distributor']['form']?>
                <?= $account['other_distributor']['form']?></td>
        </tr>
        <tr>
            <td><?= $account['choose_sub_distributor']['form']?>
                <?= $account['other_sub_distributor']['form']?></td>
        </tr>
        <tr>
            <td><?= $account['receive_newsletter']['form']?></td>
        </tr>
        </tbody>
    </table>
</div>
<?php global $base_url; ?>
<input type="hidden" id="actionUrl" value="<?php echo $base_url ?>/account/settings/update" />
 <div id="edit-actions" class="form-actions form-wrapper">
     <input type="button" class="form-submit" value="Update" name="op" id="edit-submit">
 </div>
<?php  //print drupal_render($form); ?>
</div>
<script>
    (function($) {
        $(document).ready(function($){

            make_disabled_and_readonly_account_fields();

            if(!$('span.password-error').length > 0) {
                $('#password').hide();
            }

            $('#password_hide').click(function(){
                $('#password').fadeToggle()
            });

            $('#edit-submit').click(function(e){
                $('span.custom-error').remove();
                var url = $('#actionUrl').val();
                var error = false;
                error = check_options_mandatory();
                e.preventDefault();
                if(!error) {
                    //make_enabled_account_fields();
                    $('#edit-field-receive-newsletter-und input[type="radio"]').each(function () {
                        $(this).removeAttr('disabled');
                        $(this).attr('readonly','readonly');
                    });
                    $('form#user-profile-form').attr('action', url);
                    $('form#user-profile-form').submit();

                    $('#edit-field-receive-newsletter-und input[type="radio"]').each(function () {
                        $(this).attr('disabled','disabled');
                    });
                }else{
                   var pos =  $('span.custom-error').eq(0).offset().top;
                    $("html, body").animate({ scrollTop: pos }, "slow");
                }
                return false;
            });
            
            function check_options_mandatory() {

                var error = false;

                var contact = $('#edit-field-contact-number-und-0-value').val();
                if(!contact){
                    error = true;
                    $('#edit-field-contact-number').parent('td').next('td').append('<span class="custom-error" style="padding: 10px 0px;">Contact number cannot be empty.</span>');
                }

                var current_pass = $('#edit-current-pass');
                var pass1 = $('#edit-pass-pass1');
                var pass2 = $('#edit-pass-pass2');
                var check_pass = true;
                if(!current_pass.val() && !pass1.val() && !pass2.val()){
                    check_pass = false;
                }


                if(check_pass){
                    if (!current_pass.val()) {
                        error = true;
                        $('table#password').before('<span class="custom-error">Current Password cannot be empty.</span>');
                    }

                    if (!pass1.val()) {
                        error = true;
                        $('table#password').before('<span class="custom-error">Password cannot be empty.</span>');
                    }

                    if (!pass2.val()) {
                        error = true;
                        $('table#password').before('<span class="custom-error">Confirm Password cannot be empty.</span>');
                    }

                    if (pass1.val() && pass2.val()) {

                        if (pass1.val() != pass2.val()) {
                            error = true;
                            $('table#password').before('<span class="custom-error">Password you entered does not match</span>');
                        }else{

                            if(pass1.val() && (pass1.length >= 8 || pass1.length <= 20)){
                                if(!pass1.val().match(/^(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z$&+,:;=?@#|<>.-^*()%!]{8,20}$/)){
                                    $('table#password').before('<span class="custom-error">Password does not meet the requirement</span>');
                                }
                            }else if(pass1.val() && (pass1.length < 8 || pass1.length > 20)){
                                $('table#password').before('<span class="custom-error">Password does not meet the requirement</span>');
                            }
                        }
                    }
                }

                return error;
            }

            function make_disabled_and_readonly_account_fields() {

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

            function make_enabled_account_fields() {

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
            
        });
    })(jQuery);
</script>

