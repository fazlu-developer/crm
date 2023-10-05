<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Customer_model extends CI_Model{

    public function addCustomer($data)
    {
        if($this->db->insert("tbl_customer",$data))
        {
          return true;   
        }
        return false;
    }

    public function getCustomerList()
    {
        $data = array();
        $this->db->where("status",1);
        $this->db->order_by('id','desc');
        $query = $this->db->get("tbl_customer");
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

    public function getCustomerList_user($id)
    {
        $data = array();
        $this->db->where("status",1);
        $this->db->where("user_id",$id);
        $this->db->order_by('id','desc');
        $query = $this->db->get("tbl_customer");
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

    public function deletecustomer($id){
        $this->db->where('id',$id);
        $this->db->set('status',3);
        if($this->db->update('tbl_customer')){
            return true;
        }else{
            return false;
        }
    }

    public function getcustomer($id){
        $this->db->where('status',1);
        $this->db->where('id',$id);
        $query = $this->db->get('tbl_customer');
        return $query->result();
    }

    public function updateCustomer($id,$data){
      $this->db->where('status',1);
      $this->db->where('id',$id);
      if($this->db->update('tbl_customer',$data)){
        return true;
      }else{
        return false;
      }
      
    }

}
