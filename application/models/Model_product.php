<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_product extends CI_Model {
	public function getProduct($id = null){
	    if(isset($id)){
	        $this->db->where("id_product", $id);
	    }
	    $this->db->select("prd.*, ctg.category_name as namecot, usr.id_user as id_user, os.id_olshop as id_olshop, os.olshop_name as osname, usr.no_phone as no_wa");
		$this->db->from("tbl_product prd");
        $this->db->join("tbl_category ctg", "ctg.id_category = prd.id_category", "left");
        $this->db->join("tbl_olshop os", "os.id_olshop = prd.id_olshop", "left");
        $this->db->join("tbl_user usr", "usr.id_user = os.id_user", "left");
        if($this->session->userdata('nama_role') != 'SUPERADMIN'){
            $this->db->where("prd.id_olshop", $this->session->userdata('id_olshop'));
        }
		$this->db->order_by("id_product", "desc");
	    
	    return $this->db->get()->result();
	}

    public function getProductlanding($id = null){
        if(isset($id)){
            $this->db->where("id_product", $id);
        }
        $this->db->select("prd.*, ctg.category_name as namecot, usr.id_user as id_user, os.id_olshop as id_olshop, os.olshop_name as osname, usr.no_phone as no_wa, cty.city_name as osdress");
        $this->db->from("tbl_product prd");
        $this->db->join("tbl_category ctg", "ctg.id_category = prd.id_category", "left");
        $this->db->join("tbl_olshop os", "os.id_olshop = prd.id_olshop", "left");
        $this->db->join("tbl_user usr", "usr.id_user = os.id_user", "left");
        $this->db->join("city as cty", "cty.city_id=os.city_id", "left");
        $this->db->order_by("id_product", "desc");
        
        return $this->db->get()->result();
    }

    public function getProductcategory(){
        $this->db->select("pr.id_category, ct.category_name as nama_category, ct.category_description as deskrip");
        $this->db->from("tbl_product pr");
        $this->db->join("tbl_category ct", "ct.id_category = pr.id_category", "left");
        $this->db->group_by("id_category");
        $this->db->order_by("id_category", "desc");
        
        return $this->db->get()->result();
    }

    public function getProductolshop(){
        $this->db->select("prd.id_product, prd.id_olshop, prd.product_name, prd.product_image, prd.product_price, prd.product_description, osp.olshop_name as nama_olshop, us.no_phone as no_wa");
        $this->db->from("tbl_product as prd");
        $this->db->join("tbl_olshop osp", "osp.id_olshop = prd.id_olshop", "left");
        $this->db->join("tbl_user us", "us.id_user = osp.id_user", "left");
        $this->db->group_by("prd.id_olshop");
        $this->db->order_by("prd.id_olshop", "desc");

        return $this->db->get()->result();
    }

    public function getInfoolshop($id_olshop){
        $this->db->select("osp.id_olshop, osp.olshop_name as nama_olshop, us.no_phone as no_wa");
        $this->db->from("tbl_olshop osp");
        $this->db->where_in("osp.id_olshop", $id_olshop);
        $this->db->join("tbl_user us", "us.id_user = osp.id_user", "left");

        return $this->db->get()->result();
    }

	public function addProduct($data){
        $this->db->insert("tbl_product", $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function editProduct($data, $idProduct){
        $this->db->where("id_product", $idProduct)->update("tbl_product", $data);
        if($this->db->affected_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function listCategory(){
        $this->db->select("id_category, category_name");
        $this->db->from("tbl_category");
        $this->db->order_by("category_name");
        return $this->db->get()->result();
    }
}