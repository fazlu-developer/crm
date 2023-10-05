<?php
defined('BASEPATH')OR exit('direct script access no allowed');

class Booking extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Booking_model","BookingModel");
    }

    public function index(){
        if($this->input->get('id')){
            $id = $this->input->get('id');
            $idG = base64_decode($id) ; 
            $data['getbooking'] =  $this->BookingModel->getbooking($idG)[0];
        }
        $data['name'] = $_SESSION['logindetails']['name'];
        $data['id'] = $_SESSION['logindetails']['id'];
        $data['username'] = $_SESSION['logindetails']['username'];
        $data['title'] =  'Create Booking';
        $data['getstate'] = $this->BookingModel->getstate();
        $this->load->view('include/header',$data);
        $this->load->view('include/sidebar');
        $this->load->view('booking/create');
        $this->load->view('include/footer');
    }
    public function listbooking(){
        $data['name'] = $_SESSION['logindetails']['name'];
        $data['id'] = $_SESSION['logindetails']['id'];
        $data['username'] = $_SESSION['logindetails']['username'];
        $data['title'] =  'List Booking';
        if($_SESSION['logindetails']['role_id']==1){
        $data['booking_list'] = $this->BookingModel->getBookinglist();        
        }else{
        $data['booking_list'] = $this->BookingModel->getBookinglist_user($data['id']);        
        }
        $this->load->view('include/header',$data);
        $this->load->view('include/sidebar');
        $this->load->view('booking/list');
        $this->load->view('include/footer');
    }

    public function addBooking()
    {
        $data['name'] = $_SESSION['logindetails']['name'];
        $data['id'] = $_SESSION['logindetails']['id'];
        $data['username'] = $_SESSION['logindetails']['username'];
        $this->form_validation->set_rules('name', 'Customer Name', 'required');
        $this->form_validation->set_rules('vehicle_number', 'Vehicle Number', 'required');
        $this->form_validation->set_rules('state_id', 'State', 'required');
        $this->form_validation->set_rules('city_id', 'City', 'required');
        if($this->form_validation->run() == false) {
            $data['title'] =  'Create Customer';
            $data['getstate'] = $this->BookingModel->getstate();
            $this->load->view('include/header',$data);
            $this->load->view('include/sidebar');
            $this->load->view('booking/create');
            $this->load->view('include/footer');
        } else { 
             
            $data = array(
                'user_id'        => $data['id'],
                'name'           => $this->input->post('name'),
                'vehicle_number' => $this->input->post('vehicle_number'),
                'state_id' => $this->input->post('state_id'),
                'city_id' => $this->input->post('city_id'),
                'created_date'   => date('Y-m-d H:i:s')
            );
            if(!empty($data))
            {
                if($this->BookingModel->addBooking($data))
                {
                    $this->session->set_flashdata('success','Booking Added Successfully!'); 
                    redirect(base_url('list-booking'));

                }
                else
                {
                    $this->session->set_flashdata('error','Booking Not Added'); 
                    redirect(base_url('list-booking'));
                }

            }
        }
    }
    public function updateBooking()
    {   
        $data['name'] = $_SESSION['logindetails']['name'];
        $data['id'] = $_SESSION['logindetails']['id'];
        $data['username'] = $_SESSION['logindetails']['username'];
        $id = $this->input->post('hidden_id');
        $data = array(
            'user_id'        => $data['id'],
            'name'           => $this->input->post('name'),
            'vehicle_number' => $this->input->post('vehicle_number'),
            'state_id' => $this->input->post('state_id'),
            'city_id' => $this->input->post('city_id'),
            'created_date'   => date('Y-m-d H:i:s')
        );
            if(!empty($data))
            {
                if($this->BookingModel->updateBooking($id,$data))
                {
                    $this->session->set_flashdata('success','Booking Updated Successfully!'); 
                    redirect(base_url('list-booking'));

                }
                else
                {
                    $this->session->set_flashdata('error','Booking Not Updated'); 
                    redirect(base_url('list-booking'));
                }

            }
        }
    


    public function deletebooking(){
        $id = $this->input->get('id');
        $idG = base64_decode($id) ; 
        $delete = $this->BookingModel->deletebooking($idG);
        if($delete){
            $this->session->set_flashdata('success','Booking Deleted Successfully!'); 
            redirect(base_url('list-booking'));
        }else{
            $this->session->set_flashdata('error','Booking Is Not Deleted!'); 
            redirect(base_url('list-booking'));
        }
        }

        public function getcity(){
            $id = $this->input->post('id');
            $getcity = $this->BookingModel->getcity($id)    ;
            foreach($getcity as $city){                    
            $data = '
            <option value="'.$city->id.'">'.$city->title.'</option>
            ';
            echo $data;
            }

        }


}
