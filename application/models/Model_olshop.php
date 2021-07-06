<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_olshop extends CI_Model {
	public function getOlshop($id = null){
        if(isset($id)){
            if($this->session->userdata('nama_role') != 'SUPERADMIN'){
                $this->db->where("os.id_user", $id);
            } else {
                $this->db->where("os.id_olshop", $id);
            }
        }
        // $id_ol_sess = $this->session->userdata('id_olshop');
        $this->db->select("os.*, user.username as nama_user, user.full_name as full_name, user.no_phone as nomor_hp, pvc.province as provname, cty.city_name as ctname, sb.subdistrict_name as subname");
		$this->db->from("tbl_olshop os");
		$this->db->join("tbl_user user", "user.id_user = os.id_user", "left");
        $this->db->join("province pvc", "pvc.province_id=os.province_id", "left");
        $this->db->join("city cty", "cty.city_id=os.city_id", "left");
        $this->db->join("subdistrict sb", "sb.subdistrict_id=os.subdistrict_id", "left");
		// $this->db->where('os.id_user', $this->session->userdata('id_user'));
		$this->db->order_by("id_olshop", "desc");
        return $this->db->get()->result();
        
    }

    public function getOlshoplanding($id = null){
        if(isset($id)){
            $this->db->where("os.id_olshop", $id);
        }
        // $id_ol_sess = $this->session->userdata('id_olshop');
        $this->db->select("os.*, user.username as nama_user, user.no_phone as nomor_hp");
		$this->db->from("tbl_olshop os");
		$this->db->join("tbl_user user", "user.id_user = os.id_user", "left");
		// $this->db->where('os.id_user', $this->session->userdata('id_user'));
		$this->db->order_by("id_olshop", "desc");
        return $this->db->get()->result();
        
    }

    public function getProvince(){
    	$this->db->select("province_id, province as nama_provinsi");
    	$this->db->from("province");
    	$this->db->order_by("province");
    	return $this->db->get()->result();
    }

    public function addShop($data){
        $this->db->insert("tbl_olshop", $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    // public function editShop($data, $idUSer){
    //     $this->db->where("id_user", $idUSer)->update("tbl_olshop", $data);
    //     if($this->db->affected_rows() > 0){
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
    
    public function editShop($data, $id){
        if($this->session->userdata('nama_role') != 'SUPERADMIN'){
            $this->db->where("id_user", $id);
        }else{
            $this->db->where("id_olshop", $id);
        }
        $this->db->update("tbl_olshop", $data);
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

}