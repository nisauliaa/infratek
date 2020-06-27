<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class menu extends CI_Controller 
{
	public function index() 
	{
		$data['title'] = 'Pengelolaan Menu';
		$data['user'] = $this->db->get_where('user', ['nippos' => $this->session->userdata('nippos')])->row_array();

		$data['menu'] = $this->db->get('user_menu')->result_array(); 

		$this->form_validation->set_rules('menu','Menu','required');

		if ($this->form_validation->run() == false){
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/footer');
		}
		else {
			$this->db->insert('user_menu',['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Menu Baru Ditambahkan!</div>');
			redirect('menu');
		}

	}

	public function subMenu()
	{
		$data['title'] = 'Pengelolaan Sub Menu';
		$data['user'] = $this->db->get_where('user', ['nippos' => $this->session->userdata('nippos')])->row_array();

		$this->load->model('menu_model','menu');

		$data['submenu'] = $this->menu->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/submenu', $data);
		$this->load->view('templates/footer');
	}

}