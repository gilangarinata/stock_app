<?php

class PenjualanModel extends CI_Model
{
    function getPenjualanList()
    {
        return $this->db->get('kasir_dashboard_pembayaran')->result_array();
    }

    function getOutlet()
    {
        return $this->db->get('kasir_outlet')->result_array();
    }

    function getAnalisis()
    {
        $produk = array();
        $jumlah = array();

        $jml = 0;
        $i = 0;

        $this->db->distinct();
        $this->db->select('nama_produk');
        $produkArr = $this->db->get('kasir_dashboard_keranjang')->result_array();

        $object = array();

        foreach($produkArr as $produkArr){
            $produk[$i] = $produkArr['nama_produk'];
            
            $datas = array(
                'nama_produk'=> $produkArr['nama_produk']
            );

            $jmlArr = $this->db->get_where('kasir_dashboard_keranjang',$datas)->result_array();

            foreach($jmlArr as $jmlh){
                $jml = $jml + (int)$jmlh['jumlah'];
            }

           $jumlah[$i] = $jml;

            $jml = 0;
            $i++;
        }

        $object = array($produk,$jumlah);

        return $object;
    }

    function getAnalisisOutlet()
    {
        $produk = array();
        $jumlah = array();

        $jml = 0;
        $i = 0;

        $this->db->distinct();
        $this->db->select('outlet');
        $produkArr = $this->db->get('kasir_dashboard_keranjang')->result_array();

        $object = array();

        foreach($produkArr as $produkArr){
            $produk[$i] = $produkArr['outlet'];
            
            $datas = array(
                'outlet'=> $produkArr['outlet']
            );

            $jmlArr = $this->db->get_where('kasir_dashboard_keranjang',$datas)->result_array();

            foreach($jmlArr as $jmlh){
                $jml = $jml + (int)$jmlh['jumlah'];
            }

           $jumlah[$i] = $jml;

            $jml = 0;
            $i++;
        }

        $object = array($produk,$jumlah);

        return $object;
    }

    function getPenjualanListFilter()
    {

        $tgl = date('d/m/Y', strtotime($this->input->post('tanggal')));

        $this->db->like('tanggal',$tgl);
        $this->db->like('shift', $this->input->post('shift1'));
        return $this->db->get('kasir_dashboard_pembayaran')->result_array();
    }

    function getAnalisisListFilter()
    {
        $outlet = $this->input->post('outlet');
        $produk = array();
        $jumlah = array();

        $jml = 0;
        $i = 0;

        $data = array(
            'outlet'=> $outlet
        );

        $this->db->distinct();
        $this->db->select('nama_produk');
        $produkArr = $this->db->get_where('kasir_dashboard_keranjang',$data)->result_array();

        $object = array();

        foreach($produkArr as $produkArr){
            $produk[$i] = $produkArr['nama_produk'];
            
            $datas = array(
                'nama_produk'=> $produkArr['nama_produk']
            );

            $jmlArr = $this->db->get_where('kasir_dashboard_keranjang',$datas)->result_array();

            foreach($jmlArr as $jmlh){
                $jml = $jml + (int)$jmlh['jumlah'];
            }

           $jumlah[$i] = $jml;

            $jml = 0;
            $i++;
        }

        $object = array($produk,$jumlah);

        return $object;
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

