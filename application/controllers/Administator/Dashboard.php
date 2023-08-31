<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('DashboardModel');
		$this->load->model('UserModel');
	}


	public function index()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('Home/loginPage');
		}
		$data['active_menu'] = 'Dashboard';
		$data['title'] = 'Dashboard';

		// Mendapatkan data username dari session
		$username = $this->session->userdata('username');
		// Kemudian Anda bisa meneruskan data username ke model
		$data['users'] = $this->UserModel->getUserById($username);

		$this->load->library('table');
		$data['departemen'] = $this->DashboardModel->getAllDatadepartemen();
		$data['karyawan'] = $this->DashboardModel->getAllDatakaryawan();
		$data['teknisi'] = $this->DashboardModel->getAllDatateknisi();
		$usersQuery = $this->db->where('role_id', 2)->get('users');
		$data['totalKaryawan'] = $usersQuery->num_rows();
		$usersQuery2 = $this->db->where('role_id', 3)->get('users');
		$data['totalTeknisi'] = $usersQuery2->num_rows();
		$usersQuery3 = $this->db->get('departments');
		$data['totalDepartemen'] = $usersQuery3->num_rows();


		$this->load->view("administator/templates/header", $data);
		$this->load->view("administator/templates/sidebar", $data);
		$this->load->view("administator/index", $data);
		$this->load->view("administator/templates/footer");

	}


}