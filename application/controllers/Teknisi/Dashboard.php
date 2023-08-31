<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('RequestModel');
		$this->load->model('PerangkatModel');
		$this->load->model('UserModel');
		$this->load->model('NotifikasiModel');

	}

	public function index()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('Home/loginPage');
		}
		$data['active_menu'] = 'Dashboard';
		$data['title'] = 'Login Page';
		$username = $this->session->userdata('username'); // Mendapatkan username dari session
		$kategori_id = $this->session->userdata('kategori_id'); // Mendapatkan kategori dari session

		// Kemudian Anda bisa meneruskan data username ke model
		$data['users'] = $this->UserModel->getUserByIdTeknisi($username);
		$user = $this->UserModel->getUserByIdTeknisi($username);
		$kategori_id = $user->kategori_id;
		$data['perangkat'] = $this->PerangkatModel->getPerangkatByKategoriId($kategori_id);
		$data['tickets'] = $this->RequestModel->getTicketsTeknisi($kategori_id);



		// Mendapatkan Notifikasi
		$data['notif'] = $this->NotifikasiModel->get_notifikasi_by_kategori($kategori_id);
		$data['jml_notif'] = $this->NotifikasiModel->count_notif_by_kategori($kategori_id);

		// Dapatkan jumlah Request
		$data['jml_pending'] = $this->UserModel->count_fixed_by_kategori_n_status($kategori_id, 'PENDING');
		$data['jml_fixed'] = $this->UserModel->count_fixed_by_kategori_n_status($kategori_id, 'FIXED');
		$data['jml_notfixed'] = $this->UserModel->count_fixed_by_kategori_n_status($kategori_id, 'NOTFIXED');

		// Dapatkan Jumlah Perangkat
		$data['jml_perangkat'] = $this->UserModel->count_perangkat_by_kategori($kategori_id);

		$this->load->view('teknisi/templates/header', $data);
		$this->load->view('teknisi/templates/sidebar', $data);
		$this->load->view('teknisi/index', $data);
		$this->load->view('teknisi/templates/footer');
	}
	public function search()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('Home/loginPage');
		}
		$keyword = $this->input->get('keyword'); // Mendapatkan keyword pencarian dari input GET

		// Pencarian data berdasarkan keyword
		$data['perangkat'] = $this->PerangkatModel->searchPerangkat($keyword);
		$data['tickets'] = $this->RequestModel->searchRequest($keyword);

		// Mendapatkan data username dari session
		$username = $this->session->userdata('username');
		$user = $this->UserModel->getUserByIdTeknisi($username);
		// Mendapatkan user_id
		$user_id = $user->user_id;

		// Mendapatkan Notifikasi
		$data['notif'] = $this->NotifikasiModel->get_notifikasi_by_id($user_id);
		$data['jml_notif'] = $this->NotifikasiModel->count_notif_by_id($user_id);

		// dapatkan data user untuk header
		$data['users'] = $this->UserModel->getUserByIdTeknisi($username);

		if (!empty($data['perangkat'])) {
			// Jika ditemukan data organisasi, arahkan ke view data-perangkat
			$data['active_menu'] = 'kelolaPerangkat';
			$this->load->view('teknisi/templates/header', $data);
			$this->load->view('teknisi/templates/sidebar', $data);
			$this->load->view('teknisi/kelolaperangkat');
			$this->load->view('teknisi/templates/footer');

		} else if (!empty($data['tickets'])) {
			// Jika tidak ditemukan data organisasi, arahkan ke view data-request
			$data['active_menu'] = 'kelolaRequest';

			$this->load->view('teknisi/templates/header', $data);
			$this->load->view('teknisi/templates/sidebar', $data);
			$this->load->view('teknisi/kelolarequest');
			$this->load->view('teknisi/templates/footer');

		}

	}

}