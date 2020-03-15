<?php
class Outlet extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('OutletModel', 'model');
        $this->load->library('upload');
        $this->load->library('session');
        
    }
    public function index()
    {
        $data['outlet'] = $this->model->getOutletList();
        $this->load->view("admin/templates/header");
        $this->load->view("admin/outlet/list_outlet", $data);
        $this->load->view("admin/templates/footer");
    }

    function delete($id)
    {
        if ($this->model->delete($id)) {
            $this->session->set_flashdata('message', "Berhasil Hapus Data!!");
            $this->session->set_flashdata('state', true);
            redirect('admin/outlet');
        } else {
            $this->session->set_flashdata('message', "Gagal Tambah Data!");
            $this->session->set_flashdata('state', false);
            redirect('admin/outlet');
        }
    }

    public function edit($id)
    {
        $data['outlet'] = $this->model->getOutletById($id);
        $this->load->view("admin/templates/header");
        $this->load->view("admin/outlet/edit_outlet", $data);
        $this->load->view("admin/templates/footer");

        if(isset($_POST['submit'])){
            $this->model->editOutlet($id);
            redirect('admin/outlet');
        }
    }

    function go($username){
        $this->session->set_userdata('outlet',$username);
        redirect('pos/pos');
    }

    public function create()
    {
        $this->load->view('admin/templates/header');
        $this->load->view('admin/outlet/tambah_outlet');
        $this->load->view('admin/templates/footer');

        if(isset($_POST['submit'])){
            $this->model->tambahOutlet();
            redirect('admin/outlet');
        }
    }



}
