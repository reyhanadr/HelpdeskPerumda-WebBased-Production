<?php
defined('BASEPATH') or exit('No direct script access allowed');

<<<<<<< HEAD
class RequestModel extends CI_Model
{

    public function getExistingRequestByPerangkat($perangkat_id)
    {
        $this->db->where('perangkat_id', $perangkat_id);
        return $this->db->get('supportticket')->row(); // Ganti 'nama_tabel_request' dengan nama tabel yang sesuai
    }

    public function getTicketsWithDetails($username)
    {
        $this->db->select('supportticket.*, users.user_id as user_id, users.nama, roles.nama_role, perangkat.nama_perangkat, problemcategories.nama_kategori, departments.nama_departemen');
=======
class RequestModel extends CI_Model {

    // Karyawan
    public function getExistingRequestByPerangkat($perangkat_id) {
        $this->db->where('perangkat_id', $perangkat_id);
        $this->db->where('status', "PENDING");
        return $this->db->get('supportticket')->row(); // Ganti 'nama_tabel_request' dengan nama tabel yang sesuai
    }

    public function getTicketsWithDetails($username) {
        $this->db->select('supportticket.*, users.user_id as user_id, users.nama as nama_user, roles.nama_role, perangkat.nama_perangkat, problemcategories.nama_kategori, departments.nama_departemen, penanggung_jawab.nama as penanggung_jawab_nama');
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
        $this->db->from('supportticket');
        $this->db->join('users', 'users.user_id = supportticket.user_id');
        $this->db->join('roles', 'roles.role_id = users.role_id');
        $this->db->join('perangkat', 'perangkat.id = supportticket.perangkat_id');
        $this->db->join('problemcategories', 'problemcategories.kategori_id = supportticket.kategori_id');
        $this->db->join('departments', 'departments.departemen_id = supportticket.department_id');
<<<<<<< HEAD
=======
        $this->db->join('users as penanggung_jawab', 'penanggung_jawab.user_id = supportticket.penanggung_jawab_perbaikan', 'left'); // Left join untuk penanggung jawab
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
        $this->db->where('users.username', $username); // Filter berdasarkan username
        return $this->db->get()->result();
    }

<<<<<<< HEAD
    //teknisi
    public function getTicketsTeknisi($kategori_id)
    {
        $this->db->select('supportticket.*, users.username, users.nama, perangkat.nama_perangkat, problemcategories.nama_kategori, departments.nama_departemen');
        $this->db->from('supportticket');
        $this->db->join('users', 'users.user_id = supportticket.user_id');
        $this->db->join('perangkat', 'perangkat.id = supportticket.perangkat_id');
        $this->db->join('departments', 'departments.departemen_id = supportticket.department_id');
        $this->db->join('problemcategories', 'problemcategories.kategori_id = supportticket.kategori_id'); // Perbaikan disini
        $this->db->where('problemcategories.kategori_id', $kategori_id);
        return $this->db->get()->result();
    }
    public function getLastReqID()
    {
=======

    public function getLastReqID(){
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
        $this->db->select_max('request_id');
        $this->db->like('request_id', 'REQ', 'after'); // Hanya ambil ID yang dimulai dengan "REQ"
        $this->db->where('LENGTH(request_id)', 7); // Filter hanya ID produk dengan panjang 5 karakter
        $query = $this->db->get('supportticket');
        $result = $query->row_array();
<<<<<<< HEAD

=======
    
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
        // Jika tidak ada data dengan ID "JM", kembalikan nilai awal yaitu "JM000"
        if ($result['request_id'] === null) {
            return 'REQ0001';
        }
<<<<<<< HEAD

        return $result['request_id'];
    }
    public function getKategori()
    {
=======
    
        return $result['request_id'];
    }
    public function getKategori() {
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
        $this->db->select('kategori_id, nama_kategori');
        $query = $this->db->get('problemcategories');
        return $query->result();
    }

<<<<<<< HEAD
    public function simpan_request($data_request)
    {
        $this->db->insert('supportticket', $data_request);
    }

    public function tambah_notifikasi($data)
    {
        $this->db->insert('notification', $data);
    }

    public function updateStatusPerangkat($perangkat_id, $status)
    {
=======
    public function simpan_request($data_request) {
        $this->db->insert('supportticket', $data_request);
    }

    public function tambah_notifikasi($data) {
        $this->db->insert('notification', $data);
    }
    
    public function updateStatusPerangkat($perangkat_id, $status) {
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
        $data = array(
            'status_perangkat' => $status
        );

        $this->db->where('id', $perangkat_id);
        $this->db->update('perangkat', $data);
    }

<<<<<<< HEAD
    public function getRequestById($request_id)
    {
=======
    public function getRequestById($request_id) {
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
        $this->db->select('supportticket.*, perangkat.nama_perangkat, problemcategories.nama_kategori, departments.nama_departemen');
        $this->db->from('supportticket');
        $this->db->join('perangkat', 'perangkat.id = supportticket.perangkat_id');
        $this->db->join('problemcategories', 'problemcategories.kategori_id = supportticket.kategori_id');
        $this->db->join('departments', 'departments.departemen_id = supportticket.department_id');
        $this->db->where('request_id', $request_id);
        return $this->db->get()->row();
    }
<<<<<<< HEAD

    public function updateRequest($request_id, $data)
    {
=======
    

    public function updateRequest($request_id, $data) {
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
        $this->db->where('request_id', $request_id);
        $this->db->update('supportticket', $data);
    }

<<<<<<< HEAD
    public function updateStatusRequest($request_id, $newStatus)
    {
=======
    public function updateStatusToRunning($request_id, $newStatus) {
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
        $data = array('status' => $newStatus);
        $this->db->where('request_id', $request_id);
        $this->db->update('supportticket', $data);
    }
<<<<<<< HEAD


    public function searchRequest($keyword)
    {
=======
    public function searchRequest($keyword) {
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
        $this->db->select('supportticket.*, users.nama, perangkat.nama_perangkat, problemcategories.nama_kategori, departments.nama_departemen');
        $this->db->from('supportticket');
        $this->db->join('users', 'supportticket.user_id = users.user_id', 'left');
        $this->db->join('perangkat', 'supportticket.perangkat_id = perangkat.id', 'left');
        $this->db->join('problemcategories', 'perangkat.kategori_id = problemcategories.kategori_id', 'left');
        $this->db->join('departments', 'supportticket.department_id = departments.departemen_id', 'left');
<<<<<<< HEAD

=======
        
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
        $this->db->like('users.nama', $keyword); // Tambahkan alias 'users' sebelum kolom
        $this->db->like('perangkat.nama_perangkat', $keyword); // Tambahkan alias 'perangkat' sebelum kolom
        $this->db->or_like('problemcategories.nama_kategori', $keyword); // Tambahkan alias 'problemcategories' sebelum kolom
        $this->db->or_like('departments.nama_departemen', $keyword); // Tambahkan alias 'departments' sebelum kolom
<<<<<<< HEAD
=======
        $this->db->or_like('supportticket.request_id', $keyword); // Tambahkan alias 'supportticket' sebelum kolom
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
        $this->db->or_like('supportticket.status', $keyword); // Tambahkan alias 'supportticket' sebelum kolom
        $this->db->or_like('supportticket.deskripsi_permasalahan', $keyword); // Tambahkan alias 'supportticket' sebelum kolom
        $this->db->or_like('supportticket.prioritas', $keyword); // Tambahkan alias 'supportticket' sebelum kolom
        $this->db->or_like('supportticket.foto', $keyword); // Tambahkan alias 'supportticket' sebelum kolom
        $this->db->or_like('supportticket.tanggal_dibuat', $keyword); // Tambahkan alias 'supportticket' sebelum kolom
        $this->db->or_like('supportticket.tanggal_ditangani', $keyword); // Tambahkan alias 'supportticket' sebelum kolom
        $this->db->or_like('supportticket.catatan', $keyword); // Tambahkan alias 'supportticket' sebelum kolom
<<<<<<< HEAD

        return $this->db->get()->result();
    }

    public function updateStatusAndDateRequest($request_id, $newStatus, $currentDate)
    {
        $data = array(
            'status' => $newStatus,
            'tanggal_ditangani' => $currentDate
        );

        $this->db->where('request_id', $request_id);
        $this->db->update('supportticket', $data);
    }



}
=======
        
        return $this->db->get()->result();
    }

    // Teknisi
    public function getTicketsTeknisi($kategori_id){
        $this->db->select('supportticket.*, users.user_id as user_id, users.username, roles.nama_role, perangkat.nama_perangkat, problemcategories.nama_kategori, departments.nama_departemen');
        $this->db->from('supportticket');
        $this->db->join('users', 'users.user_id = supportticket.user_id');
        $this->db->join('roles', 'roles.role_id = users.role_id');
        $this->db->join('perangkat', 'perangkat.id = supportticket.perangkat_id');
        $this->db->join('problemcategories', 'problemcategories.kategori_id = supportticket.kategori_id');
        $this->db->join('departments', 'departments.departemen_id = supportticket.department_id');
        $this->db->where('users.kategori_id', $kategori_id); // Filter berdasarkan kategori
        return $this->db->get()->result();
    }
    
}
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
