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
        
        if($this->model->login($username,$password)){
            redirect(base_url('dashboard'));
        }else{
            $this->session->set_flashdata('message', "Username atau password salah");
            redirect(base_url('login'));
        }
    }
}
