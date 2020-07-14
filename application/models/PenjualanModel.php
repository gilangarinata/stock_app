<?php

class PenjualanModel extends CI_Model
{
    function getPenjualanList()
    {
        date_default_timezone_set('Asia/Jakarta');
        $dateNow = date("d/m/Y");
        $this->db->like('tanggal',$dateNow);
        return $this->db->get('kasir_dashboard_pembayaran')->result_array();
    }

    function getModalListFilter()
    {
        $tgl = date('d/m/Y', strtotime($this->input->post('tanggal')));
        $this->db->like('tanggal_lengkap', $tgl);
        return $this->db->get('kasir_info_kasir')->result_array();
    }

    function getModalList()
    {
        date_default_timezone_set('Asia/Jakarta');
        $dateNow = date("d/m/Y");
        $this->db->like('tanggal_lengkap', $dateNow);
        return $this->db->get('kasir_info_kasir')->result_array();
    }

    function getOutletList()
    {

        return $this->db->get('kasir_outlet')->result_array();
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

        $tanggal = $this->input->post("tanggal");
        $bulan = $this->input->post("bulan");
        $tahun = $this->input->post("tahun");

        $formTgl = $tanggal."/".$bulan."/".$tahun;
        $formBln = $bulan."/".$tahun;
        $formThn = $tahun;

        if(!empty($tahun)){
            if(!empty($bulan)){
                if(!empty($tanggal)){
                    $datas = array(
                        'tanggal'=> $formTgl
                    );
                }else{
                    $datas = array(
                        'bulan'=> $formBln
                    );
                }
            }else{
                $datas = array(
                    'tahun'=> $formThn
                );
            }

            $this->db->distinct();
            $this->db->select('nama_produk');
            $produkArr = $this->db->get_where('kasir_dashboard_keranjang',$datas)->result_array();

        }else{
            $this->db->distinct();
            $this->db->select('nama_produk');
            $produkArr = $this->db->get('kasir_dashboard_keranjang')->result_array();
        }
        
        $object = array();


        foreach($produkArr as $produkArr){
        
            if(!empty($tahun)){
                if(!empty($bulan)){
                    if(!empty($tanggal)){
                        $datas = array(
                            'nama_produk'=> $produkArr['nama_produk'],
                            'tanggal'=> $formTgl
                        );
                    }else{
                        $datas = array(
                            'nama_produk'=> $produkArr['nama_produk'],
                            'bulan'=> $formBln
                        );
                    }
                }else{
                    $datas = array(
                        'nama_produk'=> $produkArr['nama_produk'],
                        'tahun'=> $formThn
                    );
                }
    
                $jmlArr = $this->db->get_where('kasir_dashboard_keranjang',$datas)->result_array();
    
            }else{
                $datas = array(
                    'nama_produk'=> $produkArr['nama_produk']
                );

                $jmlArr = $this->db->get_where('kasir_dashboard_keranjang',$datas)->result_array();
            }

            

            foreach($jmlArr as $jmlh){
                $jml = $jml + (int)$jmlh['jumlah'];
            }

           $jumlah[$i] = $jml;
           $produk[$i] = $produkArr['nama_produk'];

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

    function getRekapHarian($tgl)
    {

        $data = array(
            'tanggal_lengkap' => $tgl,
        );

        return $this->db->get_where('kasir_info_kasir', $data)->result_array();
    }

    function getAnalisisListFilter()
    {
        $outlet = $this->input->post('outlet');
        $produk = array();
        $jumlah = array();

        $jml = 0;
        $i = 0;

        $tanggal = $this->input->post("tanggal");
        $bulan = $this->input->post("bulan");
        $tahun = $this->input->post("tahun");

        $formTgl = $tanggal."/".$bulan."/".$tahun;
        $formBln = $bulan."/".$tahun;
        $formThn = $tahun;


        if(!empty($tahun)){
            if(!empty($bulan)){
                if(!empty($tanggal)){
                    $datas = array(
                        'outlet'=> $outlet,
                        'tanggal'=> $formTgl
                    );
                }else{
                    $datas = array(
                        'outlet'=> $outlet,
                        'bulan'=> $formBln
                    );
                }
            }else{
                $datas = array(
                    'outlet'=> $outlet,
                    'tahun'=> $formThn
                );
            }



            $this->db->distinct();
            $this->db->select('nama_produk');
            $produkArr = $this->db->get_where('kasir_dashboard_keranjang',$datas)->result_array();

        }else{
            $datas = array(
                'outlet'=> $outlet
            );


            $this->db->distinct();
            $this->db->select('nama_produk');
            $produkArr = $this->db->get_where('kasir_dashboard_keranjang',$datas)->result_array();
        }
        

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

