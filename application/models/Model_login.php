<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

    public function checkUser($email, $password){
        $this->db->select("user.id_user, user.username, user.email, user.id_role, user.full_name, role.role_name as nama_role, osp.id_olshop as id_olshop, osp.olshop_name as nama_olshop");
        $this->db->from("tbl_user user");
        $this->db->join("tbl_role role", "role.id_role = user.id_role", "left");
        $this->db->join("tbl_olshop osp", "osp.id_user = user.id_user", "left");
        $this->db->where("user.status", 1);
        $this->db->where(array(
            "email" => $email,
            "password" => md5($password)
        ));

        $user = $this->db->get();
        if($user->num_rows() > 0){
            return $user->row();
        } else {
            return false;
        }
    }
    public function checkStatus($email, $password){
        $this->db->select("id_user, username, status");
        $this->db->from("tbl_user");
        $this->db->where(array(
            "email" => $email,
            "password" => md5($password),
            "status" => 1
            ));
        $user = $this->db->get();
        if($user->num_rows() > 0){
            return $user->row();
        } else {
            return false;
        }
        }
    }