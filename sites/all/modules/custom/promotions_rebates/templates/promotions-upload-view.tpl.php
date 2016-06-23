<?php

$total = count($promotions);
$btotal = count($promotions);

?>
<div id="field-distributor-promotion-deta-add-more-wrapper">
    <div class="form-item">
        <div class="tabledrag-toggle-weight-wrapper">
            <a class="tabledrag-toggle-weight" href="#" title="Re-order rows by numerical weight instead of dragging.">Show row weights</a>
        </div>
        <table class="" style="position: fixed; top: 29px; left: 73px; visibility: visible; width: 1000px;">
            <thead style="">
            <tr>
                <th class="field-label" colspan="2" style="width: 991px; display: table-cell;">
                    <label class="fel-field-label">5. Add Distributors and its Promotion Details: <span title="This field is required." class="form-required">*</span></label>
                </th>
                <th class="tabledrag-hide" style="display: none;">Order</th>
            </tr>
            </thead>
        </table>
        <table class="field-multiple-table sticky-enabled tabledrag-processed tableheader-processed sticky-table" id="field-distributor-promotion-deta-values">
            <thead>
            <tr>
                <th class="field-label" colspan="2">
                    <label class="fel-field-label">5. Add Distributors and its Promotion Details: <span title="This field is required." class="form-required">*</span>
                    </label>
                </th>
                <th class="tabledrag-hide" style="display: none;">Order</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            $out_pos = 'even';
            foreach ($promotions as $distributor_name => $info){
                $out_pos = ($out_pos == 'even') ? 'odd' : 'even';
                ?>
                <tr class="draggable <?php print $out_pos; ?>">
                    <td class="field-multiple-drag">
                        <a class="tabledrag-handle" href="#" title="Drag to re-order">
                            <div class="handle">&nbsp;</div>
                        </a>
                    </td>
                    <td>
                        <div id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-prmotion-distributors" class="field-type-taxonomy-term-reference field-name-field-prmotion-distributors field-widget-options-select form-wrapper">
                            <div class="form-item form-type-select form-item-field-distributor-promotion-deta-und-<?php print $i;?>-field-prmotion-distributors-und">
                                <label for="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-prmotion-distributors-und" class="fel-field-label">Distributors </label>
                                <select class="form-select" name="field_distributor_promotion_deta[und][<?php print $i;?>][field_prmotion_distributors][und]" id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-prmotion-distributors-und">
                                    <option value="_none">- None -</option>
                                    <?php
                                    foreach($distributors as $tid => $tname){
                                        if(strtolower($tname['lname']) == strtolower($distributor_name)){
                                            echo '<option selected="selected" value="'. $tid .'">'.$tname['name'].'</option>';
                                        }else{
                                            echo '<option value="'. $tid .'">'.$tname['name'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-distributor-promo-banner" class="field-type-image field-name-field-distributor-promo-banner field-widget-image-image form-wrapper">
                            <div id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-distributor-promo-banner-und-<?php print $i;?>-upload-ajax-wrapper-1180867989"><div class="form-item form-type-managed-file form-item-field-distributor-promotion-deta-und-<?php print $i;?>-field-distributor-promo-banner-und-<?php print $i;?>">
                                    <label for="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-distributor-promo-banner-und-<?php print $i;?>-upload">Distributor Promotion Banner </label>
                                    <div class="image-widget form-managed-file clearfix">
                                        <div class="image-widget-data">
                                            <input type="file" class="form-file" size="22" name="files[field_distributor_promotion_deta_und_<?php print $i;?>_field_distributor_promo_banner_und_0]" id="test-upload-1118678282">
                                            <input type="submit" class="form-submit ajax-processed" value="Upload" name="field_distributor_promotion_deta_und_<?php print $i;?>_field_distributor_promo_banner_und_0_upload_button" id="test-upload-123-1055567215">
                                            <input type="hidden" value="0" name="field_distributor_promotion_deta[und][<?php print $i;?>][field_distributor_promo_banner][und][<?php print $i;?>][fid]">
                                            <input type="hidden" value="1" name="field_distributor_promotion_deta[und][<?php print $i;?>][field_distributor_promo_banner][und][<?php print $i;?>][display]">
                                        </div>
                                    </div>
                                    <div class="description">Files must be less than <strong>1 GB</strong>.<br>Allowed file types: <strong>png gif jpg jpeg</strong>.<br>Images must be smaller than <strong>1000x400</strong> pixels.</div>
                                </div>
                            </div>
                        </div>
                        <div id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details" class="field-type-field-collection field-name-field-promotion-details field-widget-field-collection-embed form-wrapper">
                            <div id="field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-add-more-wrapper">
                                <div class="form-item">
                                    <div class="tabledrag-toggle-weight-wrapper">
                                        <a class="tabledrag-toggle-weight" href="#" title="Re-order rows by numerical weight instead of dragging.">Show row weights</a>
                                    </div>
                                    <table class="sticky-header" style="position: fixed; top: 29px; left: 73px; visibility: hidden; width: 1002px;">
                                        <thead style="">
                                        <tr>
                                            <th class="field-label" colspan="2" style="width: 993px; display: table-cell;">
                                                <label class="fel-field-label">Promotion Details </label>
                                            </th>
                                            <th class="tabledrag-hide" style="display: none;">Order</th>
                                        </tr>
                                        </thead>
                                    </table>
                                    <table class="field-multiple-table sticky-enabled tabledrag-processed tableheader-processed sticky-table" id="field-promotion-details-values">
                                        <thead>
                                        <tr>
                                            <th class="field-label" colspan="2">
                                                <label class="fel-field-label">Promotion Details </label>
                                            </th>
                                            <th class="tabledrag-hide" style="display: none;">Order</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $j = 0;
                                        $in_pos = 'even';
                                        foreach ($info as $key => $data){
                                            if($key != 1){
                                                $in_pos = ($in_pos == 'even') ? 'odd' : 'even';
                                                ?>
                                                <tr class="draggable <?php print $in_pos; ?>">
                                                    <td class="field-multiple-drag">
                                                        <a class="tabledrag-handle" href="#" title="Drag to re-order">
                                                            <div class="handle">&nbsp;</div>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-gigabyte-model" class="field-type-text field-name-field-gigabyte-model field-widget-text-textfield form-wrapper">
                                                            <div id="field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-gigabyte-model-add-more-wrapper">
                                                                <div class="form-item form-type-textfield form-item-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-gigabyte-model-und-0-value">
                                                                    <label for="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-gigabyte-model-und-0-value" class="fel-field-label">Gigabyte Model <span title="This field is required." class="form-required">*</span></label>
                                                                    <input type="text" maxlength="255" size="60" value="<?php print $data['A'];?>" name="field_distributor_promotion_deta[und][<?php print $i;?>][field_promotion_details][und][<?php print $j;?>][field_gigabyte_model][und][0][value]" id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-gigabyte-model-und-0-value" class="text-full form-text required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-gigabyte-model-url" class="field-type-link-field field-name-field-gigabyte-model-url field-widget-link-field form-wrapper">
                                                            <div id="field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-gigabyte-model-url-add-more-wrapper">
                                                                <div class="form-item form-type-link-field form-item-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-gigabyte-model-url-und-0">
                                                                    <label for="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-gigabyte-model-url-und-0" class="fel-field-label">Gigabyte Model Url </label>
                                                                    <div class="link-field-subrow clearfix">
                                                                        <div class="link-field-url">
                                                                            <div class="form-item form-type-textfield form-item-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-gigabyte-model-url-und-0-url">
                                                                                <label for="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-gigabyte-model-url-und-0-url" class="element-invisible">URL </label>
                                                                                <input type="text" class="form-text" maxlength="2048" size="60" value="" name="field_distributor_promotion_deta[und][<?php print $i;?>][field_promotion_details][und][<?php print $j;?>][field_gigabyte_model_url][und][0][url]" id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-gigabyte-model-url-und-0-url">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-gigabyte-chipset" class="field-type-text field-name-field-gigabyte-chipset field-widget-text-textfield form-wrapper">
                                                            <div id="field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-gigabyte-chipset-add-more-wrapper">
                                                                <div class="form-item form-type-textfield form-item-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-gigabyte-chipset-und-0-value">
                                                                    <label for="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-gigabyte-chipset-und-0-value" class="fel-field-label">Chipset <span title="This field is required." class="form-required">*</span></label>
                                                                    <input type="text" maxlength="255" size="60" value="<?php print $data['B'];?>" name="field_distributor_promotion_deta[und][<?php print $i;?>][field_promotion_details][und][<?php print $j;?>][field_gigabyte_chipset][und][0][value]" id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-gigabyte-chipset-und-0-value" class="text-full form-text required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-stable-model" class="field-type-list-text field-name-field-stable-model field-widget-options-buttons form-wrapper">
                                                            <div class="form-item form-type-checkboxes form-item-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-stable-model-und">
                                                                <label for="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-stable-model-und" class="fel-field-label">Stable Model </label>
                                                                <div class="form-checkboxes" id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-stable-model-und">
                                                                    <div class="form-item form-type-checkbox form-item-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-stable-model-und-Yes">
                                                                        <?php
                                                                        $checked = '';
                                                                        if(strtolower($data['C']) == 'yes'){
                                                                            $checked = 'checked="checked"';
                                                                        } ?>
                                                                        <input type="checkbox" class="form-checkbox" <?php print $nchecked; ?> value="Yes" name="field_distributor_promotion_deta[und][<?php print $i;?>][field_promotion_details][und][<?php print $j;?>][field_stable_model][und][Yes]" id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-stable-model-und-yes">
                                                                        <label for="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-stable-model-und-yes" class="option">Yes </label>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-itp-points" class="field-type-text field-name-field-itp-points field-widget-text-textfield form-wrapper">
                                                            <div id="field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-itp-points-add-more-wrapper">
                                                                <div class="form-item form-type-textfield form-item-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-itp-points-und-0-value">
                                                                    <label for="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-itp-points-und-0-value" class="fel-field-label">ITP Points </label>
                                                                    <input type="text" maxlength="255" size="25" value="<?php print $data['D'];?>" name="field_distributor_promotion_deta[und][<?php print $i;?>][field_promotion_details][und][<?php print $j;?>][field_itp_points][und][0][value]" id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-itp-points-und-0-value" class="text-full form-text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-intel-sba" class="field-type-list-text field-name-field-intel-sba field-widget-options-buttons form-wrapper">
                                                            <div class="form-item form-type-radios form-item-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-intel-sba-und">
                                                                <label for="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-intel-sba-und" class="fel-field-label">Intel&reg; SBA <span title="This field is required." class="form-required">*</span></label>
                                                                <div class="form-radios" id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-intel-sba-und">
                                                                    <div class="form-item form-type-radio form-item-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-intel-sba-und">
                                                                        <?php
                                                                        $nchecked = '';
                                                                        if(strtolower($data['E']) == 'yes'){
                                                                            $nchecked = 'checked="checked"';
                                                                        } ?>
                                                                        <input type="radio" class="form-radio" <?php print $nchecked; ?> value="Yes" name="field_distributor_promotion_deta[und][<?php print $i;?>][field_promotion_details][und][<?php print $j;?>][field_intel_sba][und]" id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-intel-sba-und-yes">
                                                                        <label for="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-intel-sba-und-yes" class="option">Yes </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-instant-rebate" class="field-type-text field-name-field-instant-rebate field-widget-text-textfield form-wrapper">
                                                            <div id="field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-instant-rebate-add-more-wrapper">
                                                                <div class="form-item form-type-textfield form-item-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-instant-rebate-und-0-value">
                                                                    <label for="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-instant-rebate-und-0-value" class="fel-field-label">Instant Rebate <span title="This field is required." class="form-required">*</span></label>
                                                                    <input type="text" maxlength="255" size="60" value="<?php print $data['F'];?>" name="field_distributor_promotion_deta[und][<?php print $i;?>][field_promotion_details][und][<?php print $j;?>][field_instant_rebate][und][0][value]" id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-field-instant-rebate-und-0-value" class="text-full form-text required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="submit" class="form-submit ajax-processed" value="Remove" name="field_distributor_promotion_deta_und_<?php print $i;?>_field_promotion_details_und_<?php print $j;?>_remove_button" id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-remove-button">
                                                    </td>
                                                    <td class="delta-order tabledrag-hide" style="display: none;">
                                                        <div class="form-item form-type-select form-item-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>--weight">
                                                            <label for="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-weight" class="element-invisible">Weight for row 1 </label>
                                                            <select name="field_distributor_promotion_deta[und][<?php print $i;?>][field_promotion_details][und][<?php print $j;?>][_weight]" id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-<?php print $j;?>-weight" class="field_promotion_details-delta-order form-select">
                                                                <option selected="selected" value="<?php print $j;?>"><?php print $j;?></option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                                $j = $j + 1;
                                            } }?>
                                        </tbody>
                                    </table>
                                    <div class="clearfix">
                                        <input type="submit" value="Add another item" name="field_distributor_promotion_deta_und_<?php print $i;?>_field_promotion_details_add_more" id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-details-und-add-more" class="field-add-more-submit form-submit ajax-processed">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-field-promotion-notes" class="field-type-field-collection field-name-field-promotion-notes field-widget-field-collection-embed form-wrapper">
                            <div id="field-distributor-promotion-deta-und-0-field-promotion-notes-add-more-wrapper">
                                <div class="form-item">
                                    <div class="tabledrag-toggle-weight-wrapper">
                                        <a class="tabledrag-toggle-weight" href="#" title="Re-order rows by numerical weight instead of dragging.">Show row weights</a>
                                    </div><table class="sticky-header" style="position: fixed; top: 29px; left: 73px; visibility: hidden; width: 1002px;"><thead style="">
                                        <tr>
                                            <th class="field-label" colspan="2" style="width: 993px; display: table-cell;">
                                                <label class="fel-field-label">Promotion Notes </label>
                                            </th>
                                            <th class="tabledrag-hide" style="display: none;">Order</th>
                                        </tr>
                                        </thead>
                                    </table>
                                    <table class="field-multiple-table sticky-enabled tabledrag-processed tableheader-processed sticky-table" id="field-promotion-notes-values">
                                        <thead>
                                        <tr>
                                            <th class="field-label" colspan="2">
                                                <label class="fel-field-label">Promotion Notes </label>
                                            </th>
                                            <th class="tabledrag-hide" style="display: none;">Order</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="draggable odd">
                                            <td class="field-multiple-drag">
                                                <a class="tabledrag-handle" href="#" title="Drag to re-order">
                                                    <div class="handle">&nbsp;</div>
                                                </a>
                                            </td>
                                            <td>
                                                <div id="edit-field-distributor-promotion-deta-und-0-field-promotion-notes-und-0-field-promotion-notes-sub" class="field-type-text field-name-field-promotion-notes-sub field-widget-text-textfield form-wrapper">
                                                    <div id="field-distributor-promotion-deta-und-0-field-promotion-notes-und-0-field-promotion-notes-sub-add-more-wrapper">
                                                        <div class="form-item form-type-textfield form-item-field-distributor-promotion-deta-und-0-field-promotion-notes-und-0-field-promotion-notes-sub-und-0-value">
                                                            <label for="edit-field-distributor-promotion-deta-und-0-field-promotion-notes-und-0-field-promotion-notes-sub-und-0-value" class="fel-field-label">Promotion Notes </label>
                                                            <input type="text" maxlength="255" size="60" value="" name="field_distributor_promotion_deta[und][0][field_promotion_notes][und][0][field_promotion_notes_sub][und][0][value]" id="edit-field-distributor-promotion-deta-und-0-field-promotion-notes-und-0-field-promotion-notes-sub-und-0-value" class="text-full form-text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="submit" class="form-submit ajax-processed" value="Remove" name="field_distributor_promotion_deta_und_0_field_promotion_notes_und_0_remove_button" id="edit-field-distributor-promotion-deta-und-0-field-promotion-notes-und-0-remove-button">
                                            </td>
                                            <td class="delta-order tabledrag-hide" style="display: none;">
                                                <div class="form-item form-type-select form-item-field-distributor-promotion-deta-und-0-field-promotion-notes-und-0--weight">
                                                    <label for="edit-field-distributor-promotion-deta-und-0-field-promotion-notes-und-0-weight" class="element-invisible">Weight for row 1 </label>
                                                    <select name="field_distributor_promotion_deta[und][0][field_promotion_notes][und][0][_weight]" id="edit-field-distributor-promotion-deta-und-0-field-promotion-notes-und-0-weight" class="field_promotion_notes-delta-order form-select">
                                                        <option selected="selected" value="0">0</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="clearfix">
                                        <input type="submit" value="Add another item" name="field_distributor_promotion_deta_und_0_field_promotion_notes_add_more" id="edit-field-distributor-promotion-deta-und-0-field-promotion-notes-und-add-more" class="field-add-more-submit form-submit ajax-processed">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="form-submit ajax-processed" value="Remove" name="field_distributor_promotion_deta_und_<?php print $i;?>_remove_button" id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-remove-button">
                    </td>
                    <td class="delta-order tabledrag-hide" style="display: none;">
                        <div class="form-item form-type-select form-item-field-distributor-promotion-deta-und-<?php print $i;?>--weight">
                            <label for="edit-field-distributor-promotion-deta-und-<?php print $i;?>-weight" class="element-invisible">Weight for row 1 </label>
                            <select name="field_distributor_promotion_deta[und][<?php print $i;?>][_weight]" id="edit-field-distributor-promotion-deta-und-<?php print $i;?>-weight" class="field_distributor_promotion_deta-delta-order form-select">
                                <option selected="selected" value="<?php print $i;?>"><?php print $i;?></option>
                            </select>
                        </div>
                    </td>
                </tr>
                <?php
                /*if($i == 0) {
                    echo '<script>$(document).ready(function(){
                        $("#edit-field-distributor-promotion-deta-und-add-more").trigger("click");
                 })
                </script>';
                }else{
                    echo '<script>$(document).ready(function(){
                        $("#edit-field-distributor-promotion-deta-und-add-more--'.($i+1).'").trigger("click");
                 })
                </script>';
                }*/
                $i=$i+1;
                $total=$total-1;

            } ?>
            </tbody>
        </table>
        <div class="clearfix">
            <input type="submit" value="Add another item" name="field_distributor_promotion_deta_add_more" id="edit-field-distributor-promotion-deta-und-add-more" class="field-add-more-submit form-submit ajax-processed">
        </div>
    </div>
</div>



