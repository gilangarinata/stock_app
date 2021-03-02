<?php

class PosModel extends CI_Model {

    function getStock()
    {
        return $this->db->get('kasir_stock_outlet')->result_array();
    }

    function getSusuList()
    {
        return $this->db->get('kasir_maktam_susu')->result_array();
    }

    function getProdukLainList()
    {
        return $this->db->get('kasir_maktam_produklain')->result_array();
    }

    function getKategoriProdukLainList()
    {
        return $this->db->get('kasir_maktam_produklain_kategori')->result_array();
    }

    function getJumlahProduk($outlet)
    {
        $datas = array(
            'outlet'=>$outlet
        );

        $cartid = 0;
        $cart_id = $this->db->order_by("id","desc");
        $cart_id = $this->db->limit(1);
        $cart_id = $this->db->get_where('kasir_helper_idcart',$datas)->result_array();
        
        foreach($cart_id as $idcart){
           $cartid = $idcart["id_cart"];
        }

        $info = array(
            'cart_id' => $cartid,
            'outlet' => $outlet
        );

        return $this->db->get_where('kasir_dashboard_keranjang',$info)->result_array();
    }

    function authProcess($username,$password)
    {
        $data = array(
            'outlet' => $username,
            'password' => $password
        );

        $state = false;
        if($this->db->get_where('kasir_outlet',$data)->num_rows()>0){
            $state = true;
        }
        return $state;
    }

    function addproduksusu($id,$nama,$harga,$outlet)
    {
        date_default_timezone_set('Asia/Jakarta');

        $datas = array(
            'outlet'=>$outlet
        );
        $cartid = 0;
        $cart_id = $this->db->order_by("id","desc");
        $cart_id = $this->db->limit(1);
        $cart_id = $this->db->get_where('kasir_helper_idcart',$datas)->result_array();
        
        foreach($cart_id as $idcart){
           $cartid = $idcart["id_cart"];
        }

        $jumlah= 1;

        $deskripsi = "";
        $es = "";
        $gambar = "";



        $info2 = array(
            'id' => $id,
        );
        $info = array(
            'nama_produk' => $nama,
            'cart_id' => $cartid,
            'outlet' => $outlet
        );

        $jmlh = $this->db->get_where('kasir_dashboard_keranjang',$info)->result_array(); 
        $susu = $this->db->get_where('kasir_maktam_susu',$info2)->result_array();

        foreach($susu as $susu){
            $deskripsi = $susu['deskripsi'];
            $es = $susu['es'];
            $gambar = $susu['gambar'];
        }


        foreach($jmlh as $jmlh){
            $jumlah = $jmlh['jumlah'];
        }

        if($this->db->get_where('kasir_dashboard_keranjang',$info)->num_rows()>0){
            $jumlah ++;
        }

        $data = array(
            'nama_produk' => $nama,
            'harga' => $harga,
            'jumlah' => $jumlah,
            'deskripsi' => $deskripsi,
            'es' => $es,
            'gambar' => $gambar,
            'total' => $jumlah*$harga,
            'cart_id' => $cartid,
            'outlet' => $outlet,
            'tanggal' => date('d/m/Y'),
            'bulan' => date('m/Y'),
            'tahun' => date('Y'),     
            'product_id' => $id,
            'type' => 1  
        );


        if($this->db->get_where('kasir_dashboard_keranjang',$info)->num_rows()>0){
            $this->db->where('nama_produk', $nama);
            $this->db->where('cart_id', $cartid);
            $this->db->where('outlet', $outlet);
            $this->db->update('kasir_dashboard_keranjang', $data);
        }else{
            $this->db->insert('kasir_dashboard_keranjang', $data);
        }
    }

    function getPenjualanList($outlet)
    {
        $datas = array(
            'outlet'=>$outlet
        );
        return $this->db->get_where('kasir_harian',$datas)->result_array();
    }

    function hapusPenjualan($outlet,$tanggal,$shift)
    {
        $this->db->where('tanggal', str_replace('-','/',$tanggal));
        $this->db->where('shift', $shift);
        $this->db->where('outlet', $outlet);
        return $this->db->delete('kasir_harian');
    }

    function hapusPembayaran($outlet,$tanggal,$shift)
    {
        $this->db->like('tanggal', str_replace('-','/',$tanggal));
        $this->db->where('shift', $shift);
        $this->db->where('outlet', $outlet);
        return $this->db->delete('kasir_dashboard_pembayaran');
    }

    function getDetailPenjualan($tanggal,$shift,$outlet)
    {

        $datas = array(
            'outlet'=>$outlet,
            'shift'=>$shift
        );
        $this->db->like('tanggal', str_replace('-','/',$tanggal));
        return $this->db->get_where('kasir_dashboard_pembayaran',$datas)->result_array();
    }

    function getModalList($outlet,$tanggal,$shift)
    {
        $datas = array(
            'outlet'=>$outlet
        );

        $this->db->like('tanggal_lengkap', str_replace('-','/',$tanggal));
        return $this->db->get_where('kasir_info_kasir',$datas)->result_array();
    }

    function setModalPengeluaran($outlet,$tanggal,$shift)
    {
        $info = array(
            'tanggal_lengkap' => str_replace('-','/',$tanggal),
            'outlet' => $outlet,   
            'shift' => $shift              
        );
        $datas = array(
            'modal' => $this->input->post("modal"),
            'pengeluaran' => $this->input->post("pengeluaran"),
            'tanggal' => date('d'),
            'bulan' => date('m'),
            'tahun' => date('Y'),
            'jam' => date("H:i:s"),
            'outlet' => $outlet,                 
            'shift' => $shift,
            'nama' => "",
            'tanggal_lengkap' => str_replace('-','/',$tanggal)
        );


        if($this->db->get_where('kasir_info_kasir',$info)->num_rows()>0){
            $this->db->where('outlet', $outlet);
            $this->db->where('tanggal_lengkap', str_replace('-','/',$tanggal));
            $this->db->update('kasir_info_kasir', $datas);
        }else{
            $this->db->insert('kasir_info_kasir', $datas);
        }
    }

    function getCartList()
    {
        return $this->db->get('kasir_dashboard_keranjang')->result_array();
    }

    function getPenjualanListFilter($outlet)
    {
        $datas = array(
            'outlet'=>$outlet
        );
        $tgl = date('d/m/Y', strtotime($this->input->post('tanggal')));

        $this->db->like('tanggal',$tgl);
        $this->db->like('shift', $this->input->post('shift1'));
        return $this->db->get_where('kasir_dashboard_pembayaran',$datas)->result_array();
    }

    function addProdukLain($id,$nama,$harga,$outlet)
    {
        date_default_timezone_set('Asia/Jakarta');

        $datas = array(
            'outlet'=>$outlet
        );

        $cartid = 0;
        $cart_id = $this->db->order_by("id","desc");
        $cart_id = $this->db->limit(1);
        $cart_id = $this->db->get_where('kasir_helper_idcart',$datas)->result_array();
        
        foreach($cart_id as $idcart){
           $cartid = $idcart["id_cart"];
        }

        $jumlah= 1;

        $deskripsi = "";
        $es = "";
        $gambar = "";

        $info2 = array(
            'id' => $id,
        );
        $info = array(
            'nama_produk' => $nama,
            'cart_id' => $cartid,
            'outlet' => $outlet
        );

        $jmlh = $this->db->get_where('kasir_dashboard_keranjang',$info)->result_array(); 
        $produklain = $this->db->get_where('kasir_maktam_produklain',$info2)->result_array();

        foreach($produklain as $produklain){
            $deskripsi = $produklain['deskripsi'];
            $es = $produklain['es'];
            $gambar = $produklain['gambar'];
        }

        foreach($jmlh as $jmlh){
            $jumlah = $jmlh['jumlah'];
        }

        if($this->db->get_where('kasir_dashboard_keranjang',$info)->num_rows()>0){
            $jumlah ++;
        }

        $data = array(
            'nama_produk' => $nama,
            'harga' => $harga,
            'jumlah' => $jumlah,
            'deskripsi' => $deskripsi,
            'es' => $es,
            'gambar' => $gambar,
            'total' => $jumlah*$harga,
            'cart_id' => $cartid,
            'outlet' => $outlet,
            'tanggal' => date('d/m/Y'),
            'bulan' => date('m/Y'),
            'tahun' => date('Y'),
            'product_id' => $id,
            'type' => 2
        );


        if($this->db->get_where('kasir_dashboard_keranjang',$info)->num_rows()>0){
            $this->db->where('nama_produk', $nama);
            $this->db->where('cart_id', $cartid);
            $this->db->where('outlet', $outlet);
            $this->db->update('kasir_dashboard_keranjang', $data);
        }else{
            $this->db->insert('kasir_dashboard_keranjang', $data);
        }
    }

}