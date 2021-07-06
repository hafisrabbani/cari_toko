<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct(){
		parent::__construct();
        checkSessionUser();
        // $loginstatus = $this->session->userdata('role');
        //  if($loginstatus!="SUPERADMIN"){
        //     redirect('my404');
        $this->load->model("Model_product");
        $this->load->model("Model_olshop");
        }

    public function index() {
    	$data['product'] = $this->Model_product->getProduct();
        $data['category'] = $this->Model_product->listCategory();
        $data['olshop'] = $this->Model_olshop->getOlshop($this->session->userdata('id_user'));
    	$this->template->load("template", "product/data-product", $data);
    }

    public function add_product(){
        $id_category = $this->input->post('id_category');
        $product_name = $this->input->post('product_name');
        $product_description = $this->input->post('product_description');
        $product_price = $this->input->post('product_price');
        $is_seen = $this->input->post('is_seen');

        $addData = array(
            'id_olshop' => $this->session->userdata('id_olshop'),
            'id_category' => $id_category,
            'product_name' => $product_name,
            'product_description' => $product_description,
            'product_price' => $product_price,
            'is_seen' => $is_seen
        );

        if(isset($_FILES['product_image'])) {
            // $newname = $this->session->userdata('username');
            $config['upload_path']= './file/product/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            // $config['encrypt_name'] = $this->session->userdata('username');
            $config['file_name'] = 'Product_'.$product_name;
            // $config['max_size'] = 2048;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if(isset($_FILES['product_image'])){
                if ($this->upload->do_upload('product_image')){
                    $product_image = $this->upload->data();
                    $config['image_library']='gd2';
                    $config['source_image']='./file/product/'.$product_image['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '50%';
                    $config['width']= 600;
                    $config['height']= 400;
                    $config['new_image']= './file/product/'.$product_image['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $addData["product_image"] = $product_image["file_name"];
                }                    
            }
        }
        
        $queryAdd = $this->Model_product->addProduct($addData);
        if($queryAdd){
            $this->session->set_flashdata("success", "Sukses");
        } else {
            $this->session->set_flashdata("error", "Gagal");
        }

        redirect('product');
    }

    public function edit_product($idProduct){
        $id_category = $this->input->post('id_category');
        $product_name = $this->input->post('product_name');
        $product_description = $this->input->post('product_description');
        $product_price = $this->input->post('product_price');
        $is_seen = $this->input->post('is_seen');

        $editData = array(
            'id_category' => $id_category,
            'product_name' => $product_name,
            'product_description' => $product_description,
            'product_price' => $product_price,
            'is_seen' => $is_seen
        );

        if($_FILES['product_image']['name'] != ""){
            $config['upload_path'] = './file/product/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['file_name'] = 'Product_'.$product_name.' '.date("d-m-y");
            $config['max_size'] = 2024;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if($_FILES['product_image']['name'] != ""){
                if ($this->upload->do_upload('product_image')){
                    $product_image = $this->upload->data();
                    $config['image_library']='gd2';
                    $config['source_image']='./file/product/'.$product_image['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '50%';
                    $config['width']= 600;
                    $config['height']= 400;
                    $config['new_image']= './file/product/'.$product_image['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $editData["product_image"] = $product_image["file_name"];
                }                    
            }
        }

        

        $editQuery = $this->Model_product->editProduct($editData, $idProduct);
        if ($editQuery) {
            // $gambar = $this->db->get_where('tbl_product',['id_product' => $id_product])->row();
            // unlink("file/product/".$gambar->product_image);
            $this->session->set_flashdata("success", "Sukses");
        } else {
            $this->session->set_flashdata("error", "Gagal");
        }
        redirect('product');
        // print_r($editData);
    }
}