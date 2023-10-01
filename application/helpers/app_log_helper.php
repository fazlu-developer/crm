<?php 
if(defined('BASEPATH')OR exit('direct script no access allowed'));

 function prx($data){
    echo "<pre>";
    print_r($data);
    die;
}

function app_log_manage($user_id,$id,$text)
{
    $CI =& get_instance();    
    $CI->load->database();
    $data = array(
        'user_id'      => $user_id,
        'insert_id'      => $id,
        'title'        => $text,
        'created_date' => date('Y-m-d H:i:s')
    );
    $CI->db->insert("tbl_log",$data);
}

