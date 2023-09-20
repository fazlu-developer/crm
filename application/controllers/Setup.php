<?php
defined('BASEPATH')OR exit('direct script access no allowed');

class Setup extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        if(empty($this->session->userdata('logindetails')))
        {
            redirect(base_url('login'));
        }
        $this->load->model("Setup_model","SetupModel");
    }

    public function index(){
        $data['name'] = $_SESSION['logindetails']['name'];
        $data['id'] = $_SESSION['logindetails']['id'];
        $data['username'] = $_SESSION['logindetails']['username'];
        $data['customer_list'] = $this->SetupModel->getStateList();
        $data['title'] =  'Manage City';
        $this->load->view('include/header',$data);
        $this->load->view('include/sidebar');
        $this->load->view('city/manage-city');
        $this->load->view('include/footer');
    }

    public function manage_state(){
        $data['name'] = $_SESSION['logindetails']['name'];
        $data['user_id'] = $_SESSION['logindetails']['id'];
        $data['username'] = $_SESSION['logindetails']['username'];
        $data['state_list'] = $this->SetupModel->getStateList();
        $data['title'] =  'Manage State';
        $this->load->view('include/header',$data);
        $this->load->view('include/sidebar');
        $this->load->view('setup/manage-state');
        $this->load->view('include/footer');
    }

    public function manage_city(){
        $data['name'] = $_SESSION['logindetails']['name'];
        $data['id'] = $_SESSION['logindetails']['id'];
        $data['username'] = $_SESSION['logindetails']['username'];
        $data['city_list'] = $this->SetupModel->getStateList();
        $data['title'] =  'Manage City';
        $this->load->view('include/header',$data);
        $this->load->view('include/sidebar');
        $this->load->view('setup/manage-city');
        $this->load->view('include/footer');
    }
    public function addState()
    {
    $data['name'] = $_SESSION['logindetails']['name'];
    $data['id'] = $_SESSION['logindetails']['id'];
    $data['username'] = $_SESSION['logindetails']['username'];
    $this->form_validation->set_rules('state', 'Enter State', 'required');
    $this->form_validation->set_rules('status', 'Select Status', 'required');
    if($this->form_validation->run() == false) {
        $data['title'] =  'Manage State';
        $this->load->view('include/header',$data);
        $this->load->view('include/sidebar');
        $this->load->view('setup/manage-state');
        $this->load->view('include/footer');
    } else { 
        $state = $this->input->post('state');
        $status = $this->input->post('status');
        $id = base64_encode($this->input->post('state_id'));
      
        if($id)
        {
            $data = array(
                'title'      => $state,
                'status'     => $status,
                'mod_date'   => date('Y-m-d H:i:s')
            );
        $checkState = $this->SetupModel->checkState($state,$id);
        if(!empty($checkState))
        {
            $this->session->set_flashdata('error','State already exist!'); 
            redirect(base_url('setup/manage_state'));
        }
        else
        {
            $this->SetupModel->EditState($data,$id);
            $this->session->set_flashdata('success','State Updated Successfully!'); 
            redirect(base_url('setup/manage_state'));
        }    
        }
        else
        {
        $data = array(
            'title'          => $state,
            'status'         => $status,
            'created_date'   => date('Y-m-d H:i:s')
        );
        if(!empty($data))
        {
            $checkState = $this->SetupModel->checkState($state);
            if($checkState)
            {
                $this->session->set_flashdata('error','State already exist!'); 
                redirect(base_url('setup/manage_state'));
            }
            else
            {    
            if($this->SetupModel->addState($data))
            {
                $this->session->set_flashdata('success','State Added Successfully!'); 
                redirect(base_url('setup/manage_state'));

            }
            else
            {
                $this->session->set_flashdata('error','State Not Added'); 
                redirect(base_url('setup/manage_state'));
            }
        }
        }
    }
    }
   }

    public function edit_state()
    {
    $data['name'] = $_SESSION['logindetails']['name'];
    $data['id'] = $_SESSION['logindetails']['id'];
    $data['username'] = $_SESSION['logindetails']['username'];
    $id = base64_decode($this->input->get('id'));
    if(empty($id))
    {
        redirect(base_url('setup/manage_state'));
    }
    $getState = $this->SetupModel->getStateList($id)[0];
    $data['state_list'] = $this->SetupModel->getStateList();
    $data['id']   = $id;
    $data['detail'] = $getState;
    $data['title'] =  'Manage State';
    $this->load->view('include/header',$data);
    $this->load->view('include/sidebar');
    $this->load->view('setup/manage-state');
    $this->load->view('include/footer');
    
    }

    public function delete_state()
    {
        $id = base64_decode($this->input->get('id'));
        if($id)
        {
        if($this->SetupModel->deleteState($id,3))
        {
            $this->session->set_flashdata('success','State Delete'); 
            redirect(base_url('setup/manage_state'));
        }
       }
       else
       {
        redirect(base_url('setup/manage_state'));
       }
    }

}