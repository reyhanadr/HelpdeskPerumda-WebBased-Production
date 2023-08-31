<?php

class karyawanmodel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('KaryawanModel');
    }

    public function getAllData()
	{
        $this->db->select('u.user_id, u.karyawan_id, u.nama, u.username, u.email, u.password, u.role_id, u.departemen_id, d.nama_departemen');
        $this->db->from('users u');
        $this->db->join('departments d', 'u.departemen_id = d.departemen_id');
        $this->db->where('u.role_id', 2);
        $query = $this->db->get();
        return $query->result();
	}

	public function getDepartments() {
        $query = $this->db->get('departments'); // Ambil data dari tabel departments
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
			'role_id' => "2",
            'departemen_id' => $this->input->post('departemen', TRUE),
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
			'departemen_id' => $this->input->post('departemen', TRUE),
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
		$this->db->select('u.user_id, u.karyawan_id, u.nama, u.username, u.email, u.password, u.role_id, u.departemen_id, d.nama_departemen');
		$this->db->from('users u');
		$this->db->join('departments d', 'u.departemen_id = d.departemen_id');
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