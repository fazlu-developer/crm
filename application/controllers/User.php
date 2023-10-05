<?php

defined('BASEPATH') OR exit('direct access no allowed');

class user extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        if(empty($this->session->userdata('logindetails')))
        {
            redirect(base_url('login'));
        }
        $this->load->model('User_model','User');
        $this->load->model('Booking_model','BookingModel');
        
    }

    public function index(){
        $data['name'] = $_SESSION['logindetails']['name'];
        $data['user_id'] = $_SESSION['logindetails']['id'];
        $data['username'] = $_SESSION['logindetails']['username'];
        $data['role_list'] = $this->User->getUserList();
        $data['get_role'] = $this->User->getRole();
        $data['getstate'] = $this->BookingModel->getstate();
        $data['title'] =  'Manage User';
        $this->load->view('include/header',$data);
        $this->load->view('include/sidebar');
        $this->load->view('user/index');
        $this->load->view('include/footer');
    }

    public function addUser()
    {

    $data['name'] = $_SESSION['logindetails']['name'];
    $data['id'] = $_SESSION['logindetails']['id'];
    $data['username'] = $_SESSION['logindetails']['username'];
    $this->form_validation->set_rules('name', 'Enter Name', 'required');
    $this->form_validation->set_rules('username', 'Enter User Name', 'required');
    // $this->form_validation->set_rules('password', 'Enter Password', 'required');
    $this->form_validation->set_rules('role', 'Select Role', 'required');
    $this->form_validation->set_rules('state_id', 'Select State', 'required');
    $this->form_validation->set_rules('city_id', 'Select City', 'required');
    $this->form_validation->set_rules('status', 'Select Status', 'required');
    $data['role_list'] = $this->User->getUserList();
    $data['get_role'] = $this->User->getRole();
    $data['getstate'] = $this->BookingModel->getstate();
    if($this->form_validation->run() == false) {
        $data['title'] =  'Manage User';
        $this->load->view('include/header',$data);
        $this->load->view('include/sidebar');
        $this->load->view('user/index');
        $this->load->view('include/footer');
    } else { 
        // prx($_POST);    
        $name = $this->input->post('name');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $email = $this->input->post('email');
        $mobile = $this->input->post('mobile');
        $address = $this->input->post('address');
        $state_id = $this->input->post('state_id');
        $city_id = $this->input->post('city_id');
        $role = $this->input->post('role');
        $status = $this->input->post('status');
        $hidden_id = $this->input->post('hidden_id');
        if($hidden_id)
        {
            $data = array(
                'name'      => $name,
                'username'      => $username,
                'password'      => $password,
                'email'      => $email,
                'mobile'      => $mobile,
                'address'      => $address,
                'state_id'      => $state_id,
                'city_id'      => $city_id,
                'role_id'      => $role,
                'status'     => $status,
                'mod_date'   => date('Y-m-d H:i:s')
            );
        $checkuser = $this->User->checkUser($username,$hidden_id);
        if(!empty($checkuser))
        {
            $this->session->set_flashdata('error','User already exist!'); 
            redirect(base_url('user'));
        }
        else
        { 
            $this->User->EditUser($hidden_id,$data);
            // app_log_manage($data['id'],$hidden_id,json_encode($data));
            $this->session->set_flashdata('success','User Updated Successfully!'); 
            redirect(base_url('user'));
        }    
        }
        else
        {
        $data = array(
            'name'      => $name,
            'username'      => $username,
            'password'      => $password,
            'email'      => $email,
            'mobile'      => $mobile,
            'address'      => $address,
            'state_id'      => $state_id,
            'city_id'      => $city_id,
            'role_id'      => $role,
            'status'         => $status,
            'created_date'   => date('Y-m-d H:i:s')
        );
        if(!empty($data))
        {   
            $checkuser = $this->User->checkUser($email);
            if($checkuser)
            {   
                $this->session->set_flashdata('error','User already exist!'); 
                redirect(base_url('user'));
            }
            else
            {    
            if($this->User->addUser($data))
            {   
                // app_log_manage($data['id'],$this->db->insert_id(),json_encode($data));
                $this->session->set_flashdata('success','User Added Successfully!'); 
                redirect(base_url('user'));

            }
            else
            {
                $this->session->set_flashdata('error','User Not Added'); 
                redirect(base_url('user'));
            }
        }
        }
    }
    }
   }

    public function edit_user()
    {
    $data['name'] = $_SESSION['logindetails']['name'];
    $data['id'] = $_SESSION['logindetails']['id'];
    $data['username'] = $_SESSION['logindetails']['username'];
    $id = base64_decode($this->input->get('id'));
    if(empty($id))
    {
        redirect(base_url('user'));
    }
    $getUser = $this->User->getUser($id)[0];
    $data['get_role'] = $this->User->getRole();
    $data['getstate'] = $this->BookingModel->getstate();
    $data['role_list'] = $this->User->getUserList();
    $data['id']   = $id;
    $data['detail'] = $getUser;
    $data['title'] =  'Manage User';
    $this->load->view('include/header',$data);
    $this->load->view('include/sidebar');
    $this->load->view('user/index');
    $this->load->view('include/footer');
    
    }

    public function delete_user()
    {
        $id = base64_decode($this->input->get('id'));
        if($id)
        {
        if($this->User->deleteUser($id,3))
        {
            $this->session->set_flashdata('success','Role Deleted Successfully'); 
            redirect(base_url('user'));
        }
       }
       else
       {
        redirect(base_url('user'));
       }
    }

}