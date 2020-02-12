<?php

class Cart extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->model('CartModel','model');
        $this->load->model('PosModel');
        $this->load->library('session');
       // $this->load->library('pdf');
    }

    function index(){
        $outlet = $this->session->userdata('outlet');
        $data['cart'] = $this->model->getCartList($outlet);
        $data['jumlah_produk'] = $this->PosModel->getJumlahProduk($outlet);

        $this->load->view("pos/templates/header_cart",$data);
        $this->load->view("pos/cart",$data);
        $this->load->view("pos/templates/footer");

        if(isset($_POST['submit'])){
            $this->model->addPembayaran($outlet);
            redirect('pos/cart/cart/laporan_pdf/'.$outlet);
        }

    }

    function delete($id){
        $this->model->delete($id);
        redirect('pos/cart/cart');
    }

    public function laporan_pdf($outlet){
        $data['data'] = $this->model->pdfGetProduk($outlet);   
    
        $this->load->library('pdf');
    
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('laporan_pdf', $data);    
    }






}