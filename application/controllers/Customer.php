<?php
defined('BASEPATH')OR exit('direct script access no allowed');

class Customer extends CI_Controller{

    function __construct()
    {
        parent::__construct();
    }

    public function index(){
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
        $data['title'] =  'Create Customer';
        $this->load->view('include/header',$data);
        $this->load->view('include/sidebar');
        $this->load->view('customer/list');
        $this->load->view('include/footer');
    }

}