<?php

//$img_url = $variables['data']->uc_product_image['und'][0]['uri'];
//$img_src = image_style_url("large", $img_url);
//$link = drupal_get_path_alias('node/' . $variables['data']->nid);
$date = date('m/d/Y', REQUEST_TIME);

//

?>

<?php if(isset($variables['submissions_lists']) && !empty($variables['submissions_lists'])){ ?>

     <table class="subm_wrap_s">
        <tbody>
        <tr>
            <td>Filter:</td>
            <td>
                <input id="Checkbox1" type="checkbox" /> Awaiting Reply from Partner
                <input id="Checkbox1" type="checkbox" /> Approved
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                Submitted:
                <select id="Select1">
                    <option>From New to Old</option>
                    <option>From Old to New</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                Updated:
                <select id="Select1">
                    <option>From New to Old</option>
                    <option>From Old to New</option>
                </select>
            </td>
        </tr>
        </tbody>
    </table>

    <?php foreach($variables['submissions_lists'] as  $nid => $node){ ?>

        <table id="submission">

        <?php foreach($node['submissions'] as $rid => $submission){

            $img_url = $submission->node->field_submission_image['und'][0]['uri'];

            $status = 'Awaiting Reply from GIGABYTE';

            if($submission->status != 0){
                $status = 'Approved';
            }

            $submitted = date("F d Y", $node['root'][$nid]->created);
            $updated = date("F d Y", $submission->node->created);
            //$last_comment = $node['root']['comment']->comment_body['und'][0]['value'];
            $last_comment = '';

            ?>

                <tbody>
                <tr>
                    <td rowspan="4" class="w300">
                        <a href="#CA1">
                            <img src="<?php print image_style_url("medium", $img_url); ?>" />
                        </a>
                    </td>
                    <td class="f_size20 f_w_700"><?php print $submission->title; ?></td>
                </tr>
                <tr class="v_align">
                    <td class="f_w_700">
                        Status: <span class="f_w_400 cblue"><?php print  $status;?></span>
                    </td>
                    <td class="f_w_700">
                        Submitted: <span class="f_w_400"><?php print $submitted; ?></span>
                        <br />
                        Updated: <span class="f_w_400"><?php print $updated; ?></span>
                    </td>
                </tr>
                <tr class="v_align">
                    <td colspan="2" class="f_w_700">Latest Comments:<br /><span class="f_w_400"><?php print $last_comment;?></span></td>
                </tr>
                <tr>
                    <td><input id="Button1" type="button" value="Download" /></td>
                </tr>
                </tbody>

            <?php } ?>

        </table>

    <?php } ?>

<?php }else{ ?>

    <div>
        <p>No Records Found...</p>
    </div>

<?php } ?>



