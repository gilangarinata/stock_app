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

function updateStock($cart){
    foreach ($cart as $cart) {
        if($cart['type']==='1'){
            $datas = array(
                'product_id'=>$cart['product_id'],
                'outlet'=>$this->session->userdata('outlet'),
                'isSusu'=>0
            );
            $result = $this->db->get_where('kasir_stock_outlet',$datas)->result_array();
            $stock=0;
            $id=0;
            foreach($result as $susu){
                $stock = $susu["stock"];
                $id = $susu["id"];
            }

            $currentStock = $stock - $cart['jumlah'];

            $data = array(
                'stock'=>$currentStock
            );

            $this->db->where('id', $id);
            $this->db->update('kasir_stock_outlet', $data);

        }else if($cart['type']==='2'){
            $datas = array(
                'product_id'=>$cart['product_id'],
                'outlet'=>$this->session->userdata('outlet'),
                'isSusu'=>1
            );
            $result = $this->db->get_where('kasir_stock_outlet',$datas)->result_array();
            $stock=0;
            $id=0;
            foreach($result as $susu){
                $stock = $susu["stock"];
                $id = $susu["id"];
            }

            $currentStock = $stock - $cart['jumlah'];

            $data = array(
                'stock'=>$currentStock
            );

            $this->db->where('id', $id);
            $this->db->update('kasir_stock_outlet', $data);
        }


    }


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
        'nama' => $this->input->post("nama"),
        'diskon' => $this->input->post("diskon"),
        'pajak' => $this->input->post("pajak"),
        'grand_total' => $this->input->post("grand_total")       
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

function addRekapHarian($outlet)
{   
    $data = array(
        'kasir' => $this->input->post("nama"),
        'tanggal' => substr($this->input->post("tanggal"),0,10),
        'shift' => $this->input->post("shift"),
        'outlet' => $outlet
    );

    $where = array(
        'tanggal' => substr($this->input->post("tanggal"),0,10),
        'shift' => $this->input->post("shift")
    );

    $data1 = array(
        'tanggal' => substr($this->input->post("tanggal"),0,10),
        'shift' => $this->input->post("shift"),
        'outlet' => $outlet
    );



    if($this->db->get_where('kasir_harian',$data1)->num_rows() > 0 ) {
        $this->db->where($where);
        $this->db->update('kasir_harian',$data);
    }else{
        $this->db->insert('kasir_harian',$data);
    }
}

function addKeterangan($outlet){
    date_default_timezone_set('Asia/Jakarta');

    $shift = $this->input->post("shift");

    $datas = array(
        'tanggal_lengkap'=> substr($this->input->post("tanggal"),0,10),
        'shift' => $shift,
        'outlet' => $outlet
    );

    $numrow = $this->db->get_where('kasir_info_kasir',$datas)->num_rows();

    $data = array(
        'modal' => $this->input->post("modal"),
        'pengeluaran' => $this->input->post("pengeluaran"),
        'tanggal' => date('d'),
        'bulan' => date('m'),
        'tahun' => date('Y'),
        'jam' => date("H:i:s"),
        'outlet' => $outlet,                 
        'shift' => $this->input->post("shift"),
        'nama' => $this->input->post("nama"),
        'tanggal_lengkap' => substr($this->input->post("tanggal"),0,10)
    );


        if($numrow>0){
            $this->db->where($datas);
            $this->db->update('kasir_info_kasir',$data);
        }else{
            $this->db->insert('kasir_info_kasir',$data);
        }
    
}
}
