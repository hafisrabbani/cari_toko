<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_category extends CI_Model {
    public function getCategory($id = null){
        if(isset($id)){
            $this->db->where("id_category", $id);
        }
        $this->db->select("*");
		$this->db->from("tbl_category");
		$this->db->order_by("id_category", "desc");
        
        return $this->db->get()->result();
        
    }

    public function addCategory($data){
        $this->db->insert("tbl_category", $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function editCategory($data, $idCategory){
        $this->db->where("id_category", $idCategory)->update("tbl_category", $data);
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function getVideo($id = null){
        if(isset($id)){
            $this->db->where("id_video", $id);
        }
        $this->db->select("*");
        $this->db->from("tbl_video");
        $this->db->order_by("id_video", "desc");
        $this->db->where("is_seen", "1");
        
        return $this->db->get()->result();
        
    }

    public function getDonasi($id = null){
        if(isset($id)){
            $this->db->where("id_donasi", $id);
        }
        $this->db->select("*");
        $this->db->from("tbl_donasi");
        $this->db->order_by("id_donasi", "desc");
        $this->db->where("is_seen", "1");
        
        return $this->db->get()->result();
        
    }
}