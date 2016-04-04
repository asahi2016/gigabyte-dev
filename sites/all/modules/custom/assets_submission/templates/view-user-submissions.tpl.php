<?php

//$img_url = $variables['data']->uc_product_image['und'][0]['uri'];
//$img_src = image_style_url("large", $img_url);
//$link = drupal_get_path_alias('node/' . $variables['data']->nid);
$date = date('m/d/Y', REQUEST_TIME);

//

?>

<?php if(isset($variables['submissions_lists']) && !empty($variables['submissions_lists'])){

        global $user;
            $admin = false;
        if (in_array('administrator', $user->roles)) {
            $admin = true;
        }

     ?>

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

        <div class="user-submissions">
        <?php
            $i = 0;
            $submission_count = count($node['submissions']);?>

            <?php
            foreach($node['submissions'] as $rid => $submission) {

            $img_url = $submission->node->field_submission_image['und'][0]['uri'];

            $status = 'Awaiting Reply from GIGABYTE';

            $description = $submission->node->body['und'][0]['value'];

            if ($submission->status != 0) {
                $status = 'Approved';
            }

            $submitted = date("F d Y", $node['root'][$nid]->created);
            $updated = date("F d Y", $submission->node->created);
            //$last_comment = $node['root']['comment']->comment_body['und'][0]['value'];
            $last_comment = '';
                ?>
                <div class="group" >
                    <table class="submission-lists-<?php echo $nid;?>" id="subContent<?php echo $nid;?><?php echo $i;?>" nodeId="<?php echo $nid;?>" nodeIndex="<?php echo $i;?>">
                        <tbody>
                        <tr>
                            <td rowspan="4" class="w300">
                                <a href="javascript:void(0);" class="submission-image">
                                    <img src="<?php print image_style_url("medium", $img_url); ?>"/>
                                </a>
                            </td>
                            <td class="f_size20 f_w_700"><?php print $submission->title; ?></td>
                        </tr>
                        <tr class="v_align">
                            <td class="f_w_700">
                                Status: <span class="cblue"><?php print  $status; ?></span>
                            </td>
                            <td class="f_w_700">
                                Submitted: <span class="f_w_400"><?php print $submitted; ?></span>
                                <br/>
                                Updated: <span class="f_w_400"><?php print $updated; ?></span>
                            </td>
                        </tr>
                        <tr class="v_align">
                            <td>Description:<br/>
                                <span><?php print $description; ?></span>
                            </td>
                            <td>Latest Comments:<br/>
                                <span><?php print $last_comment; ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php if($admin){ ?>
                                        <input type="button" submission-node="<?php echo $nid?>" submission-iteration="<?php echo $rid?>" value="Reply" style="display:none;" rel="admin-reply"/>
                                        <input type="button" submission-node="<?php echo $nid?>" submission-iteration="<?php echo $rid?>" value="Approve" style="display:none;" rel="approve"/>
                                <?php }else{ ?>
                                         <input type="button" submission-node="<?php echo $nid?>" value="Reply" style="display:none;" rel="reply"/>
                                <?php }?>
                                <input type="button" value="Download"/>
                            </td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            <?php  $i=$i+1;
         }?>
        </div>

    <?php } ?>

<?php }else{ ?>

    <div>
        <p>No Records Found...</p>
    </div>

<?php } ?>

<?php if($admin){ ?>

<div class="admin-comment" style="display: none;">
     <div class="display-error"></div>
     <h3></h3>
    <textarea name="admin-comment" id="admin-comment"></textarea>
    <input type="hidden" id="submission-node" value=""/>
    <input type="hidden" id="submission-iteration" value=""/>
    <input type="button" id="submit-comment" value="Submit"/>
    <script type="text/javascript">
        (function ($) {
            $(document).ready(function($) {

                $('#submit-comment').click(function () {

                    var submission_node = $('input[type="hidden"]#submission-node').val();
                    var submission_iteration = $('input[type="hidden"]#submission-iteration').val();
                    var comment = $('textarea#admin-comment').val();

                    $.post(
                        Drupal.settings.gigabyte.baseUrl + '/partner/update/submission/comment',
                        {
                            node : submission_node,
                            iteration : submission_iteration,
                            comment : comment,
                            ajax: true
                        },
                        function (response) {

                        }
                    );

                });

            });
        })(jQuery);
    </script>
</div>

<?php } ?>

