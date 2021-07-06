<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
        checkSessionUser();
		$this->load->model("Model_dashboard");
		// $this->load->model("Model_approve");
	}

	public function index(){
        $data['total_user'] = $this->Model_dashboard->countUsers();
        $data['total_produk'] = $this->Model_dashboard->countProducts();
        $data['total_category'] = $this->Model_dashboard->countCategory();
		$this->template->load("template", "dashboard/v-dashboard", $data);
	}
}