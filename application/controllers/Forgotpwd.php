<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpwd extends CI_Controller {
	public function __construct(){
		parent::__construct();
        // checkSessionUser();
		$this->load->model("Model_user");
		// $this->load->model("Model_category");
	}

	public function index(){
		$this->load->view('auth/forgot_password');
	}

	public function send_reset(){
		$email = $this->input->post('email');
		$querymail = $this->db->get_where('tbl_user',['email' => $email])->num_rows();
		if($querymail > 0){
    		// echo "mail";
    		$config = [
                'protocol'  => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_user' => 'caritoko.emcorp@gmail.com',
                'smtp_pass' => 'cari12345',
                'smtp_port' => 465,
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'newline'   => "\r\n"
              ];

		      $this->load->library('email', $config);
		      $this->email->initialize($config);
		      $this->email->from('caritoko.emcorp@gmail.com', 'Ilmi Olshop');
		      $this->email->to($email);
		      $this->email->subject('Password Reset');
		      $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'forgotpwd/get_forgot_user?email=' . $this->input->post('email') . '">Reset Password</a>');

		      if($this->email->send()) {
		      		$this->session->set_flashdata('success', 'Silahkan cek email anda');
		            redirect("forgotpwd");
                    die;
		    	} else {
		    		$this->session->set_flashdata('error', 'Email tidak terkirim');
		    		redirect("register");
		          	die;
		        }
    	} else {
    		$this->session->set_flashdata('error', 'Email tidak ditemukan');
		        redirect("forgotpwd");
    	}
	}

	function get_forgot_user(){
    	$email = $this->input->get('email');
    	$password = $this->input->post('password');
    	// $querymail = $this->db->get_where_or('m_user',['email' => $phone_mail, 'no_hp' => $phone_mail])->row();
    	// 
    	$this->db->select('*');
    	$this->db->from("tbl_user");
    	$this->db->where("email", $email);
    	$getuser = $this->db->get()->num_rows();

    	if($getuser > 0){
    		$this->load->view('auth/confirmation_password');
    	} else {
    		$this->session->set_flashdata('error', "Email tidak ditemukan");
    		redirect('login');
    	}
    }

    function confirm_pwd(){
    	$email = $this->input->post('email'); //harusnya ngambil dari link yg berisi email/hp dr email.
    	$password =$this->input->post('password');
    	$dataForgot = array(
        	"password" => md5($password)
        );
        $this->db->set('password', $password);
        $this->db->where('email', $email);
        $query = $this->db->update('tbl_user', $dataForgot);

        if($query){
        	// echo "true";
        	$this->session->set_flashdata('success', 'Berhasil mengubah password');
            redirect("login");
        } else {
        	// echo "false";
            $this->session->set_flashdata('error', 'Gagal mengubah password');
            redirect("login");
        }
    }
}