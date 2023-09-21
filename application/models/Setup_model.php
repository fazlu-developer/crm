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

    public function getStateList($id="",$status="")
    {
        $data = array();
        if($id)
        {
            $this->db->where("id",$id);
        }
        if($status)
        {
        $this->db->where("status",$status);
        }
        else
        {
        $this->db->where("status!=",3);
        }
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

    public function getCityList($id="")
    {
        $data = array();
        $this->db->select('a.*,b.title as state');
        $this->db->where("b.status",1);
        $this->db->where("a.status",1);
        if($id)
        {
            $this->db->where("a.id",$id);
        }
        $this->db->join("tbl_state b","a.state_id=b.id","left");
        $query = $this->db->get("tbl_city a");
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

    public function checkCity($city,$id="")
    {
        
        $data = array();
        if($id)
        {
            $this->db->where("id!=",$id);
        }
        if($city)
        {
            $this->db->where('title',$city);
        }
        $this->db->where("status!=",3);
        $this->db->where("status",1);
        $query = $this->db->get("tbl_city");
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

    public function EditCity($data,$id)
    {    
        $this->db->where("id",$id);
        if($this->db->update("tbl_city",$data))
        {
          return true;   
        }
        return false;
    }

    public function AddCity($data)
    {
        if($this->db->insert("tbl_city",$data))
        {
          return true;   
        }
        return false;
    }
    
    public function deleteCity($id,$status)
    {
        $this->db->where("id",$id);
        if($this->db->update("tbl_city",array('status' => $status)))
        {
          return true;   
        }
        return false;
    }
}
