<?php

class Penjualan extends CI_Controller
{
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
        $data['modald'] = $this->model->getModalList();

        $data['cart'] = $this->model->getCartList();
        $data['outlet'] = $this->model->getOutletList();

        if (isset($_POST['submit'])) {
            $data['produk'] = $this->model->getPenjualanListFilter();
            $data['modald'] = $this->model->getModalListFilter();

            $data['cart'] = $this->model->getCartList();
        }

        $this->load->view("admin/templates/header");
        $this->load->view("admin/penjualan/list_penjualan", $data);
        $this->load->view("admin/templates/footer");
    }

    public function analisis()
    {
        $data['produk'] = $this->model->getAnalisis();
        $data['produk_outlet'] = $this->model->getAnalisisOutlet();
        $data['outletz'] = $this->model->getOutlet();
        $data['outletj'] = "all";

        if (isset($_POST['submit'])) {
            if ($this->input->post('outlet') == "all") {
                $data['produk'] = $this->model->getAnalisis();
                $data['outletz'] = $this->model->getOutlet();
                $data['outletj'] = $this->input->post('outlet');
            } else {
                $data['produk'] = $this->model->getAnalisisListFilter();
                $data['outletz'] = $this->model->getOutlet();
                $data['outletj'] = $this->input->post('outlet');
            }
        }


        $this->load->view("admin/templates/header");
        $this->load->view("admin/penjualan/analisis", $data);
        $this->load->view("admin/templates/footer");
    }

    public function rekap()
    {
        $tgl = date("d/m/Y");
        $data['produk'] = $this->model->getRekapHarian($tgl);

        if (isset($_POST['submit'])) {
            $date = date("d/m/Y",strtotime($this->input->post("tanggal")));
            $data['produk'] = $this->model->getRekapHarian($date);
        }

        $this->load->view("admin/templates/header");
        $this->load->view("admin/penjualan/rekap", $data);
        $this->load->view("admin/templates/footer");
    }
}
