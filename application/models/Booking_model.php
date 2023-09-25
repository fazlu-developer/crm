<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Booking_model extends CI_Model{

    public function addBooking($data)
    {
        if($this->db->insert("tbl_booking",$data))
        {
          return true;   
        }
        return false;
    }

    public function getBookinglist()
    {
        $this->db->select('a.*,b.title as state,c.title as city');
        $this->db->join('tbl_state b','a.state_id=b.id','left');
        $this->db->join('tbl_city  c','a.city_id=c.id','left');
        $this->db->where('a.status',1);
        $query = $this->db->get('tbl_booking a');
        return $query->result();
    }

    public function deletebooking($id){
        $this->db->where('id',$id);
        $this->db->set('status',3);
        if($this->db->update('tbl_booking')){
            return true;
        }else{
            return false;
        }
    }

    public function getbooking($id){
        $this->db->where('status',1);
        $this->db->where('id',$id);
        $query = $this->db->get('tbl_booking');
        return $query->result();
    }

    public function updateBooking($id,$data){
      $this->db->where('status',1);
      $this->db->where('id',$id);
      if($this->db->update('tbl_booking',$data)){
        return true;
      }else{
        return false;
      }
      
    }

    public function getstate(){
        $this->db->where('status',1);
        $query = $this->db->get('tbl_state');
        return $query->result();
    }

    public function getcity($id){
        $this->db->where('status',1);
        $this->db->where('state_id',$id);
        $query = $this->db->get('tbl_city');
        return $query->result();
    }

}
