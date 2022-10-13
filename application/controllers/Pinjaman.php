<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pinjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['title'] = 'Pinjaman';
        $data['sub_title'] = 'Tambah Pinjaman Baru';
        $data['status'] = 'User';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['userdata'] = $this->db->get_where('userdata', ['username' => $this->session->userdata('username')])->row_array();
        $data['tanggal'] = new DateTime();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pinjaman/baru', $data);
        $this->load->view('templates/footer');
    }

    public function baru()
    {
        $data['title'] = 'Pinjaman';
        $data['sub_title'] = 'Tambah Pinjaman Baru';
        $data['status'] = 'User';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['userdata'] = $this->db->get_where('userdata', ['username' => $this->session->userdata('username')])->row_array();
        $data['tanggal'] = new DateTime();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pinjaman/baru', $data);
        $this->load->view('templates/footer');
    }

    public function data()
    {
        $data['title'] = 'Pinjaman';
        $data['sub_title'] = 'Data Pinjaman';
        $data['status'] = 'User';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['userdata'] = $this->db->get_where('userdata', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pinjaman/data', $data);
        $this->load->view('templates/footer');
    }

    public function tagihan()
    {
        $data['title'] = 'Pinjaman';
        $data['sub_title'] = 'Tagihan Pinjaman';
        $data['status'] = 'User';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['userdata'] = $this->db->get_where('userdata', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pinjaman/tagihan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('pinjaman_pokok', 'Pinjaman_pokok', 'required|trim', [
            'required' => 'Pinjaman Pokok harus diisi!'
        ]);
        $this->form_validation->set_rules('jangka_waktu', 'jangka_waktu', 'required|trim', [
            'required' => 'Jangka Waktu harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pinjaman';
            $data['sub_title'] = 'Tambah Pinjaman Baru';
            $data['status'] = 'User';
            $data['corp_name'] = 'Kotree';
            $data['kelompok'] = 'Kelompok 3';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['userdata'] = $this->db->get_where('userdata', ['username' => $this->session->userdata('username')])->row_array();
            $data['tanggal'] = new DateTime();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pinjaman/baru', $data);
            $this->load->view('templates/footer');
        } else {
            $tgl_selesai = date('Y-m-d', strtotime('+' . $this->input->post('jangka_waktu') . 'months', $this->input->post('tgl_sekarang')));
            $angsuran = $this->input->post('pinjaman_pokok') / $this->input->post('jangka_waktu') + ($this->input->post('pinjaman_pokok') * ($this->input->post('bunga') / 100));
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'pinjaman_pokok' => htmlspecialchars($this->input->post('pinjaman_pokok', true)),
                'bunga' => htmlspecialchars($this->input->post('bunga', true)),
                'tgl_pinjaman' => htmlspecialchars($this->input->post('tgl_pinjaman', true)),
                'jangka_waktu' => htmlspecialchars($this->input->post('jangka_waktu', true)),
                'tgl_selesai' => $tgl_selesai,
                'angsuran' => $angsuran
            ];
            $this->db->insert('pinjaman', $data);

            $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Berhasil meminjam! </strong>Silahkan tunggu admin menyetujui.</div>');
            redirect('pinjaman/data');
        }
    }
}