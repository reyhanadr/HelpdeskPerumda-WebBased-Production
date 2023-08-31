<?php

class TeknisiModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('TeknisiModel');
    }

    public function getAllData()
	{
        $this->db->select('u.user_id, u.karyawan_id, u.nama, u.username, u.email, u.password, u.role_id, u.kategori_id, pc.nama_kategori');
        $this->db->from('users u');
        $this->db->join('problemcategories pc', 'u.kategori_id = pc.kategori_id');
        $this->db->where('u.role_id', 3);
        $query = $this->db->get();
        return $query->result();
	}

	public function getKategori() {
        $query = $this->db->get('problemcategories'); // Ambil data dari tabel departments
        return $query->result_array(); // Kembalikan hasil dalam bentuk array
    }
	

	public function tambah_data()
	{
		$query = $this->db->select_max('user_id')->get('users');
		$result = $query->row();
		$last_user_id = $result->user_id;

		// Membuat nomor berikutnya
		$new_user_id = $last_user_id + 1;
		$data = array(
			'user_id' => $new_user_id,
			'karyawan_id' => $this->input->post('karyawan_id', true),
			'nama' => $this->input->post('nama', true),
            'username' => $this->input->post('username', TRUE),
            'password' => md5($this->input->post('password', TRUE)),
            'email' => $this->input->post('email', TRUE),
			'role_id' => "3",
            'kategori_id' => $this->input->post('kategori', TRUE),
			'foto_user' => "user.jpg"
		);
		$this->db->insert('users', $data);
	}


	public function ubah_data()
	{
		$data = array(
			'nama' => $this->input->post('nama', true),
			'username' => $this->input->post('username', true),
			'password' => md5($this->input->post('password', TRUE)),
			'email' => $this->input->post('email', TRUE),
			'kategori_id' => $this->input->post('bidang', TRUE),
		);
		$this->db->where('karyawan_id', $this->input->post('karyawan_id', true));
		$this->db->update('users', $data);
	}


	public function hapus_data($id)
	{
		$this->db->delete('users', ['user_id' => $id]);
	}

	public function detail_data($id)
	{
        $this->db->select('u.user_id, u.karyawan_id, u.nama, u.username, u.email, u.password, u.role_id, u.kategori_id, pc.nama_kategori');
        $this->db->from('users u');
        $this->db->join('problemcategories pc', 'u.kategori_id = pc.kategori_id');
		$this->db->where('u.karyawan_id', $id); // Ubah dari 'karyawan_id' ke 'user_id'
		$query = $this->db->get();
		return $query->row_array(); // Menggunakan row_array() karena hanya mengambil satu data
	}

	public function username_exists($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('users'); // Ganti 'users' dengan nama tabel yang sesuai

        if ($query->num_rows() > 0) {
            return TRUE; // Username sudah ada
        } else {
            return FALSE; // Username belum ada
        }
    }
}