<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'User';
        $data['sub_title'] = 'Pengurus';
        $data['status'] = 'Admin';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['userdata'] = $this->db->get_where('userdata', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pengguna/pengurus', $data);
        $this->load->view('templates/footer');
    }

    public function anggota()
    {
        $data['title'] = 'User';
        $data['sub_title'] = 'Anggota';
        $data['status'] = 'Admin';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['userdata'] = $this->db->get_where('userdata', ['username' => $this->session->userdata('username')])->row_array();

        $queryUserdata = "SELECT `level`, `aktif`, `userdata`.*
                            FROM `user` JOIN `userdata`
                            ON `user`.`username` = `userdata`.`username`";
        $data['queryUserdata'] = $this->db->query($queryUserdata)->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pengguna/anggota', $data);
        $this->load->view('templates/footer');
    }
    public function edit_form($username)
    {
        $data['title'] = 'User';
        $data['sub_title'] = 'Edit Profil';
        $data['status'] = 'Admin';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->db->get_where('user', ['username' => $username])->row_array();
        $data['userdata'] = $this->db->get_where('userdata', ['username' => $username])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pengguna/edit_form', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
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
            $data['title'] = 'User';
            $data['sub_title'] = 'Edit Profil';
            $data['corp_name'] = 'Kotree';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['userdata'] = $this->db->get_where('userdata', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pengguna/edit_form', $data);
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

            $user = $this->db->get_where('user', ['username' => $data['username']])->row_array();

            $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Selamat! </strong>Anda berhasil merubah data.</div>');
            if ($user['level'] == 2) {
                redirect('pengguna');
            } else {
                redirect('pengguna/anggota');
            }
        }
    }

    public function hapus($username)
    {
        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        $this->db->delete('user', ['username' => $username]);
        $this->db->delete('userdata', ['username' => $username]);

        $this->session->set_flashdata('alert_message', '<div class="alert alert-danger alert-dismissible fade show"><strong>Berhasil! </strong>Data dihapus.</div>');

        if ($user['level'] == 2) {
            redirect('pengguna');
        } else {
            redirect('pengguna/anggota');
        }
    }

    public function aktif($username)
    {
        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        $data = [
            'username'      => $user['username'],
            'password'      => $user['password'],
            'nama_lengkap'  => $user['nama_lengkap'],
            'level'         => $user['level'],
            'aktif'         => '2'
        ];
        $this->db->where('username', $username);
        $this->db->update('user', $data);

        $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Selamat! </strong>Anda berhasil mengaktifkan user.</div>');

        if ($user['level'] == 2) {
            redirect('pengguna');
        } else {
            redirect('pengguna/anggota');
        }
    }

    public function nonaktif($username)
    {
        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        $data = [
            'username'      => $user['username'],
            'password'      => $user['password'],
            'nama_lengkap'  => $user['nama_lengkap'],
            'level'         => $user['level'],
            'aktif'         => '1'
        ];
        $this->db->where('username', $username);
        $this->db->update('user', $data);

        $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Selamat! </strong>Anda berhasil menonaktifkan user.</div>');

        if ($user['level'] == 2) {
            redirect('pengguna');
        } else {
            redirect('pengguna/anggota');
        }
    }
}