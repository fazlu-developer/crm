<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Login_Model extends CI_Model{

    public function getData($data){
        $query = $this->db->get_where('tbl_users',$data);
        return $query->result();
    }

}
