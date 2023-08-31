<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelolaPesan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url'); 
		$this->load->library('session');
		$this->load->model('RequestModel');
		$this->load->model('PerangkatModel');
		$this->load->model('UserModel');
		$this->load->model('NotifikasiModel');
		$this->load->model('ChatModel');

    }
    public function index(){
        if (!$this->session->userdata('logged_in')) {
            redirect('Home/loginPage');
        }
		$data['active_menu'] = 'pesan-view';
		$data['title'] = 'Chat Page';
        // Mendapatkan data username dari session
		$username = $this->session->userdata('username'); 

		// Kemudian Anda bisa meneruskan data username ke model
		$data['tickets'] = $this->RequestModel->getTicketsWithDetails($username);
		$data['users'] = $this->UserModel->getUserByIdTeknisi($username);
        $user_id = $this->session->userdata('user_id'); 

        // Mendapatkan Notifikasi
        $data['notif'] = $this->NotifikasiModel->get_notifikasi_by_id($user_id);
        $data['jml_notif'] = $this->NotifikasiModel->count_notif_by_id($user_id);

        // Mendapatkan List Pesan
        $kategori_id = $this->session->userdata('kategori'); 
        $data['list_chat'] = $this->ChatModel->getHistoryMessages($kategori_id);

		$this->load->view('Teknisi/templates/header', $data);
		$this->load->view('Teknisi/templates/sidebar', $data);
		$this->load->view('Teknisi/chat-list', $data);
		$this->load->view('Teknisi/templates/footer');
    }

    public function requestPesan(){
        if (!$this->session->userdata('logged_in')) {
            redirect('Home/loginPage');
        }
		$data['active_menu'] = 'pesan-view';
		$data['title'] = 'Chat Page';
        // Mendapatkan data username dari session
		$username = $this->session->userdata('username'); 

		// Kemudian Anda bisa meneruskan data username ke model
		$data['tickets'] = $this->RequestModel->getTicketsWithDetails($username);
		$data['users'] = $this->UserModel->getUserById($username);
        // mengambil data kategori
		$data['kategori'] = $this->PerangkatModel->getKategori();
		$user = $this->UserModel->getUserById($username);
        $user_id = $user->user_id;

        // Mendapatkan Notifikasi
        $data['notif'] = $this->NotifikasiModel->get_notifikasi_by_id($user_id);
        $data['jml_notif'] = $this->NotifikasiModel->count_notif_by_id($user_id);


		$this->load->view('karyawan/templates/header', $data);
		$this->load->view('karyawan/templates/sidebar', $data);
		$this->load->view('karyawan/chat-kategori', $data);
		$this->load->view('karyawan/templates/footer');
    }

    private function incrementSesi_Pesan($lastSesiPesan){
        // Ambil angka dari ID produk terakhir
        $lastNumber = (int) substr($lastSesiPesan, 4);

        // Increment angka
        $nextNumber = $lastNumber + 1;

        // Jika angka melebihi 999, kembalikan nilai awal "JM000"
        if ($nextNumber > 999) {
            return 'PES0000';
        }

        // Format angka menjadi tiga digit dengan padding nol di depan
        $nextProductID = 'PES' . sprintf('%04d', $nextNumber);

        return $nextProductID;
    }

    public function start_chat(){
        $lastSesiPesan = $this->ChatModel->getLastSesiPesan();
        $newSesiPesan = $this->incrementSesi_Pesan($lastSesiPesan);
    
        if (!$this->session->userdata('logged_in')) {
            redirect('Home/loginPage');
        }
            
        $data['active_menu'] = 'pesan-view';
        $data['title'] = 'Chat Page';
        // Mendapatkan data username dari session
        $username = $this->session->userdata('username'); 
    
        // Kemudian Anda bisa meneruskan data username ke model
        $data['users'] = $this->UserModel->getUserById($username);
        $user = $this->UserModel->getUserById($username);
        $user_id = $user->user_id;
        // mendapatkan departemen karyawan untuk notifikasi
        $depart_user = $user->departemen_id;

        // Mendapatkan Notifikasi
        $data['notif'] = $this->NotifikasiModel->get_notifikasi_by_id($user_id);
        $data['jml_notif'] = $this->NotifikasiModel->count_notif_by_id($user_id);
    
        // ambil input yang diperlukan untuk memulai percakapan
        $kategori_id = $this->input->post('kategori_id');
        $message = $this->input->post('message');
		$tanggal_dibuat = date('Y-m-d');

        $data['getKategori'] = $this->ChatModel->getKategoriById($kategori_id);
        // ambil data untuk notif
        $data_notif = array(
            'user_id' => $user_id,
            'kategori_id' => $kategori_id,
            'department_id' => $depart_user,
            'message_for_teknisi' => 'Terdapat Pesan Baru dari '. $user->nama,
            'message_for_karyawan' => 'Anda Telah Mengajukan Live Chat untuk kategori '.  $data['getKategori']->nama_kategori . '.',
            'created_at' => $tanggal_dibuat,
            'link' => 'KelolaPesan/chatroom/' . $newSesiPesan,
            'is_read' => 'UNREAD'
        );

        $this->NotifikasiModel->tambah_notifikasi($data_notif);
        $this->ChatModel->startChat($user_id, $newSesiPesan, $kategori_id, $message);
        redirect('KelolaPesan/chatroom/' . $newSesiPesan); // Arahkan ke chatroom dengan sesi yang benar
    }
    

    public function chatroom($sesi_pesan) {
        if (!$this->session->userdata('logged_in')) {
            redirect('Home/loginPage');
        }
            
        $data['active_menu'] = 'Dashboard';
        $data['title'] = 'Chat Page';
        // Mendapatkan data username dari session
        $username = $this->session->userdata('username'); 
        $user_id = $this->session->userdata('user_id'); 
        $kategori_id = $this->session->userdata('kategori_id'); 
        // Kemudian Anda bisa meneruskan data username ke model
        $data['users'] = $this->UserModel->getUserById($username);
    
        // if ($data['users']->role_id == 3):
        //     // Mendapatkan Notifikasi Teknisi
        //     $data['notif'] = $this->NotifikasiModel->get_notifikasiforteknisi_by_id($sesi_pesan, $kategori_id);
        //     $data['jml_notif'] = $this->NotifikasiModel->count_notif_forteknisi_by_id($sesi_pesan, $kategori_id);
        // elseif ($data['users']->role_id == 2):
        //     // Mendapatkan Notifikasi Karyawan
        //     $data['notif'] = $this->NotifikasiModel->get_notifikasi_by_id($user_id);
        //     $data['jml_notif'] = $this->NotifikasiModel->count_notif_by_id($user_id);
        // endif;
            // Mendapatkan Notifikasi Karyawan
            $data['notif'] = $this->NotifikasiModel->get_notifikasi_by_id($user_id);
            $data['jml_notif'] = $this->NotifikasiModel->count_notif_by_id($user_id);



        // Tampilan chatroom dengan sesi percakapan yang benar
        $data['chats'] = $this->ChatModel->getChatsBySesi($user_id, $sesi_pesan);
        $data['chats_teknisi'] = $this->ChatModel->getChatsByRole($sesi_pesan, 3);
        $data['get_receiver_status'] = $this->ChatModel->getReceiverIdAndStatusBySesi($sesi_pesan);

        // Ambil Data Sesi Pesan dan kategori_id agar dapat mengirim pesan baru
        $data['sesi_pesan'] = $sesi_pesan;
        // Ambil kategori_id berdasarkan sesi_pesan dari URL
        $data['kategori_id'] = $this->ChatModel->getKategoriIdBySesiPesan($sesi_pesan);
        // $data['chats_teknisi'] = $this->ChatModel->getChatTeknisi(3);
    
        // Tentukan tampilan header berdasarkan peran pengguna
        if ($data['users']->role_id == 2) {
            $this->load->view('karyawan/templates/header', $data);
        } elseif ($data['users']->role_id == 3) {
            $this->load->view('Teknisi/templates/header', $data);
        }
        $this->load->view('karyawan/templates/sidebar', $data);
        $this->load->view('chat-room', $data);
        // $this->load->view('karyawan/templates/footer');
    }

    public function terimaPesanTeknisi($sesi_pesan){
        if (!$this->session->userdata('logged_in')) {
            redirect('Home/loginPage');
        }
        $user_id = $this->session->userdata('user_id'); 
        $this->ChatModel->updateMessageStatus($user_id, $sesi_pesan);
        redirect('KelolaPesan/chatroom/' . $sesi_pesan); // Arahkan ke chatroom dengan sesi yang benar

    }
    

    public function kirimPesan() {
        $sesi_pesan = $this->input->post('sesi_pesan');
        $kategori_id = $this->input->post('kategori_id');
        $sender_id = $this->input->post('sender_id');
        $receiver_id = $this->input->post('receiver_id');
        $status = $this->input->post('status');
        $message = $this->input->post('message');

        $data = array(
            'sesi_pesan' => $sesi_pesan,
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'kategori_id' => $kategori_id,
            'status' => $status,
            'message' => $message        );

        $this->ChatModel->save_message($data);
        // Redirect or return success response
        redirect('KelolaPesan/chatroom/' . $sesi_pesan); // Arahkan ke chatroom dengan sesi yang benar

    }

    public function markNotificationAsRead() {
        $notifId = $this->input->post('notif_id');
    
        // Panggil model atau metode yang akan mengubah status notifikasi
        $this->NotifikasiModel->markNotificationAsRead($notifId);
    
        // Berikan respons sesuai kebutuhan, misalnya pesan sukses atau status
        echo 'Success';
    }
    

    public function getPesan() {
        $sender_id = $this->input->get('sender_id');
        $receiver_id = $this->input->get('receiver_id');

        $messages = $this->Chat_model->get_messages($sender_id, $receiver_id);
        echo json_encode($messages);
    }
}