<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelolaBagianIT extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('BagianITModel');
		$this->load->library('form_validation');
    }

   
	public function index()
	{
		$this->load->library('table');
		$data['active_menu'] = 'KelolaBagianIT';
		$data['title'] = 'Kelola Bagian IT';
        $data['BagianIT'] = $this->BagianITModel->getAllData();
		$this->load->view("administator/templates/header", $data);
		$this->load->view("administator/templates/sidebar", $data);
		$this->load->view("administator/bagian_it/view", $data);
		$this->load->view("administator/templates/footer");
	}

	public function tambah()
	{
		$this->form_validation->set_rules("nama", "Nama Bagian IT", "required|is_unique[problemcategories.nama_kategori]");
		$this->form_validation->set_message("is_unique", "{field} sudah digunakan!");
		if ($this->form_validation->run() == FALSE) {
			$data['active_menu'] = 'KelolaBagianIT';
			$data['title'] = 'Kelola Bagian IT';

			$this->load->view("administator/templates/header", $data);
			$this->load->view("administator/templates/sidebar", $data);
			$this->load->view('administator/bagian_it/tambah');
			$this->load->view("administator/templates/footer");
		} else {
			$this->BagianITModel->tambah_data();
			$this->session->set_flashdata('succes', 'Disimpan');
			redirect('administator/KelolaBagianIT');
		}
	}

	public function ubah($kd)
	{
		$this->form_validation->set_rules("nama", "Nama Bagian IT", "required");
		if ($this->form_validation->run() == FALSE) {
			$data['active_menu'] = 'KelolaBagianIT';
			$data['title'] = 'Kelola Bagian IT';
			$data['ubah'] = $this->BagianITModel->detail_data($kd);

			$this->load->view("administator/templates/header", $data);
			$this->load->view("administator/templates/sidebar", $data);
			$this->load->view('administator/bagian_it/ubah', $data);
			$this->load->view("administator/templates/footer");

		} else {
			$this->BagianITModel->ubah_data();
			$this->session->set_flashdata('succes', 'DiUbah');
			redirect('administator/KelolaBagianIT');
		}
	}

	public function hapus($id)
	{
		$this->BagianITModel->hapus_data($id);
		$this->session->set_flashdata('succes', 'Dihapus');
		redirect('administator/KelolaBagianIT');
	}

}