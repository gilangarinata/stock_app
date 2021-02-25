<?php

class SusuModel extends CI_Model
{
    function getOutletList()
    {

        return $this->db->get('kasir_outlet')->result_array();
    }

    function getStock($idOutlet,$idProduct)
    {
        $this->db->where('product_id', $idProduct);
        $this->db->where('outlet', $idOutlet);
        $this->db->where('isSusu', 0);
        return $this->db->get('kasir_stock_outlet')->result_array();
    }

    function getProdukList()
    {
        return $this->db->get('kasir_maktam_susu')->result_array();
    }

    function getProdukById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('kasir_maktam_susu')->result_array();
    }

    function tambahProduk()
    {
        $data = array(
            'nama_produk' => $this->input->post('nama_produk', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'harga' => $this->input->post('harga', true),
            'stock' => $this->input->post('stock', true),
            'kategori' => $this->input->post('kategori', true),
            'es' => $this->input->post('es', true),
            'gambar' => $this->_uploadImage(),
            
        );
        $this->db->insert('kasir_maktam_susu', $data);
    }

    function getKategori()
    {
        return $this->db->get('kasir_maktam_susu_kategori')->result_array();
    }

    function getEditKategori($id){
        $this->db->where('id', $id);
        return $this->db->get('kasir_maktam_susu_kategori')->result_array();
    }

    function editCategory(){
        $data = array(
            'nama_produk' => $this->input->post('nama_produk', true)            
        );
        $this->db->where('id', $this->input->post('id', true));
        $this->db->update('kasir_maktam_susu_kategori', $data);
    }

    function tambahKategori()
    {
        $data = array(
            'nama_produk' => $this->input->post('nama_produk', true)            
        );
        $this->db->insert('kasir_maktam_susu_kategori', $data);
    }

    function deleteKategori($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('kasir_maktam_susu_kategori');
    }

    function editProduk($id)
    {
        if (!empty($_FILES["image"]["name"])) {
            $gambar = $this->_uploadImage();  
            $data = array(
                'nama_produk' => $this->input->post('nama_produk', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'harga' => $this->input->post('harga', true),
                'stock' => $this->input->post('stock', true),
                'kategori' => $this->input->post('kategori', true),
                'es' => $this->input->post('es', true),
                'gambar' => $gambar
            ); 
        }else{
            $data = array(
                'nama_produk' => $this->input->post('nama_produk', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'harga' => $this->input->post('harga', true),
                'stock' => $this->input->post('stock', true),
                'kategori' => $this->input->post('kategori', true),
                'es' => $this->input->post('es', true)
            );
        }


        $this->db->where('id', $id);
        $this->db->update('kasir_maktam_susu', $data);
    }

    function editStock($idOutlet,$idProduct)
    {

        $info = array(
            'product_id' => $idProduct,
            'outlet' => $idOutlet
        );

        $data = array(
            'product_id' => $idProduct,
            'outlet' => $idOutlet,
            'stock' => $this->input->post('stock', true),
            'isSusu' => 0,
        );

        if($this->db->get_where('kasir_stock_outlet',$info)->num_rows()>0){
            $this->db->where('product_id', $idProduct);
            $this->db->where('outlet', $idOutlet);
            $this->db->update('kasir_stock_outlet', $data);
        }else{
            $this->db->insert('kasir_stock_outlet', $data);
        }
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('kasir_maktam_susu');
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './assets/upload/product/';
        $config['allowed_types']        = 'gif|jpg|png';
        // $config['file_name']            = $this->product_id;
        $config['overwrite']            = true;
        $config['max_size']             = 10000; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }else{
            return $this->upload->display_errors();
        }
    }
}
