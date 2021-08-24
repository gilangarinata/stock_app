<?php

class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel', 'model');
        $this->load->library('upload');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view("login");
    }

    public function action()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        
        if($username == 'admin' && $password == 'admin123'){
            $this->session->set_userdata('username',$username);
            redirect(base_url('dashboard'));
        }else{
            if($username == 'karyawan' && $password == 'karyawan'){
                $this->session->set_userdata('username',$username);
                redirect(base_url('dashboard'));
            }else{
                redirect(base_url('login'));
            }
        }
    }
}
