<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelolaDepartemen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('DepartemenModel');
		$this->load->library('form_validation');
    }

   
	public function index()
	{
		$this->load->library('table');
		$data['active_menu'] = 'KelolaDepartemen';
		$data['title'] = 'Kelola Departemen';
        $data['departemen'] = $this->DepartemenModel->getAllData();
		$this->load->view("administator/templates/header", $data);
		$this->load->view("administator/templates/sidebar", $data);
		$this->load->view("administator/departemen/view", $data);
		$this->load->view("administator/templates/footer");
	}

	public function tambah()
	{
		$this->form_validation->set_rules("nama", "Nama Departemen", "required|is_unique[departments.nama_departemen]");
		$this->form_validation->set_message("is_unique", "{field} sudah digunakan!");
		if ($this->form_validation->run() == FALSE) {
			$data['active_menu'] = 'KelolaDepartemen';
			$data['title'] = 'Kelola Departemen';
			$this->load->view("administator/templates/header", $data);
			$this->load->view("administator/templates/sidebar", $data);
			$this->load->view('administator/departemen/tambah');
			$this->load->view("administator/templates/footer");
		} else {
			$this->DepartemenModel->tambah_data();
			$this->session->set_flashdata('succes', 'Disimpan');
			redirect('administator/KelolaDepartemen');
		}
	}

	public function ubah($kd)
	{
		$this->form_validation->set_rules("nama", "Nama Departemen", "required");
		if ($this->form_validation->run() == FALSE) {
			$data['active_menu'] = 'KelolaDepartemen';
			$data['title'] = 'Kelola Departemen';
			$data['ubah'] = $this->DepartemenModel->detail_data($kd);

			$this->load->view("administator/templates/header", $data);
			$this->load->view("administator/templates/sidebar", $data);
			$this->load->view('administator/departemen/ubah', $data);
			$this->load->view("administator/templates/footer");

		} else {
			$this->DepartemenModel->ubah_data();
			$this->session->set_flashdata('succes', 'DiUbah');
			redirect('administator/KelolaDepartemen');
		}
	}

	public function hapus($id)
	{
		$this->DepartemenModel->hapus_data($id);
		$this->session->set_flashdata('succes', 'Dihapus');
		redirect('administator/KelolaDepartemen');
	}

}