<?php

class OutletModel extends CI_Model
{
    function getOutletList()
    {
        return $this->db->get('kasir_outlet')->result_array();
    }

    function getOutletById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('kasir_outlet')->result_array();
    }

    function tambahOutlet()
    {
        $data = array(
            'outlet' => $this->input->post('outlet', true),
            'password' => $this->input->post('password', true)
        );

        $data2 = array(
            'id_cart' => 1,
            'outlet' => $this->input->post('outlet', true)
        );
        $this->db->insert('kasir_outlet', $data);
        $this->db->insert('kasir_helper_idcart', $data2);
    }

    function editOutlet($id)
    {
        $data = array(
            'outlet' => $this->input->post('outlet', true),
            'password' => $this->input->post('password', true)
        );
        $this->db->where('id', $id);
        $this->db->update('kasir_outlet', $data);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('kasir_outlet');
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
