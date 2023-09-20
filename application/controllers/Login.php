<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        
        if($this->session->userdata('logindetails'))
        {
            redirect(base_url('dashboard'));
        }
    }
    public function index()
    {
       
        $this->load->view('login/login-page');
    }
    public function adminlogin()
    {
    if(isset($_POST['login'])){

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run() == false) {
            $this->load->view('login/login-page');
        } else {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $sess_data = array();
            $data = array('username' => $username, 'password' => $password,'status'=>1);
            $this->load->model('Login_Model');
            $usedetails['result'] = $this->Login_Model->getData($data)[0];
            if (!empty($usedetails['result'])) {
                $uid = $usedetails['result']->id;
                $name = $usedetails['result']->name;
                $username = $usedetails['result']->username;
                $sess_data = array(
                    'name' => $name,
                    'username' => $username,
                    'id' => $uid,
                );
    
                $this->session->set_userdata('logindetails', $sess_data);
                redirect(base_url().'dashboard');
            } else {
                $this->session->set_flashdata('error', 'Please Check Your User Name,Password and Role Type Or Contact To Administrator');
                redirect(base_url().'login');
            }
        }
    }
}

}
