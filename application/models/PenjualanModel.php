<?php

class PenjualanModel extends CI_Model
{
    function getPenjualanList()
    {
        return $this->db->get('kasir_dashboard_pembayaran')->result_array();
    }

    function getPenjualanListFilter()
    {

        $tgl = date('d/m/Y', strtotime($this->input->post('tanggal')));

        $this->db->like('tanggal',$tgl);
        $this->db->like('shift', $this->input->post('shift1'));
        return $this->db->get('kasir_dashboard_pembayaran')->result_array();
    }

    function getCartList()
    {
        return $this->db->get('kasir_dashboard_keranjang')->result_array();
    }

    function getCartListFilter()
    {
        return $this->db->get('kasir_dashboard_keranjang')->result_array();
    }

    function getCart($id)
    {
        // $data = array(
        //     'cart_id'=> $id
        // );
        $this->db->get('kasir_dashboard_keranjang');
    }
}