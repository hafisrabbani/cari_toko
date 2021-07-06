<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Olshop extends CI_Controller {

    public function __construct(){
		parent::__construct();
        checkSessionUser();
        // $loginstatus = $this->session->userdata('role');
        //  if($loginstatus!="SUPERADMIN"){
        //     redirect('my404');
        // $this->load->model("Model_product");
        $this->load->model("Model_dashboard");
        $this->load->model("Model_olshop");
        $this->load->model("Model_user");
    }

    public function index(){
    	// $id_user = 1;
        $data['olshop'] = $this->Model_olshop->getOlshop();
        $data['province'] = $this->Model_olshop->getProvince();    	
    	$this->template->load("template", "olshop/list_olshop", $data);
    }

    public function edit(){
        $id = $this->input->get('id');
        $data['olshop'] = $this->Model_olshop->getOlshop($id);
        $data['province'] = $this->Model_olshop->getProvince();
        $data['user'] = $this->Model_user->getUser();
        $data['total_produk'] = $this->Model_dashboard->countProducts();
        $this->template->load("template", "olshop/edit_list", $data);
    }

    public function shop_profile(){
        $data['total_produk'] = $this->Model_dashboard->countProducts();
        $data['olshop'] = $this->Model_olshop->getOlshop($this->session->userdata('id_user'));
        $data['user'] = $this->Model_user->getUser($this->session->userdata('id_user'));
        $data['province'] = $this->Model_olshop->getProvince();
        $this->template->load("template", "olshop/olshop_profile", $data);
    }

    public function add_shop(){
    	$id_user = $this->input->post('id_user');
    	$created_at = $this->input->post('created_at');
    	$province_id = $this->input->post('province_id');
    	$city_id = $this->input->post('city_id');
    	$subdistrict_id = $this->input->post('subdistrict_id');
    	$olshop_name = $this->input->post('olshop_name');

    	$addData = array(
    		'id_user' => $id_user,
    		'created_at' => date("Y-m-d", strtotime(str_replace("/", "-", $created_at))),
    		'province_id' => $province_id,
    		'city_id' => $city_id,
    		'subdistrict_id' => $subdistrict_id,
    		'olshop_name' => $olshop_name
    	);

    	if(isset($_FILES['olshop_image'])) {
			$config['upload_path']= './file/olshop/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			// $config['encrypt_name'] = TRUE;
			$config['file_name'] = 'Gambar_'.$olshop_name;
			$config['max_size'] = 2048;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(isset($_FILES['olshop_image'])){
				if ($this->upload->do_upload('olshop_image')){
					$olshop_image = $this->upload->data();
					$addData["olshop_image"] = $olshop_image["file_name"];
				}                    
			}
		}
		// print_r($addData);
    	$addQuery = $this->Model_olshop->addShop($addData);
    	if($addQuery){
    		$this->session->set_flashdata("success", "Sukses");
    	} else {
    		$this->session->set_flashdata("error", "Gagal");
    	}
    	redirect('olshop/shop_profile');
    }

    public function update_shop($id){
    	$id_user = $this->input->post('id_user');
    	$province_id = $this->input->post('province_id');
    	$city_id = $this->input->post('city_id');
    	$subdistrict_id = $this->input->post('subdistrict_id');
    	$olshop_name = $this->input->post('olshop_name');

    	$editData = array(
    		'id_user' => $id_user,
    		'province_id' => $province_id,
    		'city_id' => $city_id,
    		'subdistrict_id' => $subdistrict_id,
    		'olshop_name' => $olshop_name
    	);

    	if($_FILES['olshop_image']['name'] != ""){
			$configFoto['upload_path'] = './file/olshop/';
			$configFoto['allowed_types'] = 'jpg|png|jpeg';
			$configFoto['max_size'] = 2048;
			$this->load->library('upload', $configFoto);
			$this->upload->initialize($configFoto);

			if($_FILES['olshop_image']['name'] != ""){
				if ($this->upload->do_upload('olshop_image')){
					$olshop_image = $this->upload->data();
					$editData["olshop_image"] = $olshop_image["file_name"];
				}                    
			}
		}

        $editQuery = $this->Model_olshop->editShop($editData, $id);
        if($editQuery){
        	$this->session->set_flashdata("success", "Sukses");
        } else {
        	$this->session->set_flashdata("error", "Gagal");
        }
        if($this->session->userdata('nama_role') != 'SUPERADMIN'){
            redirect('olshop/shop_profile');
        } else {
            redirect('olshop');
        }
    }

    public function cityList(){
        $olshop = $this->Model_olshop->getOlshop();
        $province_id = $this->input->get('province_id');
        $city = $this->db->get_where('city', array('province_id' => $province_id));
        $i=1;
        foreach ($olshop as $p) {
           echo '<select id="city_id'.$i.'" onchange="loadSubdistrict()" name="city_id" class="form-control" required>';
           echo '<option value="">Pilih Kota/Kabupaten</option>';
           foreach ($city->result() as $c) {
               echo '<option value="'.$c->city_id.'" '.$selected.'>'.$c->city_name.'</option>';
           }
           echo '</select>';
           $i++;
        }
    }

    // public function cityList(){
    // 	$province_id = $this->input->get('province_id');
    // 	$city = $this->db->get_where('city', array('province_id' => $province_id));
    // 	echo '<select id="city" onchange="loadSubdistrict()" name="city_id" class="form-control" required>';
    // 	echo '<option value="">Pilih Kota/Kabupaten</option>';
    // 	foreach ($city->result() as $c) {
    // 		echo '<option value="'.$c->city_id.'" '.$selected.'>'.$c->city_name.'</option>';
    // 	}
    // 	echo '</select>';
    // }

    public function subdistrictList(){
    	$city_id = $this->input->get('city_id');
    	$subdistrict = $this->db->get_where('subdistrict', array('city_id' => $city_id));
    	echo '<select id="subdistrict" name="subdistrict_id" class="form-control" required>';
    	echo '<option value=""> Pilih Kecamatan</option>';
    	foreach ($subdistrict->result() as $subs) {
    		echo '<option value="'.$subs->subdistrict_id.'">'.$subs->subdistrict_name.'</option>';
    	}
    	echo '</select>';
    	// echo json_encode($subdistrict);
    }

    // public function cityList(){
    //     $provinceID = $_GET['province_id'];
    //     $city = $this->db->get_where('city',array('province_id'=>$provinceID));
    //     // echo "<div class='form-group u-select--v3 g-pos-rel g-brd-none g-brd-bottom g-brd-gray-light-v7 rounded-0 mb-0'>";
    //     echo "<select id='city' onChange='loadSubdistrictfrom()' name='city_id' >";
    //     echo "<option value=''> Pilih Kota/Kabupaten</option>";
    //     foreach ($city->result() as $p){
    //         echo "<option value='$p->city_id'>$p->city_name</option>";
    //     }
    //     echo "</select>";
    // }

    // public function subdistrictList(){

    // }
}