<?php
defined('BASEPATH')OR exit('direct script access no allowed');

class Customer extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Customer_model","CustomerModel");
    }

    public function index(){
        if($this->input->get('id')){
            $id = $this->input->get('id');
            $idG = base64_decode($id) ; 
            $data['getcustomer'] =  $this->CustomerModel->getcustomer($idG)[0];
        }
        $data['name'] = $_SESSION['logindetails']['name'];
        $data['id'] = $_SESSION['logindetails']['id'];
        $data['username'] = $_SESSION['logindetails']['username'];
        $data['title'] =  'Create Customer';
        $this->load->view('include/header',$data);
        $this->load->view('include/sidebar');
        $this->load->view('customer/create');
        $this->load->view('include/footer');
    }
    public function listcustomer(){
        $data['name'] = $_SESSION['logindetails']['name'];
        $data['id'] = $_SESSION['logindetails']['id'];
        $data['username'] = $_SESSION['logindetails']['username'];
        $data['title'] =  'List Customer';
        $data['customer_list'] = $this->CustomerModel->getCustomerList();
        $this->load->view('include/header',$data);
        $this->load->view('include/sidebar');
        $this->load->view('customer/list');
        $this->load->view('include/footer');
    }

    public function addCustomer()
    {
        $data['name'] = $_SESSION['logindetails']['name'];
        $data['id'] = $_SESSION['logindetails']['id'];
        $data['username'] = $_SESSION['logindetails']['username'];
        $this->form_validation->set_rules('name', 'Enter Customer Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile No', 'required');
        $this->form_validation->set_rules('email_id', 'Email Id');
        $this->form_validation->set_rules('vehicle_type', 'Vehicle Type', 'required');
        $this->form_validation->set_rules('vehicle_number', 'Vehicle Number', 'required');
        $this->form_validation->set_rules('check_in_time', 'Check in type', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        if($this->form_validation->run() == false) {
            $data['title'] =  'Create Customer';
            $this->load->view('include/header',$data);
            $this->load->view('include/sidebar');
            $this->load->view('customer/create');
            $this->load->view('include/footer');
        } else { 
             
            $data = array(
                'name'           => $this->input->post('name'),
                'mobile'         => $this->input->post('mobile'),
                'email'       => $this->input->post('email_id'),
                'vehicle_type'   => $this->input->post('vehicle_type'),
                'vehicle_number' => $this->input->post('vehicle_number'),
                'check_in_time'  => $this->input->post('check_in_time'),
                'check_out_time' => $this->input->post('check_out_time'),
                'checkout_date'  => $this->input->post('date'),
                'created_date'   => date('Y-m-d H:i:s')
            );
            if(!empty($data))
            {
                if($this->CustomerModel->addCustomer($data))
                {
                    $this->session->set_flashdata('success','Customer Added Successfully!'); 
                    redirect(base_url('customer'));

                }
                else
                {
                    $this->session->set_flashdata('error','Customer Not Added'); 
                    redirect(base_url('customer'));
                }

            }
        }
    }
    public function updateCustomer()
    {   $id = $this->input->post('hidden_id');
        $data = array(
            'name'           => $this->input->post('name'),
            'mobile'         => $this->input->post('mobile'),
            'email'       => $this->input->post('email_id'),
            'vehicle_type'   => $this->input->post('vehicle_type'),
            'vehicle_number' => $this->input->post('vehicle_number'),
            'check_in_time'  => $this->input->post('check_in_time'),
            'check_out_time' => $this->input->post('check_out_time'),
            'checkout_date'  => $this->input->post('date'),
            'created_date'   => date('Y-m-d H:i:s')
        );
            if(!empty($data))
            {
                if($this->CustomerModel->updateCustomer($id,$data))
                {
                    $this->session->set_flashdata('success','Customer Updated Successfully!'); 
                    redirect(base_url('list-customer'));

                }
                else
                {
                    $this->session->set_flashdata('error','Customer Not Updated'); 
                    redirect(base_url('list-customer'));
                }

            }
        }
    


    public function deletecustomer(){
        $id = $this->input->get('id');
        $idG = base64_decode($id) ; 
        $delete = $this->CustomerModel->deletecustomer($idG);
        if($delete){
            $this->session->set_flashdata('success','Customer Deleted Successfully!'); 
            redirect(base_url('list-customer'));
        }else{
            $this->session->set_flashdata('error','Customer Is Not Deleted!'); 
            redirect(base_url('list-customer'));
        }
        }


}