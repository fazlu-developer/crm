<?php
defined('BASEPATH')OR exit('direct script no access allowed');

class Changepassword extends CI_Controller{

    function __construct()
    {   
        parent::__construct();
        $this->load->model('Login_model');
    }

    public function index(){
        $data['title'] = "Change Password";
        $this->load->view('changepassword/index');
    }


    public function updatepassword(){
    
        $this->form_validation->set_rules('new_password','New Password','required|min_length[6]');
        $this->form_validation->set_rules('confirm_password','Confirm Password','required|matches[new_password]');
        if($this->form_validation->run()==FALSE){
            $data['title'] = "Change Password";
            $this->load->view('changepassword/index');
        }
        else{
            $password = md5($this->input->post('confirm_password'));
            $update_password = $this->Login_model->updatepassword($password);
            if($update_password){
                $this->session->set_flashdata('error', 'Update Password Successfully');
                redirect(base_url().'dashboard');
            }else{
                $this->session->set_flashdata('error', 'Update Not Password Successfully');
                redirect(base_url().'dashboard');
            }
        }
    }

}