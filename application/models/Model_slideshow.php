<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_slideshow extends CI_Model {
    public function getSlide($id = null){
        if(isset($id)){
            $this->db->where("id_slide", $id);
        }
        $this->db->select("*");
		$this->db->from("tbl_slide");
		$this->db->order_by("id_slide", "asc");
        
        return $this->db->get()->result();
        
    }

    public function getSlideActive($id = null){
        if(isset($id)){
            $this->db->where("id_slide", $id);
        }
        $this->db->select("*");
        $this->db->from("tbl_slide");
        $this->db->where("is_seen", "1");
        $this->db->order_by("id_slide", "asc");
        
        return $this->db->get()->result();
        
    }

    public function addSlide($data){
        $this->db->insert("tbl_slide", $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function editSlide($data, $idSlide){
        $this->db->where("id_slide", $idSlide)->update("tbl_slide", $data);
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
}