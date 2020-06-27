<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}


	public function index(){

		$this->form_validation->set_rules('nippos', 'NIP Pos', 'required|trim', [
			'required' => 'NIP Pos Harus Diisi.'
		]);
		$this->form_validation->set_rules('password', 'Kata Sandi', 'required|trim', [
			'required' => 'Kata Sandi Harus Diisi.'
		]);

		if($this->form_validation->run() == false){
			$data['title'] = 'Halaman Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		}else{
			// validasi sukses
			$this->_login();
		}
	}

	private function _login()
	{
		$nippos = $this->input->post('nippos');
		$password = $this->input->post('password');
		$user = $this->db->get_where('user', ['nippos' => $nippos])->row_array();
		

		if($user){
			
			if (password_verify($password, $user['password'])){
				$data = [
					'nippos' => $user['nippos'],
					'role_id' => $user['role_id']
				];
				$this->session->set_userdata($data);
				if ($user['role_id'] == 1){
					redirect('admin');
				}
				else{
					redirect('user');
				}
			}
			else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
				redirect('auth');
			}
		

		}
		else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIP Pos Belum Terdaftar!</div>');
			redirect('auth');
		}
		

	}

	public function registrasi()
	{
		$this->form_validation->set_rules('nippos', 'NIP Pos', 'required|trim|is_unique[user.nippos]',[
			'is_unique' => 'NIP Pos Sudah Terdaftar',
			'required' => 'NIP Pos Harus Diisi.'
		]);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Nama Harus Diisi.'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[ 
			'is_unique' => 'Email Sudah Terdaftar',
			'required' => 'Email Harus Diisi.'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[repeat_password]',[
			'matches' => 'Password Tidak Sama!',
			'min_length' => 'Password Terlalu Pendek',
			'required' => 'Password Harus Diisi.'
		]);
		$this->form_validation->set_rules('repeat_password', 'Password', 'required|trim|matches[password]');

		if ($this->form_validation->run() == false){
			$data['title'] = 'Halaman Registrasi';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registrasi');
			$this->load->view('templates/auth_footer');	
		}
		else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama',true)),
				'nippos' => htmlspecialchars($this->input->post('nippos',true)),
				'email' => htmlspecialchars($this->input->post('email',true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'gambar' => 'default.png'
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Registrasi Berhasil. Silahkan Masuk</div>');
			redirect('auth');
		}

	}

	public function logout()
	{
		$this->session->unset_userdata('nippos');
		$this->session->unset_userdata('role_id');
		
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Telah Berhasil Keluar</div>');
		redirect('auth');
	}
}