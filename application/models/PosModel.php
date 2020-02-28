<?php

class PosModel extends CI_Model {
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
            'outlet' => $outlet           
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





    function addProdukLain($id,$nama,$harga,$outlet)
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
            'outlet' => $outlet          
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