<?php

function update_submission_comment(){

   if(isset($_POST['ajax']) && !empty($_POST['ajax'])){

       global $user;

       $node_id = trim($_POST['node']);
       $submission_id = trim($_POST['iteration']);
       $submission_comment = trim($_POST['comment']);

       //Submission Comment insert here
       /*
        * Table Name --- submission_comments
        * comment_id
        * nid
        * sid
        * uid
        * status
        * comment
        * created
        * changed
        */

       $data_insert = array(
           'nid' => $node_id,
           'sid' => $submission_id,
           'uid' => $user->uid,
           'status' => 1,
           'comment' => $submission_comment,
           'created' => date('Y-m-d H:i:s'),
           'changed' => date('Y-m-d H:i:s')
       );

       $last_comment_id = db_insert('submission_comments')->fields($data_insert)->execute();

       //Update node date.

       $node = node_load($node_id, $submission_id);
       $node->changed = time();
       $node->promote = 0;
       node_save($node);

       $param['comments'] = $submission_comment;

       send_mail_content_information('reply_comments', $param , $node);

       $response = array('message' => 'Comment update successfully', 'last_commment' => $last_comment_id);

       print json_encode($response);

   }

}


function update_submission_status_by_admin(){

    if(isset($_POST['ajax']) && !empty($_POST['ajax']) && $_POST['status'] == 'approve'){

        global $user;

        $node_id = trim($_POST['node']);
        $submission_id = trim($_POST['iteration']);
        $submission_status = trim($_POST['status']);

        $node = node_load($node_id, $submission_id);
        $node->status = 1;
        $node->is_pending = 0;
        $node->revision_moderation = 0;
        $node->changed = time();
        $node->promote = 0;
        node_save($node);

        send_mail_content_information('approved ', $param = array(), $node);

        $response = array('message' => 'Approved successfully');

        print json_encode($response);

    }

}


?>