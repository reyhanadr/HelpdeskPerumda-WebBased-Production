<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ChatModel extends CI_Model {
    public function startChat($user_id, $sesi_pesan, $kategori_id, $message) {
        $data_message = array(
            'sesi_pesan' => $sesi_pesan,
            'sender_id' => $user_id,
            'kategori_id' => $kategori_id,
            'message' => $message,
            'timestamp' => date('Y-m-d H:i:s')
        );
        $data_history= array(
            'sesi_pesan' => $sesi_pesan,
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('messages', $data_message);
        $this->db->insert('historymessage', $data_history);
    }
    // public function getChats($user_id) {
    //     $this->db->select('messages.*, users.user_id, users.nama, users.foto_user, users.role_id');
    //     $this->db->from('messages');
    //     $this->db->join('users', 'users.user_id = messages.sender_id');
    //     $this->db->where('sender_id', $user_id);
    //     return $this->db->get()->result();
    // }

    public function updateMessageStatus($user_id, $sesi_pesan) {
        $data = array(
            'receiver_id' => $user_id,
            'status' => 'taken'
        );
        $this->db->where('sesi_pesan', $sesi_pesan);
        $this->db->update('messages', $data);
    }

    // mengambil data chat dari database untuk menampilkan chat karyawan
    public function getChatsBySesi($user_id, $sesi_pesan) {
        $this->db->select('messages.*, users.user_id, users.nama, users.foto_user, users.role_id');
        $this->db->from('messages');
        $this->db->join('users', 'users.user_id = messages.sender_id');
        $this->db->where('sesi_pesan', $sesi_pesan); // Tambahkan kondisi untuk sesi percakapan
        $this->db->where('sender_id', $user_id);
        $this->db->or_where('receiver_id', $user_id);
        return $this->db->get()->result();
    }

    // mengambil data chat dari database untuk menampilkan chat teknisi sesuai role
    public function getChatsByRole($sesi_pesan, $role_id) {
        $this->db->select('messages.*, users.user_id, users.nama, users.foto_user, users.role_id');
        $this->db->from('messages');
        $this->db->join('users', 'users.user_id = messages.sender_id');
        $this->db->where('sesi_pesan', $sesi_pesan); // Tambahkan kondisi untuk sesi percakapan
        $this->db->where('users.role_id', $role_id);
        return $this->db->get()->result();
    }

    // Mengambil data receiver_id dari pesan terakhir sesuai sesi pesan
    public function getReceiverIdAndStatusBySesi($sesi_pesan) {
        $this->db->select('receiver_id, status');
        $this->db->from('messages');
        $this->db->where('sesi_pesan', $sesi_pesan);
        $this->db->order_by('timestamp', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan objek yang berisi receiver_id dan status
        }
    
        return null;
    }
    


    public function getHistoryMessages($kategori_id) {
        $this->db->select('
            historymessage.history_id, 
            historymessage.sesi_pesan, 
            historymessage.created_at, 
            messages.message, 
            messages.status, 
            messages.receiver_id, 
            sender.nama as sender_nama, 
            receiver.nama as receiver_nama,
            sender.foto_user, 
            departments.nama_departemen, 
            roles.nama_role');
        
        $this->db->from('historymessage');
        $this->db->join('messages', 'historymessage.sesi_pesan = messages.sesi_pesan');
        $this->db->join('users as sender', 'messages.sender_id = sender.user_id');
        $this->db->join('users as receiver', 'messages.receiver_id = receiver.user_id', 'left'); // Use left join here
        $this->db->join('departments', 'sender.departemen_id = departments.departemen_id');
        $this->db->join('roles', 'sender.role_id = roles.role_id');
        $this->db->where('messages.kategori_id', $kategori_id);
        $this->db->group_start();
        $this->db->where('messages.kategori_id', $kategori_id);
        $this->db->or_where('messages.status', 'open');
        $this->db->or_where('messages.receiver_id', NULL, false); // Use NULL condition directly
        $this->db->group_end();
        $this->db->where('roles.role_id', 2);
        
        // Menggunakan subquery untuk mengambil data terbaru berdasarkan created_at
        $this->db->where('historymessage.created_at = (SELECT MAX(h.created_at) FROM historymessage h WHERE h.sesi_pesan = historymessage.sesi_pesan)');
        
        $this->db->order_by('historymessage.created_at', 'DESC');
        return $this->db->get()->result();
    }
    
    

    // public function getChatListByCategoryAndReceiver($kategori_id, $sender_id) {
    //     $this->db->select('
    //         historymessage.history_id, 
    //         historymessage.sesi_pesan, 
    //         MAX(historymessage.created_at) as created_at, 
    //         messages.message, 
    //         users.nama as sender_nama, 
    //         users.foto_user,
    //         departments.nama_departemen,
    //         roles.nama_role
    //     ');
    //     $this->db->from('historymessage');
    //     $this->db->join('messages', 'historymessage.sesi_pesan = messages.sesi_pesan');
    //     $this->db->join('users', 'messages.sender_id = users.user_id');
    //     $this->db->join('departments', 'departments.departemen_id = users.departemen_id');
    //     $this->db->join('roles', 'roles.role_id = users.role_id');
    //     $this->db->where('messages.kategori_id', $kategori_id);
    //     $this->db->where('roles.role_id', "2");
    //     $this->db->group_start();
    //     $this->db->or_where('messages.status', "OPEN");
    //     $this->db->group_end();
    //     $this->db->group_by('historymessage.history_id, historymessage.sesi_pesan, messages.message, departments.nama_departemen, roles.nama_role, sender_nama, foto_user');
    //     $this->db->order_by('created_at', 'DESC');
    //     return $this->db->get()->result();
    // }
    
    
    

    // public function getChatList($user_id) {
    //     $this->db->select('historymessage.*, messages.sender_id, problemcategories.nama_kategori, messages.message, users.nama');
    //     $this->db->from('historymessage');
    //     $this->db->join('messages', 'historymessage.sesi_pesan = messages.sesi_pesan');
    //     $this->db->join('problemcategories', 'messages.kategori_id = problemcategories.kategori_id');
    //     $this->db->join('users', 'messages.sender_id = users.user_id');
    //     $this->db->where('messages.sender_id', $user_id);
    //     $this->db->or_where('messages.receiver_id', $user_id);
    //     $this->db->order_by('historymessage.created_at', 'desc');
    //     return $this->db->get()->result();
    // }

    public function getKategoriIdBySesiPesan($sesi_pesan) {
        $this->db->select('kategori_id');
        $this->db->from('messages'); // Ganti dengan nama tabel yang sesuai
        $this->db->where('sesi_pesan', $sesi_pesan);
        $this->db->order_by('id', 'DESC'); // Urutkan berdasarkan id secara menurun
        $this->db->limit(1); // Ambil hanya 1 baris (data akhir)
        $result = $this->db->get()->row();
    
        if ($result) {
            return $result->kategori_id;
        } else {
            return null; // Kembalikan null jika tidak ada data
        }
    }
    
    
    

    // public function getChatTeknisi($role_id) {
    //     $this->db->select('messages.*, users.user_id, users.nama, users.foto_user, users.role_id');
    //     $this->db->from('messages');
    //     $this->db->join('users', 'users.user_id = messages.sender_id');
    //     $this->db->where('users.role_id', $role_id);
    //     return $this->db->get()->result();
    // }

    public function save_message($data) {
        $this->db->insert('messages', $data);
        return $this->db->insert_id();
    }
    public function getLastSesiPesan(){
        $this->db->select_max('sesi_pesan');
        $this->db->like('sesi_pesan', 'PES', 'after'); // Hanya ambil ID yang dimulai dengan "REQ"
        $this->db->where('LENGTH(sesi_pesan)', 7); // Filter hanya ID produk dengan panjang 5 karakter
        $query = $this->db->get('messages');
        $result = $query->row_array();
    
        // Jika tidak ada data dengan ID "REQ", kembalikan nilai awal yaitu "JM000"
        if ($result['sesi_pesan'] === null) {
            return 'PES0001';
        }
    
        return $result['sesi_pesan'];
    }

    public function getKategoriById($kategori_id) {
        $this->db->select('kategori_id, nama_kategori');

        $this->db->where('kategori_id', $kategori_id);

        return $this->db->get('problemcategories')->row();

    }
    // public function get_messages($sender_id, $receiver_id) {
    //     $this->db->where("(sender_id = $sender_id AND receiver_id = $receiver_id) OR (sender_id = $receiver_id AND receiver_id = $sender_id)");
    //     $this->db->order_by('timestamp', 'ASC');
    //     return $this->db->get('messages')->result_array();
    // }
}