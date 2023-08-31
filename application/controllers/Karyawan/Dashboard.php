<?php
defined('BASEPATH') or exit('No direct script access allowed');

<<<<<<< HEAD
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
=======
class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
		$this->load->library('session');
		$this->load->model('RequestModel');
		$this->load->model('PerangkatModel');
		$this->load->model('UserModel');
		$this->load->model('NotifikasiModel');

<<<<<<< HEAD
	}

	public function index()
	{
=======
    }

	public function index(){
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
		if (!$this->session->userdata('logged_in')) {
			redirect('Home/loginPage');
		}
		$data['active_menu'] = 'Dashboard';
		$data['title'] = 'Login Page';

		$username = $this->session->userdata('username'); // Mendapatkan data username dari session
<<<<<<< HEAD

		// Kemudian Anda bisa meneruskan data username ke model
		$data['tickets'] = $this->RequestModel->getTicketsWithDetails($username);
		$data['perangkat'] = $this->PerangkatModel->getPerangkatUser($username);
		$data['users'] = $this->UserModel->getUserById($username);
		$user = $this->UserModel->getUserById($username);
		$user_id = $user->user_id;

		// Mendapatkan Notifikasi
		$data['notif'] = $this->NotifikasiModel->get_notifikasi_by_id($user_id);
		$data['jml_notif'] = $this->NotifikasiModel->count_notif_by_id($user_id);

		// Dapatkan jumlah Request
		$data['jml_pending'] = $this->UserModel->count_fixed_by_user_n_status($user_id, 'PENDING');
		$data['jml_fixed'] = $this->UserModel->count_fixed_by_user_n_status($user_id, 'FIXED');
		$data['jml_notfixed'] = $this->UserModel->count_fixed_by_user_n_status($user_id, 'NOTFIXED');

		// Dapatkan Jumlah Perangkat
		$data['jml_perangkat'] = $this->UserModel->count_perangkat_by_user($user_id);
=======
		
		// Kemudian Anda bisa meneruskan data username ke model
		$data['tickets'] = $this->RequestModel->getTicketsWithDetails($username);
        $data['perangkat'] = $this->PerangkatModel->getPerangkatUser($username);
		$data['users'] = $this->UserModel->getUserById($username);
		$user = $this->UserModel->getUserById($username);
        $user_id = $user->user_id;

        // Mendapatkan Notifikasi
        $data['notif'] = $this->NotifikasiModel->get_notifikasi_by_id($user_id);
        $data['jml_notif'] = $this->NotifikasiModel->count_notif_by_id($user_id);
		
		// Dapatkan jumlah Request
		$data['jml_pending'] = $this->UserModel->count_fixed_by_user_n_status($user_id, 'PENGAJUAN');
		$data['jml_fixed'] = $this->UserModel->count_fixed_by_user_n_status($user_id, 'SELESAI');
		$data['jml_notfixed'] = $this->UserModel->count_fixed_by_user_n_status($user_id, 'RUSAK');
		
		// Dapatkan Jumlah Perangkat
		$data['jml_perangkat'] = $this->UserModel->count_perangkat_byuserid($user_id);
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e

		$this->load->view('karyawan/templates/header', $data);
		$this->load->view('karyawan/templates/sidebar', $data);
		$this->load->view('karyawan/index', $data);
		$this->load->view('karyawan/templates/footer');
	}
<<<<<<< HEAD
	public function search()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('Home/loginPage');
		}
		$keyword = $this->input->get('keyword'); // Mendapatkan keyword pencarian dari input GET
=======
	public function search(){
		if (!$this->session->userdata('logged_in')) {
			redirect('Home/loginPage');
		}
        $keyword = $this->input->get('keyword'); // Mendapatkan keyword pencarian dari input GET
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e

		// Pencarian data berdasarkan keyword
		$data['perangkat'] = $this->PerangkatModel->searchPerangkat($keyword);
		$data['tickets'] = $this->RequestModel->searchRequest($keyword);

		// Mendapatkan data username dari session
<<<<<<< HEAD
		$username = $this->session->userdata('username');
=======
		$username = $this->session->userdata('username'); 
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
		$user = $this->UserModel->getUserById($username);
		// Mendapatkan user_id
		$user_id = $user->user_id;

<<<<<<< HEAD
		// Mendapatkan Notifikasi
		$data['notif'] = $this->NotifikasiModel->get_notifikasi_by_id($user_id);
		$data['jml_notif'] = $this->NotifikasiModel->count_notif_by_id($user_id);
=======
        // Mendapatkan Notifikasi
        $data['notif'] = $this->NotifikasiModel->get_notifikasi_by_id($user_id);
        $data['jml_notif'] = $this->NotifikasiModel->count_notif_by_id($user_id);
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e

		// dapatkan data user untuk header
		$data['users'] = $this->UserModel->getUserById($username);

		if (!empty($data['perangkat'])) {
			// Jika ditemukan data organisasi, arahkan ke view data-perangkat
			$data['active_menu'] = 'kelolaPerangkat';
			$this->load->view('karyawan/templates/header', $data);
			$this->load->view('karyawan/templates/sidebar', $data);
			$this->load->view('karyawan/kelolaperangkat');
			$this->load->view('karyawan/templates/footer');

<<<<<<< HEAD
		} else if (!empty($data['tickets'])) {
=======
		}else if(!empty($data['tickets'])){
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
			// Jika tidak ditemukan data organisasi, arahkan ke view data-request
			$data['active_menu'] = 'kelolaRequest';

			$this->load->view('karyawan/templates/header', $data);
			$this->load->view('karyawan/templates/sidebar', $data);
			$this->load->view('karyawan/kelolarequest');
			$this->load->view('karyawan/templates/footer');

		}

<<<<<<< HEAD
	}

=======
    }
	
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
}