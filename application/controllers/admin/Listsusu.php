<?php
class Listsusu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SusuModel', 'model');
        $this->load->library('upload');
        $this->load->library('session');
        
    }
    public function index()
    {
        $data['produk'] = $this->model->getProdukList();
        $this->load->view("admin/templates/header");
        $this->load->view("admin/susu/list_susu", $data);
        $this->load->view("admin/templates/footer");
    }

    function delete($id)
    {
        if ($this->model->delete($id)) {
            $this->session->set_flashdata('message', "Berhasil Hapus Data!!");
            $this->session->set_flashdata('state', true);
            
            redirect('admin/listsusu');
        } else {
            $this->session->set_flashdata('message', "Gagal Tambah Data!");
            $this->session->set_flashdata('state', false);
            
            redirect('admin/listsusu');
        }
    }

    public function edit($id)
    {
        $data['produk'] = $this->model->getProdukById($id);
        $this->load->view("admin/templates/header");
        $this->load->view("admin/susu/edit_susu", $data);
        $this->load->view("admin/templates/footer");

        if(isset($_POST['submit'])){
            $this->model->editProduk($id);
            redirect('admin/listsusu');
        }
    }

    public function create()
    {
        $this->load->view('admin/templates/header');
        $this->load->view('admin/susu/tambah_susu');
        $this->load->view('admin/templates/footer');

        if(isset($_POST['submit'])){
            $this->model->tambahProduk();
            redirect('admin/listsusu');
        }
    }



}
