<?php

defined('BASEPATH') OR exit('direct access no allowed');

class Role extends CI_Controller{
    
    function __construct()
    {
        parent::__construct();
        if(empty($this->session->userdata('logindetails')))
        {
            redirect(base_url('login'));
        }
        $this->load->model('Role_model','Role');
        
    }

    public function index(){
        $data['name'] = $_SESSION['logindetails']['name'];
        $data['user_id'] = $_SESSION['logindetails']['id'];
        $data['username'] = $_SESSION['logindetails']['username'];
        $data['role_list'] = $this->Role->getRoleList();
        $data['title'] =  'Manage Role';
        $this->load->view('include/header',$data);
        $this->load->view('include/sidebar');
        $this->load->view('role/index');
        $this->load->view('include/footer');
    }

    public function addRole()
    {

    $data['name'] = $_SESSION['logindetails']['name'];
    $data['id'] = $_SESSION['logindetails']['id'];
    $data['username'] = $_SESSION['logindetails']['username'];
    $this->form_validation->set_rules('title', 'Enter Role', 'required');
    $this->form_validation->set_rules('status', 'Select Status', 'required');
    $data['role_list'] = $this->Role->getRoleList();
    
    if($this->form_validation->run() == false) {
        $data['title'] =  'Manage Role';
        $this->load->view('include/header',$data);
        $this->load->view('include/sidebar');
        $this->load->view('role/index');
        $this->load->view('include/footer');
    } else { 
        $role = $this->input->post('title');
        $status = $this->input->post('status');
        $hidden_id = $this->input->post('hidden_id');
        if($hidden_id)
        {
            $data = array(
                'title'      => $role,
                'status'     => $status,
                'mod_date'   => date('Y-m-d H:i:s')
            );
        $checkrole = $this->Role->checkRole($role,$hidden_id);
        if(!empty($checkrole))
        {
            $this->session->set_flashdata('error','Role already exist!'); 
            redirect(base_url('role'));
        }
        else
        { 
            $this->Role->EditRole($hidden_id,$data);
            $this->session->set_flashdata('success','Role Updated Successfully!'); 
            redirect(base_url('role'));
        }    
        }
        else
        {
        $data = array(
            'title'          => $role,
            'status'         => $status,
            'created_date'   => date('Y-m-d H:i:s')
        );
        if(!empty($data))
        {   
            $checkrole = $this->Role->checkRole($role);
            if($checkrole)
            {   
                $this->session->set_flashdata('error','Role already exist!'); 
                redirect(base_url('role'));
            }
            else
            {    
            if($this->Role->addRole($data))
            {
                $this->session->set_flashdata('success','Role Added Successfully!'); 
                redirect(base_url('role'));

            }
            else
            {
                $this->session->set_flashdata('error','Role Not Added'); 
                redirect(base_url('role'));
            }
        }
        }
    }
    }
   }

    public function edit_role()
    {
    $data['name'] = $_SESSION['logindetails']['name'];
    $data['id'] = $_SESSION['logindetails']['id'];
    $data['username'] = $_SESSION['logindetails']['username'];
    $id = base64_decode($this->input->get('id'));
    if(empty($id))
    {
        redirect(base_url('role'));
    }
    $getState = $this->Role->getRole($id)[0];
    $data['role_list'] = $this->Role->getRoleList();
    $data['id']   = $id;
    $data['detail'] = $getState;
    $data['title'] =  'Manage State';
    $this->load->view('include/header',$data);
    $this->load->view('include/sidebar');
    $this->load->view('role/index');
    $this->load->view('include/footer');
    
    }

    public function delete_role()
    {
        $id = base64_decode($this->input->get('id'));
        if($id)
        {
        if($this->Role->deleteRole($id,3))
        {
            $this->session->set_flashdata('success','Role Deleted Successfully'); 
            redirect(base_url('role'));
        }
       }
       else
       {
        redirect(base_url('role'));
       }
    }

}