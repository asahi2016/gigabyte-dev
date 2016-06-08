<?php
global $base_url;

$link = url('login');
if(user_is_logged_in()){
    $link = url('partner/promotions/intel');
}

?>
<table class="tbl_intel_tech">
    <tbody>
    <tr>
        <td valign="top"><img src="<?php echo $base_url; ?>/sites/all/modules/custom/intel_technology_provider/images/ITP/ITP intro.jpg" alt="" /></td>
        <td rowspan="2" width="250" style="font-family: 'Raleway', sans-serif; vertical-align:baseline;" valign="top">
            <div style="width:240px; background:#0070ac; margin:0 auto 0 auto; height:1740px;">
                <div style="font-size:20px; font-weight:700; text-align:center; color:#ffffff; padding-top:50px;">ITP GIGABYTE<br />PRODUCT TRAINING</div>
                <div style="background:#ffffff; height:3px; width:210px; margin:0 auto 0 auto;"></div>
                <?php print render($itp_gigabyte_product_training);?>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <table class="benefits">
                <tbody>
                <tr class="txt_center">
                    <td width="237"><img src="<?php echo $base_url; ?>/sites/all/modules/custom/intel_technology_provider/images/ITP/register icon.jpg" width="200" /></td>
                    <td width="237"><img src="<?php echo $base_url; ?>/sites/all/modules/custom/intel_technology_provider/images/ITP/purchase icon.jpg" width="200" /></td>
                    <td width="237"><img src="<?php echo $base_url; ?>/sites/all/modules/custom/intel_technology_provider/images/ITP/no cap icon.jpg" width="200" /></td>
                    <td width="237"><img src="<?php echo $base_url; ?>/sites/all/modules/custom/intel_technology_provider/images/ITP/double up icon.jpg" width="200" /></td>
                </tr>
                <tr style="font-weight:700; font-size:16px; color:#999999;">
                    <td>Not an intel Technology Provider? Learn more about the program and register <a href="http://techpartner.intel.com/gigabyte" target="_blank">here</a>.</td>
                    <td>Buy qualified GIGABYTE motherboards and BRIX and earn points with Intel Technology Provider.</td>
                    <td>Participation in the program is available to eligible Gold and Platinum Intel Technology Providers.</td>
                    <td>
                        Purchase GIGABYTE motherboards and BRIX today and double your rewards.<br /><br />
                        You will earn points with Intel Technology Provider plus GIGABYTE rewards.
                    </td>
                </tr>
                </tbody>
            </table>

            <div class="claim"><a href="<?php print $link; ?>"><div>Claim Your Rewards</div></a></div>

            <div style="width:950px; margin:0 auto 0 auto; margin-top:40px; color:white; font-size:25px; font-family: 'ralewayregular', sans-serif;"><div style="background:#007dc5; padding-left:30px;">INTEL TECHNOLOGY PROVIDER POINTS</div></div>

            <?php print $intel_motherboard_models; ?>

            <?php print $intel_brix_models; ?>

            <div class="claim"><a href="<?php print $link; ?>"><div>Claim Your Rewards</div></a></div>

            <div style="width:950px; margin:0 auto 0 auto;margin-top:40px; color:white; font-size:25px; font-family: 'ralewayregular', sans-serif;"><div style="width:920px; background:#007dc5; padding-left:30px;">GIGABYTE REWARD PROGRAM</div></div>

            <table style="width:900px; margin-top:5px;">
                <tbody>
                <tr>
                    <td rowspan="2" style="color:#e21f26; font-size:150px; font-family:'Helvetica Neue', Helvetica, Arial, sans-serif; text-align:center; width:150px; line-height:65px;vertical-align: middle" >2% <span style="font-size:60px;">REBATE</span></td>
                    <td style="color:#615e5f; font-size:40px; font-family:times; padding-left:39px;">WITH ELIGIBLE GOLD AND PLATINUM<br />INTEL® TECHNOLOGY PROVIDERS PURCHASE</td>
                </tr>
                <tr>
                    <td>
                        <ul style="font-family: 'ralewayregular', sans-serif; font-weight:700;">
                            <li style="list-style-type:disc;">When eligible Gold and Platinum Intel Technology Providers purchase GIGABYTE qualified Motherboards models will receive a 2% rebate.</li>
                            <li style="list-style-type:disc;">200+ pcs qualified products per month (mix and match)</li>
                            <li style="list-style-type:disc;">This program does NOT apply to any GIGABYTE direct US etailer/retailer customers.</li>
                        </ul>
                    </td>
                </tr>
                </tbody>
            </table>

            <?php print $intel_motherboard_models_normal; ?>

            <div class="claim"><a href="<?php print $link; ?>"><div>Claim Your Rewards</div></a></div>
        </td>
    </tr>
    </tbody>
</table>

<table style="text-align:center; width:100%; margin-top:30px;">
    <tbody>
    <tr>
        <td>
            <?php print $gigabyte_authorized_distributors; ?>
        </td>
    </tr>
    </tbody>
</table>

<div style="width:265px; margin:10px auto 0 auto; font-family: 'ralewayregular', sans-serif; color:#295e95; font-weight:900; font-size:20px;"><a class="inline" href="#Terms" id="terms-link">TERMS AND CONDITIONS</a></div>
<div id="term-conditions" style="display: none;">
    <div id="Terms">
        <ul>
            <li>GIGABYTE program qualified motherboards and BRIX Series Products must be purchased from GIGABYTE authorized distributors.</li>
            <li>Program is valid from January - December, 2016 for qualified motherboards and BRIX.</li>
            <li>To earn points with Intel Technology Provider, customers must provide Intel Techmology Business ID. Your Business ID can be found in the upper left corner of each page of the Intel Technology Provider website.</li>
            <li>All reports must be submitted on a bi-weekly basis. All reports must include copies of invoice(s) or proof of purchase of program's qualified models from GIGABYTE authorized distributors.</li>
            <li>To qualify for GIGABYTE's 2% purchase rebate, customers must purchase 200+ pcs of qualified motherboards and BRIX models (mix and match) per month.</li>
            <li>All purchases cannot be returned within 3 months for this promotion.</li>
            <li>This program cannot with any other programs or special purchase pricing.</li>
            <li>GIGABYTE reserves the right to refuse or decline any claim which does not meet the promotion requirement.</li>
            <li>The programs are only valid for US and Canada.</li>
            <li>If you have any question, please contact us at <a href="mailto:sales@gigabyteusa.com">sales@gigabyteusa.com</a></li>
        </ul>
    </div>
</div>

