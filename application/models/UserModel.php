<?php
<<<<<<< HEAD
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function get_user($username, $password)
    {
=======
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {
    public function get_user($username, $password) {
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('users'); // Ganti 'users' dengan nama tabel user Anda
        return $query->row();
    }

<<<<<<< HEAD
    public function getUserById($username)
    {
=======
    public function getUserById($username) {
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
        $this->db->select('users.*, roles.nama_role, departments.nama_departemen');
        $this->db->from('users');
        $this->db->join('roles', 'roles.role_id = users.role_id');
        $this->db->join('departments', 'departments.departemen_id = users.departemen_id');
        $this->db->where('users.username', $username);
        return $this->db->get()->row();
    }

<<<<<<< HEAD

    public function updateProfil($username, $data)
    {
        $this->db->where('username', $username);
        $this->db->update('users', $data);
        return $this->db->affected_rows() > 0;
    }
    public function count_fixed_by_user_n_status($user_id, $status_perangkat)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('status', $status_perangkat);
        return $this->db->count_all_results('supportticket');
    }
    public function count_perangkat_by_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->count_all_results('perangkat');
    }
    //teknisi
    public function getUserByIdTeknisi($username)
    {
        $this->db->select('users.*, roles.nama_role, departments.nama_departemen,problemcategories.nama_kategori');
=======
    public function getUserByIdTeknisi($username) {
        $this->db->select('users.*, roles.nama_role, departments.nama_departemen, problemcategories.nama_kategori');
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
        $this->db->from('users');
        $this->db->join('roles', 'roles.role_id = users.role_id');
        $this->db->join('departments', 'departments.departemen_id = users.departemen_id');
        $this->db->join('problemcategories', 'problemcategories.kategori_id = users.kategori_id');
        $this->db->where('users.username', $username);
        return $this->db->get()->row();
    }
<<<<<<< HEAD
    public function count_fixed_by_kategori_n_status($kategori_id, $status_perangkat)
    {
        $this->db->where('kategori_id', $kategori_id);
        $this->db->where('status', $status_perangkat);
        return $this->db->count_all_results('supportticket');
    }
    public function count_perangkat_by_kategori($kategori_id)
    {
        $this->db->where('kategori_id', $kategori_id);
=======
    
    public function updateProfil($username, $data){
        $this->db->where('username', $username);
        $this->db->update('users', $data);
        return $this->db->affected_rows() > 0;
    }
    public function count_fixed_by_user_n_status($user_id, $status_perangkat) {
        $this->db->where('user_id', $user_id);
        $this->db->where('status', $status_perangkat);
        return $this->db->count_all_results('supportticket');
    }
    public function count_perangkat_byuserid($user_id){
        $this->db->where('user_id', $user_id);
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
        return $this->db->count_all_results('perangkat');
    }


<<<<<<< HEAD


}
=======
}
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
