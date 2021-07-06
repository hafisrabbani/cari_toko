<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
		parent::__construct();
        checkSessionUser();
        $loginstatus = $this->session->userdata('nama_role');
         if($loginstatus!="SUPERADMIN"){
            redirect('my404');
        }
        // $this->load->library('pdf');
        $this->load->model("Model_user");
    }

    public function index(){
		// $data["user"] = $this->Model_user->getUser();
        // $data["authorize"] = $this->Model_user->list_authorize();
        $data["role"] = $this->Model_user->list_role();
		$this->template->load("template", "user/data-user", $data);
    }

    public function get_data_user($iduser = null){
        $data = $this->Model_user->getUser($iduser);
        echo json_encode(array("status" => "success", "data" => $data));
    }

    public function addUSer(){
        $id_role = $this->input->post('id_role');
        $full_name = $this->input->post("full_name");
        $username = $this->input->post("username");
        $email = $this->input->post("email");
        $no_phone = $this->input->post("no_phone");
		$password = $this->input->post("password");
		$status = $this->input->post("status");

		$dataUser = array(
			"id_role" => $id_role,
            "full_name" => $full_name,
            "username" => $username,
			"email" => $email,
            "no_phone" => $no_phone,
            "password" => md5($password),
			"status" => $status
		);

		$check_when_double_email = $this->Model_user->check_existing_user("email", $email);
        $check_when_double_username = $this->Model_user->check_existing_user("username", $username);
        if($check_when_double_email){
            echo json_encode(array("status" => "error", "message" => "Email sudah digunakan, mohon gunakan email lain."));
        } else if($check_when_double_username){
            echo json_encode(array("status" => "error", "message" => "Username sudah digunakan, mohon gunakan username lain"));
        } else {
            $tambahUser = $this->Model_user->tambahUser($dataUser);
            if ($tambahUser) {
                echo json_encode(array("status" => "success", "message" => "Sukses menambahkan user baru", "data" => $dataUser));
            } else {
                echo json_encode(array("status" => "error", "message" => "Gagal, data tidak disimpan.!!"));
            }
		}
		
	}

	public function editUser(){
        $id_user = $this->input->post('id_user');
		$id_role = $this->input->post('id_role');
        $full_name = $this->input->post("full_name");
        $username = $this->input->post("username");
        $email = $this->input->post("email");
        $no_phone = $this->input->post("no_phone");
        $password = $this->input->post("password");
        $status = $this->input->post("status");

		$editdataUser = array(
            "id_role" => $id_role,
            "full_name" => $full_name,
            "username" => $username,
            "email" => $email,
            "no_phone" => $no_phone,
            "password" => md5($password),
            "status" => $status
		);


		// if($password != ""){
		// 	$editdataUser["password"] = md5($password);
		// }

		$update = $this->Model_user->updateUser($editdataUser, $id_user);
		if ($update) {
			echo json_encode(array("status" => "success", "message" => "User successfully changed", "data" => $editdataUser));
		} else {
			echo json_encode(array("status" => "error", "message" => "Failed, user can't be changed.!!"));
		}
	}



	public function delete_data_user(){
        $id_user = $this->input->post("id_user");
        $gambar = $this->db->get_where('tbl_user',['id_user' => $id_user])->row();
        // var_dump($gambar);
        
        // echo $gambar;
        $delete = $this->Model_user->deleteUser($id_user);
		if($delete){
			echo json_encode(array("status" => "success", "data" => $id_user, "message" => "Successfully delete user"));
		} else {
			echo json_encode(array("status" => "error", "message" => "Failed, user can't be deleted.!!"));
		}
    }
}
?>