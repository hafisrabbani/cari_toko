<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_region extends CI_Model {
	public function getCity(){
		$this->db->select("*");
		$this->db->from("city");
		$this->db->order_by("city_name");
		return $this->db->get()->result();
	}
}