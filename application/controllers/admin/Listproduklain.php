<?php
class Listproduklain extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProdukLainModel', 'model');
        $this->load->library('upload');
        $this->load->library('session');
        
    }
    public function index()
    {
        $data['produk'] = $this->model->getProdukList();

        $this->load->view("admin/templates/header");
        $this->load->view("admin/produklain/list_produklain", $data);
        $this->load->view("admin/templates/footer");
    }

    function delete($id)
    {
        if ($this->model->delete($id)) {
            $this->session->set_flashdata('message', "Berhasil Hapus Data!!");
            $this->session->set_flashdata('state', true);
            
            redirect('admin/listproduklain');
        } else {
            $this->session->set_flashdata('message', "Gagal Tambah Data!");
            $this->session->set_flashdata('state', false);
            
            redirect('admin/listproduklain');
        }
    }

    public function edit($id)
    {
        $data['kategori'] = $this->model->getKategori();
        $data['produk'] = $this->model->getProdukById($id);
        $this->load->view("admin/templates/header");
        $this->load->view("admin/produklain/edit_produklain", $data);
        $this->load->view("admin/templates/footer");

        if(isset($_POST['submit'])){
            $this->model->editProduk($id);
            redirect('admin/listproduklain');
        }
    }

    public function create()
    {
        $data['kategori'] = $this->model->getKategori();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/produklain/tambah_produklain',$data);
        $this->load->view('admin/templates/footer');

        if(isset($_POST['submit'])){
            $this->model->tambahProduk();
            redirect('admin/listproduklain');
        }
    }

    public function addcategory()
    {
        $data['produk'] = $this->model->getKategori();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/produklain/tambah_kategori',$data);
        $this->load->view('admin/templates/footer');

        if(isset($_POST['submit'])){
            $this->model->tambahKategori();
            redirect('admin/listproduklain/addcategory');
        }
    }

    function deletecategory($id){
        $this->model->deleteKategori($id);
        redirect('admin/listproduklain/addcategory');
    }

    public function editcategory($id)
    {

        $data['produk'] = $this->model->getEditKategori($id);
        $this->load->view('admin/templates/header');
        $this->load->view('admin/produklain/editcategory',$data);
        $this->load->view('admin/templates/footer');

        if(isset($_POST['submit'])){
            $this->model->editCategory();
            redirect('admin/listproduklain/addcategory');
        }
    }
}
