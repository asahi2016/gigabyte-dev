<?php
    global $user;
    $admin = false;
    if (in_array('administrator', $user->roles)) {
        $admin = true;
    }
?>

<?php if(isset($variables['submissions_lists']) && !empty($variables['submissions_lists'])){     ?>

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
            $img_original_url = file_create_url($img_url);


            $status = 'Awaiting Reply from GIGABYTE';

            $description = isset($submission->node->body['und'][0]['value'])?$submission->node->body['und'][0]['value']:'';
            $last_comment = $submission->comment['comment'];

            if ($submission->status != 0) {
                $status = 'Approved';
            }else{
                if($admin){
                    $status = 'Awaiting Reply from PARTNER';
                }
            }

            $submitted = date("F d Y", $node['root'][$nid]->created);
            $updated = date("F d Y", $submission->node->changed);

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
                                        <input type="button" submission-node="<?php echo $nid?>" submission-iteration="<?php echo $rid?>" submission-title="<?php echo $submission->title;?>" value="Reply" style="display:none;" rel="admin-reply"/>
                                        <input type="button" submission-node="<?php echo $nid?>" submission-iteration="<?php echo $rid?>" submission-title="<?php echo $submission->title;?>" value="Approve" style="display:none;" rel="approve"/>
                                <?php }else{ ?>
                                         <input type="button" submission-node="<?php echo $nid?>" submission-iteration="<?php echo $rid?>" submission-title="<?php echo $submission->title;?>" value="Reply" style="display:none;" rel="reply"/>
                                <?php }?>
                                <a href="<?php print $img_original_url; ?>" class="download-image" download>
                                    <input type="button" value="Download"/>
                                </a>
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

<div class="admin-comment-container">
<div class="admin-comment" style="display: none;height: 300px;width:500px" >

    <div style="text-align: center">
     <div class="display-error"></div>
        Reply of <h1></h1>
    <textarea name="admin-comment" id="admin-comment" style="height: 200px;width:400px"></textarea>
    </br>
    <input type="hidden" id="submission-node" value=""/>
    <input type="hidden" id="submission-iteration" value=""/>
    <input type="button" id="submit-comment" value="Submit"/>
    </div>
</div>
</div>

<?php } ?>

