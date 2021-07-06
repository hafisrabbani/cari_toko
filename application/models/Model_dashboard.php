<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_dashboard extends CI_Model {

    public function countUsers(){
        $this->db->select("COUNT(id_user) as jumlah");
        $this->db->from("tbl_user");
        $this->db->where("status", 1);
        return $this->db->get()->row();
    }

    public function countProducts(){
        $this->db->select("COUNT(id_product) as jumlah");
        $this->db->from("tbl_product");
        if($this->session->userdata('nama_role') != 'SUPERADMIN'){
            $this->db->where('id_olshop', $this->session->userdata('id_olshop'));
        }
        return $this->db->get()->row();
    }

    public function countCategory(){
        $this->db->select("COUNT(id_category) as jumlah");
        $this->db->from("tbl_category");
        // if($this->session->userdata('nama_role') != 'SUPERADMIN'){
        //     $this->where('')
        // }
        return $this->db->get()->row();
    }
}
?>