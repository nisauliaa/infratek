<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('barang_model');
	}

	public function index(){

		$data['title'] = 'Dashboard Admin';
		$data['user'] = $this->db->get_where('user', ['nippos' => $this->session->userdata('nippos')])->row_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function daftarbarang(){

		$data['title'] = 'List Daftar Barang';
		$data['user'] = $this->db->get_where('user', ['nippos' => $this->session->userdata('nippos')])->row_array();
		$data['databarang']['entries'] = $this->barang_model->getAllBarang();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/daftarbarang', $data);
		$this->load->view('templates/footer');
	}
}