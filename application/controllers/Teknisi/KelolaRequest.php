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

        $this->load->view('teknisi/templates/header', $data);
        $this->load->view('teknisi/templates/sidebar', $data);
        $this->load->view('teknisi/kelolarequest');
        $this->load->view('teknisi/templates/footer');
    }



    public function setStatusToRunning($request_id)
    {
        // Ambil data request berdasarkan ID
        $request = $this->RequestModel->getRequestById($request_id);

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
            redirect('teknisi/KelolaRequest');
        }
    }

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

}