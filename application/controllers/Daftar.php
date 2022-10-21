<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Daftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        if ($this->session->userdata('login') != 1) {
            $this->session->set_flashdata('alert_message', '<div class="alert alert-danger alert-dismissible fade show"><strong>Maaf! </strong>Anda belum login.</div>');
            redirect('auth');
        } else {
            if ($this->session->userdata('aktif') == 2) {
                redirect('admin');
            }
        }
    }

    public function index()
    {
        if ($this->session->userdata('aktif') == 1) {
            redirect('daftar/hold');
        }
        // TITLE
        $data['title'] = 'Daftar';
        $data['sub_title'] = 'Form Pendaftaran';
        $data['corp_name'] = 'Kotree';
        $data['user'] = $this->app_models->getUserTable('user');
        $data['userdata'] = $this->app_models->getUserTable('userdata');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_daftar', $data);
        $this->load->view('templates/sidebar_daftar', $data);
        $this->load->view('daftar/index', $data);
        $this->load->view('templates/footer');
    }

    public function register()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Name', 'required|trim', [
            'required' => 'Nama harus diisi!'
        ]);
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required|trim', [
            'required' => 'Tempat lahir harus diisi!'
        ]);
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal_lahir', 'required', [
            'required' => 'Tanggal lahir harus diisi!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat harus diisi!'
        ]);
        $this->form_validation->set_rules('no_hp', 'No_hp', 'required|trim', [
            'required' => 'No HP harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Daftar';
            $data['sub_title'] = 'Form Pendaftaran';
            $data['corp_name'] = 'Kotree';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['userdata'] = $this->db->get_where('userdata', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar_daftar', $data);
            $this->load->view('templates/sidebar_daftar', $data);
            $this->load->view('daftar/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
                'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
                'profil' => 'default.jpg'
            ];
            $this->db->where('username', $data['username']);
            $this->db->update('userdata', $data);

            $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data = [
                'username' => $user['username'],
                'password' => $user['password'],
                'nama_lengkap' => $user['nama_lengkap'],
                'level' => $user['level'],
                'aktif' => '1'
            ];
            $this->db->where('username', $data['username']);
            $this->db->update('user', $data);

            $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Berhasil melengkapi data! </strong>Admin akan memverifikasi akun anda.</div>');
            redirect('daftar/hold');
        }
    }

    public function hold()
    {
        $data['title'] = 'Daftar';
        $data['sub_title'] = 'Halaman Tunggu';
        $data['corp_name'] = 'Kotree';
        $data['user'] = $this->app_models->getUserTable('user');
        $data['userdata'] = $this->app_models->getUserTable('userdata');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar_daftar', $data);
        $this->load->view('templates/sidebar_daftar', $data);
        $this->load->view('daftar/hold', $data);
        $this->load->view('templates/footer');
    }
}