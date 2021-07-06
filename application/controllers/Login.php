<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Model_login", "mLogin");
	}

	public function index(){
		if($this->session->userdata("login_session") == "Y"){
			redirect("user");
		}
		$this->load->view("auth/new_reg");
	}

	public function action(){
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		if(isset($email) && isset($password)){
			$checkUser = $this->mLogin->checkUser($email, $password);
			if($checkUser){
				$checkStatus = $this->mLogin->checkStatus($email, $password);
				if($checkStatus){
					$dataUser = array(
					"id_user" => $checkUser->id_user,
					"id_olshop" => $checkUser->id_olshop,
					"nama_olshop" => $checkUser->nama_olshop,
					"full_name" => $checkUser->full_name,
					"username" => $checkUser->username,
					"id_role" => $checkUser->id_role,
					"nama_role" => $checkUser->nama_role,
					"position" => $checkUser->position,
					"login_session" => "Y"
				);
				$this->session->set_userdata($dataUser);
				// $this->session->set_flashdata("success", "Selamat datang ".$this->session->userdata('username'));
					if($checkUser->nama_role == 'SUPERADMIN'){
						redirect("dashboard");
					} else {
						redirect('profile');
					}
				} else {
					$this->session->set_flashdata("error", "Maaf, akun anda belum diaktifkan");
					redirect("login");
				}
			} else {
				$this->session->set_flashdata("error", "Periksa Email dan password anda.!");
				redirect("login");
			}
		}
	}

	public function doLogout(){
		$this->session->sess_destroy();
		redirect(base_url('register'));
	}
}