<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
          if(!($this->session->userdata('logindetails'))){
           redirect('login');
       }
    }


    public function index()
	{	
        
        $data['name'] = $_SESSION['logindetails']['name'];
        $data['id'] = $_SESSION['logindetails']['id'];
        $data['username'] = $_SESSION['logindetails']['username'];
        $data['title']= 'Welcome To Dashboard | Adminpanel';
		$this->load->view('include/header',$data);
		$this->load->view('include/sidebar');
		$this->load->view('dashboard/dashboard');
		$this->load->view('include/footer');

	}
		public function logout(){
        $this->session->sess_destroy();
        redirect('login');
        exit();
    }

		
	
}
