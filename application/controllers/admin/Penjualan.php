<?php

class Penjualan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PenjualanModel', 'model');
        $this->load->library('upload');
        $this->load->library('session');
    }

    public function index()
    {
        $data['produk'] = $this->model->getPenjualanList();
        $data['cart'] = $this->model->getCartList();

        if(isset($_POST['submit'])){
            $data['produk'] = $this->model->getPenjualanListFilter();
            $data['cart'] = $this->model->getCartList();

            // $this->load->view("admin/templates/header");
            // $this->load->view("admin/penjualan/list_penjualan", $data);
            // $this->load->view("admin/templates/footer");

        }


        $this->load->view("admin/templates/header");
        $this->load->view("admin/penjualan/list_penjualan", $data);
        $this->load->view("admin/templates/footer");
    }


} 