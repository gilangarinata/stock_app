<?php

class ProductModel extends CI_Model
{
    function getProductList()
    {
        $query = $this->input->get("q");
        $desc = $this->input->get("desc");
        if($query == NULL){
            if($desc != NULL){
                if($desc === "true"){
                    $this->db->order_by('id', "DESC");
                }else{
                    $this->db->order_by('id', "ASC");
                }
            }
            $this->db->limit(600);
            return $this->db->get_where('product')->result_array();
        }else{
            $this->db->like('name', $query);
            $this->db->or_like('code', $query);
            $this->db->or_like('price', $query);
            $this->db->or_like('sellPrice', $query);
            $this->db->or_like('distributor', $query);
            $this->db->or_like('address', $query);
            return $this->db->get_where('product')->result_array();
        }
    }

    function getProductById($id)
    {
        $data = array(
            'id' => $id
        );
        return $this->db->get_where('product',$data)->row_array();
    }

    function import_code()
    {
        $lala =  $this->db->get('selling')->result_array();
        for($i = 0; $i < sizeof($lala); $i++){
            $productId = $lala[$i]["product_id"];
            $id = $lala[$i]["id"];

            $currentProduct = $this->getProductById($productId);
            $code = $currentProduct["code"];

            
            $data = array(
                'product_code' => $code
            );
        
            $this->db->where('id', $id);
            $this->db->update("selling",$data);
        }
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('product');
    }

    function add_dummies(){
        for($i = 0; $i < 2000; $i++){
            $data = array(
                'name' => "Product " . $i,
                'code' => "B982-" . $i,
                'price' => 10 * $i,
                'sellPrice' => 12 * $i,
                'distributor' => "PT. BURUH CITRA" . $i,
                'address' => "Jalan Subakti No " . $i,
                'images1' => "",
                'images2' => "",                 
                'images3' => "",
                'images4' => "",                 
                'sold' => "",
                'stock' => 2 * $i,
                'stock_type' => "PCS"      
            );
    
            $this->db->insert("product",$data);
        }    
    }

    function add_product(){
        $images1 = $this->_uploadImage(str_replace(" ","-",$this->input->post("name")). "1","myimage");
        $images2 = $this->_uploadImage(str_replace(" ","-",$this->input->post("name")). "2","myimage2");
        $images3 = $this->_uploadImage(str_replace(" ","-",$this->input->post("name")). "3","myimage3");
        $images4 = $this->_uploadImage(str_replace(" ","-",$this->input->post("name")). "4","myimage4");
        $data = array(
            'name' => $this->input->post("name"),
            'code' => $this->input->post("code"),
            'price' => $this->input->post("price"),
            'sellPrice' => $this->input->post("sellPrice"),
            'distributor' => $this->input->post("distributor"),
            'address' => $this->input->post("address"),
            'images1' => $images1,
            'images2' => $images2,                 
            'images3' => $images3,
            'images4' => $images4,                 
            'sold' => "",
            'stock' => $this->input->post("stock"),
            'stock_type' => $this->input->post("stock_type")      
        );
    
        $this->db->insert("product",$data);
    }

    function update_product($id){
        $images1 = $this->_uploadImage(str_replace(" ","-",$this->input->post("name")) . "1","myimage");
        $images2 = $this->_uploadImage(str_replace(" ","-",$this->input->post("name")) . "2","myimage2");
        $images3 = $this->_uploadImage(str_replace(" ","-",$this->input->post("name")) . "3","myimage3");
        $images4 = $this->_uploadImage(str_replace(" ","-",$this->input->post("name")) . "4","myimage4");

        $isImgErr1 = substr($images1,0,5);
        $isImgErr2 = substr($images2,0,5); 
        $isImgErr3 = substr($images3,0,5);
        $isImgErr4 = substr($images4,0,5);

        if(strcmp($isImgErr1, "ERROR")  === 0 ){
            $images1 = $this->input->post("images1");
        }
        if($isImgErr2 == "ERROR"){
            $images2 = $this->input->post("images2");
        }
        if($isImgErr3 == "ERROR"){
            $images3 = $this->input->post("images3");
        }
        if($isImgErr4 == "ERROR"){
            $images4 = $this->input->post("images4");
        }

        $data = array(
            'name' => $this->input->post("name"),
            'code' => $this->input->post("code"),
            'price' => $this->input->post("price"),
            'sellPrice' => $this->input->post("sellPrice"),
            'distributor' => $this->input->post("distributor"),
            'address' => $this->input->post("address"),
            'stock' => $this->input->post("stock"),
            'stock_type' => $this->input->post("stock_type"),
            'images1' => $images1,
            'images2' => $images2,
            'images3' => $images3,
            'images4' => $images4,
        );

    
        $this->db->where('id', $id);
        $this->db->update("product",$data);
    }

    function add_image($id){
        // $id = $this->input->get("id",0);
        // $data = array(
        //     'path' => $this->_uploadImage(),
        //     'product_id' => $id
        // );
        // $this->db->insert('images', $data);
    }

    function remove_image(){
        $id = $this->input->get("id",0);
        $this->db->where('id', $id);
        $this->db->delete();
    }

    function sell_product($id)
    {
        date_default_timezone_set('Asia/Jakarta');

        $productName = $this->getProductById($id)["name"];
        $productCode = $this->getProductById($id)["code"];
        $currentSold = $this->getProductById($id)["sold"];
        $price = $this->getProductById($id)["sellPrice"];
        $currentStock = $this->getProductById($id)["stock"];
        $stock = $currentStock - $this->input->post("sold");
        $sold = $currentSold + $this->input->post("sold");
        $dataProduct = array(                
            'sold' => $sold,
            'stock' => $stock    
        );
        $this->db->where('id', $id);
        $this->db->update("product",$dataProduct);

        $totalPrice = $this->input->post("sold") * $price;
        $dataSelling = array(                
            'product_id' => $id,
            'product_code' => $productCode,
            'product_name' => $productName,
            'date' => date('d-m-Y H:i:s'),
            'date_s' => date('d'),
            'month_s' => date('m'),
            'year_s' => date('Y'),
            'totalSold' => $this->input->post("sold"),
            'totalPrice' => $totalPrice 
        );
        $this->db->insert("selling",$dataSelling);
    }

    function get_sellings(){
        return $this->db->get("selling")->result_array();
    }

    function get_sellings_by_product_id(){
        $productId = $this->input->get("product_id");
        $data = array(                
            'product_id' => $productId,
        );
        return $this->db->get_where("selling",$data)->result_array();
    }

    function get_selling_by_month($month,$year){
        $where = array(                
            'month_s' => $month,
            'year_s' => $year
        );
        return $this->db->get_where("selling",$where)->result_array();
    }

    function get_selling_by_month_w_product_id($month,$year){
        $productId = $this->input->get("product_id");
        $where = array(                
            'month_s' => $month,
            'year_s' => $year,
            'product_id' => $productId,

        );
        return $this->db->get_where("selling",$where)->result_array();
    }


    private function _uploadImage($id, $imageId)
    {

        $config['upload_path']          = "./assets/";
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $id;
        $config['overwrite']            = true;
        $config['max_size']             = 100000; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $prefix = "assets/";

        if ($this->upload->do_upload($imageId)) {

            return $prefix . $this->upload->data("file_name");
        }else{


            return "ERROR allala" . $this->upload->display_errors();
        }
    }
}
