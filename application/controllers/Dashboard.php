<?php

class Dashboard extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductModel', 'model');
        $this->load->library('upload');
        $this->load->library('session');
    }

    public function index()
    {
        $data['products'] = $this->model->getProductList();
        $this->load->view("templates/header",$data);
        $this->load->view("dashboard",$data);
        $this->load->view("templates/footer");
    }

    function delete_product($id)
    {
        if ($this->model->delete($id)) {
            $this->session->set_flashdata('message', "Berhasil Hapus Data!!");
            $this->session->set_flashdata('state', true);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('message', "Gagal Hapus Data!");
            $this->session->set_flashdata('state', false);
            redirect('dashboard');
        }
    }

    function add_product(){
        $data['mode'] = "ADD";
        $this->load->view("templates/header");
        $this->load->view("add_product",$data);
        $this->load->view("templates/footer");

        if(isset($_POST['submit'])){
            $this->model->add_product();
            redirect('dashboard');
        }
    }

    function edit_product(){
        $id = $this->input->get('id', 1);
        $product = $this->model->getProductById($id);
        $data['mode'] = "EDIT";
        $data['product'] = $product;
        $this->load->view("templates/header");
        $this->load->view("add_product",$data);
        $this->load->view("templates/footer");

        if(isset($_POST['submit'])){
            $this->model->update_product($id);
            redirect('dashboard');
        }
    }

    function select_product(){
        $id = $this->input->get('id', 1);
        $product = $this->model->getProductById($id);
        $data['product'] = $product;
        $this->load->view("templates/header");
        $this->load->view("select_product",$data);
        $this->load->view("templates/footer");

        if(isset($_POST['submit'])){
            $this->model->sell_product($id);
            redirect('dashboard');
        }
    }

    function sellings(){
        date_default_timezone_set('Asia/Jakarta');

        if(isset($_POST['submit'])){
            $month = (int)$this->input->post("month");
            $year = (int)$this->input->post("year");

            $data['monthly'] = $this->model->get_selling_by_month($month,$year);
            $data['sellings'] = $this->model->get_sellings();
            $this->load->view("templates/header");
            $this->load->view("selling",$data);
            $this->load->view("templates/footer");
        }else{
            $month = (int)date('m');
            $year = (int)date('Y');
    
            $data['monthly'] = $this->model->get_selling_by_month($month,$year);
            $data['sellings'] = $this->model->get_sellings();
            $this->load->view("templates/header");
            $this->load->view("selling",$data);
            $this->load->view("templates/footer");    
        }
    }

    function productdetail(){
        date_default_timezone_set('Asia/Jakarta');

        if(isset($_POST['submit'])){
            $month = (int)$this->input->post("month");
            $year = (int)$this->input->post("year");

            $data['monthly'] = $this->model->get_selling_by_month_w_product_id($month,$year);
            $data['sellings'] = $this->model->get_sellings_by_product_id();
            $this->load->view("templates/header");
            $this->load->view("productdetail",$data);
            $this->load->view("templates/footer");
        }else{
            $month = (int)date('m');
            $year = (int)date('Y');

            $data['monthly'] = $this->model->get_selling_by_month_w_product_id($month,$year);
            $data['sellings'] = $this->model->get_sellings_by_product_id();
            $this->load->view("templates/header");
            $this->load->view("productdetail",$data);
            $this->load->view("templates/footer");    
        }
    }

    function gallery(){
        $id = $this->input->get('product_id', 1);
        $product = $this->model->getProductById($id);
        $data['product'] = $product;
        $this->load->view("templates/header");
        $this->load->view("gallery",$data);
        $this->load->view("templates/footer");    
    }

    function cancel(){
        redirect('dashboard');
    }
}
