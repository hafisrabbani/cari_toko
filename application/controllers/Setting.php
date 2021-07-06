<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

    public function __construct(){
		parent::__construct();
        // checkSessionUser();
        // $loginstatus = $this->session->userdata('role');
        //  if($loginstatus!="SUPERADMIN"){
        //     redirect('my404');
        // $this->load->model("Model_product");
        $this->load->model("Model_setting");
    }

    public function index(){
        $data['setting'] = $this->Model_setting->checkSetting();
    	$this->template->load("template", "setting/data-setting", $data);
    }

    public function update_setting($idSetting){
        // $id = $this->input->get("id");
        $show_price = $this->input->post('show_price');
        $show = 0;
        if($show_price == "on"){
            $show = 1;
        } else if($show_price == "") {
            $show = 0;
        }

        $updateData = array(
            "show_price" => $show
        );

        $editQuery = $this->Model_setting->editSetting($idSetting, $updateData);
        if($editQuery){
            $this->session->set_flashdata('success', 'Sukses');
        } else {
            $this->session->set_flashdata('error', 'Gagal');
        }

        redirect('setting');
        // print_r($updateData);
    }
}