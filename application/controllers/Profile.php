<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct(){
		parent::__construct();
        checkSessionUser();
        // $loginstatus = $this->session->userdata('nama_role');
        //  if($loginstatus!="SUPERADMIN"){
        //     redirect('my404');
        // }
        // $this->load->library('pdf');
        $this->load->model("Model_user");
    }

    public function index(){
        $data['user'] = $this->Model_user->getUser($this->session->userdata('id_user'));
        $this->template->load("template", "user/user-profile", $data);
    }

    public function update_profile($idUser){
        $full_name = $this->input->post('full_name');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $no_phone = $this->input->post('no_phone');

        $editProfile = array(
            'full_name' => $full_name,
            'email' => $email,
            'no_phone' => $no_phone
        );
        if($password != ""){
            $editProfile["password"] = md5($password);
        }

        $editQuery = $this->Model_user->changeProfile($editProfile, $idUser);
        if($editQuery){
            $this->session->set_flashdata('success', 'Sukses');
        } else {
            $this->session->set_flashdata('error', 'Gagal');
        }
        redirect('profile');
        // print_r($editProfile);
    }
}