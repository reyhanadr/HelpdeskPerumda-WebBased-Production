<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KelolaPerangkat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('PerangkatModel');
        $this->load->model('UserModel');
        $this->load->model('NotifikasiModel');

    }

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('Home/loginPage');
        }
        $data['active_menu'] = 'kelolaPerangkat';
        $data['title'] = 'Login Page';
        $username = $this->session->userdata('username'); // Mendapatkan username dari session
        $kategori_id = $this->session->userdata('kategori_id'); // Mendapatkan kategori dari session


        // Memanggil method get_user_perangkat dari model
        $data['perangkat'] = $this->PerangkatModel->getPerangkatTeknisi($kategori_id);
        $data['users'] = $this->UserModel->getUserByIdTeknisi($username);
        $user = $this->UserModel->getUserByIdTeknisi($username);
        $user_id = $user->user_id;

        // Mendapatkan Notifikasi
        $data['notif'] = $this->NotifikasiModel->get_notifikasi_by_id($user_id);
        $data['jml_notif'] = $this->NotifikasiModel->count_notif_by_id($user_id);

        $this->load->view('teknisi/templates/header', $data);
        $this->load->view('teknisi/templates/sidebar', $data);
        $this->load->view('teknisi/kelolaperangkat');
        $this->load->view('teknisi/templates/footer');
    }

    public function tampilTambahPerangkat()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('Home/loginPage');
        }
        $data['active_menu'] = 'kelolaPerangkat';
        $data['title'] = 'Tambah Perangkat';
        $username = $this->session->userdata('username'); // Mendapatkan username dari session

        // Memanggil method dari model
        $data['users'] = $this->UserModel->getUserByIdTeknisi($username);
        $data['kategori'] = $this->PerangkatModel->getKategori();

        // Mengambil user_id
        $user = $this->UserModel->getUserByIdTeknisi($username);
        $user_id = $user->user_id;

        // Mendapatkan Notifikasi
        $data['notif'] = $this->NotifikasiModel->get_notifikasi_by_id($user_id);
        $data['jml_notif'] = $this->NotifikasiModel->count_notif_by_id($user_id);

        $this->load->view('teknisi/templates/header', $data);
        $this->load->view('teknisi/templates/sidebar', $data);
        $this->load->view('teknisi/tambah-perangkat', $data);
        $this->load->view('teknisi/templates/footer');
    }

    public function simpanPerangkat()
    {
        $nomer_seri = $this->input->post('nomer_seri');
        $nama_perangkat = $this->input->post('nama_perangkat');
        $kategori_id = $this->input->post('kategori_id');
        $spesifikasi = $this->input->post('spesifikasi');
        $lokasi_fisik = $this->input->post('lokasi_fisik');
        $status_perangkat = $this->input->post('status_perangkat');
        $catatan = $this->input->post('catatan');

        // Upload foto
        $config['upload_path'] = './assets/img/perangkat/'; // Sesuaikan dengan path penyimpanan
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // 2048KB (2MB)
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $error = $this->upload->display_errors();
            $data['upload_error'] = $error;
            $this->load->view('teknisi/kelolaperangkat', $data);
        } else {
            $upload_data = $this->upload->data();
            $foto = $upload_data['file_name'];

            // Data perangkat
            $data_perangkat = array(
                'nomer_seri' => $nomer_seri,
                'nama_perangkat' => $nama_perangkat,
                'kategori_id' => $kategori_id,
                'spesifikasi' => $spesifikasi,
                'lokasi_fisik' => $lokasi_fisik,
                'status_perangkat' => $status_perangkat,
                'catatan' => $catatan,
                'foto' => $foto
            );

            $this->PerangkatModel->simpan_perangkat($data_perangkat);
            $this->session->set_flashdata('success', 'Perangkat Telah Ditambahkan');
            redirect('teknisi/Kelolaperangkat');
        }
    }

    public function tampilEditPerangkat($perangkat_id)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('Home/loginPage');
        }
        $data['active_menu'] = 'kelolaPerangkat';
        $data['title'] = 'Edit Perangkat';

        // Mendapatkan username dari session
        $username = $this->session->userdata('username');

        // Memanggil Method dari Model
        $data['users'] = $this->UserModel->getUserByIdTeknisi($username);

        // Dapatkan data perangkat berdasarkan ID
        $data['perangkat'] = $this->PerangkatModel->getPerangkatById($perangkat_id);
        $data['kategori'] = $this->PerangkatModel->getKategori();

        // Mengambil user_id
        $user = $this->UserModel->getUserByIdTeknisi($username);
        $user_id = $user->user_id;

        // Mendapatkan Notifikasi
        $data['notif'] = $this->NotifikasiModel->get_notifikasi_by_id($user_id);
        $data['jml_notif'] = $this->NotifikasiModel->count_notif_by_id($user_id);

        $this->load->view('teknisi/templates/header', $data);
        $this->load->view('teknisi/templates/sidebar', $data);
        $this->load->view('teknisi/edit-perangkat');
        $this->load->view('teknisi/templates/footer');
    }

    public function updatePerangkat($perangkat_id)
    {
        $nomer_seri = $this->input->post('nomer_seri');
        $nama_perangkat = $this->input->post('nama_perangkat');
        $kategori_id = $this->input->post('kategori_id');
        $spesifikasi = $this->input->post('spesifikasi');
        $lokasi_fisik = $this->input->post('lokasi_fisik');
        $status_perangkat = $this->input->post('status_perangkat');
        $catatan = $this->input->post('catatan');
        // Mendapatkan user_id dari session
        $user_id = $this->session->userdata('user_id');

        // Cek apakah ada file baru yang diunggah
        if ($_FILES['foto']['name'] !== '') {
            // Upload foto baru
            $config['upload_path'] = './assets/img/perangkat/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error_upload', $error);
                redirect('teknisi/KelolaPerangkat/tampilEditPerangkat/' . $perangkat_id);
            } else {
                $upload_data = $this->upload->data();
                $foto = $upload_data['file_name'];

                // Data perangkat
                $data_perangkat = array(
                    'nomer_seri' => $nomer_seri,
                    'nama_perangkat' => $nama_perangkat,
                    'kategori_id' => $kategori_id,
                    'spesifikasi' => $spesifikasi,
                    'status_perangkat' => $status_perangkat,
                    'catatan' => $catatan,
                    'foto' => $foto
                );

                $this->PerangkatModel->update_perangkat($perangkat_id, $data_perangkat);
                $this->session->set_flashdata('success', 'Perangkat Telah Diperbarui');
                redirect('teknisi/KelolaPerangkat');
            }
        } else {
            // Gunakan foto yang sudah ada
            $data_perangkat = array(
                'nomer_seri' => $nomer_seri,
                'nama_perangkat' => $nama_perangkat,
                'kategori_id' => $kategori_id,
                'spesifikasi' => $spesifikasi,
                'status_perangkat' => $status_perangkat,
                'catatan' => $catatan,
            );

            $this->PerangkatModel->update_perangkat($perangkat_id, $data_perangkat);
            $this->session->set_flashdata('success', 'Perangkat Telah Diperbarui');
            redirect('teknisi/KelolaPerangkat');
        }

    }

    public function hapusPerangkat($perangkat_id)
    {
        $this->PerangkatModel->delete_perangkat($perangkat_id);
        $this->session->set_flashdata('success', 'Perangkat Telah Dihapus');
        redirect('teknisi/KelolaPerangkat');
    }


}