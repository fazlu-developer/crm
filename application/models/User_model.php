<?php

defined('BASEPATH')OR exit('direct script no access allowed');

class User_model extends CI_Model{

 public function getUserList(){
    $this->db->select('a.*,b.title as role_name ,c.title as state_name,d.title as city_name');
    $this->db->join('tbl_role b','a.role_id=b.id','left');
    $this->db->join('tbl_state c','a.state_id=c.id','left');
    $this->db->join('tbl_city d','a.city_id=d.id','left');
    $this->db->where('a.status',1);
    $this->db->where('a.id !=',1);
    $query = $this->db->get('tbl_users a');
    return $query->result();
 }

 public function getRole(){
    $this->db->where('status',1);
    $this->db->where('id !=',1);
    $query =  $this->db->get('tbl_role');
    return $query->result();
 }
 public function deleteUser($id,$status){
    $this->db->where('id',$id);
    $this->db->where('id !=',1);
    $this->db->set('status',$status);
    if($this->db->update('tbl_users')){
        return true;
    }
    else{
        return false;
    }
 }

 public function EditUser($id,$data){
    // echo $id; die;
    $this->db->where('id',$id);
    if($this->db->update('tbl_users',$data)){
        return true;
    }else{
        return false;
    }
 }

 public function checkUser($email,$id="")
 {
     $data = array();
     if($id)
     {
         $this->db->where("id!=",$id);
     }
     if($email)
     {
         $this->db->where('email',$email);
     }
     $this->db->where("status!=",3);
     $this->db->where("status",1);
     $query = $this->db->get("tbl_users");
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

  public function addUser($data){
    if($this->db->insert('tbl_users',$data)){
        return true;
    }else{
        return false;
    }
  }

  public function getUser($id){
    $this->db->where('id',$id);
    $query = $this->db->get('tbl_users');
    return $query->result();
  }


}