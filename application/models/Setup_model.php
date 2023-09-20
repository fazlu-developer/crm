<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Setup_model extends CI_Model{

    public function AddState($data)
    {
        if($this->db->insert("tbl_state",$data))
        {
          return true;   
        }
        return false;
    }

    public function getStateList($id="")
    {
        $data = array();
        if($id)
        {
            $this->db->where("id",$id);
        }
        $this->db->where("status",1);
        $query = $this->db->get("tbl_state");
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
    public function EditState($data,$id)
    {    
        $id = base64_decode($id);
        $this->db->where("id",$id);
        if($this->db->update("tbl_state",$data))
        {
          return true;   
        }
        return false;
    }

    
    public function checkState($state,$id="")
    {
        $data = array();
        if($id)
        {
            $this->db->where("id!=",$id);
        }
        if($state)
        {
            $this->db->where('title',$state);
        }
        $this->db->where("status!=",3);
        $this->db->where("status",1);
        $query = $this->db->get("tbl_state");
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

    public function deleteState($id,$status)
    {
        $this->db->where("id",$id);
        if($this->db->update("tbl_state",array('status' => $status)))
        {
          return true;   
        }
        return false;
    }

}
