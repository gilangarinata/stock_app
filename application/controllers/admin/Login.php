<?php

class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenjualanModel', 'model');
        $this->load->library('upload');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view("admin/login");
    }

    public function action()
    {
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        
        if($username=="admin" && $password=="admin"){
            redirect(base_url('admin/listsusu'));
        }else{
            $this->session->set_flashdata('message', "Username atau password salah");
            redirect(base_url('admin/login'));
        }
    }
}
