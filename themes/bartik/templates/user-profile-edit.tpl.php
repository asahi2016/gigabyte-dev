<div id="account-setting">
<table>
    <tbody>
    <tr>
        <td colspan="8"><p style="font-weight:900; font-size:27px; margin-top:30px; margin-bottom:30px; color:#12406a;">Account Management</p></td>
    </tr>
    </tbody>
</table>
<div class="border" style="width:998px; margin:0 auto 0 auto; float: left;">
    <div style="text-align:center; font-size:20px; font-weight:700; padding-top:10px; padding-bottom:10px;color:#333">Personal Information</div>
    <table class="full-wrap">
        <tbody>
        <tr>
            <td>
                <table>
                    <tbody>
                    <tr>
                        <td width="312px">First Name: <?= $account['firstname']['value']?></td>
                        <td width="265px">Last Name: <?= $account['lastname']['value']?></td>
                        <td width="255px">Job Title: <?= $account['job_title']['value']?></td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table>
                    <tbody>
                    <tr>
                        <td width="312px">Email Address (Login ID): <?=$account['mail']?></td>
                        <td><?= $account['contact_number']['form'] ?></td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td><hr /></td>
        </tr>
        </tbody>
    </table>
    <table id="password" style="width:940px; margin:0 30px 0 30px;">
        <tbody>
        <tr>
            <td valign="top" style="width:330px;"><?= $account['current_pass']['form'] ?> </td>
            <td valign="top"><?= $account['pass']['form'] ?></td>
        </tr>
        </tbody>
    </table>
    <div style="text-align:center; padding-bottom:10px;">
        <input id="password_hide" type="button" value="Change Password" />
    </div>
</div>
<div style="width:998px;float:left;margin:20px 0px 20px;">
<table class="company-details"">
    <tbody>
    <tr>
        <td valign="top">
            <div class="border" style="width:485px;min-height:480px;float: left;">
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
        <td style="width:30px;"></td>
        <td valign="top">
            <div class="border" style="width:485px;min-height:480px;float: left;">
                <div style="text-align:center; font-size:20px; font-weight:700; padding-top:10px; padding-bottom:10px;color:#333">RMA Contact</div>
                <div style="padding-left:30px; padding-right:30px; padding-bottom:10px;font-size: 14px;" class="fieldset-wrapper">
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

<div class="border" style="width:960px;float:left;padding: 20px;margin:0 0 20px 0;">
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
<?php
  print drupal_render($variables['form']['actions']);
  //print drupal_render($form);
?>
<?php global $base_url; ?>
<input type="hidden" id="actionUrl" value="<?php echo $base_url ?>/update/user/account" />

</div>
<script>
    (function($) {
        $(document).ready(function($){
            $('#password').hide()

            $('#password_hide').click(function(){
                $('#password').fadeToggle()
            });

            $('#edit-submit').click(function(e){
                var url = $('#actionUrl').val();
                e.preventDefault();
                $('form#user-profile-form').attr('action', url).submit();
            });
        });
    })(jQuery);
</script>

