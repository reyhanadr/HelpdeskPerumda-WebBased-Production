<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelolaKaryawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('KaryawanModel');
		$this->load->library('form_validation');
    }

   
	public function index()
	{
		$this->load->library('table');
		$data['active_menu'] = 'KelolaKaryawan';
		$data['title'] = 'Kelola Karyawan';
        $data['karyawan'] = $this->KaryawanModel->getAllData(2);
		$this->load->view("administator/templates/header", $data);
		$this->load->view("administator/templates/sidebar", $data);
		$this->load->view("administator/karyawan/view", $data);
		$this->load->view("administator/templates/footer");
	}

	public function tambah()
	{
		$this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]');
		$this->form_validation->set_message("is_unique", "{field} sudah digunakan!");
		if ($this->form_validation->run() == FALSE) {
			$data['active_menu'] = 'KelolaKaryawan';
			$data['title'] = 'Kelola Karyawan';
			$data['departemen'] = $this->KaryawanModel->getDepartments(); // Ambil data departemen dari model
			
			$this->load->view("administator/templates/header", $data);
			$this->load->view("administator/templates/sidebar", $data);
			$this->load->view('administator/karyawan/tambah', $data); // Tampilkan view dengan data
			$this->load->view("administator/templates/footer");
		} else {
			$this->KaryawanModel->tambah_data();
			$this->session->set_flashdata('succes', 'Disimpan');
			redirect('administator/KelolaKaryawan');
		}
	}

	public function ubah($id)
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data['active_menu'] = 'KelolaKaryawan';
			$data['title'] = 'Kelola Karyawan';
			$data['ubah'] = $this->KaryawanModel->detail_data($id);
			$data['departemen'] = $this->KaryawanModel->getDepartments(); // Ambil data departemen dari model

			$this->load->view("administator/templates/header", $data);
			$this->load->view("administator/templates/sidebar", $data);
			$this->load->view('administator/karyawan/ubah', $data);
			$this->load->view("administator/templates/footer");
		} else {
			$this->KaryawanModel->ubah_data();
			$this->session->set_flashdata('succes', 'DiUbah');
			redirect('administator/KelolaKaryawan');
		}
	}

	public function hapus($id)
	{
		$this->KaryawanModel->hapus_data($id);
		$this->session->set_flashdata('succes', 'Dihapus');
		redirect('administator/KelolaKaryawan');
	}

	public function check_username($username) {
		$this->load->model('KaryawanModel'); // Load your model
	
		if ($this->KaryawanModel->username_exists($username)) {
			$this->form_validation->set_message('check_username', 'Username sudah digunakan.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

}