<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct(){
		parent::__construct();
        // checkSessionUser();
		$this->load->model("Model_user");
		// $this->load->model("Model_category");
	}

	public function index(){
		$this->load->view('auth/new_reg');
	}

	public function reg(){
		$full_name = $this->input->post('full_name');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$no_phone = $this->input->post('no_phone');
		$password = $this->input->post('password');

		$dataReg = array(
			'full_name' => $full_name,
			'username' => $username,
			'email' => $email,
			'no_phone' => $no_phone,
			'password' => md5($password),
            'id_role' => '2',
			'status' => 0
		);

		print_r($dataReg);
		$check_when_double_email = $this->Model_user->check_existing_user("email", $email);
        $check_when_double_username = $this->Model_user->check_existinf_user("username", $username);
        if ($check_when_double_email) {
            $this->session->set_flashdata("error", "Email sudah digunakan.!");
            redirect("register");
        } else if($check_when_double_username){
            $this->session->set_flashdata("error", "Username sudah digunakan.!");
        } else {
            $token = bin2hex(openssl_random_pseudo_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];
            $this->db->insert('user_token', $user_token);

            $config = [
                'protocol'  => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
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
          $this->email->subject('Account Verification');
          $this->email->message('Hi <b>'.$username.'</b>, klik link berikut untuk verifikasi akun anda :<br><br><a href="' . base_url() . 'register/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a><br><br><b>Terimakasih,</b><br>Admin Ilmi-Ecommerce');

          if($this->email->send()) {
              $register = $this->Model_user->tambahUser($dataReg);
                if($register){
                    // $this->sendOtp($no_hp,"Hi ".$username.", ini adalah kode OTP anda di Cari Toko. Segera login dan verifikasi nomor anda");
                    $this->session->set_flashdata("success", "Registrasi Berhasil");
                    redirect("register");
                } else {
                    $this->session->set_flashdata("error", "Failed");
                    redirect("register");
                }
            } else {
              echo $this->email->print_debugger();
              die;
            }
            
        }
	}

	public function verify(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();
        if($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if($user_token) {
                $this->session->set_flashdata("success", "Aktivasi Berhasil");
                if(time() - $user_token['date_created'] < (60*60*24)) {
                    $this->db->set('status', 1);
                    $this->db->where('email', $email);
                    $this->db->update('tbl_user');
                    $this->db->delete('user_token', ['email' => $email]);
                    redirect('register');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Account Activation failed! Token Expired.
                        </div>');
                    redirect('register');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Account Activation failed! Wrong Token.
                    </div>');
                redirect('register');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Account Activation failed! Wrong Email.
                </div>');
            redirect('login');
        }
    }
}