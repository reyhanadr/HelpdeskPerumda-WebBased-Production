<?php
<<<<<<< HEAD
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
=======
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
        parent::__construct();
        $this->load->model('UserModel');
    }

<<<<<<< HEAD
    public function index()
    {
=======
    public function index() {
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
        if (!$this->session->userdata('logged_in')) {
            redirect('Home/loginPage');
        }
    }

<<<<<<< HEAD
    public function loginPage()
    {
        $this->load->view("login");
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $users = $this->UserModel->get_user($username, $password);

=======
    public function loginPage(){
        $this->load->view("login");
    }

    public function login() {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        
        $users = $this->UserModel->get_user($username, $password);
        
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
        if ($users) {
            $session_data = array(
                'user_id' => $users->user_id,
                'username' => $users->username,
                'role' => $users->role_id, // Assume 'role' field in the database
<<<<<<< HEAD
                'kategori' => $users->kategori_id, // Assume 'kategori_id' field in the database
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);

=======
                'kategori' => $users->kategori_id, // Assume 'role' field in the database
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);
            
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
            // Redirect based on user role
            switch ($users->role_id) {
                case '1':
                    redirect('Administator/Dashboard');
                    break;
                case '2':
                    redirect('Karyawan/Dashboard');
                    break;
                case '3':
                    redirect('Teknisi/Dashboard');
                    break;
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('Dashboard');
        }
    }
<<<<<<< HEAD


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Home');
    }
}
=======
    

    public function logout() {
        $this->session->sess_destroy();
        redirect('Home');
    }
}
>>>>>>> 0f9e57a2c68b4616c387478a257b1c5a4ee3f73e
