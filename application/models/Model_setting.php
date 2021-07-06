<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_setting extends CI_Model {

	public function checkSetting(){
		$this->db->select("*");
		$this->db->from("tbl_setting");
		return $this->db->get()->result();
	}

	public function editSetting($idSetting, $data){
        $this->db->where("id_setting", $idSetting)->update("tbl_setting", $data);
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
}