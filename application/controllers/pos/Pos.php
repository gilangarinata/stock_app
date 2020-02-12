<?php

class Pos extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->model('PosModel','model');
        $this->load->library('session');
    }

    function index(){

        $outlet = $this->session->userdata('outlet');

        echo $outlet;
        
        $data['susu'] = $this->model->getSusuList();
        $data['produklain'] = $this->model->getProdukLainList();
        $data['jumlah_produk'] = $this->model->getJumlahProduk($outlet);

        $this->load->view("pos/templates/header",$data);
        $this->load->view("pos/dashboard",$data);
        $this->load->view("pos/templates/footer");
    }

    function addproduksusu($id,$nama,$harga){
        $outlet = $this->session->userdata('outlet');
        $this->model->addproduksusu($id,$nama,$harga,$outlet);
        redirect('pos/pos');
    }

    function addproduklain($id,$nama,$harga){
        $outlet = $this->session->userdata('outlet');
        $this->model->addProdukLain($id,$nama,$harga,$outlet);
        redirect('pos/pos');
    }




}