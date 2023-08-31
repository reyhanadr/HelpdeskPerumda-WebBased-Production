<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelolaRequest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('RequestModel');
        $this->load->model('PerangkatModel');
        $this->load->model('UserModel');
        $this->load->model('NotifikasiModel');
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('Home/loginPage');
        }
        $data['active_menu'] = 'kelolaRequest';
        $data['title'] = 'Login Page';
<<<<<<< HEAD
        $username = $this->session->userdata('username'); // Mendapatkan data username dari session
        $kategori_id = $this->session->userdata('kategori_id'); // Mendapatkan kategori dari session

        // Kemudian Anda bisa meneruskan data username ke model
        $data['users'] = $this->UserModel->getUserByIdTeknisi($username);
        $user = $this->UserModel->getUserByIdTeknisi($username);
        $kategori_id = $user->kategori_id;
        $data['tickets'] = $this->RequestModel->getTicketsTeknisi($kategori_id);

        // Mendapatkan Notifikasi
        $data['notif'] = $this->NotifikasiModel->get_notifikasi_by_kategori($kategori_id);
        $data['jml_notif'] = $this->NotifikasiModel->count_notif_by_kategori($kategori_id);
=======
        // Mendapatkan data username dari session
        $username = $this->session->userdata('username');

        // Kemudian Anda bisa meneruskan data username ke model
        $data['tickets'] = $this->RequestModel->getTicketsWithDetails($username);
        $data['users'] = $this->UserModel->getUserByIdTeknisi($username);
        $user = $this->UserModel->getUserByIdTeknisi($username);
        $user_id = $user->user_id;

        // Mendapatkan Notifikasi
        $data['notif'] = $this->NotifikasiModel->get_notifikasi_by_id($user_id);
        $data['jml_notif'] = $this->NotifikasiModel->count_notif_by_id($user_id);

>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e

        $this->load->view('teknisi/templates/header', $data);
        $this->load->view('teknisi/templates/sidebar', $data);
        $this->load->view('teknisi/kelolarequest');
        $this->load->view('teknisi/templates/footer');
    }

<<<<<<< HEAD

=======
    public function tampilTambahRequest()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('Home/loginPage');
        }
        $data['active_menu'] = 'kelolaRequest';
        $data['title'] = 'Login Page';
        // Mendapatkan data username dari session
        $username = $this->session->userdata('username');

        // Mendapatkan ID produk terakhir dari database
        $lastReqID = $this->RequestModel->getlastReqID();
        $newReqID = $this->incrementReqID($lastReqID);

        // Memanggil method dari model
        $data['users'] = $this->UserModel->getUserByIdTeknisi($username);
        $data['perangkat'] = $this->PerangkatModel->getPerangkatUser($username);
        $data['kategori'] = $this->RequestModel->getKategori();

        // Kirim nilai $newReqID ke view menggunakan array data
        $data['newReqID'] = $newReqID;


        // Kemudian Anda bisa meneruskan data username ke model
        $data['users'] = $this->UserModel->getUserByIdTeknisi($username);
        $data['tanggalHariIni'] = date("Y-m-d"); // Format: Tahun-Bulan-Tanggal (contoh: 2023-07-14)

        // Dapatkan user_id
        $user = $this->UserModel->getUserByIdTeknisi($username);
        $user_id = $user->user_id;

        // Mendapatkan Notifikasi
        $data['notif'] = $this->NotifikasiModel->get_notifikasi_by_id($user_id);
        $data['jml_notif'] = $this->NotifikasiModel->count_notif_by_id($user_id);

        // Load view form dan kirim data ke view
        $this->load->view('teknisi/templates/header', $data);
        $this->load->view('teknisi/templates/sidebar', $data);
        $this->load->view('teknisi/tambah-request', $data);
        $this->load->view('teknisi/templates/footer');
    }
    private function incrementReqID($lastReqID)
    {
        // Ambil angka dari ID produk terakhir
        $lastNumber = (int) substr($lastReqID, 4);

        // Increment angka
        $nextNumber = $lastNumber + 1;

        // Jika angka melebihi 999, kembalikan nilai awal "JM000"
        if ($nextNumber > 999) {
            return 'REQ0000';
        }

        // Format angka menjadi tiga digit dengan padding nol di depan
        $nextProductID = 'REQ' . sprintf('%04d', $nextNumber);

        return $nextProductID;
    }

    public function simpanRequest()
    {
        $request_id = $this->input->post('request_id');
        $user_id = $this->input->post('user_id');
        $role_id = $this->input->post('role_id');
        $perangkat_id = $this->input->post('perangkat_id');
        // $nama_perangkat = $this->input->post('nama_perangkat');
        $kategori_id = $this->input->post('kategori_id');
        $department_id = $this->input->post('department_id');
        $status = $this->input->post('status_perangkat');
        $deskripsi_permasalahan = $this->input->post('deskripsi_permasalahan');
        $prioritas = $this->input->post('prioritas');
        $tanggal_dibuat = date('Y-m-d');

        // Upload foto
        $config['upload_path'] = './assets/img/request/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        // Cek apakah perangkat dengan perangkat_id sudah diajukan sebelumnya
        $existing_request = $this->RequestModel->getExistingRequestByPerangkat($perangkat_id);

        if ($existing_request) {
            $this->session->set_flashdata('error', 'Perangkat telah diajukan sebelumnya.');
            redirect('teknisi/Kelolarequest');
        } else {
            if (!$this->upload->do_upload('foto')) {
                $error = $this->upload->display_errors();
                $data['upload_error'] = $error;
                $this->load->view('teknisi/kelolarequest', $data);
            } else {
                $upload_data = $this->upload->data();
                $foto = $upload_data['file_name'];

                $data_request = array(
                    'request_id' => $request_id,
                    'user_id' => $user_id,
                    'role_id' => $role_id,
                    'perangkat_id' => $perangkat_id,
                    'kategori_id' => $kategori_id,
                    'department_id' => $department_id,
                    'status' => $status,
                    'deskripsi_permasalahan' => $deskripsi_permasalahan,
                    'prioritas' => $prioritas,
                    'foto' => $foto,
                    'tanggal_dibuat' => $tanggal_dibuat
                );

                $perangkat = $this->PerangkatModel->getPerangkatById($perangkat_id);
                $nama_perangkat = $perangkat->nama_perangkat;

                $data_notif = array(
                    'user_id' => $user_id,
                    'role_id' => $role_id,
                    'request_id' => $request_id,
                    'kategori_id' => $kategori_id,
                    'department_id' => $department_id,
                    'message_for_teknisi' => 'Perangkat Memiliki Masalah dan Butuh Diperbaiki.',
                    'message_for_karyawan' => 'Anda Telah Mengajukan Request untuk perangkat ' . $nama_perangkat . '.',
                    'created_at' => $tanggal_dibuat,
                    'is_read' => 'UNREAD'
                );

                $this->RequestModel->simpan_request($data_request);
                $this->NotifikasiModel->tambah_notifikasi($data_notif);
                $this->RequestModel->updateStatusPerangkat($perangkat_id, $status);
                $this->session->set_flashdata('success', 'Request Support Ticket Telah Ditambahkan');
                redirect('teknisi/Kelolarequest');
            }
        }


    }

    public function tampilEditRequest($request_id)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('Home/loginPage');
        }
        $data['active_menu'] = 'kelolaRequest';
        $data['title'] = 'Login Page';
        // Mendapatkan data username dari session
        $username = $this->session->userdata('username');

        // Kueri dari Model
        $data['users'] = $this->UserModel->getUserByIdTeknisi($username);
        $data['request'] = $this->RequestModel->getRequestById($request_id);

        // Mengambil user_id
        $user = $this->UserModel->getUserByIdTeknisi($username);
        $user_id = $user->user_id;

        // Mendapatkan Notifikasi
        $data['notif'] = $this->NotifikasiModel->get_notifikasi_by_id($user_id);
        $data['jml_notif'] = $this->NotifikasiModel->count_notif_by_id($user_id);

        // Load view form dan kirim data ke view
        $this->load->view('teknisi/templates/header', $data);
        $this->load->view('teknisi/templates/sidebar', $data);
        $this->load->view('teknisi/edit-request', $data);
        $this->load->view('teknisi/templates/footer');
    }

    public function updateRequest($request_id)
    {
        $deskripsi = $this->input->post('deskripsi');
        $prioritas = $this->input->post('prioritas');
        $catatan = $this->input->post('catatan');

        // Upload foto baru (jika ada)
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path'] = './assets/img/request/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $upload_data = $this->upload->data();
                $foto = $upload_data['file_name'];
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('teknisi/KelolaRequest/tampilEditRequest/' . $request_id);
            }
        }

        // Data yang akan diupdate
        $data = array(
            'deskripsi_permasalahan' => $deskripsi,
            'prioritas' => $prioritas,
            'catatan' => $catatan
        );

        if (!empty($foto)) {
            $data['foto'] = $foto;
        }

        // Lakukan update
        $this->RequestModel->updateRequest($request_id, $data);

        $this->session->set_flashdata('success', 'Request telah diperbarui');
        redirect('teknisi/KelolaRequest/');
    }
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e

    public function setStatusToRunning($request_id)
    {
        // Ambil data request berdasarkan ID
        $request = $this->RequestModel->getRequestById($request_id);

<<<<<<< HEAD
        // Definisikan array pesan untuk masing-masing status
        $statusMessages = [
            'FIXED' => 'Status perangkat berhasil diperbaiki dan dapat digunakan.',
            'PENDING' => 'Status perangkat dalam proses perbaikan.',
            'NOTFIXED' => 'Status tidak dapat diubah ke RUNNING karena perangkat tidak dapat diperbaiki.'
        ];

        // Cek apakah status saat ini ada dalam array pesan
        if (array_key_exists($request->status, $statusMessages)) {
            // Ubah status perangkat juga menjadi "RUNNING"
            $newStatus = 'RUNNING';
            $this->PerangkatModel->updateStatusPerangkat($request->perangkat_id, $newStatus);

            // Set flash data berdasarkan pesan yang sesuai dengan status
            $this->session->set_flashdata('success', $statusMessages[$request->status]);

            // Ubah status permintaan menjadi "RUNNING" setelah flash data diatur
            $this->RequestModel->updateStatusRequest($request_id, $newStatus);

            // Redirect ke halaman yang sesuai
            redirect('teknisi/KelolaRequest');
        } else {
            // Jika status tidak ada dalam array pesan, beri pesan kesalahan default
            $this->session->set_flashdata('error', 'Status tidak valid.');

            // Redirect ke halaman yang sesuai
=======
        // Jika status saat ini adalah "FIXED", ubah menjadi "RUNNING"
        if ($request->status === 'FIXED') {
            $newStatus = 'RUNNING';
            $this->RequestModel->updateStatusToRunning($request_id, $newStatus);

            // Set flash data untuk pesan sukses
            $this->session->set_flashdata('success', 'Status berhasil diubah menjadi RUNNING.');
            redirect('teknisi/KelolaRequest');
        } elseif ($request->status === 'PENDING') {
            // Set flash data untuk pesan error
            $this->session->set_flashdata('error', 'Status tidak dapat diubah ke RUNNING Karena Sedang Ditinjau untuk diperbaiki.');
            redirect('teknisi/KelolaRequest');
        } elseif ($request->status === 'NOTFIXED') {
            // Set flash data untuk pesan error
            $this->session->set_flashdata('error', 'Status tidak dapat diubah ke RUNNING Karena Perangkat Tidak dapat diperbaiki.');
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
            redirect('teknisi/KelolaRequest');
        }
    }

<<<<<<< HEAD
    // Fungsi setStatusToFixed dan setStatusToNotFixed juga dapat diperbarui dengan pola yang sama.



    public function setStatusToFixed($request_id)
    {
        // Ambil data request berdasarkan ID
        $request = $this->RequestModel->getRequestById($request_id);

        // Definisikan array pesan untuk masing-masing status
        $statusMessages = [
            'RUNNING' => 'Status masih dalam proses pengerjaan',
            'PENDING' => 'Status tidak dapat diubah ke RUNNING karena sedang ditinjau untuk diperbaiki.',
            'NOTFIXED' => 'Status tidak dapat diubah ke RUNNING karena perangkat tidak dapat diperbaiki.'
        ];

        // Cek apakah status saat ini ada dalam array pesan
        if (array_key_exists($request->status, $statusMessages)) {
            // Ubah status menjadi "FIXED"
            $newStatus = 'FIXED';

            // Set zona waktu ke "Asia/Jakarta"
            date_default_timezone_set('Asia/Jakarta');

            // Tambahkan tanggal saat ini
            $currentDate = date('Y-m-d H:i:s');

            // Update status dan tanggal dalam database
            $this->RequestModel->updateStatusAndDateRequest($request_id, $newStatus, $currentDate);

            // Ubah status perangkat juga menjadi "FIXED"
            $this->PerangkatModel->updateStatusPerangkat($request->perangkat_id, $newStatus);

            // Set flash data berdasarkan pesan yang sesuai dengan status
            $this->session->set_flashdata('success', $statusMessages[$request->status]);
        } else {
            // Jika status tidak ada dalam array pesan, beri pesan kesalahan default
            $this->session->set_flashdata('error', 'Status tidak valid.');
        }

        // Redirect ke halaman yang sesuai
        redirect('teknisi/KelolaRequest');
    }

    public function setStatusToNotFixed($request_id)
    {
        // Ambil data request berdasarkan ID
        $request = $this->RequestModel->getRequestById($request_id);

        // Definisikan array pesan untuk masing-masing status
        $statusMessages = [
            'RUNNING' => 'Status masih dalam proses pengerjaan',
            'PENDING' => 'Status tidak dapat diubah ke RUNNING karena sedang ditinjau untuk diperbaiki.',
            'NOTFIXED' => 'Status tidak dapat diubah ke RUNNING karena perangkat tidak dapat diperbaiki.'
        ];

        // Cek apakah status saat ini ada dalam array pesan
        if (array_key_exists($request->status, $statusMessages)) {
            // Ubah status menjadi "NOT FIXED"
            $newStatus = 'NOT FIXED';
            $this->RequestModel->updateStatusRequest($request_id, $newStatus);

            // Ubah status perangkat juga menjadi "FIXED"
            $this->PerangkatModel->updateStatusPerangkat($request->perangkat_id, $newStatus);

            // Set flash data berdasarkan pesan yang sesuai dengan status
            $this->session->set_flashdata('success', $statusMessages[$request->status]);
        } else {
            // Jika status tidak ada dalam array pesan, beri pesan kesalahan default
            $this->session->set_flashdata('error', 'Status tidak valid.');
        }

        // Redirect ke halaman yang sesuai
        redirect('teknisi/KelolaRequest');
    }

=======



>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
}