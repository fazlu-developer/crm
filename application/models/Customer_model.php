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

}
