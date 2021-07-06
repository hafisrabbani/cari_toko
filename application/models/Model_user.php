<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

    public function getUser($id = null){
        if(isset($id)){
            $this->db->where("user.id_user", $id);
        }
        
        $this->db->select("user.id_user, user.full_name, user.username, user.email, user.no_phone, user.id_role, user.status, role.role_name as nama_role");
		$this->db->from("tbl_user user");
        $this->db->join("tbl_role role", "role.id_role = user.id_role", "left");
		$this->db->order_by("id_user", "desc");
        $data = $this->db->get();
            if($data->num_rows() > 0){
                return $data->result();
            } else {
                return false;
            }
    }


    public function tambahUser($data){
        $this->db->insert("tbl_user", $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    public function updateUser($data, $id_user){
            $this->db->where("id_user", $id_user)->update("tbl_user", $data);
            if($this->db->affected_rows() > 0){
                return true;
            } else {
                return false;
            }
        }

    public function changeProfile($data, $idUser){
        $idUser = $this->session->userdata('id_user');
        $this->db->where("id_user", $idUser);
        $this->db->update("tbl_user", $data);
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
    

    public function check_existing_user($column, $value){
            $this->db->select("id_user");
            $this->db->from("tbl_user");
            $this->db->where($column, $value);
            $data = $this->db->get();
            if($data->num_rows() > 0){
                return $data->result();
            } else {
                return false;
            }
        }

    public function deleteUser($idUser){
        $this->db->where("id_user", $idUser)->delete("tbl_user");
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function list_role(){
        $this->db->select('*');
        $this->db->from('tbl_role');
        $this->db->order_by('role_name', 'asc');
        return $this->db->get()->result();
    }

    public function view(){
        return $this->db->get('tbl_m_user')->result(); // Tampilkan semua data yang ada di tabel
    }
}
?>