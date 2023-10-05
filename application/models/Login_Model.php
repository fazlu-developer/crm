<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Login_Model extends CI_Model{

    public function getData($data){
        $query = $this->db->get_where('tbl_users',$data);
        return $query->result();
    }

    public function updatepassword($pass){
        $this->db->where('status',1);
        // $this->db->where('id',1);
        $this->db->set('password',$pass);
        if($this->db->update('tbl_users')){
            return true;
        }else
        return false;
    }

}
