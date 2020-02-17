<?php

class CartModel extends CI_Model {

public function getCartList($outlet){
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

function delete($id)
{
    $this->db->where('id', $id);
    return $this->db->delete('kasir_dashboard_keranjang');
}

function pdfGetProduk($outlet)
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
        'cart_id' => $cartid-1,
        'outlet' => $outlet
    );

    return $this->db->get_where('kasir_dashboard_keranjang',$info)->result_array();
}

function pdfGetDetails($outlet)
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
        'cart_id' => $cartid-1,
        'outlet' => $outlet
    );

    return $this->db->get_where('kasir_dashboard_pembayaran',$info)->result_array();
}

function pdfGetAlamat($outlet)
{
    $info = array(
        'outlet' => $outlet
    );
    return $this->db->get_where('kasir_outlet',$info)->result_array();
}



function addPembayaran($outlet)
{      
    $datas = array(
        'outlet'=>$outlet
    );
    $cartid = 0;
    $cu_id = 1;
    $cart_id = $this->db->order_by("id","desc");
    $cart_id = $this->db->limit(1);
    $cart_id = $this->db->get_where('kasir_helper_idcart',$datas)->result_array();
    
    foreach($cart_id as $idcart){
       $cartid = $idcart["id_cart"];
    }
    
    $data = array(
        'cart_id' => $cartid,
        'total' => $this->input->post("totalall"),
        'metode_pembayaran' => $this->input->post("metode"),
        'jumlah_bayar' => $this->input->post("jumlah_bayar"),
        'kembali' => $this->input->post("kembali"),
        'tanggal' => $this->input->post("tanggal"),
        'outlet' => $outlet,                 
        'shift' => $this->input->post("shift"),
        'nama' => $this->input->post("nama")
    );

    $this->db->insert("kasir_dashboard_pembayaran",$data);

    $cu_id = $cu_id + $cartid;

    $data2 = array(
        'id' => null,
        'id_cart' => $cu_id,
        'outlet' => $outlet
    );

    $this->db->insert("kasir_helper_idcart",$data2);
}


}
