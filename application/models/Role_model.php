<?php

defined('BASEPATH')OR exit('direct script no access allowed');

class Role_model extends CI_Model{

 public function getRoleList(){
    $this->db->where('status',1);
    $query = $this->db->get('tbl_role');
    return $query->result();
 }

 public function deleteRole($id,$status){
    $this->db->where('id',$id);
    $this->db->where('id !=',1);
    $this->db->set('status',$status);
    if($this->db->update('tbl_role')){
        return true;
    }
    else{
        return false;
    }
 }

 public function EditRole($id,$data){
    $this->db->where('id',$id);
    $this->db->where('id !=',1);
    if($this->db->update('tbl_role',$data)){
        return true;
    }else{
        return false;
    }
 }

 public function checkRole($role,$id="")
 {
     $data = array();
     if($id)
     {
         $this->db->where("id!=",$id);
     }
     if($role)
     {
         $this->db->where('title',$role);
     }
     $this->db->where("status!=",3);
     $this->db->where("status",1);
     $query = $this->db->get("tbl_role");
    //  echo $this->db->last_query();
    //  die;
     if($query->num_rows()>0)
     {
         foreach($query->result() as $key=>$value)
         {
             $data[] = $value;
         }
         return $data;
     }
     return $data;
 }

  public function addRole($data){
    if($this->db->insert('tbl_role',$data)){
        return true;
    }else{
        return false;
    }
  }

  public function getRole($id){
    $this->db->where('id',$id);
    $query = $this->db->get('tbl_role');
    return $query->result();
  }


}