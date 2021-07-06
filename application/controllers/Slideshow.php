<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slideshow extends CI_Controller {

    public function __construct(){
		parent::__construct();
        checkSessionUser();
        // $loginstatus = $this->session->userdata('role');
        //  if($loginstatus!="SUPERADMIN"){
        //     redirect('my404');
        $this->load->model("Model_slideshow");
        }

    public function index() {
    	$data['slide'] = $this->Model_slideshow->getSlide();
    	$this->template->load("template", "slideshow/data-slideshow", $data);
    }

    public function add_slide(){
        $slide_title = $this->input->post('slide_title');
        $slide_description = $this->input->post('slide_description');
        $is_seen = $this->input->post('is_seen');

        $dataSlide = array(
            'slide_title' => $slide_title,
            'slide_description' => $slide_description,
            'is_seen' => $is_seen
        );

        if(isset($_FILES['slide_image'])) {
            $config['upload_path']= './file/slide/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['file_name'] = 'Slide_'.$slide_title.' '.date("d-m-y");
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if(isset($_FILES['slide_image'])){
                if ($this->upload->do_upload('slide_image')){
                    $slide_image = $this->upload->data();
                    $dataSlide["slide_image"] = $slide_image["file_name"];
                }                    
            }
        }

        // print_r($dataSlide);

        $addSlide = $this->Model_slideshow->addSlide($dataSlide);
        if($addSlide){
            $this->session->set_flashdata("success", "Sukses");
        } else {
            $this->session->set_flashdata("error", "Gagal");
        }

        redirect('slideshow');
    }

    public function edit_slide($idSlide){
        $id_slide = $this->input->post('id_slide');
        $slide_title = $this->input->post('slide_title');
        $slide_description = $this->input->post('slide_description');
        $is_seen = $this->input->post('is_seen');

        $editData = array(
            'slide_title' => $slide_title,
            'slide_description' => $slide_description,
            'is_seen' => $is_seen
        );

        if($_FILES['slide_image']['name'] != ""){
            $config['upload_path'] = './file/slide/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['file_name'] = 'Slide_'.$slide_title.' '.date("d-m-y");
            $config['max_size'] = 2024;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if($_FILES['slide_image']['name'] != ""){
                if ($this->upload->do_upload('slide_image')){
                    $slide_image = $this->upload->data();
                    $editData["slide_image"] = $slide_image["file_name"];
                }                    
            }
        }
        // print_r($editData);
        // $gambar = $this->db->get_where('tbl_slide',['id_slide' => $id_slide])->row();
        //     unlink("file/slide/".$gambar->slide_image);
        $editQuery = $this->Model_slideshow->editSlide($editData, $idSlide);
        if($editQuery){
            $this->session->set_flashdata("success", "Sukses");
        } else {
            $this->session->set_flashdata("error", "Gagal");
        }
        redirect('slideshow');
    }
}