<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelolaTeknisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('TeknisiModel');
		$this->load->library('form_validation');
    }

   
	public function index()
	{
		$this->load->library('table');
		$data['active_menu'] = 'KelolaTeknisi';
		$data['title'] = 'Kelola Teknisi';
        $data['teknisi'] = $this->TeknisiModel->getAllData();

		$this->load->view("administator/templates/header", $data);
		$this->load->view("administator/templates/sidebar", $data);
		$this->load->view("administator/teknisi/view", $data);
		$this->load->view("administator/templates/footer");
	}

	public function tambah()
	{
		$this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]');
		$this->form_validation->set_message("is_unique", "{field} sudah digunakan!");
		if ($this->form_validation->run() == FALSE) {
			$data['active_menu'] = 'KelolaTeknisi';
			$data['title'] = 'Kelola Teknisi';
			$data['kategori'] = $this->TeknisiModel->getKategori(); // Ambil data departemen dari model
			
			$this->load->view("administator/templates/header", $data);
			$this->load->view("administator/templates/sidebar", $data);
			$this->load->view('administator/Teknisi/tambah', $data); // Tampilkan view dengan data
			$this->load->view("administator/templates/footer");
		} else {
			$this->TeknisiModel->tambah_data();
			$this->session->set_flashdata('succes', 'Disimpan');
			redirect('administator/KelolaTeknisi');
		}
	}
	
	public function ubah($id)
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data['active_menu'] = 'KelolaTeknisi';
			$data['title'] = 'Kelola Teknisi';
			$data['ubah'] = $this->TeknisiModel->detail_data($id);
			$data['kategori'] = $this->TeknisiModel->getKategori(); // Ambil data departemen dari model

			$this->load->view("administator/templates/header", $data);
			$this->load->view("administator/templates/sidebar", $data);
			$this->load->view('administator/teknisi/ubah', $data);
			$this->load->view("administator/templates/footer");
		} else {
			$this->TeknisiModel->ubah_data();
			$this->session->set_flashdata('succes', 'DiUbah');
			redirect('administator/KelolaTeknisi');
		}
	}

	public function hapus($id)
	{
		$this->TeknisiModel->hapus_data($id);
		$this->session->set_flashdata('succes', 'Dihapus');
		redirect('administator/KelolaTeknisi');
	}

}