<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct(){
		parent::__construct();
        checkSessionUser();
        // $loginstatus = $this->session->userdata('role');
        //  if($loginstatus!="SUPERADMIN"){
        //     redirect('my404');
        $this->load->model("Model_category");
        }

    public function index() {
    	$data['category'] = $this->Model_category->getCategory();
    	$this->template->load("template", "category/data-category", $data);
    }

    public function add_category(){
        $category_name = $this->input->post('category_name');
        $category_description = $this->input->post('category_description');
        $is_seen = $this->input->post('is_seen');

        $dataAdd = array(
            'category_name' => $category_name,
            'category_description' => $category_description,
            'is_seen' => $is_seen
        );

        if(isset($_FILES['category_image'])) {
            // $newname = $this->session->userdata('username');
            $config['upload_path']= './file/product_category/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            // $config['encrypt_name'] = $this->session->userdata('username');
            $config['file_name'] = 'Category_'.$category_name.' '.date("d-m-y");
            // $config['max_size'] = 2048;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if(isset($_FILES['category_image'])){
                if ($this->upload->do_upload('category_image')){
                    $category_image = $this->upload->data();
                    $config['image_library']='gd2';
                    $config['source_image']='./file/product_category/'.$category_image['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '50%';
                    $config['width']= 600;
                    $config['height']= 400;
                    $config['new_image']= './file/product_category/'.$category_image['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $dataAdd["category_image"] = $category_image["file_name"];
                }                    
            }
        }
        $addQuery = $this->Model_category->addCategory($dataAdd);
        if($addQuery){
            $this->session->set_flashdata("success", "Sukses");
        } else {
            $this->session->set_flashdata("error", "Gagal");
        }
        redirect('category');
        // print_r($dataAdd);
    }

    public function edit_category($idCategory){
        $category_name = $this->input->post('category_name');
        $category_description = $this->input->post('category_description');
        $is_seen = $this->input->post('is_seen');

        $editData = array(
            'category_name' => $category_name,
            'category_description' => $category_description,
            'is_seen' => $is_seen
        );

        if($_FILES['category_image']['name'] != ""){
            $config['upload_path'] = './file/product_category/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['file_name'] = 'Category_'.$category_name.' '.date("d-m-y");
            $config['max_size'] = 2024;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if($_FILES['category_image']['name'] != ""){
                if ($this->upload->do_upload('category_image')){
                    $category_image = $this->upload->data();
                    $config['image_library']='gd2';
                    $config['source_image']='./file/product_category/'.$category_image['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '50%';
                    $config['width']= 600;
                    $config['height']= 400;
                    $config['new_image']= './file/product_category/'.$category_image['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $editData["category_image"] = $category_image["file_name"];
                }                    
            }
        }
        $editQuery = $this->Model_category->editCategory($editData, $idCategory);
        // print_r($editData);
        if($editQuery){
            $this->session->set_flashdata("success", "Sukses");
        } else {
            $this->session->set_flashdata("error", "Gagal");
        }
        redirect('category');
    }
}