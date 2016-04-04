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


       $response = array('message' => 'Comment update successfully', 'last_commment' => $last_comment_id);

       print json_encode($response);

   }

}



?>