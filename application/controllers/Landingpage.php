<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landingpage extends CI_Controller {
	public function __construct(){
		parent::__construct();
        // checkSessionUser();
		// $this->load->model("Model_dashboard");
		$this->load->model("Model_category");
		$this->load->model("Model_product");
		$this->load->model("Model_slideshow");
		$this->load->model("Model_setting");
		$this->load->model("Model_olshop");
		$this->load->model("Model_region");
	}

	public function index(){
        $data['setting'] = $this->Model_setting->checkSetting();
        $data['city'] = $this->Model_region->getCity();
        $data['category'] = $this->Model_category->getCategory();
        $data['video'] = $this->Model_category->getVideo();
        $data['donasi'] = $this->Model_category->getDonasi();
        $data['slide'] = $this->Model_slideshow->getSlideActive();
        $data['product'] = $this->Model_product->getProduct();
        $data['productctg'] = $this->Model_product->getProductcategory();
        $data['setcheck'] = $this->Model_setting->checkSetting();
		$this->load->view("landingpage", $data);
	}

	public function detailProduk(){
		$id = $this->input->get("id");
		$data['category'] = $this->Model_category->getCategory();
        $data['slide'] = $this->Model_slideshow->getSlide();
		$data["product"] = $this->Model_product->getProductlanding($id);
		$this->load->view("detail-product", $data);
	}

	public function detailToko(){
		$id = $this->input->get("id");
		$data['toko'] = $this->Model_olshop->getOlshoplanding($id);
		$data['product'] = $this->Model_product->getProductlanding();
		$data['setcheck'] = $this->Model_setting->checkSetting();
		$this->load->view("detail-olshop", $data);
	}

	// public function search_in_shop(){
	// 	$id = $this->input->get("id");

	// }
}