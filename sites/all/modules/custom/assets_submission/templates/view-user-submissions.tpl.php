<?php
    global $user;
    $admin = false;
    if (in_array('administrator', $user->roles)) {
        $admin = true;
    }

    if(isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING'])) {
        $query = urldecode($_SERVER['QUERY_STRING']);
        $args = get_clean_url($query);
    }


?>
<?php if(user_is_logged_in()){ ?>

<table class="subm_wrap_s" id="submission-filters">
    <tbody>
    <?php if($admin){ ?>
    <tr>
        <td>Filter by company:</td>
        <td>
            <select id="company-filter">
                <option value="">All</option>
                <?php
                $selected = '';
                foreach ($variables['company_lists'] as $company_key => $company) {
                    if (isset($args['cid']) && ($company->nid == $args['cid'])) {
                        $selected = 'selected = selected';
                    }else{
                        $selected = '';
                    }
                    ?>
                    <option value="<?php echo $company->nid;?>" <?php echo $selected;?> ><?php echo $company->title;?></option>
                <?php } ?>

            </select>
        </td>
    </tr>
    <?php  } ?>
    <tr>
        <td>Filter by status:</td>
        <td>
            <?php

            $status_filter = array('partner' => 'Awaiting Reply from Partner' , 'gigabyte' => 'Awaiting Reply from GIGABYTE' ,'approved'=> 'Approved');

            $checked = '';
            foreach ($status_filter as $stkey => $stlabel) {
                if (isset($args['status']) && ($stkey == $args['status'])) {
                    $checked = 'checked = checked';
                }else{
                    $checked = '';
                }
                ?>
                <input type="radio" name="status-option" value="<?php echo $stkey;?>" <?php echo $checked;?>/> <?php echo $stlabel;?>
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <?php
            $date_filter = array('all'=> 'All', 'submitted' => 'Submitted' , 'updated' => 'Updated');
            ?>
            Filter By:
            <select id="date-filter">
                <?php
                $selected = '';
                foreach ($date_filter as $dkey => $dlabel) {
                    if (isset($args['filter']) && ($dkey == $args['filter'])) {
                        $selected = 'selected = selected';
                    }else{
                        $selected = '';
                    }
                    ?>
                    <option value="<?php echo $dkey;?>" <?php echo $selected;?> ><?php echo $dlabel;?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            Sort By:
            <select id="date-sort">
                <?php
                $sselected = '';
                $sort_filter = array('DESC' => 'From New to Old','ASC' => 'From Old to New');
                foreach ($sort_filter as $skey => $slabel) {
                    if (isset($args['sort']) && ($skey == $args['sort'])) {
                        $sselected = 'selected = selected';
                    }else{
                        $sselected = '';
                    }
                    ?>
                    <option value="<?php echo $skey;?>" <?php echo $sselected;?> ><?php echo $slabel;?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
    </tbody>
</table>

<?php if(isset($variables['submissions_lists']) && !empty($variables['submissions_lists'])){     ?>

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
                if($last_comment){
                    $status = 'Awaiting Reply from PARTNER';
                }
            }

           // print_pre($submission,1);

            $submitted = date("F d Y", $submission->timestamp);
            $updated = date("F d Y", $submission->node->changed);

            ?>
                <div class="group" >
                    <table class="submission-lists-<?php echo $nid;?>" id="subContent<?php echo $nid;?><?php echo $i;?>" nodeId="<?php echo $nid;?>" nodeIndex="<?php echo $i;?>">
                        <tbody>
                        <tr>
                            <td rowspan="4" class="w300 td_img">
                                <a href="javascript:void(0);" class="submission-image">
                                    <img src="<?php print image_style_url("medium", $img_url); ?>"/>
                                </a>
                            </td>
                            <td class="f_size20 f_w_700"><?php print $submission->title; ?></td>
                        </tr>
                        <tr>
                            <td class="f_w_700 td_left" valign="top">
                                <p>Status: <span class="cblue"><?php print  $status; ?></span></p>
                            </td>
                            <td class="f_w_700 td_right" valign="top">
                                <p>Submitted: <span class="f_w_400"><?php print $submitted; ?></span></p>
                                <p>Updated: <span class="f_w_400"><?php print $updated; ?></span></p>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" class="f_w_700 td_left">
                                <p>Description:</p>
                                <p><span class="descrip_td"><?php print $description; ?></span></p>
                            </td>
                            <td valign="top" class="f_w_700 td_right">
                                <p>Latest Comments:</p>
                                <p><span class="descrip_td"><?php print $last_comment; ?></span></p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <?php if($admin){ ?>
                                        <input type="button" class="btn btn-info" submission-node="<?php echo $nid?>" submission-iteration="<?php echo $rid?>" submission-title="<?php echo $submission->title;?>" value="Reply" style="display:none;" rel="admin-reply"/>
                                        <input type="button" class="btn btn-success" submission-node="<?php echo $nid?>" submission-iteration="<?php echo $rid?>" submission-title="<?php echo $submission->title;?>" value="Approve" style="display:none;" rel="approve"/>
                                <?php }else{ ?>
                                         <input type="button" class="btn btn-info" submission-node="<?php echo $nid?>" submission-iteration="<?php echo $rid?>" submission-title="<?php echo $submission->title;?>" value="Reply" style="display:none;" rel="reply"/>
                                <?php }?>
                                <a href="<?php print $img_original_url; ?>" class="download-image" download>
                                    <input type="button" value="Download" class="form-submit"/>
                                </a>
                            </td>
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
<div class="admin-comment" style="display: none;height: 320px;width:500px" >

    <div style="text-align: center">
     <div class="display-error"></div>
        Reply of <h1></h1>
    <textarea name="admin-comment" id="admin-comment" style="height: 200px;width:400px"></textarea>
    </br>
    <input type="hidden" id="submission-node" value=""/>
    <input type="hidden" id="submission-iteration" value=""/>
    <input type="button" id="submit-comment" class="form-submit" value="Submit" style="float:inherit"/>
    </div>
</div>
</div>

<?php } ?>

<?php } ?>