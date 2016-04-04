<?php

function update_submission_comment(){

   if(isset($_POST['ajax']) && !empty($_POST['ajax'])){

       global $user;

       $node_id = trim($_POST['node']);
       $submission_id = trim($_POST['iteration']);
       $submission_comment = trim($_POST['iteration']);

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

      // db_insert('submission_comments')->fields($data_insert)->execute();


       $response = array('message' => 'Comment update successfully');

       json_encode($response);

   }

}



?>